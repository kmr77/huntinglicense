<div class="affiliate-box">
<?php
// カテゴリスラッグ取得
$categories = get_the_category();
$slugs = array_map(function($cat) {
  return $cat->slug;
}, $categories);

// 分岐：銃猟対策本
if (array_intersect($slugs, ['category-all', 'category-type1', 'category-type2', 'category-examination', 'gun-types', 'examination-info'])) {
  echo '<h3>銃猟免許試験の合格を目指すならこの1冊</h3>';
  echo '<p>法令・識別・技能まで完全網羅。模擬試験付きで確実に合格へ。</p>';
  echo '<a class="affiliate-btn" href="https://www.amazon.co.jp/dp/4798065730?tag=kiyusama-22" target="_blank" rel="noopener">▶ 書籍をAmazonで見る</a>';

// 分岐：わな・網猟向け
} elseif (array_intersect($slugs, ['category-all', 'category-wana', 'category-ami'])) {
  echo '<h3>わな・網猟免許の試験対策に！</h3>';
  echo '<p>狩猟鳥獣図鑑・技能試験対策も充実。模試3回分付き！</p>';
  echo '<a class="affiliate-btn" href="https://www.amazon.co.jp/dp/4798072206?tag=kiyusama-22" target="_blank" rel="noopener">▶ 書籍をAmazonで見る</a>';

// 分岐：ジビエや制度の学習ページ向け
} elseif (array_intersect($slugs, ['know', 'license-type', 'license-difference', 'license-extermination', 'study-method'])) {
  echo '<h3>ジビエ・解体・食肉処理の基本を学ぶなら</h3>';
  echo '<p>安全でおいしいジビエの知識を1冊で解説。制度にも対応。</p>';
  echo '<a class="affiliate-btn" href="https://www.amazon.co.jp/dp/4766131614?tag=kiyusama-22" target="_blank" rel="noopener">▶ 書籍をAmazonで見る</a>';

// 予備：その他（旧リンク指定分）
} else {
  echo '<h3>狩猟免許取得を目指すあなたにおすすめ</h3>';
  echo '<p>本書は筆記対策に強く、初学者にもわかりやすい内容です。</p>';
  echo '<a class="affiliate-btn" href="https://www.amazon.co.jp/dp/4798063797?tag=kiyusama-22" target="_blank" rel="noopener">▶ 書籍をAmazonで見る</a>';
}
?>
</div>