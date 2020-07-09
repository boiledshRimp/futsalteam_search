<?php require './header.php'?>
<form action="container_db_manipulate_search.php" method="post">
  <input type="text" name="search_word">
  <input type="submit" value="メンバー検索">
</form>
<?php
//今回は外部で$user, $passwordを設定してrequireで呼び出している。
require './ft_person.php';
//例外処理のためにtry carch文使用。
try {

  echo '<h1>','Aチームメンバー','</h1>';
  echo '<table>';
    echo '<tbody>';
      //データベースにアクセスするためにPDOクラスのインスタンスをnew演算子で作成する。
      $ft_team=new PDO('mysql:host=localhost;dbname=futsal_team;charset=utf8',
                  $user, $password);
      //もしも名前を検索して、つまり検索ボックスに入力があって条件が一致したら
      if(isset($_REQUEST['search_word'])){
        //prepareメソッドを使って、条件を設定。
        $search=$ft_team->prepare('SELECT * FROM futsal_a WHERE name LIKE ?');
        /*
        executeメソッドで、設定条件の?部分に値を当てはめて実行する。
        この場合は当てはめるものが検索ボックスに入力した名前、結果↓
        「SELECT * FROM futsal_a WHERE name LIKE 入力キーワード」
        ということになる。
        */
        $search->execute(array('%'.$_REQUEST['search_word'].'%'));
      }
      /*
      foreachとeachで「SELECT * FROM futsal_a WHERE name LIKE 入力キーワード」に当てはまるデータ一覧出力。
      検索ボタンだけ押すとデータが一覧表示される。
      */
      foreach ($search as $person) {
        echo '<tr>';
          echo '<td>','番号:',$person['id'],'、','</td>';
          echo '<td>','名前:',$person['name'],'、','</td>';
          echo '<td>','年齢:',$person['age'],'歳','、','</td>';
          echo '<td>','ポジション:',$person['position'],'</td>';
        echo '</tr>';
      }
    echo '<tbody>';
  echo '</table>';

} catch(PDOException $e){

  echo $e->getMessage();
  exit;

}
?>
<?php require './footer.php'?>