<?php
$id = $_GET["id"];


//２DB接続
try {
  $pdo = new PDO('mysql:dbname=gs_db_34;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}












//３SQL作成と実行
//例）DELETE FROM テーブル名前 WHERE id=:id 
$stmt = $pdo->prepare("DELETE FROM gs_an_table WHERE id=:id");
$stmt->bindValue(':id',$id);//セキュリティのためらしい
$status = $stmt->execute();






//４Errorチェック＆Errorが無ければselect.phpへ

if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Location: select.php");
  exit;
}



?>
