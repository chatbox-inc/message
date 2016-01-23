## frontend 開発ツール

git subtree で引っ張ってきてから、適当にコピペして使う系のやつ。
(基本的にコピペ専用)

運用の柔軟性のためにこのリポジトリ自体に対して依存しないこと。

````
$ git remote add frontend https://github.com/chatbox-inc/frontend.git
$ git subtree add --prefix=frontend frontend master
````
