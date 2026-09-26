# Codex管理用Markdown環境の作成

## 日時

2026-09-26 15:13〜15:17 JST

## 目的

現在のWordPressサイトを実環境から調査し、今後のCodex作業の基準資料と作業ログ用ディレクトリを作成する。

## 作業前の状態

- ルート直下に `_codex/` は存在しなかった。
- 有効テーマは `hunting-licence`。WordPress 6.8.2、PHP 8.3.14、DBサーバー MySQL 8.0.40を確認した。
- 着手前の `git status --short --untracked-files=all` は `?? wp-content/themes/hunting-licence/functions.php` のみ。この既存の未追跡ファイルには触れていない。

## 変更ファイル

- 新規: `_codex/SITE-STRUCTURE.md`
- 新規: `_codex/logs/2026-09-26_1517_codex-documentation-setup.md`（本ファイル）
- 新規ディレクトリ: `_codex/`、`_codex/logs/`
- サイト本体のPHP・CSS・JS、WordPress設定、プラグイン、テーマ、`.gitignore` は変更していない。

## 変更内容

テーマ・DB・WordPress設定を読み取り、構成資料に運用ルール、主要ファイルと依存関係、通常問題・模擬試験、ACF、分類、固定ページとURL、DB、SEO、確認できない事項を記載した。ログ命名と記載項目の運用ルールを資料冒頭に設けた。

## DB操作

DB変更なし。WordPress経由で `SELECT VERSION()`、`SHOW TABLES`、`DESCRIBE`、公開コンテンツと設定の読み取りを行った。`INSERT`、`UPDATE`、`DELETE` は実行していない。

## 確認内容

- テーマ内の主要PHP、CSS、JavaScriptのファイル一覧と関連処理を調査した。
- ACFフィールドグループ、カテゴリ、タグ、固定ページのテンプレート設定、有効プラグイン、主要DBテーブルを読み取りで確認した。
- `http://localhost:8888/huntinglicense/` のHTTP HEADが200、HTTP応答のPHP表示が8.3.14であることを確認した。画面の目視確認や全URLの動作試験は行っていない。
- 資料とログの存在、資料が空でないこと、Git状態、作成対象以外に作業によるファイル差分がないことを確認した。
- PHP構文検査は今回PHPを変更していないため対象外。

## Git差分

着手前の未追跡 `functions.php` はそのまま。`git diff --check` に指摘なし。`_codex/` は既存 `.gitignore` の `/*` によってGit管理外となり、通常の `git diff` / `git status` には出ない。`git check-ignore -v` とファイル実体で新規作成を確認した。Git commit・pushは行っていない。

## SITE-STRUCTURE.md

今回新規作成した。実環境で確認したサイト構成と今後の更新条件・作業順序を記載した。

## 残課題

- `_codex/` は現在の `.gitignore` ではGit共有されない。今回は変更禁止のため `.gitignore` を変更していない。
- `page-schedule.php` が参照する2025年の `hunting-license.csv` は存在しない。今回の作業対象外として資料に記録した。
