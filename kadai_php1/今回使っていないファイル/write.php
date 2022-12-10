<!-- 2.データ登録 -->
<?php
// $name = $_POST['name'];
// $birthPlace = $_POST['birthPlace'];

$name = $_POST['name'];
$mail = $_POST['mail'];
$age = $_POST['age'];
$composer = $_POST['composer'];
$songtitle = $_POST['songtitle'];
$playingage = $_POST['playingage'];

$time = date('Y-m-d H:i:s');
// ファイルに書き込み
$file = fopen('data/data.txt', 'a');
fwrite($file, $time . $name . $age . $composer . $songtitle . $playingage .  "\n");
fclose($file);
//文字作成

?>


<html>

<head>
    <meta charset="utf-8">
    <title>File書き込み</title>
</head>

<body>

    <h1>入力内容を送信しました。</h1>
    <h2>./data/data.txt を確認しましょう！</h2>

    <ul>
        <li><a href="read.php">確認する</a></li>
        <li><a href="input.php">戻る</a></li>
    </ul>
</body>

</html>