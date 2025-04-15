<?php get_header(); ?>

<div class="inner">
  <?php get_template_part('parts-breadcrumb'); ?>
</div>

<div class="main-visual all">
  <div class="inner">
    <h1><?php single_tag_title(); ?>｜狩猟免許試験過去問集</h1>
    <p>網猟に関する過去問を厳選し、解答と詳細な解説を付けた問題集を提供。試験頻出の知識を効率的に学べるよう構成されています。特に、網猟特有の法規制や使用できる猟具に関する問題を重点的にカバー。スマートフォン対応で、移動時間やスキマ時間を活用しながら知識を定着させることができます。狩猟免許試験の網猟分野で確実に得点できるよう、合格を目指す受験生を徹底サポートします。</p>
    <p class="align-center"><button class="question-btn"><a href="#question">問題へ進む</a></button></p>
  </div>
</div>

<div class="inner">
  <h2><?php single_tag_title(); ?> 考査問題</h2>
  <p>このページでは、<strong>猟銃等講習会</strong>の考査対策として重要な例題をピックアップし、わかりやすく解説付きで掲載しています。
  猟銃の安全な取り扱いや保管方法、法令知識、銃に関する基礎事項など、講習会の考査で問われるポイントを幅広く網羅。
  各問題には丁寧な解説と正解が付いており、理解を深めながら確実に知識を定着させることができます。
  また、出題傾向や学習のコツも紹介しており、初めて受講する方でも効率よく準備を進められます。
  スマートフォンにも完全対応しているため、スキマ時間を活かしてどこでも学習可能です。
  <strong>猟銃等講習会の合格</strong>を目指す方にとって、信頼できる学習ツールとなっています。</p>

  <?php get_template_part('parts-infotext'); ?>

  <div class="accordion-inner" id="question">
    <dl id="accordion">
      <?php
      // カウンター初期化
      // 現在のページを取得
      $paged = get_query_var('paged') ? get_query_var('paged') : 1;

      // 1ページあたりの投稿数（$argsにも使用している値と同じに）
      $posts_per_page = 30;

      // カウンターの初期値を設定
      $counter = ($paged - 1) * $posts_per_page + 1;

      // ページ番号取得
      $paged = get_query_var('paged') ? get_query_var('paged') : 1;

      // ランダム表示判定
      $random = isset($_GET['random']) ? $_GET['random'] : 0;
      $orderby = ($random == 1) ? 'rand' : 'ID';
      $order = ($random == 1) ? '' : 'ASC';

      // ページ番号取得
      $paged = get_query_var('paged') ? get_query_var('paged') : 1;

      // ランダム表示判定
      $random = isset($_GET['random']) ? $_GET['random'] : 0;
      $orderby = ($random == 1) ? 'rand' : 'ID';
      $order = ($random == 1) ? '' : 'ASC';

      // クエリ作成：licenseタグを明示的に指定
      $args = array(
        'tag' => 'examination',
        'posts_per_page' => 30,
        'paged' => $paged,
        'orderby' => $orderby,
        'order' => $order,
      );
      $the_query = new WP_Query($args);
      ?>

      <!-- ランダム表示切り替えボタン -->
      <?php get_template_part('parts-random-btn'); ?>

      <?php
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
                        <span class="answer">答）<?php the_field('answer'); ?><br>
                        <?php the_field('answer_body'); ?></span>
                    </dd>
          <?php $counter++; ?>
        <?php endwhile; ?>

        <!-- ページネーション -->
        <div class="pagination">
          <?php
          echo paginate_links(array(
            'total' => $the_query->max_num_pages,
            'current' => $paged,
            'prev_text' => '« 前へ',
            'next_text' => '次へ »',
          ));
          ?>
        </div>
      <?php else : ?>
        <p>投稿が見つかりませんでした。</p>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>
    </dl>
  </div>
</div>

<?php get_footer(); ?>
