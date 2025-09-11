<?php
/*
Template Name: ログインテストテンプレート
*/
get_header(); ?>

<div class="inner">
  <h1>ショートコード直接埋め込みテスト</h1>
  <div>
    <?php echo do_shortcode('[wp-members page="login"]'); ?>
  </div>
</div>

<?php get_footer(); ?>
