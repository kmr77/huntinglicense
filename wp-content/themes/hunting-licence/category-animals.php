<?php 
/*
Template Name: 鳥獣問題
*/
get_header(); ?>
<div class="inner">
        <!-- パンくずパーツ -->
        <?php get_template_part('parts-breadcrumb'); ?>
      </div>
    </div>
    <div class="main-visual animals">
      <div class="inner">
      <h1>鳥獣識別・生態問題 対策｜過去問で覚える</h1>
      <p>このカテゴリでは、狩猟対象鳥獣と保護鳥獣の識別力が問われます。写真や特徴から正確に判断する力が必要で、見分けを誤ると違法行為につながるため重要な分野です。</p>
      <p class="align-center"><button class="question-btn"><a href="#question">問題へ進む</a></button></p>
      </div>
    </div>
    <div class="inner">
    <?php get_template_part('parts-ads'); ?>
    <h2><?php single_cat_title(); ?> 過去問</h2>
      <p>鳥獣問題では、狩猟対象となる鳥類や獣類に関する基本的な知識が問われます。
      具体的には、狩猟可能な種とその保護区分、捕獲方法の制限、さらには鳥獣の生態や特徴に関する問題が出題されます。
      特に、違法に捕獲してはいけない保護鳥や絶滅危惧種の識別や、狩猟可能な時期と場所についての理解が重要です。
      試験合格には、鳥獣に関する法的な規制や生態に関する知識をしっかりと身につけることが欠かせません。
      このページでは、<strong>鳥獣問題</strong>に関する出題内容を詳しく解説し、効率的な学習をサポートします。</p>
      <p>狩猟免許試験は<strong>全30問</strong>出題されます。</p>
      <p>2024年の例題集から抜粋していますので、法律が改訂されたりして答えが違う場合はご連絡ください。<a href="../contact">メールフォームはこちら</a></p>
      <p class="annotation">※問題文をクリックすると選択肢・解答が表示されます。</p>
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
            'category_name' => 'animals',
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
                                <?php get_template_part('parts-ads-accordion'); ?>
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
