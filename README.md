# セットアップ

## 1. 準備

* [Docker](https://www.docker.com/docker-mac)をインストールする。(インストール済みの場合はスキップ。)
  * Dockerは非常に軽量なコンテナ型のアプリケーション実行環境です。<br>
    この研修で詳しい説明は省きますが興味があれば調べてみてください。

* [Github](https://github.com/)で新規リポジトリを作成する。(アカウントを持っていなければ場合は登録する。)

  * Githubで作成したリポジトリの Settings->Collaborators から研修担当者のGithubアカウントを追加する。

* Gitの初期設定<br>
  `<NAME>` `<EMAIL>` は自分の物に書き換える。
```base
$ git config --global user.name "<NAME>"
$ git config --global user.email "<EMAIL>"
```

* IDEとして[PhpStorm](https://www.jetbrains.com/ja-jp/phpstorm/)がおすすめ。
  * 30日の試用が可能。

## 2. 研修アプリの取得と作業用リポジトリへプッシュ

ここからCLIでの作業になるのでMacの`ターミナル`などを利用する。

研修アプリを取得した後、自分の作業用リポジトリへプッシュを行う。

```bash
# 研修用リポジトリをローカルにshopというディレクトリ名でクローン
git clone https://github.com/nakama-t/shop-template shop

# shopへ移動
cd shop

# originの再設定
# <URL> は作成した自分のリポジトリの "HTTPS" を使用する
git remote set-url origin <URL>

# Githubにローカルリポジトリをプッシュ 
git push origin master
```

## 3. Laradockのセットアップ

Laradockを利用してDockerにLaravel開発環境を構築する。

```bash
# laradockをローカルにクローン
git submodule init
git submodule update

# laradockの初期設定
./init.sh
```

## 4. Dockerコンテナの起動

```bash
cd laradock

docker-compose up -d nginx mysql mailhog
```

初回起動はしばらく時間がかかります。

## 5. Laravelのセットアップ

```bash
# workspaceにログイン
docker-compose exec workspace bash

# 依存関係のインストール
composer install

# データベースのマイグレート&シードデータ投入
php artisan migrate --seed

# ストレージをリンク
php artisan storage:link

# 依存関係のインストール
yarn

# アセットファイルのコンパイル
yarn run dev

# workspaceからログアウト
exit
```

## 6. 動作確認

[http://localhost](http://localhost) にアクセスして画面が表示されれば完了。

## 7. PhpStorm補完設定

PhpStormを利用する場合、以下のコマンドを実行しておくと補完がきいて便利。

```bash
php artisan clear-compiled

php artisan ide-helper:generate

php artisan ide-helper:meta

# 質問してくるのはEnterで
php artisan ide-helper:model
```


# 研修アプリケーションについての説明

```
~/shop
├── laradock     # Laradockディレクトリ(docker~系のコマンドはここで実行)
├── .laradock    # データディレクトリ(MySQLのデータベースはここに保存)
└── application  # プロジェクトディレクトリ(機能追加はここに対して行う)
```

## サービス起動/停止

```bash
# 起動
docker-compose up -d nginx mysql mailhog

# 停止
docker-compose down
```

## コマンド実行

composer, php artisan, yarn などのコマンドを実行する場合、環境はworkspaceコンテナ内にあるので

workspaceにログインする必要がある。

```bash
# コンテナにbashでログインする
docker-compose exec workspace bash

# 任意のコードを実行
php artisan migrate

# コンテナからログアウト
exit
```

ログインせず直接実行も可能。

```bash
docker-compose exec workspace php artisan migrate
```

## アセットコンパイル

js/sass のファイル編集した場合、コンパイルしなければ画面に反映されない。

```bash 
yarn run dev
```

もしくは変更を検知して自動でコンパイルすることもできる。

```bash
# Ctrl + C で終了
yarn run watch
```

`webpack.mix.js` にコンパイル対象の設定がある。

## MySQL

```bash
docker-compose exec mysql mysql -u default -p
```

コマンド実行後パスワードを聞かれるので "secret" と入力する。


# 課題

* フロントサイド、管理サイドのURL分離
  * http://localhost
  * http://localhost/admin

* 管理側のログイン、ログアウト
  * メールアドレス admin@a.com
  * パスワード pass

上記の機能は実装済みなのでその他機能について[設計書](https://drive.google.com/drive/folders/1VFdG8qzfwZx5flaXMUbYZU_Xnvp7yPm5?usp=sharing)を参考に実装をすすめる。

適度にブランチをきって開発しGithubでプルリクエストを作成。

研修担当者にレビューしてもらってください。

インターネットでドキュメント検索の際はバージョンに注意してください。
* Laravel 6.13 (Laravel 6系)
* Bootstrap 4.4 (Bootstrap 4系)
