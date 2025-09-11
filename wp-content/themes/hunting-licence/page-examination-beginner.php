<?php
/*
Template Name: 猟銃等講習会（初心者）リンク集
*/
get_header(); ?>

<div class="inner">
  <?php get_template_part('parts-breadcrumb'); ?>
</div>
</div>

<div class="main-visual schedule">
  <div class="inner">
    <h1>猟銃等講習会（初心者）｜申込手順と【47都道府県】日程リンク一覧</h1>
    <p class="lead">
      猟銃等講習会（初心者）は、銃砲所持許可取得の最初の関門です。開催情報は各都道府県警の公式サイトで随時更新されるため、
      本ページでは公式の「日程・会場」ページを地域ごとに整理して掲載します。
    </p>
    <p class="lead">
      ※申込は原則として住所地の所轄警察署（生活安全課）で行います。
    </p>
    <div class="cta-btns">
      <a class="btn" href="<?php echo home_url('/category/examination/'); ?>">初心者考査の過去問へ</a>
      <a class="btn sub" href="<?php echo home_url('/gun-cost/'); ?>">所持許可の費用まとめ</a>
    </div>
  </div>
</div>

<div class="contents study-method">
  <div class="inner">

    <h2>猟銃等講習会とは？</h2>
    <p>
      猟銃等講習会は、銃砲刀剣類所持等取締法に基づき、銃を新たに所持する前に必ず受講しなければならない重要なステップです。
      初心者講習は銃の所持経験がない人を対象に設けられており、法律の基礎知識から銃の安全な取り扱い、射撃時のマナーに至るまで幅広く学びます。
    </p>
    <p>
      ここで得られる知識は単なる試験合格のためではなく、事故防止や社会的責任を理解するために欠かせません。
      講習を修了し、考査に合格すると交付される「講習修了証明書」は3年間有効で、この証明書がなければ銃の所持許可申請に進むことはできません。
    </p>

    <h2>当日の流れ</h2>
    <p>
      当日はまず受付から始まります。受講者は住民票や証明写真、手数料、印鑑などを提出して本人確認を受けます。
      その後、数時間にわたり座学形式で講義が行われます。
    </p>
    <p>
      講習内容は、銃刀法や鳥獣保護管理法といった関連法令、安全な銃の操作方法、過去に発生した事故例とその教訓、
      さらには猟銃所持者として求められる倫理観など多岐にわたります。
    </p>
    <p>
      最後に50問の択一試験が行われ、70％以上の正答で合格です。結果は当日中に通知され、合格者には「講習修了証明書」が手渡されます。
    </p>

    <h2>費用と時間</h2>
    <p>
      受講料は全国的にほぼ統一されており、6,800円前後で設定されている県が大半です。所要時間は半日から長くても1日程度で、
      午前中に受付と講義、午後に考査と結果発表が行われる流れが一般的です。
    </p>
    <p>
      会場は警察本部や地域の警察署の会議室が中心ですが、地域によっては市民ホールや射撃場に併設された施設が利用されることもあります。
      地方によって開催回数に差があり、都市部は複数回、地方は年数回程度の開催に限られるケースもあります。
    </p>
    <p>
      受講を希望する場合は早めの申し込みが安心です。直近の開催が埋まっている場合、次回開催までの待機期間が長くなることもあります。
    </p>

    <h2>不合格になった場合</h2>
    <p>
      考査で70％に届かず不合格となった場合は、再度講習を受け直す必要があります。再受講の際には受講料も再度納付しなければならず、負担は小さくありません。
    </p>
    <p>
      県警によっては次回の開催まで数か月待たなければならない場合もあり、受講計画全体が遅れることになります。
      一度で合格できるよう、過去問演習を繰り返し、最新の法令改正点を確認しておくことが有効です。
    </p>

    <h2>よくある注意点</h2>
    <p>
      猟銃等講習会は誰でも受けられますが、細かい注意点が多いため準備が欠かせません。特に都市部では募集定員が早期に埋まってしまうことがあり、
      申込開始日に窓口へ行く必要があります。
    </p>
    <p>
      住所変更直後の場合、住民票が最新情報に更新されていないと手続きが進まないこともあります。
      また、会場によっては昼休憩中の外出を禁止している場合があるため、昼食は持参した方が安心です。
    </p>
    <p>
      さらに、申込時に「狩猟目的」「競技射撃目的」などを聞かれることがあり、目的に応じた回答が求められることもあります。
      事前に自分の目的を整理しておくとスムーズです。
    </p>

    <h2>合格後の流れ</h2>
    <p>
      講習修了証明書を得たからといってすぐに銃が持てるわけではありません。次のステップは「教習資格認定」申請です。
      ここでは医師の診断書や保証人の確保、警察による身辺調査が行われます。
    </p>
    <p>
      認定を受けた後、射撃教習を経て、初めて銃砲所持許可の申請が可能となります。散弾銃か空気銃かによっても必要な手続きや費用は異なり、
      申請の難易度も変わります。
    </p>
    <p>
      猟銃等講習会の合格はスタートラインに過ぎず、実際の銃所持までには複数の関門があることを理解しておく必要があります。
    </p>

    <h2>【47都道府県】公式スケジュールリンク</h2>
    <?php
    // ========== ヘルパー ==========
    if (!function_exists('jp_url_encode')) {
      function jp_url_encode($url) {
        if (!$url) return $url;
        $p = wp_parse_url($url);
        if (!$p || empty($p['host'])) return $url;
        $scheme = isset($p['scheme']) ? $p['scheme'].'://' : '';
        $host   = $p['host'] ?? '';
        $port   = isset($p['port']) ? ':'.$p['port'] : '';
        $path = '';
        if (isset($p['path'])) {
          $leading_slash = function_exists('str_starts_with') ? str_starts_with($p['path'], '/') : (substr($p['path'], 0, 1) === '/');
          $segs = explode('/', $p['path']);
          $segs = array_map(function($s){ return rawurlencode(rawurldecode($s)); }, $segs);
          $path = implode('/', $segs);
          if ($leading_slash) $path = '/'.$path;
        }
        $query = '';
        if (!empty($p['query'])) {
          $arr = [];
          parse_str($p['query'], $arr);
          $query = '?'.http_build_query($arr, '', '&', PHP_QUERY_RFC3986);
        }
        $frag = !empty($p['fragment']) ? '#'.rawurlencode(rawurldecode($p['fragment'])) : '';
        return $scheme.$host.$port.$path.$query.$frag;
      }
    }

    // ========== CSV読み込み ==========
    $csv_path = get_stylesheet_directory() . '/schedule-list/2025/gun-beginner.csv';
    $rows = [];
    if (file_exists($csv_path)) {
      if (($handle = fopen($csv_path, 'r')) !== false) {
        $header = fgetcsv($handle);
        if ($header) {
          if (isset($header[0])) $header[0] = preg_replace('/^\xEF\xBB\xBF/', '', $header[0]); // BOM除去
          $header = array_map(function($h){ return is_string($h) ? trim($h) : $h; }, $header);
        }
        while (($data = fgetcsv($handle)) !== false) {
          if (count($data) !== count($header)) continue; // 列ズレ保護
          $data = array_map(function($v){ return is_string($v) ? trim($v) : $v; }, $data);
          $row  = array_combine($header, $data);
          if ($row && !empty($row['pref_code'])) $rows[] = $row;
        }
        fclose($handle);
      }
    }

    $region_order = ['北海道','東北','関東','中部','近畿','中国','四国','九州・沖縄'];
    $grouped = [];
    foreach ($rows as $r) {
      $grouped[$r['region']][] = $r;
    }
    ?>
    <div class="region-table">
      <div class="region-table__head">
        <div class="col-region">地域</div>
        <div class="col-prefs">都道府県</div>
      </div>
      <?php foreach ($region_order as $region) :
        if (empty($grouped[$region])) continue;
        $links = [];
        foreach ($grouped[$region] as $item) {
          $pref = $item['pref_name'];
          $url  = $item['url'];
          $links[] = sprintf(
            '<a class="pref-link ext" href="%s" target="_blank" rel="noopener">%s</a>',
            esc_url(jp_url_encode($url)),
            esc_html($pref)
          );
        } ?>
        <div class="region-table__row">
          <div class="col-region"><span><?php echo esc_html($region); ?></span></div>
          <div class="col-prefs"><?php echo implode('<span class="sep"> ｜ </span>', $links); ?></div>
        </div>
      <?php endforeach; ?>
    </div>

    <h2>よくある質問</h2>
    <dl>
      <dt>Q. 講習修了証明書の有効期限は？</dt>
      <dd>→ 3年間有効です。有効期限が切れると所持許可申請の前提を満たせなくなるため、再受講が必要になります。</dd>

      <dt>Q. 受講料はいくらですか？</dt>
      <dd>→ 目安は6,800円前後です。地域差がわずかにあるため、必ず各都道府県警の案内で最新額を確認してください。</dd>

      <dt>Q. 申し込みはどこで行いますか？</dt>
      <dd>→ 原則として住所地を管轄する警察署（生活安全課）で行います。窓口受付のほか、県によっては一部オンライン手続に対応しています。</dd>

      <dt>Q. 当日の持ち物は？</dt>
      <dd>→ 住民票、証明写真、手数料、印鑑、筆記用具など。必要書類は県警により異なるため、案内ページの指定に従ってください。</dd>

      <dt>Q. どんな服装が良いですか？</dt>
      <dd>→ 長時間の座学になるため、静かで動きやすい服装が無難です。会場によっては冷暖房の効きが強い場合があるため、羽織り物があると安心です。</dd>

      <dt>Q. 試験（考査）の形式と合格基準は？</dt>
      <dd>→ 択一式50問が一般的で、70％以上の正答で合格です。出題は法令・安全管理・事故防止・モラルなど基礎が中心です。</dd>

      <dt>Q. 不合格になった場合は？</dt>
      <dd>→ 再受講が必要です。受講料は再度納付となり、次回開催まで待つ必要があります。過去問演習と改正点の確認が有効です。</dd>

      <dt>Q. 昼食や休憩はどうなりますか？</dt>
      <dd>→ 会場やタイムテーブルによります。外出不可の会場もあるため、弁当持参が推奨です。案内の注意事項を事前に確認しましょう。</dd>

      <dt>Q. 申込時に目的（狩猟・競技）を聞かれる？</dt>
      <dd>→ 県によっては確認されます。今後の手続や指導内容が変わることがあるため、想定する目的を整理しておくとスムーズです。</dd>

      <dt>Q. 合格後はすぐ銃を所持できますか？</dt>
      <dd>→ いいえ。教習資格認定→射撃教習→所持許可申請という段階を踏みます。診断書・保証人・身辺調査などの準備が必要です。</dd>
    </dl>


    <?php get_template_part('parts-connection-gun'); ?>
  </div>
</div>

<?php
$faq = [
  "@context" => "https://schema.org",
  "@type" => "FAQPage",
  "mainEntity" => [
    [
      "@type" => "Question",
      "name" => "講習修了証明書の有効期限は？",
      "acceptedAnswer" => [
        "@type" => "Answer",
        "text" => "3年間有効です。有効期限が切れると所持許可申請の前提を満たせなくなるため、再受講が必要になります。"
      ]
    ],
    [
      "@type" => "Question",
      "name" => "受講料はいくらですか？",
      "acceptedAnswer" => [
        "@type" => "Answer",
        "text" => "目安は6,800円前後です。地域差がわずかにあるため、必ず各都道府県警の案内で最新額を確認してください。"
      ]
    ],
    [
      "@type" => "Question",
      "name" => "申し込みはどこで行いますか？",
      "acceptedAnswer" => [
        "@type" => "Answer",
        "text" => "原則として住所地を管轄する警察署（生活安全課）で行います。窓口受付のほか、県によっては一部オンライン手続に対応しています。"
      ]
    ],
    [
      "@type" => "Question",
      "name" => "当日の持ち物は？",
      "acceptedAnswer" => [
        "@type" => "Answer",
        "text" => "住民票、証明写真、手数料、印鑑、筆記用具など。必要書類は県警により異なるため、案内ページの指定に従ってください。"
      ]
    ],
    [
      "@type" => "Question",
      "name" => "どんな服装が良いですか？",
      "acceptedAnswer" => [
        "@type" => "Answer",
        "text" => "長時間の座学になるため、静かで動きやすい服装が無難です。会場によっては冷暖房の効きが強い場合があるため、羽織り物があると安心です。"
      ]
    ],
    [
      "@type" => "Question",
      "name" => "試験（考査）の形式と合格基準は？",
      "acceptedAnswer" => [
        "@type" => "Answer",
        "text" => "択一式50問が一般的で、70％以上の正答で合格です。出題は法令・安全管理・事故防止・モラルなど基礎が中心です。"
      ]
    ],
    [
      "@type" => "Question",
      "name" => "不合格になった場合は？",
      "acceptedAnswer" => [
        "@type" => "Answer",
        "text" => "再受講が必要です。受講料は再度納付となり、次回開催まで待つ必要があります。過去問演習と改正点の確認が有効です。"
      ]
    ],
    [
      "@type" => "Question",
      "name" => "昼食や休憩はどうなりますか？",
      "acceptedAnswer" => [
        "@type" => "Answer",
        "text" => "会場やタイムテーブルによります。外出不可の会場もあるため、弁当持参が推奨です。案内の注意事項を事前に確認しましょう。"
      ]
    ],
    [
      "@type" => "Question",
      "name" => "申込時に目的（狩猟・競技）を聞かれる？",
      "acceptedAnswer" => [
        "@type" => "Answer",
        "text" => "県によっては確認されます。今後の手続や指導内容が変わることがあるため、想定する目的を整理しておくとスムーズです。"
      ]
    ],
    [
      "@type" => "Question",
      "name" => "合格後はすぐ銃を所持できますか？",
      "acceptedAnswer" => [
        "@type" => "Answer",
        "text" => "いいえ。教習資格認定→射撃教習→所持許可申請という段階を踏みます。診断書・保証人・身辺調査などの準備が必要です。"
      ]
    ],
  ]
];
?>
<script type="application/ld+json"><?php echo wp_json_encode($faq, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES); ?></script>

<?php get_footer(); ?>
