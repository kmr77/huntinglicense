# 学習記録・弱点復習・模擬試験タイマー

## 日時

2026-09-30 20:47 JST

## 目的

既存の通常問題と模擬試験を維持し、端末内の学習記録、弱点・未回答の復習、採点完了までの模擬試験時間を追加する。

## 作業前の状態

- ブランチ: `main`。`git status --short --branch` は `## main...origin/main` のみ。staged、modified、untracked、作業前の差分はなし。
- 通常問題は10種類の `category-*.php` と `single.php` で答えを開く形式。模擬試験は共通 `page-mock-exam.php` で抽選・採点する。
- ローカルDBに `study-record`、`review` の固定ページなし。公開問題は `all` 700件と `animals-judge` 70件で重複なし。`protection` は投稿タグ。
- CSSは `header.php`、JSは `footer.php` から直接読み込む。`functions.php` は作らない。

## 変更ファイル

- 新規: `wp-content/themes/hunting-licence/learning-progress.js`、`css/study-record.css`、`page-study-record.php`、`page-review.php`。
- 変更: 同テーマの `category-all.php`、`category-ami.php`、`category-animals-judge.php`、`category-animals.php`、`category-examination.php`、`category-laws.php`、`category-numbers.php`、`category-type1.php`、`category-type2.php`、`category-wana.php`、`single.php`、`page-mock-exam.php`、`home.php`、`header.php`、`footer.php`、`common.js`。
- 管理資料: `_codex/SITE-STRUCTURE.md`、`TODO.md`、`DECISIONS.md`、`CHANGELOG.md`、本ログ。

## 変更内容

- 投稿IDで問題履歴を記録。総解答数と回答済み固有問題数を分け、要復習・克服済みを循環する判定を追加。
- 通常問題の答え表示は維持し、正解・不正解の自己判定ボタンを追加。模擬試験は採点時に各問題の正誤と1回分の試験履歴を保存。
- 模擬試験タイマーは1問目の表示直後から `Date.now()` の実経過時間を計測。非表示中も進み、採点時に停止。二重採点・二重保存を抑止。
- 学習記録ページに目標試験日、全体・分野別・弱点・模擬試験履歴、確認付きリセットを追加。復習ページではURLの投稿IDを公開問題集合に照合し、1問ずつ表示。
- TOP、模擬試験一覧、開始前、採点結果に学習記録への導線を追加。新規2ページは `noindex`。`common.js` はランダム切替ボタンがないページで登録を省略。

## DB操作

DBへの書き込み操作なし。固定ページは作成していない。WordPress読込と `get_posts` / taxonomy / ACF等の読み取りのみ。

## 確認内容

- MAMP PHP 8.3.14でテーマPHP全136ファイルの `php -l` 合格。新旧JSの `node --check` 合格。
- Nodeのメモリ上のlocalStorage代替を使い、空・破損・古いschema・利用不可、弱点判定の循環、模擬試験二重保存、目標日、リセット、延べ回数と固有問題数を確認。
- 新規2テンプレートをWordPress読込後にCLIで描画し、PHPエラー表示なし。復習の有効問題、体験談、文字列、不正な配列IDを確認し、体験談等は問題として出力されない。
- ローカルHTTPでTOP、通常問題2種、模擬試験一覧・個別が200で、PHPエラー表示なし。個別問題にID1件、通常一覧にID10件、30問模擬試験にID30件とタイマーが出力された。ヘッドレス表示で通常問題に自己判定UIが挿入された。
- 新規URL `/study-record/` と `/review/` は固定ページ未作成により404。実URLでの操作確認は未実施。スマートフォン幅のヘッドレスプレビューは確認したが、ブラウザ操作・実機での完全な確認は未実施。

## Git差分

開始時は差分なし。終了時に本作業の変更・新規ファイルのみ。`git diff --check` 合格。`git diff --stat` は追跡済みファイルだけを表示し、新規の4テーマファイルと本ログは含まれない。コミット・pushなし。

## SITE-STRUCTURE.md

更新した。新しいテンプレート、CSS/JS、保存方式、分野、問題母集団、復習のURL方式、固定ページ未作成を追記。

## TODO.md / CHANGELOG.md / DECISIONS.md

TODOに固定ページ作成と実画面操作検証を残し、CHANGELOGに追加機能、DECISIONSに保存・弱点判定・抽出方式を記録。

## 残課題

- `/study-record/`（`page-study-record.php`）と `/review/`（`page-review.php`）の公開固定ページ作成・テンプレート割当。依頼によりDBへ直接追加しなかった。
- 固定ページ作成後、実URL上のスマートフォン表示、回答・タイマー・履歴・リセット・復習導線を実ブラウザで通し確認する。
