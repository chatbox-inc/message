# lumen プロジェクト構築用スケルトン

composer.jsonに下記記述を追加

````
    "repositories":[
        {
            "type":"vcs",
            "url":"https://github.com/chatbox-inc/lumen-template.git"
        }
    ],
````

compsoerを利用してファイルを取ってくる

````
$ composer require chatbox/lumen-template:dev-master
````

主要なファイル等は`lumen new {siteName}`コマンドを使用してひっぱり、
適宜、再配置してください。mkd

## include

- lumen 
- psysh http://psysh.org/#install
- ide-helper http://qiita.com/mikakane/items/f763bb5738886cc532fe
