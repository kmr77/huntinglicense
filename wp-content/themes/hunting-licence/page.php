<?php get_header(); ?>

<div class="inner">
        <!-- パンくずパーツ -->
        <?php get_template_part('parts-breadcrumb'); ?>
      </div>
    </div>
    <div class="default-visual">
      <div class="inner">
        <h1><?php echo get_the_title(); ?></h1>
      </div>
    </div>
    <div class="inner">
    <?php the_content(); ?>
    </div>
<!-- <main>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article>
            <div><?php the_content(); ?></div>
        </article>
    <?php endwhile; endif; ?>
</main> -->

<?php get_footer(); ?>
