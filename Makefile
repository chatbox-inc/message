server:
	./node_modules/.bin/gulp wintersmith
server2:
	php -S localhost:4040 -t public
dev:
	npm run dev
builds:
	wintersmith build --clean
	gulp sitemap
	zip backup.zip build/ -r
sync:
	aws s3 sync ./build s3://chatbox-inc.com/ --delete --region ap-northeast-1