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
<?php if ( !is_paged() ) : ?>
<div class="inner">
  <h2><?php single_tag_title(); ?> 例題集過去問</h2>
  <p>このページでは、<strong>狩猟免許試験</strong>に対応した例題と解説を掲載しています。
  狩猟に関する法令、猟具の使い方、鳥獣の判別、安全管理など、試験で問われる分野を網羅的にカバー。
  実際の<strong>狩猟免許試験例題集</strong>に基づいた問題に加えて、各問には正解とわかりやすい解説がセットになっており、初心者でも安心して学習できます。
  出題傾向に応じた学習アドバイスも掲載しており、試験対策を効率よく進めることが可能です。
  また、スマートフォン対応により、通勤中や外出先などのスキマ時間でも手軽に勉強できます。
  <strong>狩猟免許試験合格</strong>を目指すすべての受験者にとって、有用な学習コンテンツです。</p>
  <?php get_template_part('parts-category-intro'); ?>
  <br>
  <?php get_template_part('parts-infotext'); ?>
<?php endif; ?>
  <div class="accordion-inner" id="question">
    <dl id="accordion">
      <?php
      // カウンター初期化
      // 現在のページを取得
      $paged = get_query_var('paged') ? get_query_var('paged') : 1;

      // 1ページあたりの投稿数（$argsにも使用している値と同じに）
      $posts_per_page = 10;

      // カウンターの初期値を設定
      $counter = ($paged - 1) * $posts_per_page + 1;

      // ページ番号取得
      $paged = get_query_var('paged') ? get_query_var('paged') : 1;

      // ランダム表示判定
      $random = isset($_GET['random']) ? $_GET['random'] : 0;
      $orderby = ($random == 1) ? 'rand' : 'ID';
      $order = ($random == 1) ? '' : 'ASC';

      // クエリ作成：licenseタグを明示的に指定
      $args = array(
        'tag' => 'license',
        'posts_per_page' => $posts_per_page,
        'paged' => $paged,
        'orderby' => $orderby,
        'order' => $order,
      );
      $the_query = new WP_Query($args);
      ?>

      <!-- ランダム表示切り替えボタン -->
      <?php get_template_part('parts-random-btn'); ?>

      <?php if ( $the_query->have_posts() ) : ?>
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
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
                <span class="answer">答）<?php the_field('answer'); ?><br><?php the_field('answer_body'); ?></span>
              </dd>
            </dl>
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

<?php get_footer(); ?>
