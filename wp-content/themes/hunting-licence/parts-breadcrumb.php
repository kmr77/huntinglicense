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
    <?php
    $position = 1;
    $uri = $_SERVER['REQUEST_URI'];

    // 該当ページが「examination系」かどうかを判定
    $is_examination_area = false;

    // カテゴリが examination
    if (is_category('examination')) {
      $is_examination_area = true;
    }

    // 投稿でカテゴリが examination
    if (is_single()) {
      $categories = get_the_category();
      if (!empty($categories)) {
        foreach ($categories as $cat) {
          if ($cat->slug === 'examination') {
            $is_examination_area = true;
            break;
          }
        }
      }
    }

    // examination配下の固定ページ（/examination/...）
    if (preg_match('#^/examination(/|$)#', $uri)) {
      $is_examination_area = true;
    }

    // トップパンくず
    if ($is_examination_area) {
      breadcrumb_item(home_url('/'), '狩猟免許・猟銃免許TOP', $position++);
    } else {
      breadcrumb_item(home_url('/'), '狩猟免許 過去問', $position++);
    }

    // 以下は従来の判定ロジック（内容省略せず）
    if (is_page()) {
      breadcrumb_item('', get_the_title(), $position++, true);

    } elseif (is_category('wana')) {
      breadcrumb_item(home_url('/wana-info/'), 'わな猟免許とは', $position++);
      breadcrumb_item('', 'わな猟の過去問', $position++, true);

    } elseif (is_category('ami')) {
      breadcrumb_item(home_url('/ami-info/'), '網猟免許とは', $position++);
      breadcrumb_item('', '網猟の過去問', $position++, true);

    } elseif (is_category('examination')) {
      breadcrumb_item(home_url('/examination/'), '猟銃免許 講習会', $position++);
      breadcrumb_item('', '猟銃免許試験の過去問', $position++, true);

    } elseif (is_category()) {
      breadcrumb_item('', single_cat_title('', false) . 'の過去問', $position++, true);

    } elseif (is_single()) {
      $categories = get_the_category();
      if (!empty($categories)) {
        $cat = $categories[0];
        if ($cat->slug === 'wana') {
          breadcrumb_item(home_url('/wana-info/'), 'わな猟免許とは', $position++);
        } elseif ($cat->slug === 'ami') {
          breadcrumb_item(home_url('/ami-info/'), '網猟免許とは', $position++);
        } elseif ($cat->slug === 'examination') {
          breadcrumb_item(home_url('/examination/'), '猟銃免許 講習会', $position++);
        }
        breadcrumb_item(get_category_link($cat->term_id), $cat->name, $position++);
      }
      breadcrumb_item('', get_the_title(), $position++, true);

    } elseif (is_tag()) {
      breadcrumb_item('', 'タグ：' . single_tag_title('', false), $position++, true);

    } elseif (is_search()) {
      breadcrumb_item('', '検索結果：' . get_search_query(), $position++, true);

    } elseif (is_404()) {
      breadcrumb_item('', 'ページが見つかりません', $position++, true);
    }
    ?>
  </ul>
</nav>
