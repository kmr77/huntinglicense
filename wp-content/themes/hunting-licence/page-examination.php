<?php
/*
Template Name: 猟銃等講習会TOP
*/
get_header(); ?>
<div class="inner">
    <?php get_template_part('parts-breadcrumb'); ?>
  </div>
</div>
<div class="main-visual gun">
  <div class="inner">
    <h1>猟銃等講習会のすべて｜銃を持つための第一歩</h1>
    <p>銃の所持には「猟銃等講習会」の合格が必須です。このページでは、講習の制度や流れ、試験対策、必要書類、合格後の手続きまでをわかりやすくまとめています。</p>
  </div>
</div>

<div class="contents study-method">
  <div class="inner">
    <p>銃の所持を希望するすべての人は、まず「猟銃等講習会」を受講して合格しなければなりません。このページでは、講習会の制度概要から、申込方法、試験対策、日程情報、そして合格後の手続きまでを網羅的に解説します。</p>

    <h2>講習会の基礎知識</h2>
    <ul>
      <li><a href="<?php echo home_url('/examination-info/'); ?>">▶ 猟銃等講習会とは？（制度と概要）</a><br>
          講習会の目的や流れ、必要性について初心者にもわかりやすく解説します。</li>
    </ul>

    <h2>講習会に参加するには</h2>
    <ul>
      <!-- <li><a href="<?php echo home_url('/examination/schedule/'); ?>">▶ 各地の講習会スケジュール</a><br>
          都道府県別に開催日や申込先リンクをまとめています。</li> -->
      <li><a href="<?php echo home_url('/examination/application/'); ?>">▶ 申込方法と必要書類</a><br>
          必要な書類や申請の流れ、記入の注意点を詳しく解説。</li>
    </ul>

    <h2>試験対策</h2>
    <ul>
      <li><a href="<?php echo home_url('/examination/questions/'); ?>">▶ 筆記考査の過去問と対策</a><br>
          過去の出題傾向や出題範囲、効率的な勉強方法を紹介します。</li>
    </ul>

    <h2>合格後の手続き</h2>
    <ul>
      <li><a href="<?php echo home_url('/examination/requirements/'); ?>">▶ 銃の所持許可に必要な心身の条件</a><br>
          医師の診断書や認知機能検査など、所持許可のために必要な健康確認について解説します。</li>
      <li><a href="<?php echo home_url('/examination/after/'); ?>">▶ 教習射撃・銃の所持許可まで</a><br>
          合格後に必要な「教習射撃」「所持申請」などの流れを説明します。</li>
    </ul>

    <h2>よくある質問</h2>
    <ul>
      <li><a href="<?php echo home_url('/examination/faq/'); ?>">▶ 講習会に関するよくある質問</a><br>
          初めての方が不安に思う点を事前に解消できるQ&A集です。</li>
    </ul>
	<?php get_template_part('parts-connection-gun'); ?>
  </div>
</div>
<?php get_footer(); ?>
