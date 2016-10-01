# メッセージ管理アプリケーション

[![CircleCI](https://circleci.com/gh/chatbox-inc/message.svg?style=svg)](https://circleci.com/gh/chatbox-inc/message)

APIドキュメントはこちら

http://editor.swagger.io/#/?import=https://raw.githubusercontent.com/chatbox-inc/message/master/doc/swagger.yml

意思決定の注入を行わない、純粋なアプリケーションとして実装

## 機能

問い合わせメッセージ送信のためのシンプルなAPI構成を整える。

エントリは message. ルートは個別に設定可能。

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

## Usage

ServiceProvider 及び backendsフォルダを参照
