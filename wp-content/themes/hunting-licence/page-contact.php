<?php 
/*
Template Name: お問い合わせ
*/
?>
<?php get_header(); ?>

    <div class="inner">
        <?php get_template_part('parts-breadcrumb'); ?>
      </div>
    </div>
    <div class="main-visual contact">
        <div class="inner">
        <h1><?php the_title(); ?></h1>
        </div>
    </div>
    <div class="inner">
    <h2><?php the_title(); ?></h2>
    <?php the_content(); ?>
    </div>
<?php get_footer(); ?>
