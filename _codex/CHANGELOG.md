# CHANGELOG

管理環境とサイトに対する完了済みの変更を簡潔に記録する。詳細と確認結果は `logs/` を参照する。

## 2026-09-27

### Changed

- ローカルだけで試験的に作成されていた未追跡 `functions.php` のタイトルフィルターを取り消し、`functions.php` がない状態へ戻した。本番環境への変更はない。
- 接頭番号非表示の代替実装は未完了として、TODOと設計判断を更新した。

## 2026-09-26

### Added

- `_codex/SITE-STRUCTURE.md` と `logs/` を作成し、ローカルサイト構成を記録した。
- `TODO.md`、`CHANGELOG.md`、`DECISIONS.md` を追加し、作業前のGit差分確認とログ運用を定めた。
- `.gitignore` に `_codex/` の指定MarkdownだけをGit追跡候補にする例外を追加した。

今回の管理体制整備ではサイト本体の機能を変更していない。
