<?php 
/*
Template Name: 鳥獣イラスト問題
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
<?php if ( !is_paged() ) : ?>
    <?php get_template_part('parts-ads'); ?>
    <h2><?php single_cat_title(); ?> 過去問</h2>
      <p>わな猟・あみ猟を受験する方は、実際に鳥獣のイラストを使った識別問題が出題されます。試験では「この動物は狩猟鳥獣か、それとも保護鳥獣か」を正しく判断できるかが問われ、見間違えると不合格の原因となります。イラストの特徴を的確に捉え、耳・尾・羽の形や模様などを観察する力を養うことが重要です。</p>
      <p>本サイトの個別ページでは、それぞれの鳥獣について見分け方や生息地、習性などを詳しくまとめています。単なる暗記ではなく、実際の識別ポイントを押さえて学習することで、確実な得点につながります。イラストを繰り返し確認しながら特徴を覚え、合格を目指しましょう。</p>

      <p>狩猟免許試験は<strong>全30問</strong>出題されます。</p>
      <p>2024年の例題集から抜粋していますので、法律が改訂されたりして答えが違う場合はご連絡ください。<a href="../contact">メールフォームはこちら</a></p>
      <p class="annotation">※問題文をクリックすると選択肢・解答が表示されます。</p>
<?php endif; ?>
        <!-- 問題ここから -->
        <div class="accordion-inner" id="question">
          <dl id="accordion">
          <?php
            // 投稿件数設定
            $posts_per_page = 10;

            // 現在のページ番号取得
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        
            // 投稿番号を連番で表示させるための開始値
            $counter = ($paged - 1) * $posts_per_page + 1;
        
            // ランダム or 通常順の判定
            $random = isset($_GET['random']) ? $_GET['random'] : 0;
            $orderby = ($random == 1) ? 'rand' : 'ID';
            $order = ($random == 1) ? '' : 'ASC';
        

          $args = array(
            'category_name' => 'animals-judge',
            'posts_per_page' => $posts_per_page,
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
                        <span class="question">問<?php echo $counter; ?>：<?php the_title(); ?>は狩猟鳥獣か？非狩猟鳥獣か？</span>
                        <div class="btn-layout">
                          <button class="open-btn">画像を見る</button>
                          <button class="single-btn"><a href="<?php the_permalink(); ?>" target="_blank">設問へ移動</a></button>
                        </div>
                    </dt>
                    <dd>
                        <dl>
                            <dt class="select-dt">
                                
                                <?php
                                $no = get_field('no');
                                $image_rel_path = '/img/animal/' . $no . '.avif';
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
                                <p><a href="<?php the_permalink(); ?>" target="_blank">より詳しい解説へ移動</a></p>
                            </dd>
                        </dl>
                        </dd>
                      <?php
                      if ($counter % 5 === 0) {
                          echo '<div class="ads-between-questions">';
                          get_template_part('parts-ads-between');
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
