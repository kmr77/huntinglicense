<?php get_header(); ?>

<div class="main-visual common-img">
  <div class="inner">
  <h1><?php single_cat_title(); ?>一覧</h1>
  </div>
</div>
<div class="inner">
  <?php if (have_posts()) : ?>
    <div class="experience-grid">
      <?php while (have_posts()) : the_post(); ?>
        <?php
          // ACFフィールド（体験談カテゴリ向け）を取得
          $custom_title = get_field('exp_title');
          $custom_desc = get_field('exp_description');
        ?>
        <article class="experience-item">
          <h3>
            <a href="<?php the_permalink(); ?>">
              <?php echo $custom_title ? esc_html($custom_title) : get_the_title(); ?>
            </a>
          </h3>
          <p>
            <?php echo $custom_desc ? esc_html($custom_desc) : get_the_excerpt(); ?>
          </p>
        </article>
      <?php endwhile; ?>
    </div>
  <?php else : ?>
    <p>現在、投稿はありません。</p>
  <?php endif; ?>
</div>
<?php get_footer(); ?>
