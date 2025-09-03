<?php
/**
 * Template: Tag hunting-ng (非狩猟鳥獣タグ専用)
 * File: tag-hunting-ng.php
 *
 * 一覧では「画像＋答え＋解説（answer／answer_body）」のみ表示。
 * 生息地・特徴・習性・区分 などの詳細は表示しない（個別ページへ誘導）。
 */
get_header();
?>

<div class="inner">
  <?php get_template_part('parts-breadcrumb'); ?>
</div>

<div class="main-visual animals">
  <div class="inner">
    <h1><?php single_tag_title(); ?>｜非狩猟鳥獣の識別・保護の理解</h1>
    <p>このページは<strong>非狩猟鳥獣（狩猟禁止の鳥獣）</strong>に関する識別問題をまとめています。混同しやすい種との差異を押さえ、誤射・誤捕獲を防ぎましょう。各設問では「答え」と簡潔な解説を掲載。詳しい見分け方や法的区分は<strong>各詳細ページ</strong>で確認してください。</p>
    <p class="align-center"><a class="question-btn" href="#question">問題へ進む</a></p>
  </div>
</div>

<div class="inner">
  <?php if ( !is_paged() ) : ?>
    <?php get_template_part('parts-ads'); ?>
    <h2><?php single_tag_title(); ?>の過去問 イラスト問題</h2>
    <p>
      非狩猟鳥獣の過去問では、保護されるべき鳥獣を誤って狩猟しないよう、正しく識別できるかが問われます。試験では「この動物は非狩猟鳥獣か、それとも狩猟可能鳥獣か」を判定する力が必要です。耳や尾、羽の模様や色合い、体格など、似ている狩猟鳥獣との違いを見極めることが重要となります。本サイトの個別ページでは、それぞれの非狩猟鳥獣について識別ポイントや保護の背景、生息環境などを整理して解説しています。単なる暗記ではなく、非狩猟である根拠を理解することで、実際の狩猟においても誤捕獲を防ぐことができます。問題を繰り返し確認し、非狩猟鳥獣の特徴を確実に覚えて試験に臨みましょう。
    </p>

    <p class="annotation">※問題文をクリックすると、画像・答え・解説が開閉します。</p>
  <?php endif; ?>

  <div class="accordion-inner" id="question">
    <?php
      // 1ページあたり
      $posts_per_page = 10;

      // ページ番号
      $paged = get_query_var('paged') ? intval(get_query_var('paged')) : 1;

      // 連番（ページを跨いでも継続）
      $counter = ($paged - 1) * $posts_per_page + 1;

      // ランダム切替（?random=1）
      $random  = isset($_GET['random']) ? intval($_GET['random']) : 0;
      $orderby = ($random === 1) ? 'rand' : 'ID';
      $order   = ($random === 1) ? ''     : 'ASC';

      // 表示中タグ（このテンプレは hunting-ng 用だが念のため汎用化）
      $current_tag = get_queried_object();
      $tag_slug    = (is_object($current_tag) && !empty($current_tag->slug)) ? $current_tag->slug : 'hunting-ng';

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

    <?php get_template_part('parts-random-btn'); ?>

    <dl id="accordion">
      <?php if ( $the_query->have_posts() ) : ?>
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          <?php
            // 設問番号で画像を参照（/img/animal/{no}.avif）
            $no = get_field('no');
            $image_rel_path  = '/img/animal/' . $no . '.avif';
            $image_full_path = get_template_directory() . $image_rel_path;
            $image_url       = get_template_directory_uri() . $image_rel_path;

            // 一覧で出すのは答え＋解説のみ
            $answer      = get_field('answer');       // 例：「非狩猟鳥獣」
            $answer_body = get_field('answer_body');  // 簡潔な解説
          ?>
          <dt>
            <span class="question">
              問<?php echo esc_html($counter); ?>：
              <?php the_title(); ?>は<strong>非狩猟鳥獣</strong>か？狩猟鳥獣か？（識別）
            </span>
            <div class="btn-layout">
              <button class="open-btn">画像を見る</button>
              <a class="single-btn" href="<?php the_permalink(); ?>" target="_blank" rel="noopener">詳細ページへ</a>
            </div>
          </dt>
          <dd>
            <dl>
              <dt class="select-dt">
                <?php if ( $no && file_exists($image_full_path) ) : ?>
                  <img src="<?php echo esc_url($image_url); ?>" alt="設問No.<?php echo esc_attr($no); ?>の画像">
                <?php endif; ?>
                <button class="answer-btn">答え／解説を開閉</button>
              </dt>
              <dd class="answer-dd">
                <div class="answer">
                  <?php if ( $answer ) : ?>
                    <strong>答）<?php echo esc_html($answer); ?></strong>
                  <?php endif; ?>

                  <?php if ( $answer_body ) : ?>
                    <div class="ex-section">
                      <!-- <div class="ex-title"><strong>解説</strong></div> -->
                      <div class="ex-body"><?php echo wp_kses_post( nl2br( esc_html( $answer_body ) ) ); ?></div>
                    </div>
                  <?php endif; ?>

                  <p class="more-link">
                    <a href="<?php the_permalink(); ?>" target="_blank" rel="noopener">
                      詳しい見分け方・法的区分などは詳細ページへ
                    </a>
                  </p>
                </div>
              </dd>
            </dl>
          </dd>
          <?php $counter++; ?>
        <?php endwhile; ?>
      <?php else : ?>
        <p>該当する投稿が見つかりませんでした。</p>
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

  <?php get_template_part('parts-connection'); ?>
</div>

<?php get_footer(); ?>
