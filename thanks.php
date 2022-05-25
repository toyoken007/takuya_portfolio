<?php 
$referer = $_SERVER['HTTP_REFERER']; //アクセス元ページ（ユーザー側）
$url = "check.php"; //運営が指定しているアクセス元ページ
if(!strstr($referer,$url)){
header("Location: index.php");
exit;
}

?>
<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>送信完了</title>
</head>
<body>
    <p>送信完了</p>
    <a href="index.php">戻る</a>
</body>
</html>