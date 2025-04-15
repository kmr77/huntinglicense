<?php
// 現在のページ番号と総ページ数を取得
global $wp_query;
$current_page = max(1, get_query_var('paged'));
$total_pages = $wp_query->max_num_pages;
?>

<div class="random-btn" style="display: flex; align-items: center; gap: 1em;">
  <div>
    <p>ランダム表示時はページ更新するタイミングでシャッフルされます。</p>
    <button id="toggle-random" class="edit-btn">
      <?php echo (isset($_GET['random']) && $_GET['random'] == '1') ? '通常順に切り替える' : 'ランダムに切り替える'; ?>
    </button>
  </div>

  <div class="page-count" style="font-weight: bold;">
    <?php echo esc_html($current_page . ' / ' . $total_pages); ?>
  </div>
</div>
