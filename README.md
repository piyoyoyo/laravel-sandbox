# 動作確認手順（Macの場合）
- Docker Desktopがインストールされていることを確認する
- 下記のコマンドを実行して、PHPのバージョンに適した`/vendor/`ディレクトリを追加する
```bash
  docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```
- 下記のコマンドを実行
```bash
  cp .env.example .env
```
- .envを書き換える
- before:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_sandbox
DB_USERNAME=root
DB_PASSWORD=
```

- after:
- ※要は`DB_CONNECTION=sqlite`に書き換えて他はコメントアウトしたらOK
```bash
DB_CONNECTION=sqlite
# DB_HOST=mysql
# DB_PORT=3306
# DB_DATABASE=laravel_sandbox
# DB_USERNAME=sail
# DB_PASSWORD=password
```

- `./vendor/bin/sail up -d`でDockerコンテナを起動する※この段階ではエラーが出てるかも。後続のコマンドを実行してください。
- `./vendor/bin/sail php artisan key:generate`でAPP_KEYを更新する※初回のみ
- `./vendor/bin/sail php artisan migrate`でデータベースにテーブルを作成する※初回のみ
- 上記のコマンドで`Would you like to create it?`って言われたら`yes`で
- `./vendor/bin/sail npm install`でnpmのパッケージをインストールする
- `./vendor/bin/sail npm run build`でassetsをビルドする
- `./vendor/bin/sail down`でDockerコンテナを一度終了する
- `./vendor/bin/sail up -d`で再度起動する

## 開発時
- `./vendor/bin/sail up -d`で起動
- `./vendor/bin/sail down`で終了

## TIPS
### aliasを設定しておくと便利
- bashの場合：`vi ~/.bashrc`
- zshの場合：`vi ~/.zshrc`
- 右記を追加する: `alias sail='./vendor/bin/sail'`
- `sail up -d`で起動できるようになる