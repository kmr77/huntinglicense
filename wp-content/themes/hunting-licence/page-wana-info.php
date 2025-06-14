<?php
/*
Template Name: わな猟免許 解説ページ
*/
get_header();
?>
  <div class="inner">
    <?php get_template_part('parts-breadcrumb'); ?>
  </div>
</div>
<div class="main-visual wana">
  <div class="inner">
    <h1><?php the_title(); ?>｜わな猟免許の内容と試験対策</h1>
    <p>わな猟免許とは？どんな猟具を使う？受験前に知っておきたい制度や試験内容をわかりやすく解説します。</p>
  </div>
</div>

<div class="inner">
  <div class="contents study-method">
    <p>このページでは、わな猟免許の概要や対象となる猟具、試験の流れ、勉強方法などを初心者にも分かりやすく紹介します。狩猟免許の中でも比較的取得しやすく、女性や初心者からも人気の高いわな猟について、基本から試験対策まで一通り把握できる構成となっています。</p>
    <?php get_template_part('parts-ads'); ?>
    <h2>わな猟免許とは？</h2>
    <p>わな猟免許は、くくりわなやはこわなを使用して主に中型〜大型の獣類（イノシシ、シカ、アナグマなど）を捕獲するための免許です。発砲音もなく、銃と違って保管義務も緩やかなため、住宅地近くでの有害鳥獣捕獲や農業被害対策にも利用されています。</p>

    <h2>使用できる猟具</h2>
    <ul class="info-list">
      <li>くくりわな（足にくくりつけるタイプの罠）</li>
      <li>はこわな（箱型の檻に動物を閉じ込めるもの）</li>
    </ul>

    <h2>試験の流れと内容</h2>
    <p>試験は各都道府県で実施され、法令・猟具の取扱い・鳥獣識別・適性検査（視力・運動能力）・実技（設置手順の確認）などが含まれます。講習を受けたあとに試験を受ける形が一般的です。</p>

    <h2>よくある質問</h2>
    <dl>
      <dt>Q. わな猟免許は何歳から受験できますか？</dt>
      <dd>→ 満18歳以上であれば受験できます。ただし、わなの設置にはある程度の体力が必要です。</dd>
      <dt>Q. 初心者でも合格できますか？</dt>
      <dd>→ はい。わな猟免許は他の猟法に比べて実技難易度が低く、講習での説明を理解すれば十分合格可能です。</dd>
      <dt>Q. 女性の受験者もいますか？</dt>
      <dd>→ はい。女性受験者も年々増えており、軽装で安全なわな猟は選ばれやすい猟法です。</dd>
      <dt>Q. 銃の所持許可は必要ですか？</dt>
      <dd>→ 必要ありません。わな猟は銃を使わないため、猟銃所持許可は不要です。</dd>
      <dt>Q. 試験の実技はどのようなものですか？</dt>
      <dd>→ 実際に設置するのではなく、猟具の説明や操作方法を理解しているかを問われます。</dd>
      <dt>Q. わな猟で獲れる動物は？</dt>
      <dd>→ 主にイノシシ、シカ、タヌキ、アナグマなどの中大型獣です。</dd>
      <dt>Q. 捕獲した動物はどうするの？</dt>
      <dd>→ 原則として速やかに止めさし（とどめ）を行い、適切に処理します。放置は法律違反となります。</dd>
      <dt>Q. 狩猟期間以外にも使えますか？</dt>
      <dd>→ 有害鳥獣捕獲などの特例を除き、原則として猟期以外は使用できません。</dd>
      <dt>Q. 受験までにどんな準備が必要？</dt>
      <dd>→ 例題集を使った学習、鳥獣識別の確認、講習会の受講が基本です。</dd>
      <dt>Q. 問題演習はできますか？</dt>
      <dd>→ はい。<a href="<?php echo home_url('/category/wana/'); ?>">わな猟の過去問はこちら</a>から確認できます。</dd>
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
      "name": "わな猟免許は何歳から受験できますか？",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "満18歳以上であれば受験できます。ただし、わなの設置にはある程度の体力が必要です。"
      }
    },
    {
      "@type": "Question",
      "name": "初心者でも合格できますか？",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "はい。わな猟免許は他の猟法に比べて実技難易度が低く、講習での説明を理解すれば十分合格可能です。"
      }
    },
    {
      "@type": "Question",
      "name": "女性の受験者もいますか？",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "はい。女性受験者も年々増えており、軽装で安全なわな猟は選ばれやすい猟法です。"
      }
    },
    {
      "@type": "Question",
      "name": "銃の所持許可は必要ですか？",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "必要ありません。わな猟は銃を使わないため、猟銃所持許可は不要です。"
      }
    },
    {
      "@type": "Question",
      "name": "試験の実技はどのようなものですか？",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "実際に設置するのではなく、猟具の説明や操作方法を理解しているかを問われます。"
      }
    },
    {
      "@type": "Question",
      "name": "わな猟で獲れる動物は？",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "主にイノシシ、シカ、タヌキ、アナグマなどの中大型獣です。"
      }
    },
    {
      "@type": "Question",
      "name": "捕獲した動物はどうするの？",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "原則として速やかに止めさし（とどめ）を行い、適切に処理します。放置は法律違反となります。"
      }
    },
    {
      "@type": "Question",
      "name": "狩猟期間以外にも使えますか？",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "有害鳥獣捕獲などの特例を除き、原則として猟期以外は使用できません。"
      }
    },
    {
      "@type": "Question",
      "name": "受験までにどんな準備が必要？",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "例題集を使った学習、鳥獣識別の確認、講習会の受講が基本です。"
      }
    },
    {
      "@type": "Question",
      "name": "問題演習はできますか？",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "はい。わな猟の過去問カテゴリページから確認できます。"
      }
    }
  ]
}
</script>

<?php get_footer(); ?>
