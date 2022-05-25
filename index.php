<?php 

session_start();
$post = [
  'name'  => '',
  'email' => '',
  'inquiry' => ''
];

$error = [];

/* htmlspecialcharsを短くする */
function h($value) {
  return htmlspecialchars($value, ENT_QUOTES);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $post['name'] = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
  if ($post['name'] === '') {
      $error['name'] = 'blank';
  }
  
  $post['email'] = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  if ($post['email'] === '') {
      $error['email'] = 'blank';
  } else if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
    $error['email'] = 'email';
  }

  $post['inquiry'] = filter_input(INPUT_POST, 'inquiry');
  if ($post['inquiry'] === '') {
    $error['inquiry'] = 'blank';
  }

  if (count($error) === 0) {
    $_SESSION['form'] = $post;
    header('Location: check.php');
    exit();
  }
} else {
    if (isset($_SESSION['form'])) {
      $post = $_SESSION['form'];
    }
}

?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="description">
        <meta name="keywords" content="keywords">
        <meta name="author" content="">
        <meta property="og:title" content="title">
        <meta property="og:type" content="website">
        <meta property="og:url" content="http://#{metas.url}">
        <meta property="og:image" content="http://#{metas.image}/og_image.png">
        <meta property="og:site_name" content="site_name">
        <meta property="og:description" content="description">
        <meta property="fb:app_id" content="任意のID">
    <title>title</title>
    <link rel="stylesheet" href="css/style.css">
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      
      ga('create', 'UA-XXXXXXXX-Y', 'example.com');
      ga('send', 'pageview');
    </script>
  </head>
  <body>
    <header>
      <nav class="nav_wrap">
        <h1 class="top_logo" id="top_logo"><a href="../"><img src="../images/logo2.png" alt="Liberty"></a></h1>
        <ul class="menu_nav">
          <li><a href="https://index.html/">top</a>
          </li>
          <li><a href="#about/">About</a>
          </li>
          <li><a href="Service/">Service</a>
          </li>
          <li><a href="Works/">Works</a>
          </li>
          <li><a href="Contact/">Contact</a>
          </li>
        </ul>
      </nav>
    </header>
    <main class="top_mainImg_wrap" id="topPage">
      <div class="img_content_wrap"> 
        <ul class="name_block_wrap"> 
          <li class="block_name_01"> 
            <ul class="block_list01_wrap"> 
              <li class="job_name">Codeing </li>
              <li class="my_name">Takuya<?php echo "hogehoge"; ?></li>
            </ul>
          </li>
          <li class="block_name_02">
            <ul class="block_list01_wrap">
              <li class="job_name">Web Desiger</li>
              <li class="my_name">Kikuta</li>
            </ul>
          </li>
        </ul>
        <div class="top_mv_message_wrap">
          <p class="mv_inner_message">人から人へ思いをつなげる<br>想像と可能性をひろげ、わくわくする<br>そんなお手伝いができたら．．．</p>
        </div>
      </div>
      <article id="content-inner-wrap">
        <section class="about_content_wrap" id="about_content_wrap">
          <h2 class="section_title right_line"><span class="about_first_txt">A</span>bout</h2>
          <div class="about_inner_message">
            <div class="bg_white">
              <figure class="about_my_photo"><img src="./images/about_img@2x.jpg" alt="自画像"></figure>
              <p class="about_message">固定概念に囚われない、<br>楽しい・面白いを大切にしています。<br>お客様とのコミュニケーションを大切にし<br>情報整理から問題点を洗い出し、<br>わくわく出来るようなWEBサイトを制作します。</p>
            </div>
          </div>
        </section>
        <section class="service_content_wrap" id="service_content_wrap">
          <h2 class="section_title center_line"><span class="service_first_txt">S</span>ervice</h2>
          <ul class="service_item_list">
            <li class="service_items item_list01">
              <h3 class="service_name">DIRECTION</h3>
              <p class="item_name">ディレクション</p>
              <div class="icon_wrap note_wrap">
                <figure class="item_logo_wrap"><img src="./images/ノートロゴ.png" alt="ディレクション"></figure>
              </div>
              <p class="service_txt">お客様の要望を聞き、問題点と方向性を決めさせて頂きます。<br>その上で効果的なプランを作成しご提案いたします。サイトを制作するには最初のステップになり、とても重要な場所になります。何を必要とし必要で無いかを洗い出し、費用対効果の高いWebサイトを作る上での重要な箇所になります。</p>
            </li>
            <li class="service_items item_list02">
              <h3 class="service_name">WEB SITE DESIGN</h3>
              <p class="item_name">デザイン</p>
              <div class="icon_wrap pencil_wrap">
                <figure class="item_logo_wrap"><img src="./images/鉛筆ロゴ.png" alt="デザイン"></figure>
              </div>
              <p class="service_txt">ディレクションに沿ったデザインを作成いたします。<br>この場所で大まかな見た目、完成にほぼほぼ近いデザインになります。ユーザーインターフェースを考え使う人が分かりやすいサイトデザインにします。定時させていただいたデザインの修正などはここで行います。</p>
            </li>
            <li class="service_items item_list03">
              <h3 class="service_name">CODING</h3>
              <p class="item_name">制作</p>
              <div class="icon_wrap dating_wrap">
                <figure class="item_logo_wrap"><img src="./images/コーディングロゴ.png" alt="制作"></figure>
              </div>
              <p class="service_txt">デザインで作成した通りに制作・プログラムしていきます。<br>ここでは実際にサイト上に公開する最終段階になります。html/cssや動きのあるコンテンツをjavascriptで作成していきます。なるべく編集やカスタマイズしやすい様に心掛け作成しています。こちらが終わると納期になります。</p>
            </li>
          </ul>
        </section>
        <section class="works_content_wrap" id="works_content_wrap">
          <article class="works_inner">
            <h2 class="section_title left_line"><span class="works_first_txt">W</span>orks</h2>
            <ul class="work_content">
              <li class="work_item">
                <h3 class="items_title">CODING<a href="https://www.tobu.co.jp/sl/" target="_blank">
                    <figure class="works_coding"><img src="./images/toub/tobu_sltaijyu.jpg" alt="SL大樹"></figure>
                    <p class="works_coding_caption">鉄道会社でフロントエンド・<br>コーダーとして制作</p></a></h3>
              </li>
              <li class="work_item">
                <h3 class="items_title">CODING<a href="https://www.sumida-machi.or.jp/" target="_blank">
                    <figure class="works_coding"><img src="./images/toub/sumidamachizukuri.jpg" alt="墨田まちづくり公社"></figure>
                    <p class="works_coding_caption">鉄道会社でフロントエンド・<br>コーダーとして制作</p></a></h3>
              </li>
              <li class="work_item">
                <h3 class="items_title">DESING<a href="https://shop.mu-mo.net/" target="_blank">
                    <figure class="works_coding"><img src="./images/avex/yoshikiWorks.jpg" alt="ミューモ"></figure>
                    <p class="works_coding_caption">大手音楽事務所でバナーデザイン・<br>WEBサイトデザイン・サイトを制作</p></a></h3>
              </li>
              <li class="work_item">
                <h3 class="items_title">DESING<a href="https://shop.mu-mo.net/" target="_blank">
                    <figure class="works_coding"><img src="./images/avex/shuta1280_800.jpg" alt="ミューモ"></figure>
                    <p class="works_coding_caption">大手音楽事務所でバナー広告を作成</p></a></h3>
              </li>
              <li class="work_item">
                <h3 class="items_title">CODING<a href="https://shop.mu-mo.net/" target="_blank">
                    <figure class="works_coding"><img src="./images/avex/wasta.jpg" alt="墨田まちづくり公社"></figure>
                    <p class="works_coding_caption">大手音楽事務所でバナーデザイン・<br>WEBサイトデザイン・サイトを制作</p></a></h3>
              </li>
              <li class="work_item">
                <h3 class="items_title">DESING<a href="https://shibuyastream.jp/" target="_blank">
                    <figure class="works_coding"><img src="./images/firstvision/shibuyastream.jpg" alt="渋谷ストリーム"></figure>
                    <p class="works_coding_caption">制作会社でアシスタントとして<br>ワイヤーフレーム作成</p></a></h3>
              </li>
            </ul>
          </article>
        </section>
        <section class="contact_content_wrap" id="contact_content_wrap">
          <h2 class="section_title center_line">Contact</h2>
          <p class="contact_message center_line">お仕事のご依頼・ご相談など、お気軽にご連絡ください。</p>
          <p class="alert_message center_line">※は入力必須項目です。必ずご入力ください。</p>
          <div class="mail_form" id="mail_form">
            <form action="" method="post">
              <dl>
                <dt>お名前<span>*</span></dt>
                <dd>
                  <input class="name" id="name" type="text" name="name" size="50" value="<?php echo h($post['name']); ?>" placeholder="お名前を入力ください">
                  <?php if (isset($error['name']) && $error['name'] === 'blank'): ?>
                      <P>※お名前をご記入ください</P>
                  <?php endif; ?>
                </dd>
                <dt>メールアドレス <span>*</span></dt>
                <dd>
                  <input class="email" id="email" type="email" name="email" size="50" value="<?php echo h($post['email']); ?>" placeholder="メールアドレスを入力ください">
                  <?php if (isset($error['email']) && $error['email'] === 'blank'): ?>
                      <P>※メールアドレスをご記入ください</P>
                  <?php endif; ?>
                  <?php if (isset($error['email']) && $error['email'] === 'email'): ?>
                      <P>※メールアドレスを正しくご記入ください</P>
                  <?php endif; ?>
                </dd>
                <dt>お問い合わせ内容<span>*</span></dt>
                <dd>
                  <textarea class="inquiry" id="inquiry" name="inquiry" cols="55" rows="5" placeholder="お問い合わせ内容を入力ください"><?php echo htmlspecialchars($post['inquiry'], ENT_QUOTES); ?></textarea>
                  <?php if (isset($error['inquiry']) && $error['inquiry'] === 'blank'): ?>
                      <P>※お問い合わせ内容をご記入ください</P>
                  <?php endif; ?>
                </dd>
              </dl>
              <div class="confirmation_screen">
                <button class="screen" type="submit" name="submit_confirm" value="confirmation">確認画面へ</button>
              </div>
            </form>
          </div>
        </section>
      </article>
    </main>
    <footer class="footer" id="footer">
      <p class="copyright">&copy; 2022 - Liberty KIKUTATAKUYA.</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script>(window.jQuery || document .write('<script src="js/jquery-1.11.2.min.js"><\/script>'));</script>
    <script src="js/main.js"></script>
    <script src="js/slick_slide.js"></script>
  </body>
</html>