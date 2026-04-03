<?php
/*
Template Name: 狩猟免許 試験日程ページ（年度別）
*/
get_header();

// 年度パラメータ取得（例：?sy=2026）
// デフォルトは最新年度：2026
$year = isset($_GET['sy']) ? intval($_GET['sy']) : 2026;

// 表示対象年度
$available_years = [2026, 2025];

// 許可年度以外はデフォルトへ戻す
if (!in_array($year, $available_years, true)) {
  $year = 2026;
}

// データディレクトリのパス
$dir = get_template_directory() . "/schedule-list/{$year}/";

// CSV（狩猟免許試験）正本ファイル
$csv_path = $dir . "hunting-license.csv";

// 都道府県スラッグと表示名（旧方式互換用）
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

// 地域ボタン用
$regions = [
  '北海道・東北' => [
    'anchor' => 'pref-hokkaido',
    'prefectures' => ['北海道', '青森県', '岩手県', '宮城県', '秋田県', '山形県', '福島県']
  ],
  '関東' => [
    'anchor' => 'pref-ibaraki',
    'prefectures' => ['茨城県', '栃木県', '群馬県', '埼玉県', '千葉県', '東京都', '神奈川県']
  ],
  '中部' => [
    'anchor' => 'pref-niigata',
    'prefectures' => ['新潟県', '富山県', '石川県', '福井県', '山梨県', '長野県', '岐阜県', '静岡県', '愛知県']
  ],
  '近畿' => [
    'anchor' => 'pref-mie',
    'prefectures' => ['三重県', '滋賀県', '京都府', '大阪府', '兵庫県', '奈良県', '和歌山県']
  ],
  '中国' => [
    'anchor' => 'pref-tottori',
    'prefectures' => ['鳥取県', '島根県', '岡山県', '広島県', '山口県']
  ],
  '四国' => [
    'anchor' => 'pref-tokushima',
    'prefectures' => ['徳島県', '香川県', '愛媛県', '高知県']
  ],
  '九州・沖縄' => [
    'anchor' => 'pref-fukuoka',
    'prefectures' => ['福岡県', '佐賀県', '長崎県', '熊本県', '大分県', '宮崎県', '鹿児島県', '沖縄県']
  ],
];

/**
 * CSVヘッダーをキーとして1行ずつ連想配列にして読み込む
 */
function schedule_read_csv_as_assoc($csv_path) {
  $rows = [];

  if (!file_exists($csv_path)) return $rows;

  $fp = fopen($csv_path, 'r');
  if ($fp === false) return $rows;

  $header = fgetcsv($fp);
  if ($header === false) {
    fclose($fp);
    return $rows;
  }

  if (isset($header[0])) {
    $header[0] = preg_replace('/^\xEF\xBB\xBF/', '', $header[0]);
  }

  $keys = [];
  foreach ($header as $h) {
    $keys[] = trim((string)$h);
  }

  while (($data = fgetcsv($fp)) !== false) {
    if (count($data) === 1 && trim((string)$data[0]) === '') continue;

    $row = [];
    foreach ($keys as $i => $k) {
      $row[$k] = isset($data[$i]) ? trim((string)$data[$i]) : '';
    }
    $rows[] = $row;
  }

  fclose($fp);
  return $rows;
}

function schedule_year_url($y) {
  return home_url('/schedule/?sy=' . intval($y));
}

function schedule_pref_anchor($prefecture) {
  $map = [
    '北海道' => 'pref-hokkaido',
    '青森県' => 'pref-aomori',
    '岩手県' => 'pref-iwate',
    '宮城県' => 'pref-miyagi',
    '秋田県' => 'pref-akita',
    '山形県' => 'pref-yamagata',
    '福島県' => 'pref-fukushima',
    '茨城県' => 'pref-ibaraki',
    '栃木県' => 'pref-tochigi',
    '群馬県' => 'pref-gunma',
    '埼玉県' => 'pref-saitama',
    '千葉県' => 'pref-chiba',
    '東京都' => 'pref-tokyo',
    '神奈川県' => 'pref-kanagawa',
    '新潟県' => 'pref-niigata',
    '富山県' => 'pref-toyama',
    '石川県' => 'pref-ishikawa',
    '福井県' => 'pref-fukui',
    '山梨県' => 'pref-yamanashi',
    '長野県' => 'pref-nagano',
    '岐阜県' => 'pref-gifu',
    '静岡県' => 'pref-shizuoka',
    '愛知県' => 'pref-aichi',
    '三重県' => 'pref-mie',
    '滋賀県' => 'pref-shiga',
    '京都府' => 'pref-kyoto',
    '大阪府' => 'pref-osaka',
    '兵庫県' => 'pref-hyogo',
    '奈良県' => 'pref-nara',
    '和歌山県' => 'pref-wakayama',
    '鳥取県' => 'pref-tottori',
    '島根県' => 'pref-shimane',
    '岡山県' => 'pref-okayama',
    '広島県' => 'pref-hiroshima',
    '山口県' => 'pref-yamaguchi',
    '徳島県' => 'pref-tokushima',
    '香川県' => 'pref-kagawa',
    '愛媛県' => 'pref-ehime',
    '高知県' => 'pref-kochi',
    '福岡県' => 'pref-fukuoka',
    '佐賀県' => 'pref-saga',
    '長崎県' => 'pref-nagasaki',
    '熊本県' => 'pref-kumamoto',
    '大分県' => 'pref-oita',
    '宮崎県' => 'pref-miyazaki',
    '鹿児島県' => 'pref-kagoshima',
    '沖縄県' => 'pref-okinawa',
  ];

  return isset($map[$prefecture]) ? $map[$prefecture] : sanitize_title($prefecture);
}

$has_csv = file_exists($csv_path);
$csv_rows = [];
$max_checked = '';

if ($has_csv) {
  $csv_rows = schedule_read_csv_as_assoc($csv_path);

  foreach ($csv_rows as $r) {
    if (!empty($r['checked_date']) && $r['checked_date'] > $max_checked) {
      $max_checked = $r['checked_date'];
    }
  }
}

// 都道府県ごとにまとめる
$grouped = [];
foreach ($csv_rows as $r) {
  $pref = $r['prefecture'] ?? '';
  if ($pref === '') continue;

  if (!isset($grouped[$pref])) {
    $grouped[$pref] = [];
  }
  $grouped[$pref][] = $r;
}
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
  <div class="contents study-method">

    <h2 class="schedule-year-title">年度を選択</h2>

    <nav class="schedule-year-nav" aria-label="年度選択">
      <ul class="schedule-year-nav__list">
        <?php foreach ($available_years as $y): ?>
          <?php
            $is_current = ($year === $y);
            $label = ($y === 2026) ? '2026（最新）' : '2025（参考）';
          ?>
          <li class="schedule-year-nav__item">
            <?php if ($is_current): ?>
              <span class="schedule-year-nav__link is-current"><?php echo esc_html($label); ?></span>
            <?php else: ?>
              <a class="schedule-year-nav__link" href="<?php echo esc_url(schedule_year_url($y)); ?>"><?php echo esc_html($label); ?></a>
            <?php endif; ?>
          </li>
        <?php endforeach; ?>
      </ul>
    </nav>

    <p>
      全国47都道府県で実施される狩猟免許試験の日程を一覧でまとめています。<br>
      申込期間や試験日、会場は都道府県ごとに異なります。必ず公式発表をご確認ください。<br>
      👉 <a href="<?php echo esc_url(home_url('/information/')); ?>">自治体公式リンク集はこちら</a>
    </p>
    <p class="bold"><span class="marker">※日程は変更される場合があります。各都道府県の公式情報を必ず確認してください。</span></p>

    <?php if ($has_csv): ?>

      <h2 class="schedule-year-title">地域から探す</h2>
      <nav class="schedule-year-nav" aria-label="地域選択">
        <ul class="schedule-year-nav__list">
          <?php foreach ($regions as $region_name => $region_data): ?>
            <li class="schedule-year-nav__item">
              <a class="schedule-year-nav__link" href="#<?php echo esc_attr($region_data['anchor']); ?>">
                <?php echo esc_html($region_name); ?>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </nav>

      <?php if (!empty($max_checked)): ?>
        <p class="update">最終更新日：<?php echo esc_html($max_checked); ?></p>
      <?php endif; ?>

      <?php if (empty($csv_rows)): ?>
        <p>現在、この年度のデータは未登録です。（CSVが空です）</p>
      <?php else: ?>

        <?php foreach ($regions as $region_name => $region_data): ?>
          <?php
          $has_region_rows = false;
          foreach ($region_data['prefectures'] as $pref_name) {
            if (!empty($grouped[$pref_name])) {
              $has_region_rows = true;
              break;
            }
          }
          if (!$has_region_rows) continue;
          ?>

          <section class="schedule-block">
            <h2><?php echo esc_html($region_name); ?></h2>

            <div class="schedule-table-wrap table-scroll">
              <table class="schedule-table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>都道府県</th>
                    <th>公式</th>
                    <th>状況</th>
                    <th>申込期間</th>
                    <th>試験日</th>
                    <th>猟の種別</th>
                    <th>会場</th>
                    <th>確認日</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($region_data['prefectures'] as $pref_name): ?>
                    <?php if (empty($grouped[$pref_name])) continue; ?>
                    <?php
                    $pref_rows = $grouped[$pref_name];
                    $rowspan = count($pref_rows);
                    $anchor_id = schedule_pref_anchor($pref_name);
                    ?>

                    <?php foreach ($pref_rows as $index => $r): ?>
                      <tr>
                        <td><?php echo esc_html($r['no'] ?? ''); ?></td>

                        <?php if ($index === 0): ?>
                          <td rowspan="<?php echo esc_attr($rowspan); ?>" id="<?php echo esc_attr($anchor_id); ?>">
                            <?php echo esc_html($pref_name); ?>
                          </td>
                        <?php endif; ?>

                        <td>
                          <?php if (!empty($r['official_url'])): ?>
                            <a href="<?php echo esc_url($r['official_url']); ?>" target="_blank" rel="noopener noreferrer">公式</a>
                          <?php endif; ?>
                        </td>

                        <td>
                          <?php
                          $status = trim($r['status'] ?? '');
                          $status_class = 'status--open';
                          $status_label = '公開済';

                          if ($status === '未公表') {
                            $status_class = 'status--pending';
                            $status_label = '未公表';
                          } elseif ($status === '要確認') {
                            $status_class = 'status--check';
                            $status_label = '要確認';
                          } elseif ($status !== '') {
                            $status_label = $status;
                          }
                          ?>
                          <span class="status <?php echo esc_attr($status_class); ?>"><?php echo esc_html($status_label); ?></span>
                        </td>

                        <td><?php echo nl2br(esc_html($r['application_period'] ?? '—')); ?></td>
                        <td><?php echo nl2br(esc_html($r['exam_date'] ?? '—')); ?></td>
                        <td><?php echo nl2br(esc_html($r['exam_type'] ?? '—')); ?></td>
                        <td><?php echo nl2br(esc_html($r['venue'] ?? '—')); ?></td>
                        <td><?php echo esc_html($r['checked_date'] ?? ''); ?></td>
                      </tr>
                    <?php endforeach; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </section>
        <?php endforeach; ?>

        <p class="bold"><span class="marker">※日程は変更される場合があります。各都道府県の公式情報を必ず確認してください。</span></p>
      <?php endif; ?>

    <?php else: ?>
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
        echo '<p class="bold"><span class="marker">※日程は変更される場合があります。各都道府県の公式情報を必ず確認してください。</span></p>';
        echo '</section>';
      }
      ?>
    <?php endif; ?>

    <?php get_template_part('parts-ads'); ?>

    <h2>よくある質問と注意点</h2>
    <dl class="faq">
      <dt>Q. 狩猟免許試験の日程は毎年変わりますか？</dt>
      <dd>はい。試験日程は都道府県ごとに毎年異なります。必ず公式発表をご確認ください。</dd>

      <dt>Q. 第一種と第二種銃猟で試験日は同じですか？</dt>
      <dd>同日実施の自治体もありますが、別日程になる場合もあります。</dd>

      <dt>Q. 申込方法は都道府県ごとに違いますか？</dt>
      <dd>はい。申請方法・受付期間・必要書類は自治体によって異なります。</dd>

      <dt>Q. 年度の切り替えはどうすればいいですか？</dt>
      <dd>ページ上部の年度リンクから切り替えできます。URLに「?sy=2026」などを指定して表示することも可能です。</dd>

      <dt>Q. 最新の更新日はどこで確認できますか？</dt>
      <dd>ページ上部に「最終更新日」を表示しています。</dd>
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
        "text": "はい。試験日程は都道府県ごとに毎年異なります。必ず公式発表をご確認ください。"
      }
    },
    {
      "@type": "Question",
      "name": "第一種と第二種銃猟で試験日は同じですか？",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "同日実施の自治体もありますが、別日程になる場合もあります。"
      }
    },
    {
      "@type": "Question",
      "name": "申込方法は都道府県ごとに違いますか？",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "はい。申請方法・受付期間・必要書類は自治体によって異なります。"
      }
    },
    {
      "@type": "Question",
      "name": "年度の切り替えはどうすればいいですか？",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "ページ上部の年度リンクから切り替えできます。URLに「?sy=2026」などを指定して表示することも可能です。"
      }
    },
    {
      "@type": "Question",
      "name": "最新の更新日はどこで確認できますか？",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "ページ上部に最終更新日を表示しています。"
      }
    }
  ]
}
</script>

<?php get_footer(); ?>