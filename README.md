# 架空のフットサルチームのデータベースへアクセスし、検索機能を実装。

架空のフットサルチームを作り、データベースにデータを入れ、PHPで表示する備忘録。

# Features

## SQL文編

[表示編と共通。](https://github.com/boiledshRimp/futsalteam_test)

## PHP編

データベースにアクセスするためにPDOクラスのインスタンスをnew演算子で作成する。  
もしも名前を検索して、つまり検索ボックスに入力があって条件が一致したら  
prepareメソッドを使って、条件を設定。  
executeメソッドで、設定条件の?部分に値を当てはめて実行する。  
この場合は当てはめるものが検索ボックスに入力した名前、結果
「SELECT * FROM futsal_a WHERE name LIKE 入力キーワード」  
ということになる。  
foreachとeachで「SELECT * FROM futsal_a WHERE name LIKE 入力キーワード」に当てはまるデータ一覧出力。  
検索ボタンだけ押すとデータが一覧表示される。
