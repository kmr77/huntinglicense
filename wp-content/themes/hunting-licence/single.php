<?php get_header(); ?>
    <div class="inner">
        <?php get_template_part('parts-breadcrumb'); ?>
    </div>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article>
            <h2><span class="small">設問No.<?php the_field('no'); ?><?php the_title(); ?></h2>
            <div><?php the_content(); ?></div>
        </article>
    <?php endwhile; endif; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
