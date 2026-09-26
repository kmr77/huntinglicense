# TODO

このファイルで未完了の作業と次の確認を管理する。作業の判断理由は `DECISIONS.md`、完了した作業の詳細は `logs/` に記録する。

## 進行中

なし。

## 次に行う

- **通常問題・模擬試験の投稿タイトル先頭に付く元資料番号を、DB・管理画面では保持したままフロント表示時のみ非表示にする。** 現在の `wp-content/themes/hunting-licence/functions.php` には該当する表示フィルターが存在するが、着手前からGit未追跡で、今回その実装や全画面での動作確認は行っていない。次の作業で通常問題一覧・詳細・模擬試験、管理画面、数字が問題文の一部である例を確認し、完了条件を満たすか判断する。関連ファイル: `functions.php`、`page-mock-exam.php`、通常問題テンプレート。関連方針: `DECISIONS.md`。

## 保留

- なし。構成資料の「現時点で確認できない事項」は調査結果であり、自動的に修正対象とはしない。

## 完了

- 2026-09-26: `_codex/SITE-STRUCTURE.md` と `logs/` を作成し、サイト構成を初回調査した。詳細: `logs/2026-09-26_1517_codex-documentation-setup.md`。
- 2026-09-26: `TODO.md`、`CHANGELOG.md`、`DECISIONS.md` と作業前差分確認の運用を追加し、管理MarkdownだけをGit追跡候補にした。詳細: `logs/2026-09-26_1533_codex-management-setup.md`。
