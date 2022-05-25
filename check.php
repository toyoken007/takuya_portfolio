<?php 
session_start();

// 入力画面からのアクセスでなければ、戻す
if (!isset($_SESSION['form'])) {
    header('Location: index.php');
    exit();
} else {
    $post = $_SESSION['form'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // メールを送信する
    $to = 'toyoken007@gmail.com';
    $from = $post['email'];
    $subject = 'お問い合わせが届きました';
    $body = <<<EOT
名前：{$post['name']}
メールアドレス：{$post['email']}
内容：
{$post['inquiry']}
EOT;
    mb_send_mail($to, $subject, $body, "From: {$post}");

    // セッションを消してお礼画面へ
    unset($_SESSION['form']);
    header('Location: thanks.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>確認画面</title>
</head>
<body>
    <div class="kakunin">
        <h1>確認画面</h1>
    </div>

    <div class="content">
    <p>記入した内容を確認して、「送信ボタン」を入力してください。</p>
    <form action="" method="POST">
        <input type="hidden" name="action" value="submit">
        <dl>
            <dt>名前</dt>
            <dd>
            <?php echo htmlspecialchars($post['name']); ?>
            </dd>
            <dt>メールアドレス</dt>
            <dd>
            <?php echo htmlspecialchars($post['email']); ?>    
            </dd>
            <dt>お問い合わせ内容</dt>
            <dd>
            <?php echo nl2br(htmlspecialchars($post['inquiry'])); ?>   
            </dd>
        </dl>
        <div>
        <a href="index.php">戻る</a> | <input type="submit" vuleu="送信">
        </div>
    </form>
    </div>
</body>
</html>