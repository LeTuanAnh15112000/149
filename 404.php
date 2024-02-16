<?php
/* 404.php *
　リンク先のページがなかった場合に表示されるエラー画面。
 */
?>
<?php get_header(); ?>
<h2 class="page-title">
	画像かタイトルを入れてください。
</h2>


<div class="global-wrap">
	<main class="global-contents" class="not-found">
		
		<h3>ページが見つかりません</h3>
		
		<p>大変申し訳ございません。<br />
		お探しのページは削除されたか、名前が変更されたか、一時的に利用できない可能性があります。<br />
		以下のURLをクリックして、このサイトのトップページにお戻りください。</p>
		<p><a href="<?php echo home_url(); ?>"><?php echo home_url(); ?></a></p>
	
	</main><!-- /.global-contents -->
	
	<?php get_sidebar(); ?>

</div><!-- /.global-wrap -->
<?php get_footer(); ?>
<!-- /404.php -->