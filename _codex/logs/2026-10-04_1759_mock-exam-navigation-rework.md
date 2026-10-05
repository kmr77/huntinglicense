# 模擬試験の本番形式と集中練習の導線整理

## 日時

2026-10-04 17:51〜17:59 JST。

## 目的

模擬試験TOPから本番形式の4免許を直接選べるようにし、MIX30問と単一カテゴリ・分野の集中練習を明確に分ける。

## 作業前の状態

- Gitは`main`で、staged・modified・untracked・deletedはいずれもなし。`git diff`と`git diff --cached`は空。
- `page-mock-exam.php`は本番形式を`/mock-exam/hunting-license/{type1,type2,wana,ami}/`という子固定ページのスラッグで判定していた。ローカルに子固定ページはなく、4URLは404。
- 模擬試験TOPの本番形式からは免許選択の親ページへ進む2段階導線。免許別・分野別の一覧は集中練習であることが見出しから分かりにくかった。

## 変更ファイル

- `wp-content/themes/hunting-licence/page-mock-exam.php`
- `_codex/SITE-STRUCTURE.md`
- `_codex/CHANGELOG.md`
- `_codex/TODO.md`
- `_codex/DECISIONS.md`
- この新規ログ

## 変更内容

- 本番形式は既存の`/mock-exam/hunting-license/`固定ページで`license=type1|type2|wana|ami`を文字列として受け、`wp_unslash()`と`sanitize_key()`で正規化した後、許可済み値だけを採用する。未指定・無効値・配列値は免許選択画面にする。
- TOPに4免許別の本番形式30問リンクと13/6/9/2の内訳を表示。免許別・分野別は「集中練習」と明記し、元のカテゴリ・分野別URLを維持。
- 本番形式の選択画面と試験中の免許切替リンクも同じ親固定ページの`license` GET値に統一。選択中の`is-current`を維持。
- 本番形式のH1と説明に免許名・出題内訳を表示。既存の抽選、除外、shuffle、回答・採点JS、広告配置、SEO処理は変更していない。固定ページやDB、CSSは変更していない。

## DB操作

DB変更なし。ローカルWordPressの読込と問題照合のみ実施。

## 確認内容

- `php -l`でテンプレート構文正常。
- `/mock-exam/`はHTTP 200で、本番形式4リンクは`/mock-exam/hunting-license/?license=...`、集中練習リンクは従来の`/mock-exam/{slug}/`。免許未指定・無効値・配列値はいずれも選択画面で、問題を取得しない。
- 本番形式4URLはすべてHTTP 200・30問。ローカルWordPressの読み取り照合で、各回が法令13／猟具6／鳥獣9／保護管理2、投稿IDは30件すべて一意。猟具6問は各回の選択免許カテゴリに属し、取得エラーなし。
- 集中練習の`type1`、`wana`は30問、`ami`は27問でHTTP 200。リンク先と従来のモード設定を維持。
- 旧子URL4件はHTTP 404のまま。新規固定ページ・リダイレクトは作成していない。
- ローカルChromeでPC幅1280pxのTOPを、390px固定幅フレームでTOPと第一種本番形式の表示を目視確認。4ボタン、選択中の強調、13/6/9/2の表示に崩れなし。
- 採点操作のブラウザ実行は今回行っていない。該当JSに差分はない。

## Git差分

`git diff --check`、`git diff --stat`、`git status --short`で今回のファイルだけの差分を確認。ステージ・コミット・pushなし。

## SITE-STRUCTURE.md

更新した。親固定ページ1件＋`license` GET値の本番形式URL、未指定時の選択画面、4子固定ページが不要であることを記録。

## その他の管理Markdown

- `CHANGELOG.md`: 導線整理を追記。
- `TODO.md`: 完了記録を追加。
- `DECISIONS.md`: 本番形式URLの恒久仕様を追加。

## 残課題

- すべての免許での実端末・採点操作による最終確認は未実施。出題と採点のコード自体は今回変更していない。
