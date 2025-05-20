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
  <h2>試験日程一覧（47都道府県）</h2>
  <p>狩猟免許試験は、各都道府県で実施されるため、日程や会場が異なります。</p>
  <p>このページでは、2025年度の狩猟免許試験日程をまとめています。</p>
  <div class="area-links">
    <a href="#area-hokkaido-tohoku">北海道・東北</a>
    <a href="#area-kanto-koshinetsu">関東・甲信越</a>
    <a href="#area-tokai">東海</a>
    <a href="#area-hokuriku">北陸</a>
    <a href="#area-kansai">関西</a>
    <a href="#area-chugoku-shikoku">中国・四国</a>
    <a href="#area-kyushu-okinawa">九州・沖縄</a>
  </div>
</div>
<div class="inner">
  <div class="schedule-table">
    <div class="table-scroll">
      <?php the_content(); // ← ここに本文欄のHTML表が表示されます ?>
    </div>
  </div>

  <div class="back-links">
    <p><a href="<?php echo home_url('/schedule/'); ?>">← スケジュール一覧に戻る</a></p>
  </div>
</div>

<?php get_footer(); ?>
