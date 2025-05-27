<?php get_header(); ?>
<div class="inner">
        <!-- パンくずパーツ -->
        <?php get_template_part('parts-breadcrumb'); ?>
      </div>
    </div>
    <div class="main-visual examination">
      <div class="inner">
      <h1>猟銃等講習会 考査対策｜知識試験の過去問と解説</h1>
      <p>猟銃免許取得前に必須の猟銃等講習会では、銃の構造・安全管理・法律に関する知識が出題されます。本ページでは考査の出題傾向に即した問題を掲載しています。</p>
      <p class="align-center"><button class="question-btn"><a href="#question">問題へ進む</a></button></p>
      </div>
    </div>
    <div class="inner">
    <?php get_template_part('parts-breadcrumb'); ?>
    <h2>猟銃等講習会の考査問題とは？</h2>
    <p>このページでは、<strong>猟銃等講習会で実施される筆記試験（考査）</strong>の過去問を掲載しています。</p>
    <p>「猟銃を持ちたい」「狩猟やクレー射撃を始めたい」と考えている方は、まず警察主催の講習会を受ける必要があります。</p>
    <h2>猟銃等講習会とは？</h2>
    <p>猟銃免許を取得するには、猟銃等講習会の受講と考査の合格が必要です。猟銃等講習会は、銃の構造や操作方法、安全な取扱い、関連法令についての知識を学び、それに基づいた考査（筆記試験）が行われます。講習は都道府県公安委員会の指定日に実施され、多くの受講者がこの考査に備えて学習を重ねています。</p>
    <p>講習の流れや必要な知識を事前に確認したい方は、以下の解説ページをご覧ください。</p>
    <p class="back-to-info"><a href="<?php echo home_url('/examination-info/'); ?>">▶ 猟銃等講習会の内容と流れを詳しく見る</a></p>
    <h3>猟銃等講習会の考査内容</h3>
    <ul class="info-list">
      <li>銃の構造・機能の基礎</li>
      <li>銃の安全な取扱い方法</li>
      <li>実際の事故例と注意点</li>
      <li>銃刀法などの関係法令</li>
    </ul>
    <p>このページでは、これらの出題範囲に即した過去問・練習問題を掲載しています。初めて猟銃免許を目指す方でも、繰り返し学習することで自信を持って講習会に臨めるようになります。</p>
    <div class="category-intro">
    <h2>猟銃等講習会について</h2>
    <p>このページでは、銃の所持に必要な「猟銃等講習会」に関する考査問題を掲載しています。</p>
    <p>なお、一般には「銃免許」「散弾銃免許」「銃の更新」などと呼ばれることもありますが、正しくは警察が実施する「猟銃等講習会考査」が正式名称です。</p>
    <p class="back-to-info"><a href="<?php echo home_url('/license-difference/'); ?>">▶ 狩猟免許と銃所持許可の違いはこちらで詳しく解説しています</a></p>
  </div>
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
                          <button class="open-btn">答えを見る</button>
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
