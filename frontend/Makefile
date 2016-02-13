builds:
	wintersmith build --clean
	gulp sitemap
	zip backup.zip build/ -r
sync:
	aws s3 sync ./build s3://chatbox-inc.com/ --delete --region ap-northeast-1