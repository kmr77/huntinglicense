<?php
global $wp_query;

// 正常に値が取れないときのための初期値
$posts_per_page = !empty($wp_query->query_vars['posts_per_page']) ? $wp_query->query_vars['posts_per_page'] : 30;
$current_page = max(1, get_query_var('paged'));
$total_posts = $wp_query->found_posts;
$total_pages = max(1, $wp_query->max_num_pages); // 0にならないように1で最低保証

$start_num = ($current_page - 1) * $posts_per_page + 1;
$end_num = min($start_num + $posts_per_page - 1, $total_posts);
?>

<div class="random-btn" style="display: flex; align-items: center; gap: 1em;">
  <p style="margin: 0;">ランダム表示時はページ更新するタイミングでシャッフルされます。</p>

  <!-- ランダム切り替えボタン -->
  <button id="toggle-random" class="edit-btn">
    <?php echo (isset($_GET['random']) && $_GET['random'] == '1') ? '通常順に切り替える' : 'ランダムに切り替える'; ?>
  </button>

  <!-- ページ情報表示 -->
  <div class="page-count" style="font-weight: bold;">
    <?php
    echo esc_html("{$start_num}〜{$end_num} / {$total_posts}問（{$current_page} / {$total_pages}ページ）");
    ?>
  </div>
</div>
