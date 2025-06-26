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
    $is_examination_area = false;
    $is_examination_post = false;

    // トップレベル判定
    if (is_category('examination')) {
      $is_examination_area = true;
    }

    if (is_single()) {
      $categories = get_the_category();
      if (!empty($categories)) {
        foreach ($categories as $cat) {
          if ($cat->slug === 'examination') {
            $is_examination_area = true;
            $is_examination_post = true;
            break;
          }
        }
      }
    }

    if (preg_match('#^/examination(/|$)#', $uri)) {
      $is_examination_area = true;
    }

    // トップリンク
    if ($is_examination_area) {
      breadcrumb_item(home_url('/'), '狩猟免許・猟銃免許TOP', $position++);
    } else {
      breadcrumb_item(home_url('/'), '狩猟免許 過去問', $position++);
    }

    // パターン別
    if (is_page()) {
      if (preg_match('#^/examination(/|$)#', $uri) && !is_page('examination')) {
        // 子ページの場合に中間に「猟銃等講習会のすべて」追加
        breadcrumb_item(home_url('/examination/'), '猟銃等講習会のすべて', $position++);
      }
      breadcrumb_item('', get_the_title(), $position++, true);

    } elseif (is_category('examination')) {
      breadcrumb_item(home_url('/examination/'), '猟銃等講習会のすべて', $position++);
      breadcrumb_item('', '猟銃免許試験の過去問', $position++, true);

    } elseif (is_single()) {
      $categories = get_the_category();
      if (!empty($categories)) {
        $cat = $categories[0];
        if ($cat->slug === 'wana') {
          breadcrumb_item(home_url('/wana-info/'), 'わな猟免許とは', $position++);
        } elseif ($cat->slug === 'ami') {
          breadcrumb_item(home_url('/ami-info/'), '網猟免許とは', $position++);
        } elseif ($cat->slug === 'examination') {
          breadcrumb_item(home_url('/examination/'), '猟銃等講習会のすべて', $position++);
          breadcrumb_item(get_category_link($cat->term_id), '猟銃免許試験の過去問', $position++);
        } else {
          breadcrumb_item(get_category_link($cat->term_id), $cat->name, $position++);
        }
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

