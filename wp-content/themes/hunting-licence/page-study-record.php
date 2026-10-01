<?php
/*
Template Name: 学習記録
Template Post Type: page
*/
$question_ids = array_values( array_unique( array_merge(
    get_posts( [ 'post_type' => 'post', 'post_status' => 'publish', 'category_name' => 'all', 'posts_per_page' => -1, 'fields' => 'ids' ] ),
    get_posts( [ 'post_type' => 'post', 'post_status' => 'publish', 'category_name' => 'animals-judge', 'posts_per_page' => -1, 'fields' => 'ids' ] )
) ) );
get_header();
?>
<main class="inner learning-page" id="study-record"
      data-question-ids="<?php echo esc_attr( wp_json_encode( array_map( 'intval', $question_ids ) ) ); ?>"
      data-review-url="<?php echo esc_url( home_url( '/review/' ) ); ?>">
  <header class="learning-header">
    <h1>学習記録</h1>
    <p>学習状況や苦手問題を確認できます。</p>
  </header>
  <p class="learning-note">学習記録は、この端末のブラウザ内に保存されます。通常はブラウザを閉じても記録は残ります。別の端末や別のブラウザには引き継がれません。サイトデータを削除した場合や、シークレット／プライベートブラウズを終了した場合などは記録が消えることがあります。</p>
  <p class="learning-notice" id="learning-storage-notice" hidden>このブラウザでは学習記録を保存できません。</p>

  <section class="learning-card learning-goal-card">
    <h2>目標試験日</h2>
    <p id="learning-goal-status" aria-live="polite">目標試験日は未設定です。</p>
    <div class="learning-goal-form">
      <label for="learning-goal-date">試験日を設定・変更</label>
      <div class="learning-goal-controls">
        <input type="date" id="learning-goal-date">
        <button type="button" class="learning-button learning-button-primary" id="learning-goal-save">保存する</button>
      </div>
    </div>
  </section>

  <section class="learning-card learning-stats-card">
    <h2>模擬試験</h2>
    <div class="learning-grid">
      <div><span>模擬試験学習時間</span><strong id="learning-exam-time">0分</strong></div>
      <div><span>受験回数</span><strong id="learning-exam-count">0回</strong></div>
      <div><span>最高点</span><strong id="learning-exam-best">—</strong></div>
      <div><span>平均点</span><strong id="learning-exam-average">—</strong></div>
      <div><span>直近結果</span><strong id="learning-exam-latest">—</strong></div>
      <div><span>最速時間</span><strong id="learning-exam-fastest">—</strong></div>
      <div><span>平均時間</span><strong id="learning-exam-average-time">—</strong></div>
    </div>
    <div class="learning-history">
      <h3>受験履歴</h3>
      <div class="learning-table-wrap"><table class="learning-table learning-history-table"><thead><tr><th>日時</th><th>模擬試験</th><th>結果・正答率</th><th>所要時間</th></tr></thead><tbody id="learning-exam-history"></tbody></table></div>
    </div>
  </section>

  <section class="learning-card learning-stats-card learning-overview-card">
    <h2>全体学習状況</h2>
    <div class="learning-grid">
      <div><span>総解答数</span><strong id="learning-attempts">0回</strong></div>
      <div><span>解答済み問題数</span><strong id="learning-answered">0問</strong></div>
      <div><span>未回答問題数</span><strong id="learning-unanswered">0問</strong></div>
      <div><span>正解数</span><strong id="learning-correct">0回</strong></div>
      <div><span>不正解数</span><strong id="learning-wrong">0回</strong></div>
      <div><span>正答率</span><strong id="learning-rate">—</strong></div>
    </div>
  </section>

  <section class="learning-card learning-area-card">
    <h2>分野別</h2>
    <div class="learning-table-wrap"><table class="learning-table learning-area-table"><thead><tr><th>分野</th><th>解答数</th><th>正答率</th></tr></thead><tbody id="learning-areas"></tbody></table></div>
  </section>

  <section class="learning-card learning-weak-card">
    <h2>苦手分析</h2>
    <div class="learning-weak-summary">
      <p>苦手分野 <strong id="learning-weak-area">—</strong></p>
      <p>要復習 <strong id="learning-review-count">0問</strong></p>
    </div>
    <p class="learning-empty-note" id="learning-review-empty">現在、要復習の問題はありません。</p>
    <h3>よく間違える問題</h3>
    <ol id="learning-wrong-list"></ol>
    <div class="learning-actions">
      <a class="learning-button learning-button-primary" id="learning-review-link" href="<?php echo esc_url( home_url( '/review/' ) ); ?>">苦手問題だけ解く</a>
      <a class="learning-button learning-button-secondary" id="learning-unanswered-link" href="<?php echo esc_url( home_url( '/review/?mode=unanswered' ) ); ?>">未回答問題だけ解く</a>
    </div>
  </section>

  <section class="learning-card learning-about-card">
    <h2>学習記録について</h2>
    <p>この端末に保存された記録を削除できます。</p>
    <button type="button" class="learning-button learning-button-reset" id="learning-reset-open">学習記録をリセット</button>
    <div id="learning-reset-confirm" hidden>
      <p>学習記録、解答履歴、模擬試験履歴、目標試験日を削除します。削除したデータは元に戻せません。</p>
      <button type="button" class="learning-button learning-button-reset-confirm" id="learning-reset-yes">削除する</button>
      <button type="button" class="learning-button learning-button-secondary" id="learning-reset-cancel">キャンセル</button>
    </div>
  </section>
</main>
<?php get_footer(); ?>
