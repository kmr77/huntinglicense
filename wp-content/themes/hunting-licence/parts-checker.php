<?php
$checker_title = '狩猟免許・銃砲所持許可の更新時期が気になる方へ';

if (is_page('after')) {
	$checker_title = '取得後の更新時期が気になる方へ';
} elseif (is_page('application')) {
	$checker_title = '取得後の更新確認も把握しておきたい方へ';
} elseif (is_page('faq')) {
	$checker_title = '更新時期をまとめて確認したい方へ';
}
?>

<section class="checker-intro-box">
	<h2><?php echo esc_html($checker_title); ?></h2>
	<p>
		狩猟免許や銃砲所持許可を取得した後は、試験対策とは別に更新時期の確認も必要です。
		更新チェッカーでは、入力した日付をもとに<strong>狩猟免許・銃砲所持許可の更新時期の目安</strong>をまとめて確認できます。
	</p>
	<p class="checker-intro-note">
		取得後の管理が不安な方は、先に更新時期を確認しておくと安心です。
	</p>
	<p class="checker-intro-btn">
		<a href="https://shuryo-checker.com/" target="_blank" rel="noopener noreferrer">狩猟免許更新チェッカーを見る</a>
	</p>
</section>