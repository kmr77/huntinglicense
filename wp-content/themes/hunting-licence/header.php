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
  <?php elseif ( is_page('know') ) : ?>
    <title>狩猟免許取得に知っておくべき基本情報まとめ</title>
    <meta name="description" content="狩猟を始める前に知っておきたい基礎知識や注意点を簡潔に紹介。初心者が安心して準備できる情報をまとめています。。">
  <?php elseif ( is_page('application') ) : ?>
    <title>狩猟免許受験申請の手順と必要書類ガイド</title>
    <meta name="description" content="狩猟免許試験を受けるための申請方法や準備すべき書類を詳しく解説。受験までの流れをスムーズに進められます。">
  <?php elseif ( is_page('registration') ) : ?>
    <title>狩猟免許受験申請の手順と必要書類ガイド</title>
    <meta name="description" content="狩猟免許試験を受けるための申請方法や準備すべき書類を詳しく解説。受験までの流れをスムーズに進められます。">
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
    $title = '猟銃等講習会 考査問題 - 狩猟免許試験 例題集（過去問勉強法）｜狩猟免許ナビ';
    if ( $paged >= 2 ) {
        $title = 'ページ' . $paged . '：' . $title;
    }
    echo '<title>' . esc_html($title) . '</title>';
    ?>
    <meta name="description" content="猟銃等講習会で行われる考査問題を収録。銃の安全管理や基本操作の理解を深め、初心者でも安心して学べる構成です。">
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
    <title>問題番号<?php echo get_field('no'); ?>：<?php echo get_the_title(); ?></title>
    <meta name="description" content="問題番号<?php echo get_field('no'); ?>の問題と回答と解説が記載されているページです。">
    <?php elseif ( is_tag('license') ) :
    $title = '狩猟免許試験の重要問題まとめ｜狩猟免許試験例題集 過去問';
    if ( $paged >= 2 ) {
        $title = 'ページ' . $paged . '：' . $title;
    }
    echo '<title>' . esc_html($title) . '</title>';
    ?>
    <meta name="description" content="狩猟免許試験の頻出問題をピックアップ。法令、猟具、安全管理に関する設問を徹底解説し、合格への近道を提供します。">
    <meta name="keywords" content="狩猟免許, 試験問題, 過去問, 狩猟対策">
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
              <div class="logo">狩猟免許試験勉強方法</div>
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
