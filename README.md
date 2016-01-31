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