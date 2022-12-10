<?php
// 1.GETでid値を取得
$id = $_GET["id"];
// echo $id;
// exit;

//2.DB接続
try {
    //Password:MAMP='root',XAMPP=''
    $pdo = new PDO('mysql:dbname=kadai_php1;charset=utf8;host=localhost','root','');
  } catch (PDOException $e) {
    exit('DBConnectError'.$e->getMessage());
  }

//3.SELECT * FROM kadai_php1_piano where id =:id
$sql = "SELECT * FROM kadai_php1_piano where id =:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//4.データ表示
$view="";
if($status==false) {
    //execute (SQL実行時にエラーがある場合)  
    $error = $stmt->errorinfo();
    exit("ErrorQuery:".$error[2]);
} else {
    //1データのみ抽出の場合はwhileループで取り出さない
    $row = $stmt->fetch();
    //$row["id"], $row["name"]...
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title>データ更新</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>

    <form method="post" action="update.php">
        <div class="jumbotron">
            <fieldset>
                <legend>弾いたことのある曲アンケート</legend>
                <label>名前:<input type="text" name="name" value="<?=$row["name"]?>"></label><br>
                <label>EMAIL:<input type="text" name="mail" value="<?=$row["mail"]?>"></label><br>
                <label>年齢:<input type="text" name="age" value="<?=$row["age"]?>"></label><br>
                <label>作曲家:<input type="text" name="composer" value="<?=$row["composer"]?>"></label><br>
                <label>曲名:<input type="text" name="songtitle" value="<?=$row["songtitle"]?>"></label><br>
                <label>弾いた時の年齢:<input type="text" name="playingage" value="<?=$row["playingage"]?>"></label><br>
                <input type="hidden" name="id" value="<?=$row["id"]?>">
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>        
</body>
</html>