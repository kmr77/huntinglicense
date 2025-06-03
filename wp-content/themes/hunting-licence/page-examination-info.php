<?php
/*
Template Name: 猟銃等講習会の解説
*/
get_header();
?>

<div class="inner">
  <?php get_template_part('parts-breadcrumb'); ?>
</div>

<div class="main-visual gun">
  <div class="inner">
    <h1>猟銃免許・猟銃等講習会の完全ガイド｜流れ・合格対策・過去問まとめ</h1>
    <p>
      このページでは「猟銃免許（猟銃等講習会）」の流れや受講のポイント、試験内容、合格のコツ、過去問、よくある質問まで総合的に解説しています。<br>
      これから受験を考えている方、独学で合格を目指したい方のための最新・最強のまとめページです。
    </p>
  </div>
</div>
<div class="inner">
  <div class="contents study-method">
    <h2>猟銃免許・猟銃等講習会の解説と総合ガイド</h2>

    <ul class="jump-link-list">
      <li><a href="#about">▶ 猟銃等講習会とは？</a></li>
      <li><a href="#flow">▶ 受講の流れ・日程</a></li>
      <li><a href="#content">▶ 試験の内容と合格基準</a></li>
      <li><a href="#documents">▶ 必要書類・申請方法</a></li>
      <li><a href="#faq">▶ よくある質問</a></li>
      <li><a href="#links">▶ 関連リンク</a></li>
    </ul>

    <h2 id="about">猟銃等講習会とは？</h2>
    <p>
      猟銃免許の取得には、公安委員会が実施する「猟銃等講習会」の受講と考査の合格が必須です。<br>
      この講習会では、銃の構造・安全な扱い方・関連法令・射撃技術など、所持者として必要な知識・技能が学べます。<br>
      合格者には「猟銃等講習会修了証明書」が交付され、これが猟銃所持許可の前提条件となります。
    </p>

    <h2 id="flow">受講の流れ・日程</h2>
    <ol>
      <li>最寄りの警察署または公安委員会で受講申請・必要書類を提出</li>
      <li>指定された日に猟銃等講習会を受講</li>
      <li>講習後に筆記考査（20問）と、地域によっては実技試験を受験</li>
      <li>合格後、修了証明書を受け取り、所持許可申請へ進む</li>
    </ol>
    <p>
      <a href="<?php echo home_url('/information/'); ?>">▶ 全国の講習会日程・申請先一覧はこちら</a>
    </p>

    <h2 id="content">試験の内容と合格基準</h2>
    <ul>
      <li>【筆記試験】 銃の構造・安全管理・銃刀法などの法令問題（択一式が中心）</li>
      <li>【合格基準】 通常20問中16問以上（8割正解）が合格ライン</li>
      <li>【実技試験】 地域によって射撃技能や安全操作の確認あり</li>
    </ul>
    <p>
      過去の出題例や出題傾向は下記の練習問題集をご覧ください。<br>
      <a href="<?php echo home_url('/tag/examination/'); ?>">▶ 猟銃免許の過去問・練習問題はこちら</a>
    </p>

    <h2 id="documents">必要書類・申請方法</h2>
    <ul>
      <li>住民票（本籍記載）</li>
      <li>顔写真（縦3cm×横2.4cmなど規定あり）</li>
      <li>診断書（指定医によるもの）</li>
      <li>講習会受講申請書・所持許可申請書</li>
      <li>収入証紙（手数料用）</li>
      <li>その他、警察署から指示される書類</li>
    </ul>
    <p>
      詳しい申請手続きや必要な書類の記入例は
      <a href="<?php echo home_url('/application/'); ?>">▶ 猟銃免許の申請方法ガイド</a>をご覧ください。
    </p>
    <?php get_template_part('parts-affiliate'); ?>
    <h2 id="faq">よくある質問（FAQ）</h2>
    <section class="tag-faq">
      <dl>
        <dt>Q. 猟銃免許の取得に年齢制限はありますか？</dt>
        <dd>A. 原則20歳以上で、欠格事由（前科、精神疾患など）がないことが条件です。</dd>
        <dt>Q. 猟銃等講習会の合格率は？</dt>
        <dd>A. 筆記考査は8割以上正解で合格。適切な対策をすれば合格は十分可能です。</dd>
        <dt>Q. 必要書類が一部不足している場合は？</dt>
        <dd>A. 事前に警察署・公安委員会へ相談し、不備のないよう準備しましょう。</dd>
        <dt>Q. 実技試験は全員必須ですか？</dt>
        <dd>A. 実技は地域により異なります。詳しくは各自治体の案内を確認してください。</dd>
        <dt>Q. 狩猟免許と猟銃免許の違いは？</dt>
        <dd>A. 狩猟免許は狩猟行為の資格、猟銃免許（正確には「所持許可」）は銃を所持するための資格です。</dd>
        <dt>Q. 所持許可取得後の手続きは？</dt>
        <dd>A. 所持許可証の交付後、猟銃登録や猟友会入会など、次のステップがあります。</dd>
      </dl>
    </section>

    <!-- FAQ構造化データ（JSON-LD） -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "猟銃免許の取得に年齢制限はありますか？",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "原則20歳以上で、欠格事由（前科、精神疾患など）がないことが条件です。"
          }
        },
        {
          "@type": "Question",
          "name": "猟銃等講習会の合格率は？",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "筆記考査は8割以上正解で合格。適切な対策をすれば合格は十分可能です。"
          }
        },
        {
          "@type": "Question",
          "name": "必要書類が一部不足している場合は？",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "事前に警察署・公安委員会へ相談し、不備のないよう準備しましょう。"
          }
        },
        {
          "@type": "Question",
          "name": "実技試験は全員必須ですか？",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "実技は地域により異なります。詳しくは各自治体の案内を確認してください。"
          }
        },
        {
          "@type": "Question",
          "name": "狩猟免許と猟銃免許の違いは？",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "狩猟免許は狩猟行為の資格、猟銃免許（正確には「所持許可」）は銃を所持するための資格です。"
          }
        },
        {
          "@type": "Question",
          "name": "所持許可取得後の手続きは？",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "所持許可証の交付後、猟銃登録や猟友会入会など、次のステップがあります。"
          }
        }
      ]
    }
    </script>

    <h2 id="links">関連リンク</h2>
    <ul>
      <li><a href="<?php echo home_url('/tag/examination/'); ?>">▶ 猟銃免許の過去問・練習問題一覧</a></li>
      <li><a href="<?php echo home_url('/category/examination/'); ?>">▶ 猟銃免許カテゴリページ</a></li>
      <li><a href="<?php echo home_url('/application/'); ?>">▶ 猟銃免許の申請方法ガイド</a></li>
      <li><a href="<?php echo home_url('/faq-hunting-license/'); ?>">▶ 狩猟免許FAQ</a></li>
      <li><a href="<?php echo home_url('/category/all/'); ?>">▶ 狩猟免許全カテゴリ問題集</a></li>
    </ul>
  </div>
</div>

<?php get_footer(); ?>