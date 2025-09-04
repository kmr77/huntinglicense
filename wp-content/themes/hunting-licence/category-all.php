<?php get_header(); ?>
<div class="inner">
        <?php get_template_part('parts-breadcrumb'); ?>
      </div>
    </div>
    <div class="main-visual all">
      <div class="inner">
      <h1>狩猟免許 試験問題 全カテゴリ総まとめ</h1>
      <p>一種・二種銃猟、わな、網、法令、鳥獣など全カテゴリの過去問を一括掲載。狩猟免許試験の総合対策としてご活用いただける便利な一覧ページです。</p>
      <p class="align-center"><button class="question-btn"><a href="#question">問題へ進む</a></button></p>
      </div>
    </div>
    <div class="inner">
<?php if ( !is_paged() ) : ?>
      <h2>狩猟免許試験例題集全問</h2>
      <p>
      このページでは、狩猟免許試験のために必要な<strong>全問題</strong>を完全網羅しています。
      <strong>狩猟免許試験例題集</strong>に掲載されている問題は、法令、猟具の使用方法、鳥獣に関する知識、安全管理など、試験に必要な幅広い分野に対応しています。
      各問題には、詳細な解説と正確な答えが付いており、受験者が理解を深めるために役立つ情報が満載です。
      また、問題ごとに出題される傾向や難易度に応じたアドバイスも提供しており、効果的な試験対策をサポートします。
      さらに、スマートフォン対応のため、移動中やスキマ時間でも手軽に復習が可能です。<strong>狩猟免許試験合格</strong>を目指す受験者にとって、非常に役立つ教材となっています。
      全問題を一度に学べるため、効率よく知識を定着させることができます。
      </p>
      <h2>狩猟鳥獣イラスト問題</h2>
      <p>わな猟・あみ猟免許では、紙芝居形式のイラストを使った狩猟鳥獣の識別問題が行われます。ここは確実に点を取っておきましょう！</p>
      <p>▶ <a href="<?php echo home_url('/category/animals-judge/'); ?>">狩猟鳥獣イラスト問題</a></p>
      <?php get_template_part('parts-ads'); ?>
      <p>狩猟免許試験は<strong>全30問</strong>出題されます。</p>
      <p>2024年の例題集から抜粋していますので、法律が改訂されたりして答えが違う場合はご連絡ください。<a href="../contact">メールフォームはこちら</a></p>
      <p class="annotation">※問題文をクリックすると選択肢・解答が表示されます。</p>
      <?php get_template_part('parts-category-intro'); ?>
<?php endif; ?>
      <?php get_template_part('parts-affiliate'); ?>
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
              'category_name' => 'all',
              'posts_per_page' => $posts_per_page,
              'paged' => $paged,
              'orderby' => $orderby,
              'order' => $order
            );

            $the_query = new WP_Query($args);

            global $wp_query;
            $wp_query = $the_query;

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

                      if (file_exists($image_full_path)) :
                    ?>
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