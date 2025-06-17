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

<div class="main-visual schedule">
  <div class="inner">
    <h1><?php echo esc_html($year); ?>年度 狩猟免許試験スケジュール</h1>
    <p><?php echo esc_html($year); ?>年の都道府県別 試験日程・会場・申込情報まとめ</p>
  </div>
</div>

<div class="inner">
  <div class="contents">
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
      echo '</section>';
    }
    ?>
  </div>


<?php get_footer(); ?>
