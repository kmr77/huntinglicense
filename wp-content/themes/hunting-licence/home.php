<?php get_header(); ?>

<style>
/* トップページ専用。確認後、必要に応じて style.css へ移動してください。 */
.home-lead {
	margin: 0 0 28px;
}

.home-section {
	margin: 36px 0;
}

.home-section > h2 {
	margin-bottom: 8px;
}

.home-section-intro {
	margin: 0 0 18px;
	color: #555;
}

.study-card-grid {
	display: grid;
	grid-template-columns: repeat(2, minmax(0, 1fr));
	gap: 16px;
	margin: 18px 0 0;
}

.study-card {
	display: block;
	padding: 20px;
	border: 1px solid #dce3df;
	border-radius: 12px;
	background: #fff;
	box-shadow: 0 2px 7px rgba(0, 0, 0, 0.08);
	color: inherit;
	text-decoration: none;
	transition: transform 0.15s ease, box-shadow 0.15s ease, border-color 0.15s ease;
}

.study-card:hover,
.study-card:focus {
	transform: translateY(-2px);
	border-color: #2f7d4f;
	box-shadow: 0 5px 14px rgba(0, 0, 0, 0.11);
}

.study-card-title {
	display: block;
	margin-bottom: 7px;
	font-size: 1.08rem;
	font-weight: 700;
	line-height: 1.5;
}

.study-card-desc {
	display: block;
	margin-bottom: 12px;
	color: #555;
	font-size: 0.95rem;
	line-height: 1.7;
}

.study-card-link {
	display: block;
	color: #267344;
	font-weight: 700;
}

.study-card-featured {
	background: #f5faf7;
	border-color: #cfe1d5;
}

.compact-link-list {
	margin: 14px 0 0;
	padding-left: 1.2em;
}

.compact-link-list li {
	margin: 8px 0;
}

.study-card-wide {
	grid-column: 1 / -1;
}

.article-link-list {
	display: grid;
	grid-template-columns: repeat(2, minmax(0, 1fr));
	gap: 10px 14px;
	margin: 16px 0 0;
}

.article-link {
	display: flex;
	align-items: center;
	justify-content: space-between;
	gap: 14px;
	padding: 13px 15px;
	border: 1px solid #e1e6e3;
	border-radius: 9px;
	background: #fff;
	color: #176b8c;
	text-decoration: none;
	line-height: 1.5;
	transition: background 0.15s ease, border-color 0.15s ease, transform 0.15s ease;
}

.article-link::after {
	content: "→";
	flex: 0 0 auto;
	color: #267344;
	font-weight: 700;
}

.article-link:hover,
.article-link:focus {
	background: #f7faf8;
	border-color: #bfd4c6;
	transform: translateY(-1px);
}

.checker-intro-box {
	margin: 36px 0;
	padding: 22px;
	border: 1px solid #dce3df;
	border-radius: 12px;
	background: #f8faf9;
}

.checker-intro-box h2,
.checker-intro-box h3 {
	margin-top: 0;
}

.checker-intro-btn a {
	display: inline-block;
	padding: 11px 18px;
	border-radius: 8px;
	background: #267344;
	color: #fff;
	font-weight: 700;
	text-decoration: none;
}

@media (max-width: 700px) {
	.study-card-grid {
		grid-template-columns: 1fr;
	}

	.study-card {
		padding: 17px;
	}

	.article-link-list {
		grid-template-columns: 1fr;
	}
}
</style>

<div class="main-visual top">
	<div class="inner">
		<h1>狩猟免許過去問620問｜無料で学べる試験問題集</h1>
		<p>第一種銃猟・第二種銃猟・わな猟・網猟・法令・鳥獣判別など、狩猟免許試験対策の問題を無料で学べます。受験する免許や苦手分野から選んで学習してください。</p>
	</div>
</div>

<div class="inner">

	<section class="home-section" aria-labelledby="license-study-title">
		<h2 id="license-study-title">試験・考査から問題を選ぶ</h2>
		<p class="home-section-intro">受験する狩猟免許や猟銃等講習会の考査に合わせて、必要な問題をまとめて学習できます。</p>

		<div class="study-card-grid">
			<a class="study-card" href="<?php echo esc_url( home_url('/category/type1/') ); ?>">
				<span class="study-card-title">第一種銃猟免許</span>
				<span class="study-card-desc">散弾銃・ライフル銃などの装薬銃を使用する第一種銃猟免許の試験対策問題です。</span>
				<span class="study-card-link">第一種銃猟の問題を解く →</span>
			</a>

			<a class="study-card" href="<?php echo esc_url( home_url('/category/type2/') ); ?>">
				<span class="study-card-title">第二種銃猟免許</span>
				<span class="study-card-desc">空気銃を使用する第二種銃猟免許に必要な知識を、問題形式で確認できます。</span>
				<span class="study-card-link">第二種銃猟の問題を解く →</span>
			</a>

			<a class="study-card" href="<?php echo esc_url( home_url('/category/wana/') ); ?>">
				<span class="study-card-title">わな猟免許</span>
				<span class="study-card-desc">わなの構造・使用方法・捕獲対象など、わな猟免許で問われる内容を学習できます。</span>
				<span class="study-card-link">わな猟の問題を解く →</span>
			</a>

			<a class="study-card" href="<?php echo esc_url( home_url('/category/ami/') ); ?>">
				<span class="study-card-title">網猟免許</span>
				<span class="study-card-desc">網の種類・構造・使用方法など、網猟免許に必要な知識を問題形式で確認できます。</span>
				<span class="study-card-link">網猟の問題を解く →</span>
			</a>

			<a class="study-card study-card-featured study-card-wide" href="<?php echo esc_url( home_url('/category/examination/') ); ?>">
				<span class="study-card-title">猟銃等講習会の考査</span>
				<span class="study-card-desc">猟銃の所持を目指す方向け。初心者講習の考査対策問題をまとめています。</span>
				<span class="study-card-link">考査問題を解く →</span>
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
				<span class="study-card-link">法令問題を解く →</span>
			</a>

			<a class="study-card" href="<?php echo esc_url( home_url('/category/animals-judge/') ); ?>">
				<span class="study-card-title">鳥獣判別</span>
				<span class="study-card-desc">狩猟鳥獣の特徴や見分け方を、判別問題で確認できます。</span>
				<span class="study-card-link">鳥獣判別に挑戦する →</span>
			</a>

			<a class="study-card" href="<?php echo esc_url( home_url('/category/numbers/') ); ?>">
				<span class="study-card-title">数字問題</span>
				<span class="study-card-desc">日数・距離・期間など、数字を覚える必要がある問題を集中的に復習できます。</span>
				<span class="study-card-link">数字問題を解く →</span>
			</a>

			<a class="study-card study-card-featured" href="<?php echo esc_url( home_url('/category/all/') ); ?>">
				<span class="study-card-title">カテゴリMIX問題</span>
				<span class="study-card-desc">複数分野をまとめて復習したい方向け。試験前の総仕上げに使えます。</span>
				<span class="study-card-link">MIX問題を解く →</span>
			</a>
		</div>

		<!-- 30問模擬試験を実装したら、この分野の直後に大きな導線を追加する -->
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
		<p>「狩猟免許過去問ドリル」は、狩猟免許をこれから取得する方のための無料学習サイトです。過去に出題された例題や、それに準じた問題を中心に約620問を掲載し、スマートフォンでも学習しやすい構成にしています。</p>
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
