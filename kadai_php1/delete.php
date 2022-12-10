<?php
//1.GETでidを取得
$id = $_GET['id'];

//2.DB接続
try {
    //Password:MAMP='root',XAMPP=''
    $pdo = new PDO('mysql:dbname=kadai_php1;charset=utf8;host=localhost','root','');
  } catch (PDOException $e) {
    exit('DBConnectError'.$e->getMessage());
  }

//3.DELETE FROM kadai_php1_piano WHERE...;
$sql = 'DELETE FROM kadai_php1_piano WHERE id =:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//4.データ登録処理後
if($status==false) {
    //execute (SQL実行時にエラーがある場合)  
    $error = $stmt->errorinfo();
    exit("ErrorQuery:".$error[2]);
} else {
    //select.phpへリダイレクト
    header("Location: select.php");
}
?>