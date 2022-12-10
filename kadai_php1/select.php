<?php
//1.  DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=kadai_php1;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DBConnectError'.$e->getMessage());
}

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM kadai_php1_piano");
$status = $stmt->execute();

//３．データ表示
$view="";
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php

  //テーブル処理
  $view .= '<table border="1"><tbody>';
  $view .= '<tr><th>変更</th><th>削除</th><th>お名前</th><th>EMAIL</th><th>年齢</th><th>作曲家</th><th>曲名</th><th>弾いた時の年齢</th></tr>';

  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    //GETデータ送信リンク作成
    // $view .= "<p>";
    // $view .= '<a href="u_view.php?id='.$result["id"].'">';
    // $view .= $result["indate"].":".$result["name"];
    // $view .= '</a>';
    //削除リンク
    // $view .= '<a href="delete.php?id='.$result["id"].'">';
    // $view .= '[削除]';
    // $view .= '</a>';
    // $view .= "</p>";

 //テーブル中身(while文でデータ最後まで抽出)
    $view .= '<tr>';
      $view .= '<th>';
        // $view .= "<p>";
          $view .= '<a href="u_view.php?id='.$result["id"].'">';
            $view .= "[変更]";
          $view .= '</a>';
        // $view .= "</p>";
      $view .= '</th>';
            
      $view .= '<th>';
      // $view .= "<p>";
      $view .= '<a href="delete.php?id='.$result["id"].'">';
      $view .= '[削除]';
      $view .= '</a>';
      // $view .= "</p>";
      $view .= '</th>';

      $view .= '<th>';
      $view .= $result['name'];
      $view .= '</th>';
      
      $view .= '<th>';
      $view .= $result['mail'];
      $view .= '</th>';
      
      $view .= '<th>';
      $view .= $result['age'];
      $view .= '</th>';
      
      $view .= '<th>';
      $view .= $result['composer'];
      $view .= '</th>';
      
      $view .= '<th>';
      $view .= $result['songtitle'];
      $view .= '</th>';

      $view .= '<th>';
      $view .= $result['playingage'];
      $view .= '</th>';

    $view .= '<tr>';
    $pdo = null;
  }
  $view .= '</table></tbody>';
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">INDEX画面へ</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?= $view ?></div>
</div>

<!-- Main[End] -->

</body>
</html>
