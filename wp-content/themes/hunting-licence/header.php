<!DOCTYPE html>
<!-- <html <?php language_attributes(); ?>> -->
<html lang="ja">

<head>
  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-N5KGH6GL');</script>
  <!-- End Google Tag Manager -->
  <meta charset="utf-8">
  <?php if ( is_home() || is_front_page() ) : ?>
    <title>狩猟免許試験例題集（狩猟免許試験過去問集）</title>
    <meta name="description" content="狩猟免許試験の過去問を猟具別に狩猟免許試験例題集の問題をもとに掲載している合格対策サイトです。狩猟免許とはどういう免許なのかを学ぶこともできます。">
    <meta name="keywords" content="狩猟免許,狩猟免許試験,過去問,例題集,テキスト,猟具,法令,一種銃猟,二種銃猟,網猟,あみ猟,罠猟,わな猟,空気銃">
  <?php endif; ?>
  <?php wp_head(); ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="stylesheet" href="<?php bloginfo ('stylesheet_url'); ?>" type="text/css" />
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/reset.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/common.css" type="text/css" />

  <?php if ( is_home() || is_front_page() ) : ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/top.css" type="text/css" />
  <?php endif; ?>

  <?php if ( is_page() || is_category() || is_single() ): ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/question.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/top.css">
  <?php endif; ?>

  <!-- JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js?ver=1.8.3"></script>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N5KGH6GL"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  <a class="pagetop" href="#">
    <div class="arrow"></div>
  </a>
  <div class="container">
    <header>
      <div class="inner">
        <div class="header-nav">
          <ul>
            <li>
              <div class="logo">ここにロゴ</div>
            </li>
            <li>
              <button class="button" data-modal-open="modal-1">MENU</button>
            </li>
          </ul>
        </div>
      </div>
    </header>
      
    <div class="modal" id="modal-1">
      <div class="modal-overlay" data-modal-close>
        <div class="modal-container">
          <h2 class="modal-title">MENU</h2>
          <div class="modal-content">
            <div class="modal-nav">
              <ul>
                <li><a href="/">狩猟免許試験過去問題集</a></li>
                <li><a href="/know/">知っておくべきこと</a></li>
                <li><a href="/application/">狩猟免許受験申請</a></li>
                <li><a href="/content/">狩猟免許試験の内容と対策</a></li>
                <li><a href="/registration/">狩猟者登録</a></li>
                <li><a href="../category/all/">全カテゴリ問題</a></li>
                <li><a href="/category/laws/">法令問題</a></li>
                <li><a href="/category/type1/">一種猟銃問題</a></li>
                <li><a href="/category/type2/">二種猟銃問題</a></li>
                <li><a href="/category/ami/">網（あみ）猟問題</a></li>
                <li><a href="/category/wana/">罠（わな）猟問題</a></li>
                <li><a href="/category/animals/">鳥獣問題</a></li>
                <li><a href="/category/examination/">猟銃等講習会 考査問題</a></li>
                <li><a href="/category/numbers/">数字問題</a></li>
                <li><a href="/contact/">お問い合わせ</a></li>
              </ul>
            </div>
          </div>
            <div class="modal-footer">
              <button class="button" data-modal-close="modal-1">
                閉じる
              </button>
            </div>
          </div>
        </div>
    </div>
