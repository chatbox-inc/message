# lumen プロジェクト構築用スケルトン

[![Packagist](https://img.shields.io/packagist/v/chatbox-inc/lumen.svg?style=flat-square)]()

````
$ composer create-project chatbox-inc/lumen myProject dev-master
$ cp .env.example .env
````

## include

- lumen 
- psysh http://psysh.org/#install
- ide-helper http://qiita.com/mikakane/items/f763bb5738886cc532fe
- homestead 

## homestead

````
$ vendor/bin/homestead make
$ vagrant up
````

## インストール後

````
$ php artisan ide-helper:generate
$ php artisan ide-helper:meta
````
