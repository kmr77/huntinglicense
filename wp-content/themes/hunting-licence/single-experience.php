<?php
/**
 * Template Name: 体験談投稿ページ
 */
get_header(); ?>

<div class="inner">
  <?php get_template_part('parts-breadcrumb'); ?>
</div>
</div>

<div class="main-visual experience">
  <div class="inner">
    <h1><?php
      $custom_title = get_post_meta(get_the_ID(), 'custom_title', true);
      echo $custom_title ? esc_html($custom_title) : get_the_title();
    ?></h1>
  </div>
</div>

<div class="inner">
  <article class="experience-single">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="post-content">
        <?php the_content(); ?>
      </div>
    <?php endwhile; endif; ?>

    <div class="post-meta">
      <!-- <p>投稿日：<?php echo get_the_date(); ?></p> -->
      <p>カテゴリ：<?php the_category(', '); ?></p>
      <?php the_tags('<p>タグ：', ', ', '</p>'); ?>
    </div>

    <div class="post-navigation">
      <div class="prev-post">
        <?php previous_post_link('%link', '← 前の記事'); ?>
      </div>
      <div class="next-post">
        <?php next_post_link('%link', '次の記事 →'); ?>
      </div>
    </div>
  </article>

  <p class="back-link">
    👉 <a href="<?php echo home_url('/experience/'); ?>">体験談一覧に戻る</a>
  </p>
</div>

<?php get_footer(); ?>
