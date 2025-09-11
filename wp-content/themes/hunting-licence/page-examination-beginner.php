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
      <dt>Q. なぜハーフライフルの扱いが変わったのですか？</dt>
      <dd>→ 中野市の事件をはじめとする銃関連の社会的問題を受け、安全対策として銃の管理基準が見直されたことがきっかけです。</dd>

      <dt>Q. ハーフライフルはどんな銃ですか？</dt>
      <dd>→ 散弾銃の一種で、銃身の一部にライフリング（旋条）が刻まれており、命中精度が高くなっています。</dd>

      <dt>Q. 法改正で何が変わったのですか？</dt>
      <dd>→ 銃身の5分の1以上に旋条があるものはライフル扱いとなり、所持には原則10年の猟歴が必要になりました。</dd>

      <dt>Q. 所持していたハーフライフルはどうなる？</dt>
      <dd>→ 経過措置により、すでに許可を得ている人は継続して所持可能ですが、更新時にはライフル基準が適用されます。</dd>

      <dt>Q. 北海道にだけ特例があるのはなぜ？</dt>
      <dd>→ エゾシカの大量生息やヒグマ対策など地域の特殊性に配慮され、市町村長の推薦書などで特例が適用されています。</dd>

      <dt>Q. 他県でも特例が適用されますか？</dt>
      <dd>→ 現時点では北海道のみが制度上明文化されています。他県では明確な特例措置はありません。</dd>

      <dt>Q. 初心者はライフルを所持できますか？</dt>
      <dd>→ できません。ライフル所持には原則10年以上の散弾銃所持歴が必要です。</dd>

      <dt>Q. ハーフライフルを今から取得するには？</dt>
      <dd>→ 散弾銃の所持歴と射撃実績、猟友会からの推薦が必要です。一般ライフルと同等の手続きが求められます。</dd>

      <dt>Q. 今後さらに法改正はありますか？</dt>
      <dd>→ 今回の改正が試験的な側面もあるため、今後も社会状況や実施状況を見て見直しされる可能性があります。</dd>

      <dt>Q. 詳しい情報はどこで確認できますか？</dt>
      <dd>→ 警察庁や都道府県警の生活安全課、または<a href="https://www.shuryo-menkyo.com/rifle-revision/" target="_blank" rel="noopener">当サイトの特設解説ページ</a>をご確認ください。</dd>
    </dl>

    <?php get_template_part('parts-connection-gun'); ?>
  </div>
</div>

<?php
// ========== FAQの構造化データ ==========
$faq = [
  "@context" => "https://schema.org",
  "@type" => "FAQPage",
  "mainEntity" => [
    [
      "@type" => "Question",
      "name" => "なぜハーフライフルの扱いが変わったのですか？",
      "acceptedAnswer" => [
        "@type" => "Answer",
        "text" => "中野市の事件をはじめとする銃関連の社会的問題を受け、安全対策として銃の管理基準が見直されたことがきっかけです。"
      ]
    ],
    [
      "@type" => "Question",
      "name" => "ハーフライフルはどんな銃ですか？",
      "acceptedAnswer" => [
        "@type" => "Answer",
        "text" => "散弾銃の一種で、銃身の一部にライフリング（旋条）が刻まれており、命中精度が高くなっています。"
      ]
    ],
    [
      "@type" => "Question",
      "name" => "法改正で何が変わったのですか？",
      "acceptedAnswer" => [
        "@type" => "Answer",
        "text" => "銃身の5分の1以上に旋条があるものはライフル扱いとなり、所持には原則10年の猟歴が必要になりました。"
      ]
    ],
    [
      "@type" => "Question",
      "name" => "所持していたハーフライフルはどうなる？",
      "acceptedAnswer" => [
        "@type" => "Answer",
        "text" => "経過措置により、すでに許可を得ている人は継続して所持可能ですが、更新時にはライフル基準が適用されます。"
      ]
    ],
    [
      "@type" => "Question",
      "name" => "北海道にだけ特例があるのはなぜ？",
      "acceptedAnswer" => [
        "@type" => "Answer",
        "text" => "エゾシカの大量生息やヒグマ対策など地域の特殊性に配慮され、市町村長の推薦書などで特例が適用されています。"
      ]
    ],
    [
      "@type" => "Question",
      "name" => "他県でも特例が適用されますか？",
      "acceptedAnswer" => [
        "@type" => "Answer",
        "text" => "現時点では北海道のみが制度上明文化されています。他県では明確な特例措置はありません。"
      ]
    ],
    [
      "@type" => "Question",
      "name" => "初心者はライフルを所持できますか？",
      "acceptedAnswer" => [
        "@type" => "Answer",
        "text" => "できません。ライフル所持には原則10年以上の散弾銃所持歴が必要です。"
      ]
    ],
    [
      "@type" => "Question",
      "name" => "ハーフライフルを今から取得するには？",
      "acceptedAnswer" => [
        "@type" => "Answer",
        "text" => "散弾銃の所持歴と射撃実績、猟友会からの推薦が必要です。一般ライフルと同等の手続きが求められます。"
      ]
    ],
    [
      "@type" => "Question",
      "name" => "今後さらに法改正はありますか？",
      "acceptedAnswer" => [
        "@type" => "Answer",
        "text" => "今回の改正が試験的な側面もあるため、今後も社会状況や実施状況を見て見直しされる可能性があります。"
      ]
    ],
    [
      "@type" => "Question",
      "name" => "詳しい情報はどこで確認できますか？",
      "acceptedAnswer" => [
        "@type" => "Answer",
        "text" => "警察庁や都道府県警の生活安全課、またはhttps://www.shuryo-menkyo.com/rifle-revision/（当サイトの特設解説ページ）をご確認ください。"
      ]
    ],
  ]
];
?>
<script type="application/ld+json"><?php echo wp_json_encode($faq, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES); ?></script>

<?php get_footer(); ?>
