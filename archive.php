<?php
/* archive.php *
　アーカイブページ（投稿一覧）表示用のテンプレート。とりあえずindex.phpと同じにしてあります。
　「カテゴリー別アーカイブ」「タグ別アーカイブ」「カスタム分類別アーカイブ」「投稿者別アーカイブ」「年/月/日別アーカイブ」等々の表示に使います。
　このファイルに手を加えて、'category.php','tag.php','taxonomy.php','author.php',’date.php’等を作ってもOK!
 */
?>
<?php get_header(); ?>

<div id="main-wrap">
	<!-- Main contents -->
	<main id="main-contents">
		
		<!-- ページタイトル（条件により表示方法切替） -->
		<?php if(is_category()): ?>
		<h2 class="pagetitle">『<?php single_cat_title(); ?>』カテゴリーの投稿一覧</h2>
		<?php elseif(is_tag()): ?>
		<h2 class="pagetitle">『<?php single_cat_title(); ?>』タグの付いた投稿</h2>
		<?php elseif(is_month()): ?>
		<h2 class="pagetitle"><?php echo get_query_var('year');?>年<?php echo get_query_var('monthnum');?>月の投稿一覧</h2>
		<?php elseif(is_author()): ?>
		<h2 class="pagetitle">投稿者のアーカイブ</h2>
		<?php elseif(is_search()): ?>
		<h2 class="pagetitle">『 <?php the_search_query(); ?> 』を含む投稿</h2>
		<?php endif; ?>
		<!--　ページタイトルここまで -->
		
		
		<?php //　loop.phpを呼び出す
		get_template_part( 'loop' ); ?>
		
		
		<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
		
		
	</main><!-- /#main-contents -->
	
	<?php get_sidebar();?>
</div>

<?php get_footer(); ?>
<!-- /archive -->