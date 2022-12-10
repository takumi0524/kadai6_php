<!-- 1.データ入力 -->
<html>

<head>
    <meta charset="utf-8">
    <style>
        .menu {
            background-color: #2FA6E9;
        }
    </style>
    <title>アンケート入力</title>
</head>

<body>
    <div class="menu">
        <h3>menu</h3>
        <p>弾いた曲についてアンケートの入力をお願いいたします。</p>
    </div>
    <P>※post_confirm.phpにpostで送ってください。</P>

    <form action="post_confirm.php" method="post">
        お名前: <input type="text" name="name">
        EMAIL: <input type="text" name="mail">
        年齢: <input type="text" name="age">
        作曲家: <input type="text" name="composer">
        曲名: <input type="text" name="songtitle">
        弾いた時の年齢: <input type="text" name="playingage">
        <input type="submit" value="送信">
    </form>
</body>

</html>
