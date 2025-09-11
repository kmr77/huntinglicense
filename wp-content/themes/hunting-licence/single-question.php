<?php
if (in_category('experience')) {
  // 体験談カテゴリの投稿なら専用テンプレートを読み込む
  include(TEMPLATEPATH . '/single-experience.php');
  return;
}
?>

<?php get_header(); ?>
<div class="inner">
<?php get_template_part('parts-breadcrumb'); ?>
</div>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<h2>設問No.<?php the_field('no'); ?>：<?php the_title(); ?></h2>
<div class="inner">
  <div class="accordion-inner">
    <div class="tag">
      <ul>
        <?php
        $post_tags = get_the_tags();
        if ( $post_tags ) {
            foreach ( $post_tags as $tag ) {
                echo '<li><a href="' . get_tag_link($tag->term_id) . '">' . esc_html($tag->name) . '</a></li>';
            }
        } else {
            echo '<li>タグはありません</li>';
        }
        ?>
      </ul>
    </div>
    <div class="single-contents">
      <div>
        <dl id="accordion">
          <dl>
            <dt class="select-dt">
              <div>
              カテゴリ：
              <?php
                $categories = get_the_category();
                if ( ! empty( $categories ) ) {
                    $cat_names = wp_list_pluck( $categories, 'name' );
                    echo esc_html( implode( ', ', $cat_names ) );
                }
              ?>
              </div>
              <h3><?php the_title(); ?></h3>
              <?php if ( !has_category(array('examination', 'numbers')) ) : ?>
                <ul>
                  <li><span class="bold">ア：</span><?php the_field('select_a'); ?></li>
                  <li><span class="bold">イ：</span><?php the_field('select_i'); ?></li>
                  <li><span class="bold">ウ：</span><?php the_field('select_u'); ?></li>
                </ul>
              <?php endif; ?>
              <?php
              $no = get_field('no');
              $image_rel_path = '/img/question/' . $no . '.avif';
              $image_full_path = get_template_directory() . $image_rel_path;
              $image_url = get_template_directory_uri() . $image_rel_path;

              if (file_exists($image_full_path)) : ?>
                <img src="<?php echo esc_url($image_url); ?>" alt="設問No.<?php the_field('no'); ?>の画像">
              <?php endif; ?>
              <div class="mt-1 mb-1 align-center">
                <button class="answer-btn">答えを開閉</button>
              </div>
              
            </dt>
            <dd class="answer-dd">
              <span class="answer">答）<?php the_field('answer'); ?><br>
              <?php the_field('answer_body'); ?></span>

              <?php
              $answer_ai = get_field('answer_ai');
              if ( $answer_ai ) : ?>
                <section class="custom-ai-explanation">
                  <h3>AI解説</h3>
                  <p><?php echo wp_kses_post( $answer_ai ); ?></p>
                </section>
              <?php endif; ?>
                <?php
                $note = get_post_meta(get_the_ID(), 'commentary_note', true);
                if ($note) : ?>
                <section class="custom-meta-section">
                    <h3>補足コメント</h3>
                    <p><?php echo esc_html($note); ?></p>
                </section>
                <?php endif; ?>
            </dd>
          </dl>
        </dl>

        <?php
        // カテゴリ一覧（スラッグ => 表示名）
        $categories = [
          'all' => '全カテゴリ問題',
          'laws' => '法令問題',
          'type1' => '一種猟銃問題',
          'type2' => '二種猟銃問題',
          'wana' => '罠（わな）猟問題',
          'ami' => '網（あみ）猟問題',
          'examination' => '猟銃等講習会 考査問題',
          'numbers' => '数字問題',
          'animals' => '鳥獣問題',
        ];

        echo '<div class="related-links">';
        echo '<h3>他の狩猟免許の問題を見る</h3>';
        echo '<ul>';

        foreach ($categories as $slug => $label) {
            $cat = get_category_by_slug($slug);
            if ($cat) {
                $url = get_category_link($cat->term_id);
                echo '<li><a href="' . esc_url($url) . '">' . esc_html($label) . '</a></li>';
            }
        }

        echo '</ul>';
        echo '</div>';

        echo '<div class="close-this-page">';
        echo '<a href="javascript:window.close();">このページを閉じる</a>';
        echo '</div>';
        ?>
      </div>
    </div>

    <?php
    $keywords = get_post_meta(get_the_ID(), 'related_keyword', true);
    if ($keywords) : ?>
    <section class="custom-meta-section">
        <h3>関連キーワード</h3>
        <p><?php echo esc_html($keywords); ?></p>
    </section>
    <?php endif; ?>
  </div>
</div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
