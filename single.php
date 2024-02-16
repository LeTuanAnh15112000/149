<?php
/*single.php*
	各投稿の個別ページ。まぁほぼ必須。個別記事のページにだけブクマボタンや広告表示をつけたり等活躍します。
	
 */
?>
<?php get_header(); ?>

<div id="main-wrap">
	<!-- Main contents -->
	<main id="main-contents">
		
		<?php
		if(have_posts()): while(have_posts()): the_post();
			$tbl_border_flg = get_field('table_枠線表示');
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="article-header">
				<h2 class="posttitle"><?php the_title(); ?></h2>
				<time class="article-date" datetime="<?php the_time('Y-n-j'); ?>"><?php the_time('Y/n/j'); ?></time>
			</header>
			
			<div class="article-content <?php if ($tbl_border_flg[0] === 'on') echo 'tbl-border-on '; ?>">
				<?php the_post_thumbnail(); 
				//アイキャッチ画像の出力 ?>
				
				<?php the_content();
				//投稿本文の出力 ?>
				
				<?php //ページ分割<!--nextpage-->を使った場合に、ページャーを出力
				wp_link_pages('before=<ul class="pager"><li>ページ</li>&after=</ul>&next_or_number=number&pagelink=<li>%</li>'); ?>
				
				
			</div>
			
			<footer>
				<?php /*　自分はsingleページにだけこの位置にTweetボタンやソーシャルブクマのボタンを入れたりします。 */ ?>
				
				<div class="postinfo">
				カテゴリー: <?php the_category(', ') ?><?php the_tags('｜タグ: ', ', ', ''); ?><br />
				<?php comments_popup_link('コメントorトラックバックはまだありません', '1 件のコメントorトラックバック', '% 件のコメントorトラックバック'); ?><?php edit_post_link('この投稿を編集する', '｜', ''); ?>
				</div>
				
				<?php /*  ここからは、次のページ／前のページへのテキストリンクを出力するためのタグ  */ ?>
				<div class="pagelink clearfix">
					<p class="pageprev"><?php previous_post_link('%link','&laquo; 前の記事<br>%title') ?></p>
					<p class="pagenext"><?php next_post_link('%link','次の記事 &raquo;<br>%title') ?></p>
				</div>
				
			</footer>
		</article>
		<?php comments_template(); 
			//コメント欄の出力 ?>
		
		<?php endwhile; endif; ?>
		
		
	</main><!-- /#main-contents -->
	
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
<!-- /Single -->