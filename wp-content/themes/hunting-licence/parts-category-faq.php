<?php
if ( !is_paged() ) :
  $category = get_queried_object();
?>
<div class="inner faq-block">
  <div class="contents study-method">

<?php
// =============================
// 法令問題（laws）
// =============================
if ( $category->slug === 'laws' ) : ?>
    <h2>法令問題のよくある質問</h2>
    <dl>
      <dt>Q. 法令問題は毎年変わりますか？</dt>
      <dd>大きな変更は多くありませんが、法改正の反映が入る場合があります。最新の狩猟読本等で年次更新を確認しましょう。</dd>

      <dt>Q. 効率よく覚えるコツは？</dt>
      <dd>罰則・数値・禁止事項など頻出領域を表で整理し、過去問で反復するのが近道です。</dd>
    </dl>
    <script type="application/ld+json">
    {"@context":"https://schema.org","@type":"FAQPage","mainEntity":[
      {"@type":"Question","name":"法令問題は毎年変わりますか？","acceptedAnswer":{"@type":"Answer","text":"大きな変更は多くありませんが、法改正の反映が入る場合があります。最新の狩猟読本等で年次更新を確認しましょう。"}},
      {"@type":"Question","name":"効率よく覚えるコツは？","acceptedAnswer":{"@type":"Answer","text":"罰則・数値・禁止事項など頻出領域を表で整理し、過去問で反復するのが近道です。"}}
    ]}</script>

<?php
// =============================
// 第一種銃猟免許（type1）
// =============================
elseif ( $category->slug === 'type1' ) : ?>
    <h2>第一種銃猟免許のよくある質問</h2>
    <dl>
      <dt>Q. 使用できる銃は？</dt>
      <dd>散弾銃・ライフル銃が対象です。所持許可・保管要件・安全管理を確実に理解しましょう。</dd>

      <dt>Q. 試験の重要ポイントは？</dt>
      <dd>安全管理（実技・マナー）と法令理解が最重視。筆記は鳥獣識別も頻出です。</dd>
    </dl>
    <script type="application/ld+json">
    {"@context":"https://schema.org","@type":"FAQPage","mainEntity":[
      {"@type":"Question","name":"使用できる銃は？","acceptedAnswer":{"@type":"Answer","text":"散弾銃・ライフル銃が対象です。所持許可・保管要件・安全管理を確実に理解しましょう。"}},
      {"@type":"Question","name":"試験の重要ポイントは？","acceptedAnswer":{"@type":"Answer","text":"安全管理（実技・マナー）と法令理解が最重視。筆記は鳥獣識別も頻出です。"}}
    ]}</script>

<?php
// =============================
// 第二種銃猟免許（type2）
// =============================
elseif ( $category->slug === 'type2' ) : ?>
    <h2>第二種銃猟免許のよくある質問</h2>
    <dl>
      <dt>Q. どんな狩猟に使えますか？</dt>
      <dd>空気銃による小型鳥類の狩猟が中心です。装薬銃（散弾銃等）は対象外です。</dd>

      <dt>Q. 第一種との違いは？</dt>
      <dd>第一種は装薬銃可、第二種は空気銃限定。難易度・出題もやや簡易ですが安全管理は同様に重要です。</dd>
    </dl>
    <script type="application/ld+json">
    {"@context":"https://schema.org","@type":"FAQPage","mainEntity":[
      {"@type":"Question","name":"どんな狩猟に使えますか？","acceptedAnswer":{"@type":"Answer","text":"空気銃による小型鳥類の狩猟が中心です。装薬銃（散弾銃等）は対象外です。"}},
      {"@type":"Question","name":"第一種との違いは？","acceptedAnswer":{"@type":"Answer","text":"第一種は装薬銃可、第二種は空気銃限定。難易度・出題もやや簡易ですが安全管理は同様に重要です。"}}
    ]}</script>

<?php
// =============================
// 猟銃等講習会（examination）
// =============================
elseif ( $category->slug === 'examination' ) : ?>
    <h2>猟銃等講習会のよくある質問</h2>
    <dl>
      <dt>Q. 誰が受講する必要がありますか？</dt>
      <dd>新規所持・更新ともに受講が必要です。受講後の考査に合格して修了となります。</dd>

      <dt>Q. 合格基準は？</dt>
      <dd>筆記は概ね8割以上の正答が目安。不合格の場合は再受講が必要です。</dd>
    </dl>
    <script type="application/ld+json">
    {"@context":"https://schema.org","@type":"FAQPage","mainEntity":[
      {"@type":"Question","name":"誰が受講する必要がありますか？","acceptedAnswer":{"@type":"Answer","text":"新規所持・更新ともに受講が必要です。受講後の考査に合格して修了となります。"}},
      {"@type":"Question","name":"合格基準は？","acceptedAnswer":{"@type":"Answer","text":"筆記は概ね8割以上の正答が目安。不合格の場合は再受講が必要です。"}}
    ]}</script>

<?php
// =============================
// 鳥獣識別（animals）
// =============================
elseif ( $category->slug === 'animals' ) : ?>
    <h2>鳥獣識別問題のよくある質問</h2>
    <dl>
      <dt>Q. 出題形式は？</dt>
      <dd>写真・イラストから種名を選ぶ形式。似た種の識別点（体型・羽色・角・足跡等）を押さえましょう。</dd>

      <dt>Q. 苦手克服のコツは？</dt>
      <dd>似た種を左右比較で並べ、違いを言語化して覚えるのが効果的です（翼鏡・嘴・虹彩など）。</dd>
    </dl>
    <script type="application/ld+json">
    {"@context":"https://schema.org","@type":"FAQPage","mainEntity":[
      {"@type":"Question","name":"出題形式は？","acceptedAnswer":{"@type":"Answer","text":"写真・イラストから種名を選ぶ形式。似た種の識別点（体型・羽色・角・足跡等）を押さえましょう。"}},
      {"@type":"Question","name":"苦手克服のコツは？","acceptedAnswer":{"@type":"Answer","text":"似た種を左右比較で並べ、違いを言語化して覚えるのが効果的です（翼鏡・嘴・虹彩など）。"}}
    ]}</script>

<?php
// =============================
// 鳥獣イラスト識別問題（animals-judge）
// =============================
elseif ( $category->slug === 'animals-judge' ) : ?>
    <h2>鳥獣イラスト識別問題のよくある質問</h2>
    <dl>
      <dt>Q. 鴨類で間違えやすいポイントは？</dt>
      <dd>カルガモとマガモ、オナガガモ等の混同に注意。識別は「翼鏡の色・形」「嘴の色模様」「虹彩色」「尾の形」「頭部の艶」の5点セットで確認します。</dd>

      <dt>Q. イラスト判定のコツは？</dt>
      <dd>体側の模様化でディテールが省略されがち。翼鏡（肩羽の金属光沢帯）と嘴の色分布を最優先に見て、次に頭部の配色・頸輪・尾を確認すると正答率が上がります。</dd>
    </dl>
    <script type="application/ld+json">
    {"@context":"https://schema.org","@type":"FAQPage","mainEntity":[
      {"@type":"Question","name":"鴨類で間違えやすいポイントは？","acceptedAnswer":{"@type":"Answer","text":"カルガモとマガモ、オナガガモ等の混同に注意。識別は「翼鏡の色・形」「嘴の色模様」「虹彩色」「尾の形」「頭部の艶」の5点セットで確認します。"}},
      {"@type":"Question","name":"イラスト判定のコツは？","acceptedAnswer":{"@type":"Answer","text":"体側の模様化でディテールが省略されがち。翼鏡と嘴の色分布を最優先に見て、次に頭部の配色・頸輪・尾を確認すると正答率が上がります。"}}
    ]}</script>

<?php
// =============================
// 網猟（ami）
// =============================
elseif ( $category->slug === 'ami' ) : ?>
    <h2>網猟のよくある質問</h2>
    <dl>
      <dt>Q. 網猟の基本的な種類は？</dt>
      <dd>はり網・むそう網等があり、対象鳥獣や地形に応じて使い分けます。設置・撤去手順と安全管理を徹底しましょう。</dd>

      <dt>Q. 設置時の法令上の注意は？</dt>
      <dd>許可区域・期間・標識掲示などの遵守が必要です。誤捕獲防止のため点検頻度と回収手順も定めてください。</dd>
    </dl>
    <script type="application/ld+json">
    {"@context":"https://schema.org","@type":"FAQPage","mainEntity":[
      {"@type":"Question","name":"網猟の基本的な種類は？","acceptedAnswer":{"@type":"Answer","text":"はり網・むそう網等があり、対象鳥獣や地形に応じて使い分けます。設置・撤去手順と安全管理を徹底しましょう。"}},
      {"@type":"Question","name":"設置時の法令上の注意は？","acceptedAnswer":{"@type":"Answer","text":"許可区域・期間・標識掲示などの遵守が必要です。誤捕獲防止のため点検頻度と回収手順も定めてください。"}}
    ]}</script>

<?php
// =============================
// 数字問題（numbers）
// =============================
elseif ( $category->slug === 'numbers' ) : ?>
    <h2>数字問題のよくある質問</h2>
    <dl>
      <dt>Q. どんな数値が出ますか？</dt>
      <dd>距離・期間・年齢・口径等。意味とセットで覚えると取り違えが減ります。</dd>

      <dt>Q. 暗記のコツは？</dt>
      <dd>「数字→理由→具体例」の三段メモで覚えると長期保持しやすいです。</dd>
    </dl>
    <script type="application/ld+json">
    {"@context":"https://schema.org","@type":"FAQPage","mainEntity":[
      {"@type":"Question","name":"どんな数値が出ますか？","acceptedAnswer":{"@type":"Answer","text":"距離・期間・年齢・口径等。意味とセットで覚えると取り違えが減ります。"}},
      {"@type":"Question","name":"暗記のコツは？","acceptedAnswer":{"@type":"Answer","text":"「数字→理由→具体例」の三段メモで覚えると長期保持しやすいです。"}}
    ]}</script>

<?php
// =============================
// わな猟（wana）
// =============================
elseif ( $category->slug === 'wana' ) : ?>
    <h2>わな猟のよくある質問</h2>
    <dl>
      <dt>Q. くくりわなと箱わなの違いは？</dt>
      <dd>くくりわなは足を締める、箱わなは檻で捕獲する方式。対象獣や設置環境で選択します。</dd>

      <dt>Q. 設置時の許可は必要？</dt>
      <dd>はい。狩猟者登録と土地所有者の許可などが必要です。標識と見回り頻度も忘れずに。</dd>
    </dl>
    <script type="application/ld+json">
    {"@context":"https://schema.org","@type":"FAQPage","mainEntity":[
      {"@type":"Question","name":"くくりわなと箱わなの違いは？","acceptedAnswer":{"@type":"Answer","text":"くくりわなは足を締める、箱わなは檻で捕獲する方式。対象獣や設置環境で選択します。"}},
      {"@type":"Question","name":"設置時の許可は必要？","acceptedAnswer":{"@type":"Answer","text":"はい。狩猟者登録と土地所有者の許可などが必要です。標識と見回り頻度も忘れずに。"}}
    ]}</script>

<?php
// =============================
// 全問題（all）※総合MIX問題
// =============================
elseif ( $category->slug === 'all' ) : ?>
    <h2>全カテゴリ問題のよくある質問</h2>
    <dl>
      <dt>Q. 目的は？</dt>
      <dd>全カテゴリからランダムに解いて弱点抽出・総復習を行うための総合MIXページです。</dd>

      <dt>Q. 学習のコツは？</dt>
      <dd>間違いログを分野別に集計し、次回はその分野のカテゴリページで集中的に解くと効率的です。</dd>
    </dl>
    <script type="application/ld+json">
    {"@context":"https://schema.org","@type":"FAQPage","mainEntity":[
      {"@type":"Question","name":"目的は？","acceptedAnswer":{"@type":"Answer","text":"全カテゴリからランダムに解いて弱点抽出・総復習を行うための総合MIXページです。"}},
      {"@type":"Question","name":"学習のコツは？","acceptedAnswer":{"@type":"Answer","text":"間違いログを分野別に集計し、次回はその分野のカテゴリページで集中的に解くと効率的です。"}}
    ]}</script>

<?php
// =============================
// デフォルト
// =============================
else : ?>
    <h2>よくある質問</h2>
    <p>このカテゴリではFAQを順次追加しています。</p>
<?php endif; ?>

  </div><!-- /.contents -->
</div><!-- /.inner -->
<?php endif; ?>
