<?php
/*
Template Name: カスタムページテンプレート
*/
?>
<?php get_header(); ?>

<h2 class="page-title">
	画像かタイトルを入れてください。
</h2>

<div class="global-wrap">


<main class="global-contents">

	<article>
		<?php
		if(have_posts()): while(have_posts()): the_post();
		?>
		<article class="<?php if ($tbl_border_flg[0] === 'on') echo 'tbl-border-on '; ?>">
			<header class="artcile-header">
				<h2 class="pagetitle"><?php the_title(); ?></h2>
				<time class="article-date" datetime="<?php the_time('Y-n-j'); ?>"><?php the_time('Y/n/j'); ?></time>
			</header>
			
			
			
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php the_content(); ?>
			</div>
			
			
			
			<footer class="article-footer">
				<?php /*　自分はsingleページにだけこの位置にTweetボタンやソーシャルブクマのボタンを入れたりします。 */ ?>
				
				<div class="postinfo">
				カテゴリー: <?php the_category(', ') ?><?php the_tags('｜タグ: ', ', ', ''); ?><br />
				<?php comments_popup_link('コメントorトラックバックはまだありません', '1 件のコメントorトラックバック', '% 件のコメントorトラックバック'); ?><?php edit_post_link('この投稿を編集する', '｜', ''); ?>
				</div>
				
				<?php //ページ分割<!--nextpage-->を使った場合に、ページャーを出力
				wp_link_pages('before=<ul class="pager"><li>ページ</li>&after=</ul>&next_or_number=number&pagelink=<li>%</li>'); ?>
			</footer>
		</article>
		<?php endwhile; endif; ?>
	</article>

</main><!-- /.global-contents -->


<?php get_sidebar(); ?>


</div><!-- /.global-wrap -->
<?php get_footer(); ?>
<!-- /pagetemplate.php -->