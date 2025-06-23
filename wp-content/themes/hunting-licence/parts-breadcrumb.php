<?php
/**
 * パンくず共通パーツ（schema.org 対応）
 */
$position = 1;
function breadcrumb_item($url, $label, $position, $is_current = false) {
  echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">';
  if (!$is_current && $url) {
    echo '<a itemprop="item" href="' . esc_url($url) . '"><span itemprop="name">' . esc_html($label) . '</span></a>';
  } else {
    echo '<span itemprop="name">' . esc_html($label) . '</span>';
  }
  echo '<meta itemprop="position" content="' . intval($position) . '" />';
  echo '</li>';
}
?>

<nav class="breadcrumb" aria-label="パンくずリスト" itemscope itemtype="https://schema.org/BreadcrumbList">
  <ul>
    <?php breadcrumb_item(home_url('/'), '狩猟免許過去問題集 TOP', $position++); ?>

    <?php if (is_page()) : ?>
      <?php breadcrumb_item('', get_the_title(), $position++, true); ?>

    <?php elseif (is_category('wana')) : ?>
      <?php breadcrumb_item(home_url('/wana-info/'), 'わな猟免許とは', $position++); ?>
      <?php breadcrumb_item('', 'わな猟の過去問', $position++, true); ?>

    <?php elseif (is_category('ami')) : ?>
      <?php breadcrumb_item(home_url('/ami-info/'), '網猟免許とは', $position++); ?>
      <?php breadcrumb_item('', '網猟の過去問', $position++, true); ?>

    <?php elseif (is_category('examination')) : ?>
      <?php breadcrumb_item(home_url('/examination-info/'), '「猟銃を持つためには」完全ガイド', $position++); ?>
      <?php breadcrumb_item('', '猟銃免許・猟銃許可試験の過去問', $position++, true); ?>

    <?php elseif (is_category()) : ?>
      <?php breadcrumb_item('', single_cat_title('', false) . 'の過去問', $position++, true); ?>

    <?php elseif (is_single()) : ?>
      <?php
        $categories = get_the_category();
        if (!empty($categories)) {
          $cat = $categories[0];
          if ($cat->slug === 'wana') {
            breadcrumb_item(home_url('/wana-info/'), 'わな猟免許とは', $position++);
          } elseif ($cat->slug === 'ami') {
            breadcrumb_item(home_url('/ami-info/'), '網猟免許とは', $position++);
          } elseif ($cat->slug === 'examination') {
            breadcrumb_item(home_url('/examination-info/'), '猟銃等講習会の解説', $position++);
          }
          breadcrumb_item(get_category_link($cat->term_id), $cat->name, $position++);
        }
        breadcrumb_item('', get_the_title(), $position++, true);
      ?>

    <?php elseif (is_tag()) : ?>
      <?php breadcrumb_item('', 'タグ：' . single_tag_title('', false), $position++, true); ?>

    <?php elseif (is_search()) : ?>
      <?php breadcrumb_item('', '検索結果：' . get_search_query(), $position++, true); ?>

    <?php elseif (is_404()) : ?>
      <?php breadcrumb_item('', 'ページが見つかりません', $position++, true); ?>

    <?php endif; ?>
  </ul>
</nav>
