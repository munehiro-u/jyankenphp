$dsn      = 'mysql:dbname=db;host=localhost';
$user     = 'root';
$password = 'hgs>xIdCK5i.#';

<?php
// DBへ接続
try{
    $dbh = new PDO($dsn, $user, $password);
    // クエリの実行
    $query = "SELECT * FROM jyannkenn";
    $stmt = $dbh->query($query);

    // 表示処理
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $hands[] = $row['name'];
    }
}catch(PDOException $e){
    print("データベースの接続に失敗しました".$e->getMessage());
    die();
}

// 接続を閉じる
$dbh = null;

<?php
$hands=['ぐー','ちょき','ぱー'];
$picts=['gu','choki','pa'];
$results=['あいこ','アナタのまけです...','アナタのかちです！'];
if(isset($_POST['hand'])){
    $userHand=(int)$_POST['hand'];
    if ($userHand == 0) {
    $pcHand = 2;
} else if ($userHand == 1) {
    $pcHand = 0;
} else if ($userHand == 2) {
    $pcHand = 1;
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/main.css">
<link href="https://fonts.googleapis.com/earlyaccess/nicomoji.css" rel="stylesheet">
<title>じゃんけんぽん</title>
</head>
<body>
<form method="post">
<?php for($i=0;$i<count($hands);$i++):?>
<?php $checked=isset($userHand) && $userHand===$i ? 'checked':'';?>
<input type="radio" name="hand" value="<?=$i?>" <?=$checked?>><?=$hands[$i]?><br>
<?php endfor;?>
<button type="submit">ショウブ</button>
</form>
<?php if(isset($_POST['hand'])):?>
<div>
<img src="images/<?=$picts[$userHand]?>.png">
<img src="images/<?=$picts[$pcHand]?>.png">
</div>
<p><?=$results[($userHand + 3 -$pcHand) % 3]?></p>
<?php endif;?>
</body>
</html>
