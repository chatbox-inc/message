# メッセージ管理アプリケーション

[![CircleCI](https://circleci.com/gh/chatbox-inc/message.svg?style=svg)](https://circleci.com/gh/chatbox-inc/message)

APIドキュメントはこちら

http://editor.swagger.io/#/?import=https://raw.githubusercontent.com/chatbox-inc/message/master/doc/swagger.yml

意思決定の注入は考えない、純粋なアプリケーションとして実装

## API 仕様

エントリは message . ルートは個別に設定可能。

## メッセージのフォーマット

title: タイトル
subject: 件名
from: 送信者情報
body : その他メタ情報(構造化OK)

## support 

フロントからのメッセージ投げ込みのみをサポート

メッセージの投げ込みにフック(return mail 等で活用)

from to body からなるメッセージ構成(required)

from to をユーザIDにしてSMS活用

to をbox_idにしてBOX MESSAGE活用など

## 利用方法

MessageServiceInterface を注入する



テーブル構成

id 
heade


## issue

- [x] 基本ライブラリ作成
- [x] Sample作成  
− [x] 基礎テスト作成  
− [x] APIドキュメント生成  
− [ ] パッケージ公開  