#pip install PyGithub
#pip install boto3

import os
import datetime
import urllib
import shutil
from subprocess import check_call
from github import Github
import boto3
from botocore import UNSIGNED
from botocore.client import Config
from android_sign_info import getAndroidSignInfo

def getLatestCommitSHA():
	g = Github()
	r = g.get_repo("jpd002/Play-");
	b = r.get_branch(r.default_branch)
	return b.commit.sha[:8]

def downloadBuilds(commitSha):
	client = boto3.client('s3', config=Config(signature_version=UNSIGNED))
	resp = client.list_objects(Bucket="playbuilds", Prefix=commitSha)
	for obj in resp['Contents']:
		key = obj['Key']
		presigned_url = client.generate_presigned_url('get_object', Params={'Bucket': "playbuilds", 'Key': key})
		print 'Obtaining {}.'.format(presigned_url)
		urlOpener = urllib.URLopener()
		urlOpener.retrieve(presigned_url, key)

def signAndroidBuild(srcFilePath, dstFilePath):
	ANDROID_BUILD_TOOLS = os.environ['ANDROID_HOME'] + '/build-tools/24.0.3/'
	androidSignInfo = getAndroidSignInfo()
	check_call([ANDROID_BUILD_TOOLS + "zipalign.exe", "-v", "-p", "4", srcFilePath, dstFilePath])
	check_call([ANDROID_BUILD_TOOLS + "apksigner.bat", "sign", "--ks", androidSignInfo['storeFile'], "--ks-key-alias", androidSignInfo['keyAlias'], 
		"--ks-pass", "pass:{}".format(androidSignInfo['storePassword']), "--key-pass", "pass:{}".format(androidSignInfo['keyPassword']), dstFilePath])

latestCommitSha = getLatestCommitSHA()
print 'Latest commit is {}.'.format(latestCommitSha)

if os.path.exists(latestCommitSha):
	shutil.rmtree(latestCommitSha)
os.makedirs(latestCommitSha)
downloadBuilds(latestCommitSha)

builds = [
	{ 'platform': 'win32',   'srcName': 'Play-0.30-32.exe',          'dstNameFormat': 'Play-{}-32.exe' },
	{ 'platform': 'win32',   'srcName': 'Play-0.30-64.exe',          'dstNameFormat': 'Play-{}-64.exe' },
	{ 'platform': 'macos',   'srcName': 'Play.dmg',                  'dstNameFormat': 'Play-{}.dmg' },
	{ 'platform': 'android', 'srcName': 'Play-release-unsigned.apk', 'dstNameFormat': 'Play-{}.apk' },
]
formattedDate = datetime.datetime.today().strftime("%Y%m%d")

for buildInfo in builds:
	platform = buildInfo['platform']
	print 'Processing build for {}.'.format(platform)
	dstFileName = buildInfo['dstNameFormat'].format(formattedDate)
	dstFilePath = '{}/{}'.format(latestCommitSha, dstFileName)
	srcFilePath = '{}/{}'.format(latestCommitSha, buildInfo['srcName'])
	if platform == 'android':
		signAndroidBuild(srcFilePath, dstFilePath)
	else:
		os.rename(srcFilePath, dstFilePath)
