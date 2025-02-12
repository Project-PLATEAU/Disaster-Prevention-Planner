# 環境構築手順書

# 1 本書について

本書では、地区防災計画作成支援システム（以下「本システム」という。）の利用環境構築手順について記載しています。本システムの構成や仕様の詳細については以下も参考にしてください。

[技術検証レポート](https://www.mlit.go.jp/XXXX)

# 2 システム構成

本システムのシステム構成は以下のとおりです。


以下、本システムで利用するOS,OSS,ライブラリ,ソフトウェアです

| # | 名称 | バージョン | 説明 |
|:---|:---|:---|:---|
| 1 | Ubuntu | 22.04.3 LTS | 本システムを稼働させるOS |
| 2 | Apache | 2.4.41 | 本システムを配信するWebdサーバ |
| 3 | Laravel | 11.38.2 | Webアプリのフレームワーク |
| 4 | PHP | 8.2.27 | 本システムを稼働させるためのプラットフォーム |
| 5 | PhpSpreadsheet | 3.8 | Excelファイルを操作するためのライブラリ |
| 6 | jQuery | 3.7.1 | フロントエンドで利用するJavaScriptライブラリ |
| 7 | jQuery UI | 1.14.1 | フロントエンドで利用するJavaScriptライブラリ |
| 8 | Leaflet | 1.9.4 | 地図を操作するためのJavaScriptライブラリ |
| 9 | MySQL | 8.0 | 本システムのデータを格納するデータベース |
| 10 | libreoffice | 6.4.7.2 | ExcelをPDFに変換するために利用するソフトウェア |

# 3 準備物
本システムをGitHubリポジトリより取得してください。
本システムは、systemディレクトリ以下となります。

# 4 稼働環境構築
## 4-1 Apache2.4のインストール
Apache をインストールします。
```sh
sudo apt install apache2
```

## 4-2 MySQLのインストール
MySQL をインストールします。
```sh
sudo apt install mysql-server
```

## 4-3 PHPのインストール
PHP をインストールします。
```sh
sudo add-apt-repository ppa:ondrej/php

sudo apt update

sudo apt install php8.2
```

関連するライブラリ群をインストールします。
```sh
sudo apt install libapache2-mod-php8.2 php8.2-mysql php8.2-gd php8.2-mbstring php8.2-zip
```

## 4-4 libreofficeのインストール
libreoffice をインストールします。
```sh
sudo apt install libreoffice libreoffice-l10n-ja libreoffice-dmaths libreoffice-ogltrans libreoffice-writer2xhtml libreoffice-pdfimport libreoffice-help-ja
```

PDFに変換したときに、日本語フォントの表示がおかしい場合には、以下を実行します。
```sh
wget https://moji.or.jp/wp-content/ipafont/IPAfont/IPAfont00303.zip

unzip IPAfont00303.zip

sudo cp -rf IPAfont00303 /usr/share/fonts/

sudo fc-cache -fr
```

## 4-5 各種設定
本システムを動作させるための各種設定を以下に示します。

### 4-5-1 本システムの公開ディレクトリ設定
本システムで公開するディレクトリをApacheに設定します。
公開するディレクトリは、system/public です。
/etc/apache2/apache2.conf 内

```sh
Alias / /システムへのパス/public/
<Directory "/システムへのパス/public">
    Options Includes ExecCGI FollowSymLinks
    AllowOverride All
    Require all granted
    Order allow,deny
    Allow from all
</Directory>
```

### 4-5-2 データベース作成
MySQLで本システムが利用するデータベースを作成します。  
また、そのデータベースにアクセスできるユーザを作成します。  
作成が完了したら本システムの設定ファイルに記載します。  

system/.env

```sh
DB_CONNECTION=mysql
DB_HOST=データベースのホスト名
DB_PORT=データベースのポート番号
DB_DATABASE=データベース名
DB_USERNAME=データベースアクセスユーザ名
DB_PASSWORD=データベースアクセスパスワード
```

### 4-5-3 テーブル作成
systemのルートディレクトリに移動し、以下のコマンドを実行することでデータベース内にテーブルが作成されます。
```sh
php artisan migrate
```

### 4-5-4 マスタデータ登録
systemのルートディレクトリに移動し、以下のコマンドを実行することで初期データが作成されます。

住所情報登録
```sh
php artisan db:seed --class initArea
```

マスタ情報登録
```sh
php artisan db:seed --class initMaster
```

ユーザ情報登録
```sh
php artisan db:seed --class DatabaseSeeder
```

上記のデータは
- 住所情報登録  
    system/database/seeders/initArea.php

- マスタ情報登録  
    system/database/seeders/initMaster.php

- ユーザ情報登録  
    system/database/seeders/DatabaseSeeder.php

に記載されており、そこに記載されている情報を変更することで登録するデータを変更できます。

# 5 動作確認
ブラウザを開き、指定したURLにアクセスし下記画面が表示されれば、環境構築及び設定が完了となります。