<?php
/**
 * カテゴリページ用：対応する模擬試験への導線
 * category.php などのカテゴリ説明直下で読み込んでください。
 */

if ( ! is_category() ) {
	return;
}

$category = get_queried_object();

if ( ! $category || empty( $category->slug ) ) {
	return;
}

$mock_links = [
	'type1' => [
		'title' => '第一種銃猟 30問模擬試験',
		'desc'  => '第一種銃猟の問題から30問をランダム出題。通常問題で学習した後の実力確認に使えます。',
		'url'   => '/mock-exam/type1/',
	],
	'type2' => [
		'title' => '第二種銃猟 30問模擬試験',
		'desc'  => '第二種銃猟の問題から30問をランダム出題。通常問題で学習した後の実力確認に使えます。',
		'url'   => '/mock-exam/type2/',
	],
	'wana' => [
		'title' => 'わな猟 30問模擬試験',
		'desc'  => 'わな猟の問題から30問をランダム出題。通常問題で学習した後の実力確認に使えます。',
		'url'   => '/mock-exam/wana/',
	],
	'ami' => [
		'title' => '網猟 30問模擬試験',
		'desc'  => '網猟の問題から30問をランダム出題。通常問題で学習した後の実力確認に使えます。',
		'url'   => '/mock-exam/ami/',
	],
	'laws' => [
		'title' => '法令 30問模擬試験',
		'desc'  => '法令問題から30問をランダム出題。法令分野をまとめて確認できます。',
		'url'   => '/mock-exam/laws/',
	],
	'animals' => [
		'title' => '鳥獣 30問模擬試験',
		'desc'  => '鳥獣問題から30問をランダム出題。鳥獣分野をまとめて確認できます。',
		'url'   => '/mock-exam/animals/',
	],
	'examination' => [
		'title' => '猟銃等講習会 50問模擬考査',
		'desc'  => '猟銃等講習会の考査問題から50問をランダム出題。本番前の総仕上げに使えます。',
		'url'   => '/mock-exam/gun-course/',
	],
];

$mock = $mock_links[ $category->slug ] ?? null;

if ( ! $mock ) {
	return;
}
?>

<section class="category-mock-cta" aria-label="<?php echo esc_attr( $mock['title'] ); ?>">
	<div class="category-mock-cta__body">
		<p class="category-mock-cta__label">模擬試験で実力チェック</p>
		<h2 class="category-mock-cta__title"><?php echo esc_html( $mock['title'] ); ?></h2>
		<p class="category-mock-cta__desc"><?php echo esc_html( $mock['desc'] ); ?></p>
	</div>
	<p class="category-mock-cta__action">
		<a href="<?php echo esc_url( home_url( $mock['url'] ) ); ?>">模擬試験を始める →</a>
	</p>
</section>
