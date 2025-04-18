<?php get_header(); ?>
<div class="inner">
        <!-- パンくずパーツ -->
        <?php get_template_part('parts-breadcrumb'); ?>
      </div>
    </div>
    <div class="main-visual examination">
      <div class="inner">
        <h1><?php single_cat_title(); ?>｜狩猟免許試験過去問集</h1>
        <p>猟銃初心者講習考査の問題を徹底分析し、過去問に基づいた解答と解説を提供。
          銃の扱いや安全管理に必要な知識を効率的に学べます。
          スマートフォン対応で移動中も手軽に復習可能。
          試験合格に向けて確実な実力を身につけられます。</p>
          <p class="align-center"><button class="question-btn"><a href="#question">問題へ進む</a></button></p>
      </div>
    </div>
    <div class="inner">
    <?php get_template_part('parts-breadcrumb'); ?>
    <h2><?php single_cat_title(); ?> 過去問</h2>
        <p>猟銃初心者講習考査では、銃の取り扱いや安全管理に関する基本的な知識が問われます。
          特に、銃の構造や操作方法、撃つ際の安全確認、そして実際の狩猟場での注意点に関する問題が出題されます。
          初心者にとっては、銃の基本的な取扱いや安全規則をしっかりと覚えることが合格への鍵となります。
          このページでは、初心者講習考査に特化した問題を記載し、試験対策に役立つ情報を提供しています。</p>
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
              'category_name' => 'examination',
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
