<!DOCTYPE html>
<html lang="ja">

<head>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4830250751942529"
crossorigin="anonymous"></script>
  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-N5KGH6GL');</script>
  <!-- End Google Tag Manager -->
  <meta charset="utf-8">
  <?php
  // ▼▼ スケジュール系ページ（TOP/詳細）のカスタムフィールドによるSEO対応 ▼▼
  if ( is_page_template(array('page-schedule.php', 'page-schedule-detail.php', 'page-license-difference.php')) ) {
      $custom_title = get_field('custom_title');
      $custom_description = get_field('custom_description');
      if ( $custom_title ) {
          echo '<title>' . esc_html($custom_title) . '</title>';
      } else {
          echo '<title>' . esc_html(get_the_title()) . '｜狩猟免許スケジュール</title>';
      }
      if ( $custom_description ) {
          echo '<meta name="description" content="' . esc_attr($custom_description) . '">';
      }
    } 
  ?>
  <?php if ( is_home() || is_front_page() ) : ?>
  <title>狩猟免許ドリル（狩猟免許試験問題集 過去問）｜狩猟免許取るには</title>
    <meta name="description" content="狩猟免許の過去問すべてを網羅しているサイトです！狩猟免許試験の過去問を猟具別に狩猟免許試験例題集の問題をもとに掲載している合格対策サイトです。狩猟免許とはどういう免許なのかを学ぶこともできます。">
    <meta name="keywords" content="狩猟免許,狩猟免許試験,過去問,例題集,テキスト,猟具,法令,一種銃猟,二種銃猟,網猟,あみ猟,罠猟,わな猟,空気銃">
  <?php elseif ( is_page('know') ) : ?>
    <title>狩猟免許取得に知っておくべき基本情報まとめ｜狩猟免許取るには</title>
    <meta name="description" content="狩猟を始める前に知っておきたい基礎知識や注意点を簡潔に紹介。初心者が安心して準備できる情報をまとめています。。">
  <?php elseif ( is_page('application') ) : ?>
    <title>狩猟免許受験申請の手順と必要書類ガイド｜狩猟免許取るには</title>
    <meta name="description" content="狩猟免許試験を受けるための申請方法や準備すべき書類を詳しく解説。受験までの流れをスムーズに進められます。">
  <?php elseif ( is_page('registration') ) : ?>
    <title>狩猟免許受験申請の手順と必要書類ガイド｜狩猟免許取るには</title>
    <meta name="description" content="狩猟免許試験を受けるための申請方法や準備すべき書類を詳しく解説。受験までの流れをスムーズに進められます。">
  <?php elseif ( is_page('study-method') ) : ?>
    <title>狩猟免許に独学で合格する勉強法まとめ｜狩猟免許取るには</title>
    <meta name="description" content="狩猟免許試験に独学で合格するためのおすすめ勉強方法とスケジュール例を解説。初心者でも安心して始められる学習ガイド。">
  <?php elseif ( is_category('all') ) : 
    $title = '全カテゴリ対応の問題集｜狩猟免許試験例題集 過去問';
    if ( $paged >= 2 ) {
        $title = 'ページ' . $paged . '：' . $title;
    }
    echo '<title>' . esc_html($title) . '</title>';
    ?>
    <meta name="description" content="狩猟免許試験の全カテゴリを網羅した例題集と過去問を収録。効率よく学習できる解説付き問題で合格をサポート。">
  <?php elseif ( is_category('laws') ) :
    $title = '法令問題対策に特化した問題集｜狩猟免許試験例題集 過去問';
    if ( $paged >= 2 ) {
        $title = 'ページ' . $paged . '：' . $title;
    }
    echo '<title>' . esc_html($title) . '</title>';
    ?>
    <meta name="description" content="法令分野の出題傾向を分析し、重要な法規に特化した過去問と解説を掲載。狩猟免許試験の法令対策に最適です。">
  <?php elseif ( is_category('type1') ) :
    $title = '一種銃猟の出題対策に最適｜狩猟免許試験例題集 過去問';
    if ( $paged >= 2 ) {
        $title = 'ページ' . $paged . '：' . $title;
    }
    echo '<title>' . esc_html($title) . '</title>';
    ?>
    <meta name="description" content="ライフルや散弾銃を扱う一種銃猟の過去問を収録。構造や安全管理のポイントを押さえて、試験合格を目指しましょう。">
  <?php elseif ( is_category('type2') ) :
    $title = '二種銃猟の必須問題を収録｜狩猟免許試験例題集 過去問';
    if ( $paged >= 2 ) {
        $title = 'ページ' . $paged . '：' . $title;
    }
    echo '<title>' . esc_html($title) . '</title>';
    ?>
    <meta name="description" content="空気銃を扱う二種猟銃試験の例題を収録。初心者でも理解しやすい丁寧な解説付きで、効果的な試験対策が可能です。">
  <?php elseif ( is_category('ami') ) : ?>
    <title>網猟の出題傾向を完全分析｜狩猟免許試験例題集 過去問</title>
    <meta name="description" content="網（あみ）猟に関する使用ルールや出題傾向に基づいた過去問を掲載。網猟免許合格を目指す方におすすめの内容です。">
  <?php elseif ( is_category('wana') ) :
    $title = 'わな猟試験に役立つ実践問題｜狩猟免許試験例題集 過去問';
    if ( $paged >= 2 ) {
        $title = 'ページ' . $paged . '：' . $title;
    }
    echo '<title>' . esc_html($title) . '</title>';
    ?>
    <meta name="description" content="わな猟の法令や設置方法に関する問題を厳選。実技を含めた総合的な対策が可能な、わな猟免許受験者向け問題集です。">
  <?php elseif ( is_category('examination') ) :
    $title = '猟銃免許・猟銃等講習会の試験対策｜初心者向け過去問・練習問題集';
    if ( $paged >= 2 ) {
        $title = 'ページ' . $paged . '：' . $title;
    }
    echo '<title>' . esc_html($title) . '</title>';
    ?>
    <meta name="description" content="猟銃免許の取得を目指す方へ。猟銃等講習会で実施される考査問題をもとに、銃の安全管理・基本操作など試験対策に役立つ練習問題を掲載。初心者でも安心して学べます。">
  <?php elseif ( is_category('numbers') ) :
    $title = '数字に特化した対策問題集｜狩猟免許試験例題集 過去問';
    if ( $paged >= 2 ) {
        $title = 'ページ' . $paged . '：' . $title;
    }
    echo '<title>' . esc_html($title) . '</title>';
    ?>
    <meta name="description" content="捕獲制限や猟期など、数字に関する重要項目を過去問形式で学習。狩猟免許試験で出題されやすい数値を効率的に習得。">
  <?php elseif ( is_category('animals') ) :
    $title = '鳥獣識別と法令対策問題集｜狩猟免許試験例題集 過去問';
    if ( $paged >= 2 ) {
        $title = 'ページ' . $paged . '：' . $title;
    }
    echo '<title>' . esc_html($title) . '</title>';
    ?>
    <meta name="description" content="狩猟鳥獣や保護動物の識別問題を中心に構成。生態・法律両面からの出題対策で得点源を確保できます。">
    <?php elseif ( is_single() ) : ?>
    <?php
      if ( is_page_template('single-experience.php') || in_category('experience') ) {
        $exp_title = get_field('exp_title');
        $exp_description = get_field('exp_description');
        $default_title = get_the_title();
        $default_description = '狩猟免許試験の体験談・合格体験記を紹介します。';
      } else {
        $exp_title = get_field('custom_title');
        $exp_description = get_field('custom_description');
        $post_no = get_field('no');
        $default_title = '問題番号' . $post_no . '：' . get_the_title();
        $default_description = '問題番号' . $post_no . 'の問題と回答と解説が記載されているページです。';
      }
    ?>
    <title><?php echo esc_html( $exp_title ? $exp_title : $default_title ); ?></title>
    <meta name="description" content="<?php echo esc_attr( $exp_description ? $exp_description : $default_description ); ?>">
  <?php elseif ( is_tag('examination') ) :
    $title = '猟銃等講習会試験対策 問題集 過去問｜狩猟免許試験例題集';
    if ( $paged >= 2 ) {
        $title = 'ページ' . $paged . '：' . $title;
    }
    echo '<title>' . esc_html($title) . '</title>';
    ?>
      <meta name="description" content="猟銃等講習会で実施される知識試験に備えた練習問題集。銃の構造や安全管理の知識を網羅し、講習会受講者の理解を深めます。">
      <meta name="keywords" content="猟銃等講習会, 試験問題, 銃の構造, 安全管理, 狩猟免許">
  <?php endif; ?>
  <?php wp_head(); ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="stylesheet" href="<?php bloginfo ('stylesheet_url'); ?>" type="text/css" />
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/reset.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/common.css" type="text/css" />

  <?php if ( is_home() || is_front_page() ) : ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/top.css" type="text/css" />
  <?php endif; ?>

  <?php if ( is_page() || is_category() || is_single() || is_tag() ): ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/question.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/top.css">
  <?php endif; ?>
  
  <?php if ( is_page_template('page-schedule-detail.php') ) : ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/schedule.css">
  <?php endif; ?>
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico" type="image/x-icon">
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
  <div class="header-layout">
    <div class="logo">
      <a href="<?php echo home_url('/'); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="狩猟免許試験 問題">
      </a>
    </div>

    <div class="pc-header pc-only">
      <div class="header-nav">
        <nav class="pc-nav">
          <ul>
            <li><a href="<?php echo home_url('/'); ?>">狩猟免許過去問TOP</a></li>
            <li><a href="<?php echo home_url('/category/all/'); ?>">全カテゴリ問題</a></li>
            <li><a href="<?php echo home_url('/category/laws/'); ?>">法令問題</a></li>
            <li><a href="<?php echo home_url('/category/type1/'); ?>">一種猟銃問題</a></li>
            <li><a href="<?php echo home_url('/category/type2/'); ?>">二種猟銃問題</a></li>
            <li><a href="<?php echo home_url('/category/ami/'); ?>">網（あみ）猟問題</a></li>
            <li><a href="<?php echo home_url('/category/wana/'); ?>">罠（わな）猟問題</a></li>
            <li><a href="<?php echo home_url('/category/animals/'); ?>">鳥獣問題</a></li>
            <li><a href="<?php echo home_url('/category/examination/'); ?>">猟銃等講習会 考査問題</a></li>
            <li><a href="<?php echo home_url('/category/numbers/'); ?>">数字問題</a></li>
          </ul>
        </nav>
      </div>
    </div>

    <div class="header sp-only">
      <div class="header__inner">
        <button id="js-hamburger" type="button" class="hamburger" aria-controls="navigation" aria-expanded="false" aria-label="メニューを開く">
          <span class="hamburger__line"></span>
          <span class="hamburger__text"></span>
        </button>
        <div class="header__nav-area js-nav-area" id="navigation">
          <nav id="js-global-navigation" class="global-navigation">
            <ul class="global-navigation__list">
              <li><a href="<?php echo home_url('/'); ?>" class="global-navigation__link">狩猟免許試験過去問題集 TOP</a></li>
              <li><a href="<?php echo home_url('/category/all/'); ?>" class="global-navigation__link">全カテゴリ問題</a></li>
              <li><a href="<?php echo home_url('/category/laws/'); ?>" class="global-navigation__link">法令問題</a></li>
              <li><a href="<?php echo home_url('/category/type1/'); ?>" class="global-navigation__link">一種猟銃問題</a></li>
              <li><a href="<?php echo home_url('/category/type2/'); ?>" class="global-navigation__link">二種猟銃問題</a></li>
              <li><a href="<?php echo home_url('/category/ami/'); ?>" class="global-navigation__link">網（あみ）猟問題</a></li>
              <li><a href="<?php echo home_url('/category/wana/'); ?>" class="global-navigation__link">罠（わな）猟問題</a></li>
              <li><a href="<?php echo home_url('/category/animals/'); ?>" class="global-navigation__link">鳥獣問題</a></li>
              <li><a href="<?php echo home_url('/category/examination/'); ?>" class="global-navigation__link">猟銃等講習会 考査問題</a></li>
              <li><a href="<?php echo home_url('/category/numbers/'); ?>" class="global-navigation__link">数字問題</a></li>
              <li><a href="<?php echo home_url('/know/'); ?>" class="global-navigation__link">知っておくべきこと</a></li>
              <li><a href="<?php echo home_url('/application/'); ?>" class="global-navigation__link">狩猟免許受験申請</a></li>
              <li><a href="<?php echo home_url('/content/'); ?>" class="global-navigation__link">狩猟免許試験の内容と対策</a></li>
              <li><a href="<?php echo home_url('/registration/'); ?>" class="global-navigation__link">狩猟者登録</a></li>
              <li><a href="<?php echo home_url('/contact/'); ?>" class="global-navigation__link">お問い合わせ</a></li>
            </ul>
            <div id="js-focus-trap" tabindex="0"></div>
          </nav>
        </div>
      </div>
    </div>
  </div>
  </header>

    <!-- <header class="pc-only">
      <div class="inner">
        <div class="header-nav">
          <ul>
            <li>
              <div class="logo">狩猟免許試験勉強方法</div>
            </li>
            <li>
              <button class="button" data-modal-open="modal-1">MENU</button>
            </li>
          </ul>
        </div>
      </div>
    </header> -->


      
    <div class="modal" id="modal-1">
      <div class="modal-overlay" data-modal-close>
        <div class="modal-container">
          <h2 class="modal-title">MENU</h2>
          <div class="modal-content">
            <div class="modal-nav">
              <ul>
                <li><a href="https://www.shuryo-menkyo.com/">狩猟免許試験過去問題集</a></li>
                <li><a href="https://www.shuryo-menkyo.com/know/">知っておくべきこと</a></li>
                <li><a href="https://www.shuryo-menkyo.com/application/">狩猟免許受験申請</a></li>
                <li><a href="https://www.shuryo-menkyo.com/content/">狩猟免許試験の内容と対策</a></li>
                <li><a href="https://www.shuryo-menkyo.com/registration/">狩猟者登録</a></li>
                <li><a href="https://www.shuryo-menkyo.com/category/all/">全カテゴリ問題</a></li>
                <li><a href="https://www.shuryo-menkyo.com/category/laws/">法令問題</a></li>
                <li><a href="https://www.shuryo-menkyo.com/category/type1/">一種猟銃問題</a></li>
                <li><a href="https://www.shuryo-menkyo.com/category/type2/">二種猟銃問題</a></li>
                <li><a href="https://www.shuryo-menkyo.com/category/ami/">網（あみ）猟問題</a></li>
                <li><a href="https://www.shuryo-menkyo.com/category/wana/">罠（わな）猟問題</a></li>
                <li><a href="https://www.shuryo-menkyo.com/category/animals/">鳥獣問題</a></li>
                <li><a href="https://www.shuryo-menkyo.com/category/examination/">猟銃等講習会 考査問題</a></li>
                <li><a href="https://www.shuryo-menkyo.com/category/numbers/">数字問題</a></li>
                <li><a href="https://www.shuryo-menkyo.com/contact/">お問い合わせ</a></li>
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
