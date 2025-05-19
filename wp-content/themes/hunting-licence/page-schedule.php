<?php
/*
Template Name: 狩猟免許スケジュールTOP
*/
get_header(); ?>

<div class="main-visual schedule">
  <div class="inner">
    <h1>全国狩猟免許試験スケジュール一覧</h1>
    <p>年度・前期・後期ごとの狩猟免許試験情報を確認できます。都道府県ごとの試験日程へアクセスしてください。</p>
  </div>
</div>

<div class="inner">
  <div class="schedule-index">
    <h2>試験スケジュール年度別リンク</h2>
    <ul>
      <li><a href="<?php echo home_url('/schedule/2025-zenki/'); ?>">2025年度 前期 試験情報</a></li>
      <li><a href="<?php echo home_url('/schedule/2025-kouki/'); ?>">2025年度 後期 試験情報</a></li>
      <li><a href="<?php echo home_url('/schedule/2026/'); ?>">2026年度 試験情報（予告）</a></li>
    </ul>
  </div>
</div>

<?php get_footer(); ?>
