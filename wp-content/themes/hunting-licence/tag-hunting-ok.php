<?php
/**
 * Template: 狩猟鳥獣タグ専用
 * File: tag-hunting-ok.php
 */
get_header();
?>

<div class="inner">
  <?php get_template_part('parts-breadcrumb'); ?>
</div>

<div class="main-visual animals">
  <div class="inner">
    <h1><?php single_tag_title(); ?>｜鳥獣識別・生態の過去問</h1>
    <p>このタグでは、狩猟対象鳥獣と非狩猟鳥獣の識別に関する問題をまとめています。わな猟・あみ猟の受験者はイラスト（写真）による判別問題が出題されるため、耳・尾・羽の形状や模様の違いなど<strong>特徴を正確に捉える力</strong>が得点の鍵です。</p>
    <p>各設問ページには、見分け方・生息地・習性などの詳細解説も掲載。問題に取り組みつつ要点を確認することで、効率的に知識を定着できます。まずは下の「問題へ進む」から演習を始めましょう。</p>
    <p class="align-center"><button class="question-btn"><a href="#question">問題へ進む</a></button></p>
  </div>
</div>

<div class="inner">
  <?php if ( !is_paged() ) : ?>
    <?php get_template_part('parts-ads'); ?>
    <h2><?php single_tag_title(); ?>過去問 イラスト問題</h2>
    <p>
      狩猟可能鳥獣の過去問では、実際にイラストや写真を見て「この動物は狩猟対象に含まれるか」を正しく判断できるかが試されます。試験では、狩猟可能鳥獣を確実に識別できる力が得点の大きなポイントとなります。体の大きさや羽・毛の色合い、尾の形や模様など、似ている種との違いを押さえることが重要です。本サイトの個別ページでは、それぞれの狩猟鳥獣の見分け方や生態、習性などを整理して掲載しています。単なる暗記ではなく、識別の根拠を理解することで応用力が身につき、狩猟免許試験の合格に直結します。問題演習を重ね、狩猟対象鳥獣の特徴をしっかりと身につけましょう。
    </p>

    <p class="annotation">※問題文をクリックすると画像・解答・解説が開閉します。</p>
  <?php endif; ?>

  <div class="accordion-inner" id="question">
    <?php
      // 1ページあたり件数
      $posts_per_page = 10;

      // 現在のページ番号
      $paged = get_query_var('paged') ? intval(get_query_var('paged')) : 1;

      // 連番用カウンタ（ページをまたいでも連続）
      $counter = ($paged - 1) * $posts_per_page + 1;

      // ランダム切替（?random=1）
      $random  = isset($_GET['random']) ? intval($_GET['random']) : 0;
      $orderby = ($random === 1) ? 'rand' : 'ID';
      $order   = ($random === 1) ? ''     : 'ASC';

      // 表示中のタグ（このテンプレは animals 用だが、汎用化しておく）
      $current_tag = get_queried_object();
      $tag_slug    = is_object($current_tag) && isset($current_tag->slug) ? $current_tag->slug : 'animals';

      // クエリ
      $args = array(
        'tag'            => $tag_slug,
        'posts_per_page' => $posts_per_page,
        'paged'          => $paged,
        'orderby'        => $orderby,
        'order'          => $order,
      );
      $the_query = new WP_Query($args);
    ?>

    <!-- ランダム表示切り替えボタン（既存パーツ流用） -->
    <?php get_template_part('parts-random-btn'); ?>

    <dl id="accordion">
      <?php if ( $the_query->have_posts() ) : ?>
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          <?php
            // category-animals-judge.php の画像出力ロジックを流用
            $no = get_field('no'); // 設問番号
            $image_rel_path  = '/img/animal/' . $no . '.avif';
            $image_full_path = get_template_directory() . $image_rel_path;
            $image_url       = get_template_directory_uri() . $image_rel_path;
          ?>
          <dt>
            <span class="question">
              問<?php echo esc_html($counter); ?>：
              <?php the_title(); ?>は狩猟鳥獣か？非狩猟鳥獣か？
            </span>
            <div class="btn-layout">
              <button class="open-btn">画像を見る</button>
              <button class="single-btn"><a href="<?php the_permalink(); ?>" target="_blank" rel="noopener">設問へ移動</a></button>
            </div>
          </dt>
          <dd>
            <dl>
              <dt class="select-dt">
                <?php if ( $no && file_exists($image_full_path) ) : ?>
                  <img src="<?php echo esc_url($image_url); ?>" alt="設問No.<?php echo esc_attr($no); ?>の画像">
                <?php endif; ?>
                <button class="answer-btn">答えを開閉</button>
              </dt>
              <dd class="answer-dd">
                <span class="answer">
                  <?php
                    // 回答と解説（category-animals-judge準拠）
                    $answer      = get_field('answer');
                    $answer_body = get_field('answer_body');
                    // 余白・可読性はCSS側で調整。見出しは太字、本文は通常。
                  ?>
                  <strong>答）<?php echo esc_html($answer); ?></strong><br>
                  <?php if ( $answer_body ) : ?>
                    <?php echo wp_kses_post(nl2br(esc_html($answer_body))); ?>
                  <?php endif; ?>
                </span>
                <p><a href="<?php the_permalink(); ?>" target="_blank" rel="noopener">より詳しい解説へ移動</a></p>
              </dd>
            </dl>
          </dd>
          <?php $counter++; ?>
        <?php endwhile; ?>
      <?php else : ?>
        <p>投稿が見つかりませんでした。</p>
      <?php endif; ?>
    </dl>

    <?php
      // ページネーション
      echo paginate_links(array(
        'total'     => $the_query->max_num_pages,
        'current'   => $paged,
        'mid_size'  => 2,
        'prev_text' => '« 前へ',
        'next_text' => '次へ »',
      ));
      wp_reset_postdata();
    ?>
  </div>

  <!-- 関連リンク（狩猟免許系パーツ） -->
  <?php get_template_part('parts-connection'); ?>

</div>

<?php get_footer(); ?>
