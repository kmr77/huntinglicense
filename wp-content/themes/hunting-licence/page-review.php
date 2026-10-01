<?php
/*
Template Name: 弱点・未回答問題の復習
Template Post Type: page
*/
$raw_id = isset( $_GET['q'] ) ? wp_unslash( $_GET['q'] ) : '';
$question_id = is_scalar( $raw_id ) && ctype_digit( (string) $raw_id ) ? absint( $raw_id ) : 0;
$question = $question_id ? get_post( $question_id ) : null;
$valid_question = $question && $question->post_type === 'post' && $question->post_status === 'publish'
    && ( has_category( 'all', $question_id ) || has_category( 'animals-judge', $question_id ) );
$raw_mode = isset( $_GET['mode'] ) ? wp_unslash( $_GET['mode'] ) : '';
$mode = is_scalar( $raw_mode ) && sanitize_key( $raw_mode ) === 'unanswered' ? 'unanswered' : 'review';
$question_ids = array_values( array_unique( array_merge(
    get_posts( [ 'post_type' => 'post', 'post_status' => 'publish', 'category_name' => 'all', 'posts_per_page' => -1, 'fields' => 'ids' ] ),
    get_posts( [ 'post_type' => 'post', 'post_status' => 'publish', 'category_name' => 'animals-judge', 'posts_per_page' => -1, 'fields' => 'ids' ] )
) ) );
get_header();
?>
<main class="inner learning-page" id="learning-review"
      data-mode="<?php echo esc_attr( $mode ); ?>"
      data-question-ids="<?php echo esc_attr( wp_json_encode( array_map( 'intval', $question_ids ) ) ); ?>"
      data-review-url="<?php echo esc_url( home_url( '/review/' ) ); ?>">
  <header class="learning-header">
    <h1><?php echo $mode === 'unanswered' ? '未回答問題の復習' : '苦手問題の復習'; ?></h1>
    <p><?php echo $mode === 'unanswered' ? 'まだ解いていない問題を1問ずつ確認できます。' : '間違えた問題を1問ずつ確認できます。'; ?></p>
  </header>
  <p class="learning-back"><a class="learning-button learning-button-secondary" href="<?php echo esc_url( home_url( '/study-record/' ) ); ?>">← 学習記録へ戻る</a></p>
  <?php if ( $valid_question ) :
      $answer = (string) get_field( 'answer', $question_id );
      $select_a = (string) get_field( 'select_a', $question_id );
      $select_i = (string) get_field( 'select_i', $question_id );
      $select_u = (string) get_field( 'select_u', $question_id );
      $no = (string) get_field( 'no', $question_id );
      $folder = has_category( 'animals-judge', $question_id ) ? 'animal' : 'question';
      $image_rel = '/img/' . $folder . '/' . basename( $no ) . '.avif';
      $image_exists = $no !== '' && file_exists( get_template_directory() . $image_rel );
      $category_slugs = wp_get_post_terms( $question_id, 'category', [ 'fields' => 'slugs' ] );
      $areas = implode( ',', $category_slugs ) . ( has_tag( 'protection', $question_id ) ? ',protection' : '' );
  ?>
  <article class="learning-card learning-review-question" id="learning-review-question" hidden
           data-question-id="<?php echo esc_attr( $question_id ); ?>"
           data-learning-areas="<?php echo esc_attr( $areas ); ?>"
           data-learning-title="<?php echo esc_attr( get_the_title( $question_id ) ); ?>"
           data-answer="<?php echo esc_attr( wp_strip_all_tags( $answer ) ); ?>"
           data-animal-judge="<?php echo has_category( 'animals-judge', $question_id ) ? '1' : '0'; ?>">
    <h2><?php echo esc_html( get_the_title( $question_id ) ); ?><?php echo has_category( 'animals-judge', $question_id ) ? 'は狩猟鳥獣か？非狩猟鳥獣か？' : ''; ?></h2>
    <?php if ( $image_exists ) : ?>
      <p><img class="learning-question-image" src="<?php echo esc_url( get_template_directory_uri() . $image_rel ); ?>" alt="設問の画像"></p>
    <?php endif; ?>
    <?php if ( $select_a !== '' || $select_i !== '' || $select_u !== '' ) : ?>
      <div class="learning-choices" data-answer-kind="choice">
        <?php foreach ( [ 'a' => [ 'ア', $select_a ], 'i' => [ 'イ', $select_i ], 'u' => [ 'ウ', $select_u ] ] as $value => $option ) : ?>
          <?php if ( $option[1] !== '' ) : ?><button type="button" data-choice="<?php echo esc_attr( $value ); ?>"><?php echo esc_html( $option[0] . '：' . $option[1] ); ?></button><?php endif; ?>
        <?php endforeach; ?>
      </div>
    <?php elseif ( has_category( 'animals-judge', $question_id ) ) : ?>
      <div class="learning-choices" data-answer-kind="animal"><button type="button" data-choice="hunt">狩猟鳥獣</button><button type="button" data-choice="nonhunt">非狩猟鳥獣</button></div>
    <?php elseif ( preg_match( '/^[\s（(]*(?:〇|○|×|✕|✖|正しい|誤り)/u', trim( wp_strip_all_tags( $answer ) ) ) ) : ?>
      <div class="learning-choices" data-answer-kind="boolean"><button type="button" data-choice="maru">〇 正しい</button><button type="button" data-choice="batsu">× 誤り</button></div>
    <?php elseif ( $image_exists && has_category( 'animals', $question_id ) ) : ?>
      <div class="learning-choices" data-answer-kind="choice"><button type="button" data-choice="a">ア／1／A</button><button type="button" data-choice="i">イ／2／B</button><button type="button" data-choice="u">ウ／3／C</button></div>
    <?php else : ?>
      <p>答えを考えてから、下のボタンで確認してください。</p>
      <button type="button" class="learning-button learning-button-primary" id="learning-reveal">答えと解説を見る</button>
      <div class="learning-choices" data-answer-kind="self" hidden><button type="button" data-choice="correct">正解した</button><button type="button" data-choice="wrong">間違えた</button></div>
    <?php endif; ?>
    <p id="learning-review-feedback" aria-live="polite"></p>
    <div id="learning-review-answer" hidden>
      <p><strong>正解: <?php echo esc_html( $answer ); ?></strong></p>
      <div><?php echo wp_kses_post( (string) get_field( 'answer_body', $question_id ) ); ?></div>
    </div>
  </article>
  <?php elseif ( $raw_id !== '' ) : ?>
    <p class="learning-notice">指定された問題は存在しないか、公開中の問題ではありません。</p>
  <?php endif; ?>
  <section class="learning-card" id="learning-review-navigation">
    <p id="learning-review-status" aria-live="polite"></p>
    <button type="button" class="learning-button learning-button-primary" id="learning-next">次の問題へ</button>
  </section>
</main>
<?php get_footer(); ?>
