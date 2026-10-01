# 通常問題の自己判定・記録を削除

## 日時

2026-10-01 06:43〜06:45 JST。

## 目的

通常問題の答え表示後に追加される「正解した／間違えた」ボタンと正誤保存を廃止し、模擬試験と復習ページの回答記録を維持する。

## 作業前の状態

- Gitブランチは`main`。ステージ済み0件、追跡ファイル20件が変更済み、未追跡6件。開始時点の`git diff --stat`は20ファイル、127行追加・16行削除で、前作業からの変更を含む。
- 通常問題の10種類の`category-*.php`と`single.php`には自己判定用の投稿ID・分野・タイトルのdata属性が追加されていた。`learning-progress.js`の`initCategory()`がボタンと案内、結果メッセージを生成し、`recordQuestion()`で保存していた。
- 模擬試験は`recordExam()`、復習ページは`recordQuestion()`を利用する。`recordQuestion()`は復習のために必要。

## 変更ファイル

- `wp-content/themes/hunting-licence/category-all.php`、`category-laws.php`、`category-type1.php`、`category-type2.php`、`category-wana.php`、`category-ami.php`、`category-animals.php`、`category-animals-judge.php`、`category-examination.php`、`category-numbers.php`、`single.php`
- `wp-content/themes/hunting-licence/learning-progress.js`、`css/study-record.css`、`header.php`、`footer.php`
- `_codex/DECISIONS.md`、`SITE-STRUCTURE.md`、`CHANGELOG.md`、`TODO.md`、このログ

## 変更内容

- 通常問題テンプレート11ファイルから自己判定のみに使ったdata属性を削除。問題、選択肢、答え、解説、広告、ページ送り、ランダム表示のコードは維持した。
- `learning-progress.js`から`initCategory()`のUI生成・イベント登録・正誤保存呼出しと初期化呼出しを削除。共通保存API、模擬試験の結果保存、復習ページの回答処理、弱点判定、学習記録表示は維持した。
- `study-record.css`から`.learning-self-check`と結果メッセージの専用スタイルのみ削除。`mock-timer`以降は維持した。
- `header.php`と`footer.php`の専用CSS・JS読込条件から通常のカテゴリ・投稿詳細を除外。模擬試験、学習記録、復習では継続読込。
- 既存のブラウザ内記録は消去・変換しない。今後、通常問題の閲覧・答え表示では新規記録しない。

## DB操作

DB変更なし。DBへの書込・更新・削除を行っていない。ブラウザ動作確認は一時Chromeプロファイルの`localStorage`のみを利用した。

## 確認内容

- 変更したPHP 13ファイルを`php -l`で確認し、構文エラーなし。`node --check learning-progress.js`、`git diff --check`成功。
- ローカルHTTPで通常問題の全10カテゴリ、`?random=1`、2ページ目、投稿詳細、模擬試験、学習記録、復習はいずれもHTTP 200。全10カテゴリの先頭ページで問題が10件表示され、自己判定UI・専用JSがないことを確認。`examination`と`numbers`は既存どおり選択肢なしで、直接答えを開く構造。
- 一時Chromeで通常問題一覧の問題・選択肢・答え・解説の表示と開閉、ページ送り、ランダム表示を確認。自己判定UI・案内は0件、答え表示後も学習記録キーは未作成。投稿詳細も自己判定UIがなく、専用JSは読み込まれない。
- 保護管理の20問模擬試験で開始、タイマーが00:01へ進むこと、全問回答、採点、学習記録保存を確認。学習記録に受験1回、履歴1行、解答済み20問が反映された。
- 一時データで1問題に2回不正解を記録し、要復習を確認。復習ページで回答・正誤・解説を確認。別の一時セッションで要復習2問を用意し、問題ID7533から「次の問題へ」で7528へ移動できた。さらに2回連続正解で`mastered`になり要復習0問へ戻ることを確認。模擬試験2回による同一問題の弱点化は未実施。
- 模擬試験後の未回答数は750問、別の復習問題に回答すると749問に減少。通常問題の閲覧だけでは減少しない。リセット後、ブラウザ記録キーは削除され、模擬試験受験回数0回に戻った。
- 一時Chromeで捕捉されたJavaScript例外は0件。全形式の模擬試験と実機表示は今回未確認。

## Git差分

最終の`git diff --stat`は追跡ファイル9件、121行追加・5行削除。作業開始前の追跡ファイル11件のdata属性追加を正確に元へ戻したため、それらはGit差分から消えた。前作業からの無関係な変更は維持。未追跡の`learning-progress.js`と`css/study-record.css`は`git diff --stat`に含まれない。ステージ、コミット、pushなし。

## SITE-STRUCTURE.md

更新した。通常問題の自己判定用data属性・UIと専用CSS・JS読込がないこと、正誤は模擬試験と復習で保存することへ修正。

## その他の管理Markdown

- `DECISIONS.md`: 通常問題の自己判定方針を取り消し、模擬試験・復習で正誤を記録する方針へ変更。
- `CHANGELOG.md`: 自己判定機能の削除を追記。
- `TODO.md`: 今回の完了と、残る模擬試験形式・本番端末での確認を記録。

## 残課題

残る模擬試験形式と本番端末での導線・表示を確認する。既存ブラウザに過去の通常問題の自己判定記録がある場合、その履歴は今回削除していない。
