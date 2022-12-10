<!-- // POSTを受け取る -->
<!-- // POSTの場合はパスワードも送ってみる。 -->
<?php
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $age = $_POST['age'];
    $composer = $_POST['composer'];
    $songtitle = $_POST['songtitle'];
    $playingage = $_POST['playingage'];
?>


<html>

<head>
    <meta charset="utf-8">
    <title>POST（受信）</title>
</head>

<body>
    <p>お名前:<?= $name ?></p>
    <p>Mail:<?= $mail ?></p>
    <p>年齢:<?= $name ?></p>
    <p>作曲家:<?= $mail ?></p>
    <p>曲名:<?= $name ?></p>
    <p>弾いた時の年齢:<?= $mail ?></p>
    <ul>
        <li><a href="index.php">index.php</a></li>
    </ul>
</body>

</html>
