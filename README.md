# SakuraRPC

PHP で書かれた、自分用の JSON-API のひな形。いつも似たようなのを作っているのでテンプレ化してみる。

※ JSON-RPC 2.0 をすこし参考にしている。

## インストール方法

~~~
$ cd sakura-rpc
$ cd pub
$ php -S localhost:8080

# メソッド呼び出し
$ curl -d 'method=add&num1=100&num2=200' localhost:8080 | jq "."
{
  "result": [
    300
  ],
  "message": "OK",
  "code": 20000
}

# 存在しないメソッドの呼び出し
$ curl -d 'method=error' localhost:8080 | jq "."
{
  "result": [],
  "message": "Invalid Method",
  "code": 40000
}

# 不適切なパラメータ (想定されていないパラメータ num3 を使っている)
$ curl -d 'method=add&num1=100&num3=200' localhost:8080 | jq "."
{
  "result": [],
  "message": "Invalid Params",
  "code": 40001
}
~~~

## 使い方

具体例として、簡潔な add 関数が用意されている。基本的にそれを参照すれば分かるはず。

- 関数の追加

  - 新しく追加したい関数名を mymethod とする。method ディレクトリに mymethod.php を作成し、そのファイルに mymethod 関数を記述
  - lib/bootstrap.php の $method に "mymethod" を追加し、さらに method/mymethod.php を require

- 定数の追加
  - lib/bootstrap.php に define 関数で追加

- エラーメッセージの追加
  - lib/Bye.php に新しい関数として追加。ifHoge、という形で記述すること。クライアントのエラーは40000番台、サーバーのエラーは50000番台、成功は20000番、残りの番号は好きに使って良い。

## ログ

- 2014-06-21
  - このプロジェクトを作成した。
