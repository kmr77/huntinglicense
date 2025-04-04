<?php 
/*
Template Name: 考査問題
*/
get_header(); ?>
<div class="inner">
        <!-- パンくずパーツ -->
        <?php get_template_part('parts-breadcrumb'); ?>
      </div>
    </div>
    <div class="main-visual examination">
      <div class="inner">
        <h1><?php the_title(); ?>｜狩猟免許試験過去問集</h1>
        <p>猟銃初心者講習考査の問題を徹底分析し、過去問に基づいた解答と解説を提供。
          銃の扱いや安全管理に必要な知識を効率的に学べます。
          スマートフォン対応で移動中も手軽に復習可能。
          試験合格に向けて確実な実力を身につけられます。</p>
      </div>
    </div>
    <div class="inner">
    <?php get_template_part('parts-breadcrumb'); ?>
    <h2><?php the_title(); ?> 過去問</h2>
        <p>猟銃初心者講習考査では、銃の取り扱いや安全管理に関する基本的な知識が問われます。
          特に、銃の構造や操作方法、撃つ際の安全確認、そして実際の狩猟場での注意点に関する問題が出題されます。
          初心者にとっては、銃の基本的な取扱いや安全規則をしっかりと覚えることが合格への鍵となります。
          このページでは、初心者講習考査に特化した問題を記載し、試験対策に役立つ情報を提供しています。</p>
        <?php get_template_part('parts-infotext'); ?>
        <!-- 問題ここから -->
        <div class="accordion-inner">
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
                'category_name' => 'examination', // カテゴリスラッグ「examination」の記事のみ取得
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
                        <span class="answer">答）<?php the_field('answer'); ?><br>
                        <?php the_field('answer_body'); ?></span>
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
