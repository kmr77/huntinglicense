# サイト構成資料・Codex運用基準

## このファイルの役割

このファイルはCodexがサイト全体の構成を把握するための基準資料。新しいCodexチャットでは作業前に読む。実サイトと記載に差異があれば実環境を再調査し、実環境を正とする。サイト構成、DB構造、ACF、主要処理、主要ファイルの役割に恒久的な変更があった場合だけ更新する。単純な文言変更など、構成に影響しない変更では無理に更新しない。

## 作業・ログの運用

1. このファイルと `TODO.md` を読む。必要に応じて `DECISIONS.md` と関連する過去ログも読む。
2. 変更前にGitのブランチ、staged・modified・untracked・deleted、既存diffを調べ、作業前からの変更を区別する。
3. 作業対象の実ファイルを確認し、必要最小限だけ変更する。既存変更を破棄・上書きせず、無関係な整理や修正をしない。
4. Codex側で可能な動作確認を行い、`git diff` / `git status` で最終差分を確認する。
5. `TODO.md` と `CHANGELOG.md` を更新する。構成・主要仕様が恒久的に変わった場合だけ本資料を、重要な設計判断が生じた場合だけ `DECISIONS.md` を更新する。
6. サイト変更や管理体制変更の作業完了時に `_codex/logs/` へ新規ログを追加する。過去ログは上書きしない。

ログ名は `YYYY-MM-DD_HHMM_作業内容.md`（日本時間）。同分に複数作業する場合は作業内容の識別子を変えて衝突を避ける。ログには作業名、日時、目的、作業開始前のGit状態と既存差分、変更ファイル、変更内容、DB操作、実施した確認、Git差分、TODO・CHANGELOG・本資料・DECISIONSの更新有無、未確認事項、残課題を記す。確認していない内容は確認済みと書かない。認証情報、秘密鍵、APIキー、ユーザー個人情報を資料やログに残さない。DB更新、WordPress設定・プラグイン変更、Git reset / checkout / commit / pushは依頼された場合のみ行う。

## 調査基準

- 調査日時: 2026-09-26 15:13〜15:16 JST。
- 管理体制の更新日時: 2026-09-26 15:33 JST。下記のサイト実体に関する数値・バージョン・主要ファイルの存在を読み取りで再確認した。
- テーマの現在状態確認: 2026-09-27 08:38 JST。ローカルに試験的に作られた `functions.php` の削除後に確認。
- 学習記録・復習ページのURL確認: 2026-10-01 JST。両固定ページの公開とHTTP 200を確認。下記の2026-09-30時点の未作成記録より新しい状態。
- WordPressルート: `/Applications/MAMP/htdocs/huntinglicense`。ローカルURLは `http://localhost:8888/huntinglicense/`（HTTP HEAD 200を確認）。
- 調査方法: テーマ実ファイル、WordPressを読み込むPHP CLI、DBの `SELECT` / `SHOW TABLES` / `DESCRIBE`、ローカルHTTPのHEAD。DBへの書き込みは行っていない。
- 有効テーマ: `hunting-licence`（表示名 `Hunting Licence`）。親・子テーマ設定とも同じスラッグ。
- バージョン: WordPress 6.8.2、PHP 8.3.14（MAMP CLIとHTTP応答）、DBサーバーの `SELECT VERSION()` は MySQL 8.0.40。
- WordPressの表示設定: `show_on_front=posts`。公開投稿781件、公開固定ページ50件（調査時点）。

## ルートとテーマの構成

```text
huntinglicense/
├── wp-admin/                 WordPress管理画面
├── wp-includes/              WordPress本体ライブラリ
├── wp-content/
│   ├── plugins/              プラグイン
│   ├── themes/hunting-licence/
│   │   ├── home.php, header.php, footer.php
│   │   ├── function.php
│   │   ├── category-*.php, tag-*.php, single.php, page-*.php
│   │   ├── parts-*.php, css/, img/, schedule-list/, common.js, style.css
│   ├── uploads/              アップロード
│   └── languages/            翻訳
└── _codex/
    ├── SITE-STRUCTURE.md     現在のサイト構成
    ├── TODO.md               未完了の作業と進捗
    ├── CHANGELOG.md          完了した変更の要約
    ├── DECISIONS.md          維持する設計判断と理由
    └── logs/                 作業ごとの詳細ログ
```

テーマ内の `img/animal/` と `img/question/` に問題画像、`schedule-list/2025/` と `schedule-list/2026/` に日程データがある。テーマ内に `functions.php`（複数形）は存在しない。`function.php`（単数形）にはテーマ設定・スタイル登録・タグ一覧件数用の関数定義があるが、WordPressの標準自動読込名ではなく、テーマ内で同ファイルを読み込む記述も見つかっていないため、現状はそれらが実行される前提にしない。

## 主要PHPファイルと役割

| ファイル | 役割 |
| --- | --- |
| `function.php` | テーマサポート、スタイル登録、タグ一覧件数を定義しているが、現在は自動読込対象ではない。 |
| `header.php` / `footer.php` | 共通ヘッダー・フッター、SEOメタ、CSS/JS読込、ナビゲーション。 |
| `home.php` | 投稿一覧をトップに設定したホーム画面。分野・試験への導線と件数表示。 |
| `category-all.php`、`category-laws.php`、`category-type1.php`、`category-type2.php`、`category-wana.php`、`category-ami.php` | 分野別の通常問題一覧、ページ送り、選択肢・解答の開閉。 |
| `category-animals.php`、`category-animals-judge.php`、`category-examination.php`、`category-numbers.php` | 鳥獣、イラスト判別、猟銃等講習会、数字問題の一覧。 |
| `category.php` / `archive.php` / `index.php` | 汎用のカテゴリ・アーカイブ・最終フォールバック。`experience` は `category.php` を使用。 |
| `tag-license.php`、`tag-examination.php`、`tag-hunting-ok.php`、`tag-hunting-ng.php`、`tag.php` | 指定タグ別の一覧と汎用タグ一覧。 |
| `single.php` / `single-experience.php` | 投稿詳細。体験談カテゴリは `single.php` から体験談用ファイルを読み込む。 |
| `single-question.php` | 問題詳細用のファイルも存在。ただしDBの公開投稿は `post` 型で、テーマ内に `question` 投稿タイプの登録は見つからない。現行の通常投稿詳細は `single.php`。 |
| `page-mock-exam.php` | 模擬試験のページテンプレート。出題抽選、回答形式判定、HTML出力、ページ内JSによる採点。 |
| `page-study-record.php` / `page-review.php` | 学習記録と問題単位の復習テンプレート。2026-10-01時点で対応する公開固定ページあり。スラッグによるWordPressのテンプレート階層で選択される。 |
| `page-schedule.php` / `page-schedule-detail.php` | 試験日程CSVの表示と詳細用テンプレート。後者を選択した公開ページは今回のDB調査では見つからない。 |
| `page-experience.php` / `page-contact.php` / `page.php` | 体験談一覧、問い合わせ、汎用固定ページ。 |
| `page-examination*.php`、`page-gun*.php`、`page-license*.php`、その他 `page-*.php` | 猟銃・免許・受験手続き等の個別記事テンプレート。適用先は下記のURL対応を参照。 |
| `parts-breadcrumb.php`、`parts-category-*.php`、`parts-random*.php`、`parts-ads*.php`、`parts-connection*.php` | パンくず、カテゴリ導線、ランダム表示、広告、関連記事などの共通部品。 |

## CSS・JavaScript

| ファイル | 主な用途 |
| --- | --- |
| `style.css` | テーマ識別情報と基本スタイル。 |
| `css/reset.css` | リセット。 |
| `css/common.css` | 共通レイアウトとナビゲーション。 |
| `css/question.css` | 固定ページ・カテゴリ・投稿・タグ画面の問題表示。 |
| `css/top.css` | トップ、各種一覧・固定ページのスタイル。 |
| `css/schedule.css` | `page-schedule-detail.php` 適用ページで追加読込。 |
| `css/category-mock-link.css` | カテゴリから模擬試験への導線用のCSSファイル。テーマPHP内にこのファイルを読み込む記述は見つからない。 |
| `common.js` | ハンバーガーメニュー、モーダル、アコーディオン等。`footer.php` から読込。 |
| `learning-progress.js` | `localStorage` の問題履歴・模擬試験履歴・目標日、集計、学習記録と復習ページの画面処理。通常問題では読み込まず、`footer.php` から対象画面で読込。 |
| `css/study-record.css` | 学習記録・復習・模擬試験タイマー。通常問題では読み込まず、`header.php` から対象画面で読込。 |
| `page-mock-exam.php` 内のJS | 模擬試験の進行、選択・採点、結果と解説の表示。独立したJSファイルではない。 |

`header.php` はGoogle配信のjQuery、外部アイコン、広告・計測用スクリプトも読み込む。ここにはサービス識別子を転記しない。

## 問題データと表示処理

- 通常問題はWordPress標準の `post`。タイトルの保存元は `wp_posts.post_title`。`the_title()` / `get_the_title()` で表示する。ACFにも `title` フィールドがあるが、調査した通常の一覧・詳細・模擬試験の問題文タイトル取得元は投稿タイトル。
- 問題番号はACF `no`（`wp_postmeta`）で、一覧の `問N` は画面内の連番。カテゴリ画面には別途 `問題番号.` + `no` を表示する箇所がある。タイトル先頭の元資料番号を除く公開側の処理は現在未実装。
- 通常のカテゴリテンプレートは `WP_Query` で対象カテゴリの投稿を取り、`the_title()`、`the_field('no')`、`select_a/i/u`、`answer`、`answer_body` を出力。ページ送りや `?random=1` による順序変更がある。`common.js` がアコーディオンを制御する。
- 投稿詳細 `single.php` はカテゴリにより選択肢を隠す。`animals-judge` は `habitat`、`habit`、`features`、`type` も表示。問題画像は `no` に基づく `img/question/<no>.avif` または `img/animal/<no>.avif` の存在を確認して表示。
- 模擬試験 `page-mock-exam.php` は固定ページのスラッグ・親子関係からモードを決め、`shuryo_mock_random_ids()` でカテゴリまたは `protection` タグからランダム抽選し、`shuryo_mock_post_to_question()` で投稿タイトル・ACF項目・画像・正解形式をまとめる。3択、画像内3択、○×を扱う。回答と採点はページ内JS。本番形式30問は法令13、免許別猟具6、鳥獣9、保護管理2。選択済み投稿IDを除外して重複を避ける。
- 模擬試験ページは共通テンプレート内で `parts-ads.php` を2回読み込む。TOP・本番形式の親ページは説明直後と一覧・選択カード後、出題ページは試験説明カード後と採点結果セクション後。問題ループ・回答フォームの内側に広告は置かない。

### ACFフィールド（DB上のフィールドグループ定義）

| グループ・適用先 | フィールド名 |
| --- | --- |
| 過去問・`post` | `no`, `title`, `select_a`, `select_i`, `select_u`, `answer`, `answer_body`, `custom_title`, `custom_description`, `answer_ai`, `commentary_note`, `related_keyword`, `habitat`, `features`, `habit`, `type`, `judge`, `image` |
| 体験談・`experience` カテゴリ | `exp_title`, `exp_description` |
| 固定ページ・defaultおよび多数の指定テンプレート | `custom_title`, `custom_description` |

公開投稿で存在を確認した主要な非内部 `meta_key` は `no`、`answer`、`answer_body`、`select_a`、`select_i`、`select_u`、`custom_title`、`custom_description`、`image`、`answer_ai`、`habitat`、`habit`、`features`、`type`、`judge`、`commentary_note`、`related_keyword`、`exp_title`、`exp_description`。すべての投稿にすべてのキーがあるわけではない。

## カテゴリとタグ

カテゴリ（スラッグ、調査時の公開件数）: `all` 過去問全て(700)、`laws` 法令問題(108)、`type1` 銃猟一種問題(54)、`type2` 銃猟二種問題(36)、`wana` わな猟問題(31)、`ami` 網猟問題(28)、`animals` 鳥獣識別問題(172)、`animals-judge` 鳥獣識別イラスト(70)、`examination` 猟銃等講習会 考査問題(279)、`numbers` 数字問題(47)、`experience` 体験談(11)、`none` 未分類(0)。カテゴリは投稿に重複して付くため件数の単純合計は投稿総数にならない。

タグ（調査時に登録されている全スラッグ）: `age40`, `age50`, `trap-license`, `employee`, `protection`, `woman`, `woman-hunter`, `student`, `shotgun`, `harmful-extermination`, `harmful`, `forestry`, `hunting-farming`, `license`, `hunting-ok`, `solo`, `hunting-gun`, `examination`, `environment`, `man`, `type1`, `type2`, `ami`, `wana`, `self-employed`, `self-sufficiency`, `farming`, `hunting-ng`, `senior`, `wildlife-protection`。主要タグは `license`（狩猟免許）、`examination`（猟銃等講習会）、`hunting-ok` / `hunting-ng`（鳥獣判別）、`protection`（保護管理、本番形式の抽選にも使用）。

## 主要固定ページ・URLとテンプレート

ローカルURLの共通接頭部は `/huntinglicense`。以下はWordPressの公開ページ設定で確認した対応。`(auto)` はDBでテンプレート未指定を意味し、同名の `page-{slug}.php` があればWordPressのテンプレート階層で使われる。

| URLパス（接頭部以降） | 実際のテンプレートまたは解決規則 |
| --- | --- |
| `/` | 投稿一覧設定。`home.php`。 |
| `/category/{slug}/` | `category-{slug}.php` があれば使用。`experience` などは `category.php`。 |
| `/tag/{slug}/` | `tag-license.php`、`tag-examination.php`、`tag-hunting-ok.php`、`tag-hunting-ng.php` の該当分、他は `tag.php`。 |
| `/{post-slug}/` | 標準投稿は `single.php`。体験談カテゴリはそこから `single-experience.php`。 |
| `/mock-exam/` と `/mock-exam/{type1,type2,wana,ami,laws,animals,protection,gun-course,hunting-license}/` | DBで `page-mock-exam.php` を指定。 |
| `/mock-exam/hunting-license/{type1,type2,wana,ami}/` | `page-mock-exam.php` はこの親子スラッグを本番形式として扱う。該当する公開固定ページ自体は今回のDB一覧では未確認。 |
| `/study-record/`、`/review/` | 2026-10-01時点で両URLはHTTP 200。`page-study-record.php`、`page-review.php` がスラッグにより自動選択される。固定ページの `_wp_page_template` は空欄。専用CSS・JSは `is_page()` のスラッグ判定でも読み込む。 |
| `/schedule/` | `page-schedule.php`。 |
| `/experience/` | `page-experience.php`。 |
| `/contact/`、`/contact-checker/` | `page-contact.php`。 |
| `/examination/`、`/examination/requirements/`、`/examination/application/`、`/examination/after/`、`/examination/questions/`、`/examination/faq/`、`/examination/gun-procedure/` | 順に `page-examination.php`、`page-examination-requirements.php`、`page-examination-application.php`、`page-examination-after.php`、`page-examination-question.php`、`page-faq-guns-license.php`、`page-gun-procedure.php`。 |
| `/examination-beginner/`、`/information/` | `page-examination-beginner.php`、`page-information.php`。 |
| `/license-types/`、`/license-difference/`、`/license-extermination/`、`/type1-type2-difference/` | 同名の `page-*.php` をDBで指定。 |
| `/gun-types/`、`/gun-types-detail/`、`/gun-difference/`、`/gun-locker/`、`/gun-insurance/`、`/rifle/`、`/rifle-revision/` | 同名の `page-*.php` をDBで指定。 |
| `/study-method/`、`/application/`、`/registration/`、`/content/`、`/know/` | 同名の `page-*.php` をDBで指定。 |
| `/wana-info/`、`/ami-info/`、`/gun-cost/`、`/pre-lecture/`、`/faq-hunting-license/` | DBではテンプレート未指定。存在する同名 `page-{slug}.php` が階層で解決される。 |
| `/privacy-policy/`、`/about/`、`/for-corporate/` | DBではテンプレート未指定。該当のスラッグ専用ファイルは見つからず、汎用 `page.php` を使う想定。 |

## DB主要テーブルと有効プラグイン

現在の `$wpdb->prefix` は `wp_`。主要テーブルは `wp_posts`（投稿・固定ページ・ACF定義など。`post_title` を含む）、`wp_postmeta`（ACF等の `post_id` / `meta_key` / `meta_value`）、`wp_terms`、`wp_term_taxonomy`、`wp_term_relationships`（カテゴリ・タグ関連）、`wp_options`（テーマ・有効プラグイン等）。`wp_users`、`wp_usermeta`、`wp_comments` も存在するが個人情報・内容は調査資料に記載しない。DBには別接頭部 `wp9bdcd0` のテーブル群も存在する。現在のWordPressが使用する接頭部は `wp_` であり、別群の用途・移行履歴は未確認。

有効プラグイン（`active_plugins` の読取結果）: Advanced Custom Fields、Akismet、Contact Form 7、Export Media Library、Really Simple CSV Importer、WordPress Importer、WP All Export、WP Content Copy Protector、Google Sitemap Generator、Duplicator。DB上の `aioseo_*` テーブルの存在だけではSEOプラグイン稼働中とは判断しない。

## SEO・依存関係・特殊実装

- `header.php` が画面種別別の `<title>`、description、robots、OGP、Twitter Card、JSON-LDを直接出力する。投稿詳細は体験談を原則index、通常問題と鳥獣判別投稿をnoindexにする分岐。タグはnoindex。カテゴリ2ページ目以降と問い合わせページにもnoindexを出力。`archive.php` と `tag.php` にもnoindex記述がある。複数箇所からrobotsメタが出る場合があるためSEO変更時は実HTMLを確認する。
- `header.php` が `style.css` と主要CSSを読込み、`footer.php` が `common.js` を読む。カテゴリテンプレートは `parts-breadcrumb.php`、`parts-random-btn.php`、広告部品、模擬試験導線等を `get_template_part()` で読む。日程テンプレートはテーマ内CSVに依存する。
- 問題一覧・詳細と模擬試験はいずれもACFの `no` / 選択肢 / 答え / 解説に依存。模擬試験は `protection` タグと各カテゴリ、親子スラッグに依存。画像は番号をファイル名に使い、ファイルの存在で表示を決める。
- `page-mock-exam.php` に回答文字列をア・イ・ウ / 数字 / A・B・C / ○×に正規化する関数があり、画像内選択肢も扱う。正解形式を判定できない画像3択が混じる場合は試験開始前にエラーを出す。
- テーマに `functions.php` はなく、元資料番号を除く `the_title` フィルターもない。`function.php` の単数形はWordPressの標準読込名ではない。
- `page-schedule.php` と `page-examination-beginner.php` はテーマ内CSVを読む。`schedule-list/2026/hunting-license.csv` と `schedule-list/2025/gun-beginner.csv` は存在するが、`page-schedule.php` が2025年の表示に使う `schedule-list/2025/hunting-license.csv` は存在しない。詳細な日程データの正確性・更新時期は今回の調査対象外。

## 現時点で確認できない事項

- 本番公開環境のWordPress・PHP・DBのバージョン、設定、プラグイン状態。上記はこのローカル環境の結果。
- 別接頭部 `wp9bdcd0` のテーブル群が残っている経緯と管理方針。
- `/mock-exam/hunting-license/{type1,type2,wana,ami}/` は2026-10-01のローカルHTTP確認で全て404。テンプレート内の本番形式処理は存在するが、対応する公開固定ページは確認できない。
- すべてのURL・全端末での画面確認、外部スクリプトの稼働状況、CSV内容の網羅的な妥当性。
- `_codex/` は `.gitignore` の例外により指定の管理MarkdownがGit管理対象。その他のWordPress本体やアップロードは引き続き除外される。

## 学習記録・復習（2026-09-30追加）

- 個人の学習記録は `shuryoLearningRecordV1` というブラウザの `localStorage` キーに保存する。DBスキーマとユーザー認証は使用しない。模擬試験の採点完了分だけ所要時間を履歴へ保存し、タイマーは `Date.now()` による実経過時間を使う。
- 通常問題の10種類の `category-*.php` と `single.php` には自己判定用のdata属性・UIを置かず、閲覧だけでは記録しない。既存の選択肢・回答・解説の開閉処理はそのまま使う。正誤は模擬試験の採点と復習ページで保存する。
- 模擬試験では各問題の投稿IDと分野をDOMへ渡し、採点時に各問の正誤と試験履歴を一度に保存する。`page-mock-exam.php` の抽選・出題数・採点方法は維持する。
- 分野は `laws`、`type1`、`type2`、`wana`、`ami`、`animals`（`animals-judge` を含む）、`protection` タグ、`examination`。`all` は集約用、`numbers` は横断用で主要分野にしない。主要分野に紐付かない数字問題等は記録内で `cross` / `other` とし、全体集計には含めるが分野別の8行には加算しない。複数の主要カテゴリを持つ問題は1つの主要分野へ分類する。
- 未回答問題の母集団は公開 `post` の `all` カテゴリと `animals-judge` カテゴリの和集合。追加時のローカルDBでは700件＋70件、重複0件。`experience` 投稿を含めない。
- 復習はブラウザ側で対象IDを選び、`/review/?q={投稿ID}&mode={review|unanswered}` へ1問ずつ遷移する。PHPは公開済み `post` かつ上記母集団に属することを検証する。一時的な順番は `sessionStorage` に保存する。
- 学習記録・復習の固定ページはコードでは自動作成しない。2026-10-01時点でローカルDBに両ページが公開済みで、PCと390px表示、主要なブラウザ操作を確認した。
