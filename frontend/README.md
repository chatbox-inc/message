## frontend 開発ツール

git subtree で引っ張ってきてから、適当にコピペして使う系のやつ。
(基本的にコピペ専用)

運用の柔軟性のためにこのリポジトリ自体に対して依存しないこと。

````
$ git remote add frontend https://github.com/chatbox-inc/frontend.git
$ git subtree add --prefix=frontend frontend master
````


## npm installs 

gulp 


````
# gulp 
$ npm install gulp gulp-plumber gulp-notify --save
# sass
$ npm install gulp-sass --save
# webpack
$ npm install gulp-webpack babel-loader html-loader --save
# js app 
$ npm install jquery angular angular-route --save
# jade
$ npm install gulp-jade

````
