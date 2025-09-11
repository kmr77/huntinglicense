<?php
/*
Template Name: 網猟免許 解説ページ
*/
get_header();
?>
  <div class="inner">
    <?php get_template_part('parts-breadcrumb'); ?>
  </div>
</div>
<div class="main-visual ami">
  <div class="inner">
    <h1><?php the_title(); ?>｜網猟免許の内容と試験対策</h1>
    <p>網猟免許とは？どんな網を使うの？試験で問われるポイントを初心者向けに詳しく解説します。</p>
  </div>
</div>

<div class="inner">
  <div class="contents study-method">
    <p>このページでは、網猟免許の概要や使用できる猟具、試験の内容、学習方法などを初心者向けにわかりやすく解説します。音や反動がなく安全性が高いため、初めて狩猟に挑戦する方にも選ばれやすい猟法です。</p>

    <h2>網猟免許とは？</h2>
    <p>網猟免許は、むそう網（投網）やはり網などを用いて鳥類などを捕獲するために必要な免許です。銃や罠とは異なり、音や危険性が少ないことから、住宅地や人里近くでも使用しやすい狩猟方法とされています。</p>

    <h2>使用できる猟具</h2>
    <ul class="info-list">
      <li>むそう網（投網）：飛来中の鳥類を空中で絡めて捕獲</li>
      <li>はり網：枝などに張り、接触した鳥類を絡め取る網</li>
    </ul>
    <?php get_template_part('parts-ads'); ?>
    <h2>試験の流れと内容</h2>
    <p>試験は法令・猟具の取り扱い・鳥獣識別・適性検査（視力・聴力・運動能力）・網猟に関する実技（設置図や道具の説明）で構成されます。講習を受けた後、各都道府県の指定日に受験します。</p>

    <h2>よくある質問</h2>
    <dl>
      <dt>Q. 網猟免許は何歳から受験できますか？</dt>
      <dd>→ 満18歳以上であれば受験できます。</dd>
      <dt>Q. 初心者でも合格しやすいですか？</dt>
      <dd>→ はい。実技は説明中心で、猟具の設置方法などを理解していれば合格可能です。</dd>
      <dt>Q. 使用できる網に制限はありますか？</dt>
      <dd>→ はい。むそう網やはり網など、法律で定められた網のみ使用が許可されています。</dd>
      <dt>Q. 女性の受験者もいますか？</dt>
      <dd>→ はい。比較的軽装備で行えるため、女性受験者も年々増えています。</dd>
      <dt>Q. 網猟ではどんな鳥を捕獲できますか？</dt>
      <dd>→ カモ類、ハト類などの鳥類が中心です。保護対象の鳥類は捕獲できません。</dd>
      <dt>Q. 狩猟期間はいつですか？</dt>
      <dd>→ 原則11月15日〜2月15日ですが、地域によって異なるため各自治体の発表を確認してください。</dd>
      <dt>Q. 網の設置は難しいですか？</dt>
      <dd>→ 実地設置ではなく、講習と口頭説明で十分に対応できます。</dd>
      <dt>Q. 講習を受けずに試験だけ受けられますか？</dt>
      <dd>→ 自治体によって異なりますが、多くの場合、事前講習を受けることが推奨されています。</dd>
      <dt>Q. 狩猟免許があればすぐに狩猟できますか？</dt>
      <dd>→ 免許取得後、「狩猟者登録」を行わなければ狩猟はできません。</dd>
      <dt>Q. 問題演習はできますか？</dt>
      <dd>→ はい。<a href="<?php echo home_url('/category/ami/'); ?>">網猟の過去問はこちら</a>からご確認いただけます。</dd>
    </dl>

    <h2>関連ページ</h2>
    <ul class="info-links">
      <li><a href="<?php echo home_url('/license-types/'); ?>">▶ 狩猟免許の種類と特徴を比較</a></li>
      <li><a href="<?php echo home_url('/application/'); ?>">▶ 狩猟免許の申請手続きと流れ</a></li>
    </ul>
  </div>
</div>

<!-- ▼ FAQ構造化データ -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "網猟免許は何歳から受験できますか？",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "満18歳以上であれば受験できます。"
      }
    },
    {
      "@type": "Question",
      "name": "初心者でも合格しやすいですか？",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "はい。実技は説明中心で、猟具の設置方法などを理解していれば合格可能です。"
      }
    },
    {
      "@type": "Question",
      "name": "使用できる網に制限はありますか？",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "はい。むそう網やはり網など、法律で定められた網のみ使用が許可されています。"
      }
    },
    {
      "@type": "Question",
      "name": "女性の受験者もいますか？",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "はい。比較的軽装備で行えるため、女性受験者も年々増えています。"
      }
    },
    {
      "@type": "Question",
      "name": "網猟ではどんな鳥を捕獲できますか？",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "カモ類、ハト類などの鳥類が中心です。保護対象の鳥類は捕獲できません。"
      }
    },
    {
      "@type": "Question",
      "name": "狩猟期間はいつですか？",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "原則11月15日〜2月15日ですが、地域によって異なるため各自治体の発表を確認してください。"
      }
    },
    {
      "@type": "Question",
      "name": "網の設置は難しいですか？",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "実地設置ではなく、講習と口頭説明で十分に対応できます。"
      }
    },
    {
      "@type": "Question",
      "name": "講習を受けずに試験だけ受けられますか？",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "自治体によって異なりますが、多くの場合、事前講習を受けることが推奨されています。"
      }
    },
    {
      "@type": "Question",
      "name": "狩猟免許があればすぐに狩猟できますか？",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "免許取得後、「狩猟者登録」を行わなければ狩猟はできません。"
      }
    },
    {
      "@type": "Question",
      "name": "問題演習はできますか？",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "はい。網猟の過去問カテゴリページからご確認いただけます。"
      }
    }
  ]
}
</script>

<?php get_footer(); ?>
