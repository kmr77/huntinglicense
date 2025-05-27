<?php
/**
 * パンくず共通パーツ（parts-breadcrumb.php）
 */
?>

<div class="breadcrumb">
  <ul>
    <li><a href="<?php echo home_url('/'); ?>">狩猟免許過去問題集 TOP</a></li>

    <?php if (is_page()) : ?>
      <li><?php the_title(); ?></li>

    <?php elseif (is_category('wana')) : ?>
      <li><a href="<?php echo home_url('/wana-info/'); ?>">わな猟免許とは</a></li>
      <li>わな猟の過去問</li>

    <?php elseif (is_category('ami')) : ?>
      <li><a href="<?php echo home_url('/ami-info/'); ?>">網猟免許とは</a></li>
      <li>網猟の過去問</li>

    <?php elseif (is_category('examination')) : ?>
      <li><a href="<?php echo home_url('/examination-info/'); ?>">猟銃等講習会の解説</a></li>
      <li>猟銃等講習会の過去問</li>

    <?php elseif (is_category()) : ?>
      <li><?php single_cat_title(); ?>の過去問</li>

    <?php elseif (is_single()) : ?>
      <?php
      $categories = get_the_category();
      if (!empty($categories)) {
        $cat = $categories[0];
        $cat_link = get_category_link($cat->term_id);

        // 特定カテゴリには親リンクを挿入
        if ($cat->slug === 'wana') {
          echo '<li><a href="' . home_url('/wana-info/') . '">わな猟免許とは</a></li>';
        } elseif ($cat->slug === 'ami') {
          echo '<li><a href="' . home_url('/ami-info/') . '">網猟免許とは</a></li>';
        } elseif ($cat->slug === 'examination') {
          echo '<li><a href="' . home_url('/examination-info/') . '">猟銃等講習会の解説</a></li>';
        }

        echo '<li><a href="' . esc_url($cat_link) . '">' . esc_html($cat->name) . '</a></li>';
      }
      ?>
      <li><?php the_title(); ?></li>

    <?php elseif (is_tag()) : ?>
      <li>タグ：<?php single_tag_title(); ?></li>

    <?php elseif (is_search()) : ?>
      <li>検索結果：<?php the_search_query(); ?></li>

    <?php elseif (is_404()) : ?>
      <li>ページが見つかりません</li>

    <?php endif; ?>
  </ul>
</div>
