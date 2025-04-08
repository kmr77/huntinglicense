<?php get_header(); ?>

<div class="inner">
        <!-- パンくずパーツ -->
        <?php get_template_part('parts-breadcrumb'); ?>
      </div>
    </div>
    <div class="main-visual ami">
      <div class="inner">
        <h1><?php the_title(); ?></h1>
        <!-- <p>網猟に関する過去問を厳選し、解答と詳細な解説を付けた問題集を提供。試験頻出の知識を効率的に学べるよう構成されています。特に、網猟特有の法規制や使用できる猟具に関する問題を重点的にカバー。スマートフォン対応で、移動時間やスキマ時間を活用しながら知識を定着させることができます。狩猟免許試験の網猟分野で確実に得点できるよう、合格を目指す受験生を徹底サポートします。</p> -->
      </div>
    </div>
    <div class="inner">
    <?php get_template_part('parts-breadcrumb'); ?>
    <h2><?php the_title(); ?></h2>
    <?php the_content(); ?>
    </div>
<!-- <main>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article>
            <h2><?php the_title(); ?></h2>
            <div><?php the_content(); ?></div>
        </article>
    <?php endwhile; endif; ?>
</main> -->

<?php get_footer(); ?>
