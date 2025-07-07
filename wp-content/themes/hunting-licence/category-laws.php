<?php get_header(); ?>

<div class="inner">
  <?php get_template_part('parts-breadcrumb'); ?>
</div>

</div>
<div class="main-visual laws">
  <div class="inner">
  <h1>狩猟法令問題 対策｜過去問と要点解説</h1>
  <p>狩猟免許試験の約3割を占める重要分野が法令問題です。鳥獣の保護管理や狩猟制度に関する法律が出題されるため、制度の仕組みを正しく理解しておく必要があります。</p>
  <p class="align-center"><button class="question-btn"><a href="#question">問題へ進む</a></button></p>
  </div>
</div>

<div class="inner">
  <div class="category-intro">
    <h2>狩猟免許試験の法令問題とは？</h2>
    <p>法令問題はすべての狩猟免許試験に共通して出題される重要な分野です。狩猟に関する法律、安全管理、禁止事項などを正しく理解することが求められます。</p>
    <p>このカテゴリでは、狩猟免許試験で出題される法令関連の筆記問題を中心にまとめています。</p>
    <p>▶ <a href="<?php echo home_url('/study-method/'); ?>">勉強方法まとめ</a></p>
  </div>
  <?php get_template_part('parts-ads'); ?>
  <h2><?php single_cat_title(); ?> 過去問</h2>
  <p>狩猟免許試験における法令問題は、特に難解で紛らわしい表現が使われることが多いです。
    しかし、法令に関する知識が試験合否を大きく左右するため、しっかりとした準備が求められます。
    このページでは、<strong>法令問題</strong>に特化し、出題される内容を詳しく記載しています。</p>

  <?php get_template_part('parts-infotext'); ?>


  <!-- 問題ここから -->
  <div class="accordion-inner" id="question">
    <dl id="accordion">
    <?php
      // 投稿件数設定
      $posts_per_page = 30;

      // 現在のページ番号取得
      $paged = get_query_var('paged') ? get_query_var('paged') : 1;
  
      // 投稿番号を連番で表示させるための開始値
      $counter = ($paged - 1) * $posts_per_page + 1;
  
      // ランダム or 通常順の判定
      $random = isset($_GET['random']) ? $_GET['random'] : 0;
      $orderby = ($random == 1) ? 'rand' : 'ID';
      $order = ($random == 1) ? '' : 'ASC';
  

      $args = array(
        'category_name' => 'laws',
        'posts_per_page' => 30,
        'paged' => $paged,
        'orderby' => $orderby,
        'order' => $order
      );

      $the_query = new WP_Query($args);

      // グローバル変数に上書き（これが重要！）
      global $wp_query;
      $wp_query = $the_query;

      // ページング表示などを含むパーツ読み込み
      get_template_part('parts-random-btn');

        if ($the_query->have_posts()) :
          while ($the_query->have_posts()) : $the_query->the_post();
      ?>
        <dt>
          <span class="question">問<?php echo $counter; ?>：<span class="small">No.<?php the_field('no'); ?></span> <?php the_title(); ?></span>
          <div class="btn-layout">
            <?php get_template_part('parts-ads-accordion'); ?>
            <button class="open-btn">選択肢を見る</button>
            <button class="single-btn"><a href="<?php the_permalink(); ?>" target="_blank">設問へ移動</a></button>
          </div>
        </dt>
        <dd>
          <dl>
            <dt class="select-dt">
              <ul>
                <li><span class="bold">ア：</span><?php the_field('select_a'); ?></li>
                <li><span class="bold">イ：</span><?php the_field('select_i'); ?></li>
                <li><span class="bold">ウ：</span><?php the_field('select_u'); ?></li>
              </ul>
              <?php
              $no = get_field('no');
              $image_rel_path = '/img/question/' . $no . '.avif';
              $image_full_path = get_template_directory() . $image_rel_path;
              $image_url = get_template_directory_uri() . $image_rel_path;

              if (file_exists($image_full_path)) : ?>
                  <img src="<?php echo esc_url($image_url); ?>" alt="設問No.<?php the_field('no'); ?>の画像">
              <?php endif; ?>
              <button class="answer-btn">答えを開閉</button>
            </dt>
            <dd class="answer-dd">
              <span class="answer">答）<?php the_field('answer'); ?><br>
              <?php the_field('answer_body'); ?></span>
            </dd>
          </dl>
        </dd>
        <?php
          if ($counter % 10 === 0) {
              echo '<div class="ads-between-questions">';
              get_template_part('parts-ads-accordion');
              echo '</div>';
          }

          $counter++;
        endwhile;
      else :
        echo '<p>投稿が見つかりませんでした。</p>';
      endif;
    ?>
    </dl>

  <!-- ページネーション -->
  <div class="pagination">
    <?php
      echo paginate_links(array(
        'total' => $the_query->max_num_pages,
        'current' => $paged,
        'mid_size' => 2,
        'prev_text' => '« 前へ',
        'next_text' => '次へ »',
      ));
    ?>
  </div>

  <?php wp_reset_postdata(); ?>
</div>

<?php get_footer(); ?>
