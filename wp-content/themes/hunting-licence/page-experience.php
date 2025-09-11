<?php 
/*
Template Name: 体験談
*/
get_header(); ?>

<div class="inner">
  <!-- パンくずパーツ -->
  <?php get_template_part('parts-breadcrumb'); ?>
</div>
</div>

<div class="main-visual experience">
  <div class="inner">
    <h1>狩猟免許試験の体験談まとめ｜これから受験する人のためのリアルな声</h1>
    <p>
      狩猟免許試験をこれから受けようとしている方の中には、「どんな問題が出るの？」「何を勉強すればいい？」と不安な方も多いと思います。<br>
      このページでは、実際に狩猟免許（わな猟・type1・type2・網猟など）に合格した方の体験談をまとめています。<br>
      勉強のコツ、試験の流れ、失敗しやすいポイントなど、これから受験する人にとって参考になる情報をたくさん掲載しています。<br>
      ぜひ、ご自身の受験対策にお役立てください。
    </p>
  </div>
</div>

<div class="inner">
  <h2>合格者の体験談一覧</h2>
  <?php get_template_part('parts-ads'); ?>
  <div class="contents">
    <?php
    $args = array(
      'post_type' => 'post',
      'posts_per_page' => -1,
      'category_name' => 'experience',
      'orderby' => 'date',
      'order' => 'DESC'
    );
    $experience_posts = new WP_Query($args);
    if ($experience_posts->have_posts()) :
      while ($experience_posts->have_posts()) : $experience_posts->the_post();
        $custom_title = get_post_meta(get_the_ID(), 'custom_title', true);
        $custom_desc = get_post_meta(get_the_ID(), 'custom_description', true);
    ?>
        <article class="experience-item">
          <h3><a href="<?php the_permalink(); ?>">
            <?php echo $custom_title ? esc_html($custom_title) : get_the_title(); ?>
          </a></h3>
          <p><?php echo $custom_desc ? esc_html($custom_desc) : get_the_excerpt(); ?></p>
        </article>
    <?php
      endwhile;
      wp_reset_postdata();
    else : ?>
      <p>現在、体験談の投稿はありません。</p>
    <?php endif; ?>
  </div>

  <hr>

  <p>
    👉 <a href="<?php echo home_url(); ?>">狩猟免許試験 過去問TOPページへ戻る</a><br>
    👉 <a href="<?php echo home_url('/know/'); ?>">狩猟免許試験の概要・知っておくべきこと</a>
  </p>
</div>

<?php get_footer(); ?>