<nav class="breadcrumb">
  <ul>
    <li><a href="<?php echo home_url('/'); ?>">狩猟免許試験例題集 過去問</a></li>

    <?php if (is_singular('post') && in_category('experience')) : ?>
      <li><a href="<?php echo home_url('/experience/'); ?>">体験談</a></li>
      <li><?php the_title(); ?></li>

    <?php elseif (is_category()) : ?>
      <li><?php single_cat_title(); ?></li>

    <?php elseif (is_single()) : ?>
      <?php
      $category = get_the_category();
      if ($category && !empty($category[0])) {
        echo '<li><a href="' . esc_url(get_category_link($category[0]->term_id)) . '">' . esc_html($category[0]->name) . '</a></li>';
      }
      ?>
      <li><?php the_title(); ?></li>

    <?php elseif (is_page()) : ?>
      <li><?php the_title(); ?></li>
    <?php endif; ?>
  </ul>
</nav>
