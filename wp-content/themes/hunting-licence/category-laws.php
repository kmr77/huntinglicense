<?php get_header(); ?>

<div class="inner">
  <?php get_template_part('parts-breadcrumb'); ?>
</div>

</div>
<div class="main-visual laws">
  <div class="inner">
    <h1><?php single_cat_title(); ?>｜狩猟免許試験過去問集</h1>
    <p>狩猟免許試験の法令問題を徹底分析し、過去問を体系的に整理。すべての問題に正確な解答と詳細な解説を付し、試験対策に必要な知識を網羅しています。さらに、スマートフォン対応で移動中でも手軽に復習可能。狩猟法や関連法規の理解を深め、実際の試験で問われる重要ポイントを確実に押さえることができます。これにより、受験者は効率的に学習を進め、合格への道を確実なものにすることができます。</p>
    <p class="align-center"><button class="question-btn"><a href="#question">問題へ進む</a></button></p>
  </div>
</div>

<div class="inner">
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
