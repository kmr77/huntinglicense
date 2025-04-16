<?php get_header(); ?>
<div class="inner">
        <!-- パンくずパーツ -->
        <?php get_template_part('parts-breadcrumb'); ?>
      </div>
    </div>
    <div class="main-visual numbers">
      <div class="inner">
        <h1><?php single_cat_title(); ?>｜狩猟免許試験過去問集</h1>
        <p>狩猟免許試験の数字問題を徹底解析し、重要な数値や規定を整理。
          捕獲数や猟期制限など、試験に出やすい数値問題を効率よく学べます。
          スマートフォン対応でスキマ時間を活用した復習が可能。
          合格に向けた強力なサポートを提供します。</p>
          <p class="align-center"><button class="question-btn"><a href="#question">問題へ進む</a></button></p>
      </div>
    </div>
    <div class="inner">
    <h2>狩猟免許試験の<?php single_cat_title(); ?> 過去問</h2>
        <p>狩猟免許試験の数字問題は、捕獲制限数や許可数、猟期の制限など、数値に関する正確な知識を問われる問題が出題されます。
          特に、法律で定められた捕獲数や銃の口径など、数値に関する細かい規定を理解し、暗記することが求められます。
          数字問題は意外と難易度が高く、正確に覚えることが合格のポイントになります。
          このページでは、数字問題に特化した出題内容を解説し、効率的な学習方法を提案しています。</p>
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
              'category_name' => 'numbers',
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
                        <span class="answer">答）<?php the_field('answer'); ?><br>
                        <?php the_field('answer_body'); ?></span>
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