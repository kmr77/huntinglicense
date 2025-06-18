<?php
/*
Template Name: 狩猟免許 試験日程ページ（年度別）
*/
get_header();

// 年度パラメータ取得（例：?year=2026）
$year = isset($_GET['year']) ? intval($_GET['year']) : 2025;

// データディレクトリのパス
$dir = get_template_directory() . "/schedule-list/{$year}/";

// 都道府県スラッグと表示名
$prefectures = [
  'hokkaido' => '北海道', 'aomori' => '青森', 'iwate' => '岩手', 'miyagi' => '宮城', 'akita' => '秋田', 'yamagata' => '山形', 'fukushima' => '福島',
  'ibaraki' => '茨城', 'tochigi' => '栃木', 'gunma' => '群馬', 'saitama' => '埼玉', 'chiba' => '千葉', 'tokyo' => '東京', 'kanagawa' => '神奈川',
  'niigata' => '新潟', 'toyama' => '富山', 'ishikawa' => '石川', 'fukui' => '福井', 'yamanashi' => '山梨', 'nagano' => '長野',
  'gifu' => '岐阜', 'shizuoka' => '静岡', 'aichi' => '愛知', 'mie' => '三重',
  'shiga' => '滋賀', 'kyoto' => '京都', 'osaka' => '大阪', 'hyogo' => '兵庫', 'nara' => '奈良', 'wakayama' => '和歌山',
  'tottori' => '鳥取', 'shimane' => '島根', 'okayama' => '岡山', 'hiroshima' => '広島', 'yamaguchi' => '山口',
  'tokushima' => '徳島', 'kagawa' => '香川', 'ehime' => '愛媛', 'kochi' => '高知',
  'fukuoka' => '福岡', 'saga' => '佐賀', 'nagasaki' => '長崎', 'kumamoto' => '熊本', 'oita' => '大分', 'miyazaki' => '宮崎', 'kagoshima' => '鹿児島', 'okinawa' => '沖縄'
];
?>
<div class="inner">
    <?php get_template_part('parts-breadcrumb'); ?>
  </div>
</div>
<div class="main-visual schedule">
  <div class="inner">
    <h1><?php echo esc_html($year); ?>年度 狩猟免許試験スケジュール</h1>
    <p><?php echo esc_html($year); ?>年の都道府県別 試験日程・会場・申込情報まとめ</p>
  </div>
</div>

<div class="inner">
  <div class="contents">
    <p class="bold"><span class="marker">※情報に間違いがある場合もあります、各都道府県の情報を必ず確認してください。</span></p>
    <?php
    foreach ($prefectures as $slug => $name) {
      $file = $dir . $slug . ".php";
      echo '<section class="schedule-block">';
      echo '<h2>' . esc_html($name) . '</h2>';
      if (file_exists($file)) {
        include $file;
      } else {
        echo '<p>現在、データは未登録です。</p>';
      }
      echo '<p class="bold"><span class="marker">※各都道府県の情報を必ず確認してください。</span></p>';
      echo '</section>';
    }
    ?>
    <?php get_template_part('parts-ads'); ?>
    <h2>よくある質問と注意点</h2>
    <dl class="faq">
      <dt><h3><span class="marker">Q. 狩猟免許試験の日程は毎年変わりますか？</span></h3></dt>
      <dd>はい、試験日程は都道府県ごとに毎年異なります。当サイトでは各都道府県の最新情報をまとめています。</dd>
      <dt><h3><span class="marker">Q. 第一種と第二種銃猟で試験日は同じですか？</span></h3></dt>
      <dd>同じ日に行われる場合もありますが、都道府県によっては別日程になることもあります。</dd>
      <dt><h3><span class="marker">Q. 試験の申請方法は都道府県ごとに違いますか？</span></h3></dt>
      <dd>はい。申請方法・受付期間・必要書類は自治体によって異なります。</dd>
      <dt><h3><span class="marker">Q. 年度ごとのページを確認する方法は？</span></h3></dt>
      <dd>当サイトのURL末尾に「?year=2025」などを指定することで、該当年度の情報を確認できます。</dd>
      <dt><h3><span class="marker">Q. 最新の情報はいつ更新されますか？</span></h3></dt>
      <dd>原則として各自治体が発表後、随時更新しております。公式サイトでの確認も併せて推奨します。</dd>
      <dt><h3><span class="marker">Q. 申請から試験までどのくらい余裕がありますか？</span></h3></dt>
      <dd>自治体によりますが、1〜2ヶ月前に申請受付が始まるのが一般的です。</dd>
      <dt><h3><span class="marker">Q. 試験会場は毎年同じですか？</span></h3></dt>
      <dd>会場が変更される場合もありますので、毎年の案内をご確認ください。</dd>
      <dt><h3><span class="marker">Q. 一度合格すれば来年も受験は不要ですか？</span></h3></dt>
      <dd>狩猟免許は有効期間があり、更新制度もあります。更新方法は各都道府県で異なります。</dd>
      <dt><h3><span class="marker">Q. 試験手数料は全国で同じですか？</span></h3></dt>
      <dd>いいえ、手数料は都道府県によって異なります。</dd>
      <dt><h3><span class="marker">Q. わな猟・網猟の試験も同日に行われますか？</span></h3></dt>
      <dd>同日開催される自治体もありますが、別日になることもあります。事前にご確認ください。</dd>
    </dl>
    <?php get_template_part('parts-ads'); ?>
  </div>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "狩猟免許試験の日程は毎年変わりますか？",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "はい、試験日程は都道府県ごとに毎年異なります。当サイトでは各都道府県の最新情報をまとめています。"
      }
    },
    {
      "@type": "Question",
      "name": "第一種と第二種銃猟で試験日は同じですか？",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "同じ日に行われる場合もありますが、都道府県によっては別日程になることもあります。"
      }
    },
    {
      "@type": "Question",
      "name": "試験の申請方法は都道府県ごとに違いますか？",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "はい。申請方法・受付期間・必要書類は自治体によって異なります。"
      }
    },
    {
      "@type": "Question",
      "name": "年度ごとのページを確認する方法は？",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "当サイトのURL末尾に「?year=2025」などを指定することで、該当年度の情報を確認できます。"
      }
    },
    {
      "@type": "Question",
      "name": "最新の情報はいつ更新されますか？",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "原則として各自治体が発表後、随時更新しております。公式サイトでの確認も併せて推奨します。"
      }
    },
    {
      "@type": "Question",
      "name": "申請から試験までどのくらい余裕がありますか？",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "自治体によりますが、1〜2ヶ月前に申請受付が始まるのが一般的です。"
      }
    },
    {
      "@type": "Question",
      "name": "試験会場は毎年同じですか？",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "会場が変更される場合もありますので、毎年の案内をご確認ください。"
      }
    },
    {
      "@type": "Question",
      "name": "一度合格すれば来年も受験は不要ですか？",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "狩猟免許は有効期間があり、更新制度もあります。更新方法は各都道府県で異なります。"
      }
    },
    {
      "@type": "Question",
      "name": "試験手数料は全国で同じですか？",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "いいえ、手数料は都道府県によって異なります。"
      }
    },
    {
      "@type": "Question",
      "name": "わな猟・網猟の試験も同日に行われますか？",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "同日開催される自治体もありますが、別日になることもあります。事前にご確認ください。"
      }
    }
  ]
}
</script>

<?php get_footer(); ?>
