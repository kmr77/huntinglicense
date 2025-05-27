<?php
/*
Template Name: 狩猟免許スケジュールTOP
*/
get_header(); ?>
  <div class="inner">
    <?php get_template_part('parts-breadcrumb'); ?>
  </div>
</div>
<div class="main-visual schedule">
  <div class="inner">
    <h1><?php the_title(); ?></h1>
    <p>2025年度 狩猟免許試験日程・会場・申込情報のまとめ</p>
  </div>
</div>
<div class="inner">
  <div class="contents">
    <?php
      // 管理画面で入力した本文をそのまま出力
      the_content();
    ?>
  </div>
</div>

<?php get_footer(); ?>
