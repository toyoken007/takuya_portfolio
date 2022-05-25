<?php
if(mb_send_mail('toyoken007@gmail.com', 'メール送信テスト：aiueo', 'メール送信テスト：12345')) {
    echo "送信完了";
} else {
    echo "送信失敗";
}
?>