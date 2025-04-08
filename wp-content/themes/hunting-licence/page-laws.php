<?php 
/*
Template Name: 法令問題
*/
get_header(); ?>
<div class="inner">
  <?php get_template_part('parts-breadcrumb'); ?>
      </div>
    </div>
    <div class="main-visual laws">
      <div class="inner">
        <h1><?php the_title(); ?>｜狩猟免許試験過去問集</h1>
        <p>狩猟免許試験の法令問題を徹底分析し、過去問を体系的に整理。すべての問題に正確な解答と詳細な解説を付し、試験対策に必要な知識を網羅しています。さらに、スマートフォン対応で移動中でも手軽に復習可能。狩猟法や関連法規の理解を深め、実際の試験で問われる重要ポイントを確実に押さえることができます。これにより、受験者は効率的に学習を進め、合格への道を確実なものにすることができます。</p>
        <p class="align-center"><button class="question-btn"><a href="#question">問題へ進む</a></button></p>
      </div>
    </div>
    <div class="inner">
      <h2><?php the_title(); ?> 過去問</h2>
      <p>狩猟免許試験における法令問題は、特に難解で紛らわしい表現が使われることが多いです。
        しかし、法令に関する知識が試験合否を大きく左右するため、しっかりとした準備が求められます。
        このページでは、<strong>法令問題</strong>に特化し、出題される内容を詳しく記載しています。</p>
          <?php get_template_part('parts-infotext'); ?>
        <!-- 問題ここから -->
        <div class="accordion-inner" id="question">
          <dl id="accordion">
          <?php
            // カウンター変数を定義（1からスタート）
            $counter = 1;

            // ランダム表示のON/OFFをURLパラメータで制御
            $random = isset($_GET['random']) ? $_GET['random'] : 0;

            // 通常時は「投稿ID順（昇順）」で固定、ランダム時のみシャッフル
            $orderby = ($random == 1) ? 'rand' : 'ID';
            $order = ($random == 1) ? '' : 'ASC'; // 通常時は昇順
            
            // 投稿のループを開始
            $args = array(
                'category_name' => 'laws', // カテゴリスラッグ「net」の記事のみ取得
                //'post_type' => 'post', // カテゴリスラッグ「net」の記事のみ取得
                'posts_per_page' => -1,   // すべての投稿を表示（ページネーションなし）
                'orderby' => $orderby,    // ランダム or ID順
                'order' => $order

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
                        <span class="question">問<?php echo $counter; ?>：<?php the_title(); ?></span>
                        <!-- <button class="openclose-btn">選択肢を開閉</button> -->
                    </dt>
                    <dd>
                        <dl>
                            <dt class="select-dt">
                                <ul>
                                    <li><span class="bold">ア：</span><?php the_field('select_a'); ?></li>
                                    <li><span class="bold">イ：</span><?php the_field('select_i'); ?></li>
                                    <li><span class="bold">ウ：</span><?php the_field('select_u'); ?></li>
                                </ul>
                                <button class="answer-btn">答えを開閉</button>
                            </dt>
                            <dd class="answer-dd">
                                <span class="answer">答）<?php the_field('answer'); ?><br>
                                <?php the_field('answer_body'); ?></span>
                            </dd>
                        </dl>
                    </dd>
                    <?php
                    // カウンターを1増やす
                    $counter++;
                endwhile;
                else :
                    echo '<p>投稿が見つかりませんでした。</p>';
                endif;

            // 投稿ループをリセット
            wp_reset_postdata();
            ?>
            </dl>
      </div>

<?php get_footer(); ?>
