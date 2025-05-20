<?php
/*
Template Name: 狩猟免許スケジュール詳細（年度別）
*/
get_header(); ?>

<div class="main-visual schedule-detail">
  <div class="inner">
    <h1><?php the_title(); ?></h1>
    <p>このページでは、<?php the_title(); ?>の都道府県別の狩猟免許試験スケジュールを掲載しています。</p>
  </div>
</div>

<div class="inner">
  <div class="schedule-table">
    <h2>試験日程一覧（47都道府県）</h2>
    <div class="table-scroll">
      <?php the_content(); // ← ここに本文欄のHTML表が表示されます ?>
    </div>
  </div>

  <div class="back-links">
    <p><a href="<?php echo home_url('/schedule/'); ?>">← スケジュール一覧に戻る</a></p>
  </div>
</div>

<?php get_footer(); ?>
