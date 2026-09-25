<?php get_header(); ?>

<?php
// トップページの問題数は、カテゴリの保存件数キャッシュではなく
// 公開投稿とカテゴリの紐付けをDBから直接数える。
global $wpdb;

$shuryo_count_category_posts = static function ( $slug ) use ( $wpdb ) {
	$sql = $wpdb->prepare(
		"SELECT COUNT(DISTINCT p.ID)
		 FROM {$wpdb->posts} p
		 INNER JOIN {$wpdb->term_relationships} tr
		   ON tr.object_id = p.ID
		 INNER JOIN {$wpdb->term_taxonomy} tt
		   ON tt.term_taxonomy_id = tr.term_taxonomy_id
		 INNER JOIN {$wpdb->terms} t
		   ON t.term_id = tt.term_id
		 WHERE p.post_type = 'post'
		   AND p.post_status = 'publish'
		   AND tt.taxonomy = 'category'
		   AND t.slug = %s",
		$slug
	);

	return (int) $wpdb->get_var( $sql );
};

$home_question_counts = array();
foreach ( array( 'type1', 'type2', 'wana', 'ami', 'examination', 'laws', 'animals-judge', 'numbers', 'all' ) as $slug ) {
	$home_question_counts[ $slug ] = $shuryo_count_category_posts( $slug );
}

$home_total_question_count   = $home_question_counts['all'];
$home_exam_question_count    = $home_question_counts['examination'];
$home_hunting_question_count = max( 0, $home_total_question_count - $home_exam_question_count );
?>

<div class="main-visual top">
	<div class="inner">
		<h1>狩猟免許過去問・猟銃等講習会考査 全<?php echo esc_html( number_format_i18n( $home_total_question_count ) ); ?>問｜無料問題集</h1>
		<p>狩猟免許試験<?php echo esc_html( number_format_i18n( $home_hunting_question_count ) ); ?>問、猟銃等講習会の考査<?php echo esc_html( number_format_i18n( $home_exam_question_count ) ); ?>問を無料掲載。第一種銃猟・第二種銃猟・わな猟・網猟・法令・鳥獣判別などから選んで学習できます。</p>
	</div>
</div>

<div class="inner">

	<section class="top-intro-box" aria-labelledby="top-intro-title">
		<h2 id="top-intro-title">狩猟免許試験・猟銃等講習会考査の対策を無料でしっかり学べます</h2>
		<p>「狩猟免許過去問ドリル」は、狩猟免許試験と猟銃等講習会考査の問題演習に対応した無料学習サイトです。<br>第一種銃猟・第二種銃猟・わな猟・網猟をはじめ、法令や鳥獣、猟銃等講習会考査の問題を目的に合わせて学習できます。</p>
		<p>問題は一部だけではなく、サイトに収録している問題をすべて無料で公開しています。<br>さらに、本番を想定した30問の模擬試験も無料で利用できます。</p>

		<ul class="top-intro-features">
			<li>
				<h3>全問題を無料公開</h3>
				<p>免許別・分野別に、収録している問題を制限なく学習できます。</p>
			</li>
			<li>
				<h3>本番形式30問の模擬試験</h3>
				<p>法令・猟具・鳥獣・保護管理を組み合わせ、本番を想定した形式で実力を確認できます。</p>
			</li>
			<li>
				<h3>免許別・分野別・猟銃等講習会考査に対応</h3>
				<p>第一種銃猟・第二種銃猟・わな猟・網猟、法令や鳥獣、猟銃等講習会考査から目的に合わせて学習できます。</p>
			</li>
		</ul>

		<nav class="top-intro-actions" aria-label="学習を始める">
			<a href="<?php echo esc_url( home_url('/category/all/') ); ?>">全問題から学習する</a>
			<a class="top-intro-action-primary" href="<?php echo esc_url( home_url('/mock-exam/hunting-license/') ); ?>">狩猟免許の模擬試験を受ける</a>
			<a href="<?php echo esc_url( home_url('/mock-exam/gun-course/') ); ?>">猟銃等講習会の模擬考査を受ける</a>
		</nav>
	</section>

	<section class="home-section" aria-labelledby="license-study-title">
		<h2 id="license-study-title">試験・考査から問題を選ぶ</h2>
		<p class="home-section-intro">受験する狩猟免許や猟銃等講習会の考査に合わせて、必要な問題をまとめて学習できます。</p>

		<div class="study-card-grid">
			<a class="study-card" href="<?php echo esc_url( home_url('/category/type1/') ); ?>">
				<span class="study-card-title">第一種銃猟免許</span>
				<span class="study-card-desc">散弾銃・ライフル銃などの装薬銃を使用する第一種銃猟免許の試験対策問題です。</span>
				<span class="study-card-link">第一種銃猟の問題を解く（<?php echo esc_html( number_format_i18n( $home_question_counts['type1'] ) ); ?>問）→</span>
			</a>

			<a class="study-card" href="<?php echo esc_url( home_url('/category/type2/') ); ?>">
				<span class="study-card-title">第二種銃猟免許</span>
				<span class="study-card-desc">空気銃を使用する第二種銃猟免許に必要な知識を、問題形式で確認できます。</span>
				<span class="study-card-link">第二種銃猟の問題を解く（<?php echo esc_html( number_format_i18n( $home_question_counts['type2'] ) ); ?>問）→</span>
			</a>

			<a class="study-card" href="<?php echo esc_url( home_url('/category/wana/') ); ?>">
				<span class="study-card-title">わな猟免許</span>
				<span class="study-card-desc">わなの構造・使用方法・捕獲対象など、わな猟免許で問われる内容を学習できます。</span>
				<span class="study-card-link">わな猟の問題を解く（<?php echo esc_html( number_format_i18n( $home_question_counts['wana'] ) ); ?>問）→</span>
			</a>

			<a class="study-card" href="<?php echo esc_url( home_url('/category/ami/') ); ?>">
				<span class="study-card-title">網猟免許</span>
				<span class="study-card-desc">網の種類・構造・使用方法など、網猟免許に必要な知識を問題形式で確認できます。</span>
				<span class="study-card-link">網猟の問題を解く（<?php echo esc_html( number_format_i18n( $home_question_counts['ami'] ) ); ?>問）→</span>
			</a>

			<a class="study-card study-card-featured study-card-wide" href="<?php echo esc_url( home_url('/category/examination/') ); ?>">
				<span class="study-card-title">猟銃等講習会の考査</span>
				<span class="study-card-desc">猟銃の所持を目指す方向け。初心者講習の考査対策問題をまとめています。</span>
				<span class="study-card-link">考査問題を解く（<?php echo esc_html( number_format_i18n( $home_question_counts['examination'] ) ); ?>問）→</span>
			</a>
		</div>
	</section>

	<section class="home-section" aria-labelledby="topic-study-title">
		<h2 id="topic-study-title">分野別に学ぶ</h2>
		<p class="home-section-intro">苦手な分野だけを集中的に復習したい場合はこちらから選べます。</p>

		<div class="study-card-grid">
			<a class="study-card" href="<?php echo esc_url( home_url('/category/laws/') ); ?>">
				<span class="study-card-title">法令問題</span>
				<span class="study-card-desc">狩猟期間、狩猟者登録、禁止猟法など、法令に関する問題をまとめています。</span>
				<span class="study-card-link">法令問題を解く（<?php echo esc_html( number_format_i18n( $home_question_counts['laws'] ) ); ?>問）→</span>
			</a>

			<a class="study-card" href="<?php echo esc_url( home_url('/category/animals-judge/') ); ?>">
				<span class="study-card-title">鳥獣判別</span>
				<span class="study-card-desc">狩猟鳥獣の特徴や見分け方を、判別問題で確認できます。</span>
				<span class="study-card-link">鳥獣判別に挑戦する（<?php echo esc_html( number_format_i18n( $home_question_counts['animals-judge'] ) ); ?>問）→</span>
			</a>

			<a class="study-card" href="<?php echo esc_url( home_url('/category/numbers/') ); ?>">
				<span class="study-card-title">数字問題</span>
				<span class="study-card-desc">日数・距離・期間など、数字を覚える必要がある問題を集中的に復習できます。</span>
				<span class="study-card-link">数字問題を解く（<?php echo esc_html( number_format_i18n( $home_question_counts['numbers'] ) ); ?>問）→</span>
			</a>

			<a class="study-card study-card-featured" href="<?php echo esc_url( home_url('/category/all/') ); ?>">
				<span class="study-card-title">カテゴリMIX問題</span>
				<span class="study-card-desc">複数分野をまとめて復習したい方向け。試験前の総仕上げに使えます。</span>
				<span class="study-card-link">MIX問題を解く（<?php echo esc_html( number_format_i18n( $home_question_counts['all'] ) ); ?>問）→</span>
			</a>
		</div>

	</section>

	<section class="home-section" aria-labelledby="mock-exam-title">
		<h2 id="mock-exam-title">模擬試験で実力を確認する</h2>
		<p class="home-section-intro">通常問題で学習した後は、30問の模擬試験で実力を確認できます。本番形式では受験する免許に合わせて出題します。</p>

		<div class="study-card-grid">
			<a class="study-card study-card-featured study-card-wide" href="<?php echo esc_url( home_url('/mock-exam/') ); ?>">
				<span class="study-card-title">狩猟免許 模擬試験</span>
				<span class="study-card-desc">本番形式30問、免許別、法令・鳥獣などの分野別模擬試験から選べます。</span>
				<span class="study-card-link">模擬試験一覧を見る →</span>
			</a>

			<a class="study-card" href="<?php echo esc_url( home_url('/mock-exam/type1/') ); ?>">
				<span class="study-card-title">第一種銃猟 30問模擬試験</span>
				<span class="study-card-desc">第一種銃猟の問題から30問をランダム出題します。</span>
				<span class="study-card-link">第一種銃猟の模擬試験へ →</span>
			</a>

			<a class="study-card" href="<?php echo esc_url( home_url('/mock-exam/type2/') ); ?>">
				<span class="study-card-title">第二種銃猟 30問模擬試験</span>
				<span class="study-card-desc">第二種銃猟の問題から30問をランダム出題します。</span>
				<span class="study-card-link">第二種銃猟の模擬試験へ →</span>
			</a>

			<a class="study-card" href="<?php echo esc_url( home_url('/mock-exam/wana/') ); ?>">
				<span class="study-card-title">わな猟 30問模擬試験</span>
				<span class="study-card-desc">わな猟の問題から30問をランダム出題します。</span>
				<span class="study-card-link">わな猟の模擬試験へ →</span>
			</a>

			<a class="study-card" href="<?php echo esc_url( home_url('/mock-exam/ami/') ); ?>">
				<span class="study-card-title">網猟 27問模擬試験</span>
				<span class="study-card-desc">網猟の全27問をランダム順で出題します。</span>
				<span class="study-card-link">網猟の模擬試験へ →</span>
			</a>
		</div>

		<div class="article-link-list">
			<a class="article-link" href="<?php echo esc_url( home_url('/mock-exam/laws/') ); ?>">法令30問模擬試験</a>
			<a class="article-link" href="<?php echo esc_url( home_url('/mock-exam/animals/') ); ?>">鳥獣30問模擬試験</a>
			<a class="article-link" href="<?php echo esc_url( home_url('/mock-exam/protection/') ); ?>">保護管理模擬試験</a>
			<a class="article-link" href="<?php echo esc_url( home_url('/mock-exam/gun-course/') ); ?>">猟銃等講習会 50問模擬考査</a>
		</div>
	</section>

	<section class="home-section" aria-labelledby="exam-support-title">
		<h2 id="exam-support-title">受験前に確認する</h2>
		<p class="home-section-intro">勉強方法、申請、試験日程、予備講習など、受験前に必要な情報をまとめています。</p>

		<div class="study-card-grid">
			<a class="study-card" href="<?php echo esc_url( home_url('/study-method/') ); ?>">
				<span class="study-card-title">狩猟免許の勉強方法</span>
				<span class="study-card-desc">独学で合格を目指すための進め方と、試験前に確認しておきたいポイントを解説します。</span>
				<span class="study-card-link">勉強方法を見る →</span>
			</a>

			<a class="study-card" href="<?php echo esc_url( home_url('/schedule/') ); ?>">
				<span class="study-card-title">狩猟免許試験の日程</span>
				<span class="study-card-desc">都道府県ごとの試験日程を確認できます。</span>
				<span class="study-card-link">試験日程を見る →</span>
			</a>

			<a class="study-card" href="<?php echo esc_url( home_url('/application/') ); ?>">
				<span class="study-card-title">受験申請の手順</span>
				<span class="study-card-desc">必要書類や費用など、狩猟免許試験の申込みに必要な情報を確認できます。</span>
				<span class="study-card-link">申請方法を見る →</span>
			</a>

			<a class="study-card" href="<?php echo esc_url( home_url('/pre-lecture/') ); ?>">
				<span class="study-card-title">猟友会の予備講習</span>
				<span class="study-card-desc">予備講習の内容、受講方法、試験対策としての使い方を確認できます。</span>
				<span class="study-card-link">予備講習について見る →</span>
			</a>
		</div>
	</section>

	<?php get_template_part('parts-ads'); ?>

	<section class="home-section" aria-labelledby="about-drill-title">
		<h2 id="about-drill-title">狩猟免許過去問ドリルについて</h2>
		<p>「狩猟免許過去問ドリル」は、狩猟免許をこれから取得する方のための無料学習サイトです。過去に出題された例題や、それに準じた問題を中心に<?php echo esc_html( number_format_i18n( $home_total_question_count ) ); ?>問を掲載し、スマートフォンでも学習しやすい構成にしています。</p>
		<p>問題を解くだけでなく、狩猟免許の申請、試験日程、勉強方法、狩猟者登録など、受験から取得後まで必要になる情報も掲載しています。運営者自身の狩猟免許取得や猟銃所持手続きの経験をもとに、実際の手続きで確認した内容も順次反映しています。</p>

		<div class="article-link-list">
			<a class="article-link" href="<?php echo esc_url( home_url('/know/') ); ?>">狩猟免許とは？基礎知識</a>
			<a class="article-link" href="<?php echo esc_url( home_url('/content/') ); ?>">狩猟免許試験の内容と対策</a>
			<a class="article-link" href="<?php echo esc_url( home_url('/registration/') ); ?>">狩猟者登録の手続き</a>
			<a class="article-link" href="<?php echo esc_url( home_url('/information/') ); ?>">都道府県別の申込情報</a>
			<a class="article-link" href="<?php echo esc_url( home_url('/experience/') ); ?>">狩猟免許取得の体験談</a>
		</div>
	</section>

	<section class="home-section" aria-labelledby="basic-info-title">
		<h2 id="basic-info-title">狩猟免許の基礎知識</h2>
		<div class="article-link-list">
			<a class="article-link" href="<?php echo esc_url( home_url('/license-difference/') ); ?>">狩猟免許と銃所持許可の違い</a>
			<a class="article-link" href="<?php echo esc_url( home_url('/license-types/') ); ?>">狩猟免許の種類と違い</a>
			<a class="article-link" href="<?php echo esc_url( home_url('/type1-type2-difference/') ); ?>">第一種銃猟と第二種銃猟免許の違い</a>
			<a class="article-link" href="<?php echo esc_url( home_url('/license-extermination/') ); ?>">狩猟免許と有害鳥獣捕獲の違い</a>
			<a class="article-link" href="<?php echo esc_url( home_url('/words/') ); ?>">狩猟・猟具の用語集</a>
			<a class="article-link" href="<?php echo esc_url( home_url('/faq-hunting-license/') ); ?>">狩猟免許に関するよくある質問</a>
		</div>
	</section>

	<section class="home-section" aria-labelledby="gun-title">
		<h2 id="gun-title">猟銃の所持・講習会を考えている方へ</h2>
		<p>第一種銃猟免許などを取得しても、それだけで猟銃を所持できるわけではありません。猟銃を所持する場合は、猟銃等講習会や所持許可申請など、狩猟免許とは別の手続きが必要です。</p>

		<div class="study-card-grid">
			<a class="study-card study-card-featured" href="<?php echo esc_url( home_url('/category/examination/') ); ?>">
				<span class="study-card-title">猟銃等講習会の考査問題</span>
				<span class="study-card-desc">初心者講習の考査対策として、問題形式で知識を確認できます。</span>
				<span class="study-card-link">考査問題を解く →</span>
			</a>

			<a class="study-card" href="<?php echo esc_url( home_url('/examination-info/') ); ?>">
				<span class="study-card-title">猟銃等講習会の流れと対策</span>
				<span class="study-card-desc">講習内容や考査までの流れを確認できます。</span>
				<span class="study-card-link">講習会について見る →</span>
			</a>

			<a class="study-card" href="<?php echo esc_url( home_url('/examination/gun-procedure/') ); ?>">
				<span class="study-card-title">猟銃所持許可の手続き</span>
				<span class="study-card-desc">所持許可取得までに必要な手続きをまとめています。</span>
				<span class="study-card-link">所持許可の流れを見る →</span>
			</a>

			<a class="study-card" href="<?php echo esc_url( home_url('/gun-cost/') ); ?>">
				<span class="study-card-title">猟銃所持にかかる費用</span>
				<span class="study-card-desc">講習、射撃教習、設備、銃本体などにかかる費用の目安を確認できます。</span>
				<span class="study-card-link">費用を見る →</span>
			</a>
		</div>

		<div class="article-link-list">
			<a class="article-link" href="<?php echo esc_url( home_url('/gun-locker/') ); ?>">ガンロッカーの選び方</a>
			<a class="article-link" href="<?php echo esc_url( home_url('/gun-types/') ); ?>">銃の種類の違い</a>
			<a class="article-link" href="<?php echo esc_url( home_url('/rifle/') ); ?>">ライフルとは？</a>
			<a class="article-link" href="<?php echo esc_url( home_url('/faq-guns-license/') ); ?>">猟銃所持許可に関するQ&A</a>
			<a class="article-link" href="<?php echo esc_url( home_url('/rifle-revision/') ); ?>">ライフル・ハーフライフルの法改正情報</a>
		</div>
	</section>

	<section class="checker-intro-box">
		<h2>狩猟免許・銃砲所持許可の更新時期を確認する</h2>
		<p>狩猟免許や銃砲所持許可を取得した後は、更新時期の管理も必要です。更新チェッカーでは、入力した日付をもとに狩猟免許・銃砲所持許可の更新時期の目安をまとめて確認できます。</p>
		<p class="checker-intro-btn">
			<a href="https://shuryo-checker.com/" target="_blank" rel="noopener noreferrer">更新チェッカーを見る</a>
		</p>
	</section>

	<?php get_template_part('parts-ads'); ?>

	<section class="home-section" aria-labelledby="past-schedule-title">
		<h2 id="past-schedule-title">過去の試験日程（2025年度・参考）</h2>
		<p>以下は<strong>2025年度に実施された狩猟免許試験の日程（参考情報）</strong>です。申込受付は終了しており、最新の日程ではありません。</p>

		<ul class="compact-link-list">
			<li>
				<a href="<?php echo esc_url( home_url('/schedule/?sy=2025') ); ?>">
					【参考】2025年度の狩猟免許試験日程を見る（終了）
				</a>
			</li>
			<li>
				<a href="<?php echo esc_url( home_url('/schedule/?sy=2026') ); ?>">
					最新：2026年度の狩猟免許試験日程を見る
				</a>
			</li>
		</ul>
	</section>

</div>

<?php get_footer(); ?>