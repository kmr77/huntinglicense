<?php
/*
Template Name: 狩猟免許 試験日程ページ（年度別）
*/
get_header();

// 年度パラメータ取得（例：?year=2026）
// ✅ デフォルトは最新年度：2026
$year = isset($_GET['year']) ? intval($_GET['year']) : 2026;

// 表示対象年度（ハブUI用）…「2026 / 2025 まで」
$available_years = [2026, 2025];

// 変な値が来たときの安全策：許可年度以外はデフォルトへ戻す
if (!in_array($year, $available_years, true)) {
  $year = 2026;
}

// データディレクトリのパス
$dir = get_template_directory() . "/schedule-list/{$year}/";

// ✅ CSV（狩猟免許試験）正本ファイル
$csv_path = $dir . "hunting-license.csv";

// 都道府県スラッグと表示名（従来方式の互換用）
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

/**
 * CSVヘッダーをキーとして1行ずつ連想配列にして読み込む（事故防止強め）
 * - BOM除去
 * - ヘッダーtrim + lowercase
 * - 列数不一致行はスキップ
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

  // BOM除去（1列目）
  if (isset($header[0])) {
    $header[0] = preg_replace('/^\xEF\xBB\xBF/', '', $header[0]);
  }

  $keys = [];
  foreach ($header as $h) {
    $keys[] = strtolower(trim((string)$h));
  }

  while (($data = fgetcsv($fp)) !== false) {
    if (count($data) !== count($keys)) continue;

    $row = [];
    foreach ($keys as $i => $k) {
      $row[$k] = isset($data[$i]) ? trim((string)$data[$i]) : '';
    }
    $rows[] = $row;
  }

  fclose($fp);
  return $rows;
}

// CSVがあるか（新方式）
$has_csv = file_exists($csv_path);

// CSV読込
$csv_rows = [];
$max_checked = '';
if ($has_csv) {
  $csv_rows = schedule_read_csv_as_assoc($csv_path);

  // last_checked 最大値（YYYY-MM-DD前提）
  foreach ($csv_rows as $r) {
    if (!empty($r['last_checked']) && $r['last_checked'] > $max_checked) {
      $max_checked = $r['last_checked'];
    }
  }
}

// 年度リンクURL生成
function schedule_year_url($y) {
  // /schedule/ を基点にする想定（固定ページのURLが /schedule/ である前提）
  // もし違う場合は、このURL生成だけあなたの実URLに合わせて変更してください。
  return home_url('/schedule/?year=' . intval($y));
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

    <!-- ✅ 年度ハブUI（2026 / 2025のみ） -->
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
      <!-- ✅ 新方式：CSV一覧表示（2026想定） -->
      <?php if (!empty($max_checked)): ?>
        <p class="update">最終更新日：<?php echo esc_html($max_checked); ?></p>
      <?php endif; ?>

      <?php if (empty($csv_rows)): ?>
        <p>現在、この年度のデータは未登録です。（CSVが空です）</p>
      <?php else: ?>
        <div class="schedule-table-wrap table-scroll">
          <table class="schedule-table ">
            <thead>
              <tr>
                <th>No</th>
                <th>都道府県</th>
                <th>状況</th>
                <th>申込期間</th>
                <th>試験日</th>
                <th>会場</th>
                <th>公式</th>
                <th>確認日</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($csv_rows as $r): ?>
                <?php
                  $no = $r['no'] ?? '';
                  $pref = $r['pref'] ?? '';
                  $status = trim($r['status'] ?? '');

                  $apply_start = $r['apply_start'] ?? '';
                  $apply_end   = $r['apply_end'] ?? '';
                  $apply = '';
                  if ($apply_start !== '' || $apply_end !== '') {
                    $apply = $apply_start . '〜' . $apply_end;
                  }

                  $exam_date = str_replace('|', ' / ', $r['exam_date'] ?? '');
                  $venue = str_replace('|', ' / ', $r['venue'] ?? '');
                  $url = $r['official_url'] ?? '';
                  $checked = $r['last_checked'] ?? '';

                  // status正規化
                  $status_class = 'status--open';
                  $status_label = '公開済';
                  if ($status === '未公表') {
                    $status_class = 'status--pending';
                    $status_label = '未公表';
                  } elseif ($status === '要確認') {
                    $status_class = 'status--check';
                    $status_label = '要確認';
                  } elseif ($status !== '') {
                    $status_label = $status; // 独自表記が入っていたらそのまま
                    $status_class = 'status--open';
                  }
                ?>
                <tr>
                  <td><?php echo esc_html($no); ?></td>
                  <td><?php echo esc_html($pref); ?></td>
                  <td><span class="status <?php echo esc_attr($status_class); ?>"><?php echo esc_html($status_label); ?></span></td>
                  <td><?php echo esc_html($apply); ?></td>
                  <td><?php echo esc_html($exam_date); ?></td>
                  <td><?php echo esc_html($venue); ?></td>
                  <td>
                    <?php if (!empty($url)): ?>
                      <a href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener">公式</a>
                    <?php endif; ?>
                  </td>
                  <td><?php echo esc_html($checked); ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

        <p class="bold"><span class="marker">※日程は変更される場合があります。各都道府県の公式情報を必ず確認してください。</span></p>
      <?php endif; ?>

    <?php else: ?>
      <!-- ✅ 旧方式：都道府県PHP include（2025互換） -->
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
      <dd>ページ上部の年度リンクから切り替えできます。URLに「?year=2026」などを指定して表示することも可能です。</dd>

      <dt>Q. 最新の更新日はどこで確認できますか？</dt>
      <dd>ページ上部に「最終更新日」を表示しています（CSVに記録された確認日の最大値）。</dd>
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
        "text": "ページ上部の年度リンクから切り替えできます。URLに「?year=2026」などを指定して表示することも可能です。"
      }
    },
    {
      "@type": "Question",
      "name": "最新の更新日はどこで確認できますか？",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "ページ上部に「最終更新日」を表示しています（CSVに記録された確認日の最大値）。"
      }
    }
  ]
}
</script>

<?php get_footer(); ?>
