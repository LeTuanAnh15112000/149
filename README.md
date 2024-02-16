#PHPの分からない初心者向けフリーWordPressテーマ縦リンク版『mypace custom Vertical』
* by Kei Nomura(@mypacecreator) / ozone notes
* http://mypacecreator.net/theme/


##お約束事


* ライセンスは、WorePress本体と同じGPLライセンスを適用します。その範囲内で商用・非商用にかかわらず無償で自由に改変・複製してご利用いただけます。
（WordPressのテーマライセンスについては、作者ブログ『自作WordPressテーマのライセンスについて調べてみた | マイペースクリエイターの覚え書き』をご一読ください。
　http://mypacecreator.net/blog/archives/169）
* 著作権表記はstyle.cssとfooter.phpに記載してあります。どちらも残していただければ幸いですが、上記のルールをしっかり理解したうえで、ちゃんと自分で手を加えたものに対して私の名前をそっと消していただく分には、構わないかと思います。最悪style.cssの表記くらい残してもらえればOKです。
* うまくカスタマイズできた成功例や、逆にここつまづいたけどこうやったら出来た、等の情報はできるだけブログやソーシャルメディア等にUPしてみんなで共有しましょう。
* 質問があれば受けたいと思いますが、仕事の合間に有志で行っていますので、出来る範囲での対応となります。
* でも、ぐーぐるさんや書籍などを駆使してなるべく自分で調べてください。自分で苦労しながら調べることが上達への近道です。
* 一刻も早い回答や手厚いサポートをお求めの方は、有償サポート（ozone notes http://www.ozonenotes.jp/ )までご連絡ください。

##動作確認Ver

WordPress日本語版 3.4～3.5.1


##ファイル構成（XHTML版：mypace custom Vertical 1.7）
（☆印はこのテーマでの必要最低限のファイル 無印はなくても一応動くファイル）

* style.css☆
* archive.php 
* header.php☆ （DTDはxhtml1.0 transitionalです）
* index.php☆
* home.php
* loop.php☆
* footer.php☆
* sidebar.php☆
* page.php
* pagetemplate.php
* comments.php
* single.php
* 404.php
* functions.php
* screenshot.png
* img/headerimg.jpg
* img/nav_bg.png
* img/nav_bg_on.png

##当バージョンでの変更箇所（XHTML版：mypace custom Vertical 1.7）

* CSSファイルの@importおよびdefault.cssファイルを廃止。リセット等の記述をstyle.cssにまとめました。（サイト高速化への配慮）
* style.cssの読み込みをwp_enqueue_style関数を使った記述に変更。
* header.php内のlink rel="alternate" type="application/rss+xml"の記述を削除（出力が重複していたため）
* サイドバーのナビゲーションで、ページ名が長く2行になっても文字がはみ出さないように修正。


##過去の変更履歴（XHTML版：mypace customシリーズ）


* 2010.10.15　勢いだけで自作テーマ公開
* 2010.10.16　ライセンスに関する記述を修正
* 2010.10.17　comment.phpが別のテーマのものだったという致命的なミスのため、データ差し替え。その他CSSを調整し直してVer 1.01にマイナーアップ。
* 2010.11.08　Ver1.1に差し替え。footer.phpのCopyright部分の修正と、loop.php/sidebar.phpに補足コメント追加、license.txt追加。
* 2010.11.11　Ver1.1のsidebar.phpにコーディングミスがあり、修正しました。実質はVer1.101な感じですが、そのままVer1.1に上書きしちゃいました。
* 2010.11.18　Ver1.2に差し替え。style.css内、.pagelink {overflow: hidden;→overflow: auto;に変更（ページ下部のテキストリンクが見えなくなっちゃうから）の他、何ヶ所か修正。他PHPファイルも数ヶ所にコメント追加。
* 2010.12.12　Ver1.3に差し替え。<!--paged-->を使ったページ分割使用時に、ページ送り用のリンクを表示させるタグ’wp_link_pages’を追記
* 2010.12.13　縦リンクVerの’mypace custom vertical　1.0′配布開始
* 2010.12.14　「archive.phpがあった方がいい」という貴重なご意見をいただき、Ver1.4と縦リンク版Ver1.1の配布開始。同時に、不要ソースの削除やコメントの一部修正等。
* 2011.04.30　当テーマをHTML5でマークアップし直した”mypace custom V”をリリースしました。
* 2011.07.25　Ver1.5配布開始。functions.phpに、「続きを読む」クリック後のURLから#more-$id を削除する記述を追加。コンテンツ幅を800px→960pxに変更。ほか、マークアップやCSS装飾の調整。
* 2012.06.15　Ver1.6配布開始。WordPress3.4の関数推奨状況を踏まえ、記述をいくつか変更。エディタ用CSS、カスタムヘッダー機能を今さら追加。など。
* 2013.03.12　Ver1.7配布開始。CSSファイルの読み込み方法をwp_enqueue_styleを使用した方法に変更。
* 2013.03.13　縦リンク版Ver1.7配布開始。通常版1.7に準じた修正。（バージョン番号を通常版と統一）


では！良いWordPressライフを★