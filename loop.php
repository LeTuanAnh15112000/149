<?php
/* loop.php *
	投稿のループ部分だけをまとめたファイル。
 */
?>
<!-- loop -->

<!-- 投稿ループここから -->
<?php if(have_posts()): while(have_posts()): the_post(); ?>

	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<h3 class="posttitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	<p class="postdate"><?php the_time('Y/m/d (D)'); ?></p>
	
	<?php if ( get_the_post_thumbnail() ) { ?><div class="tmb"><?php the_post_thumbnail();//アイキャッチ画像の出力 ?></div><?php } ?>
	
	<div><?php the_excerpt();//投稿本文の出力（抜粋） ?></div>
	
	<?php //comments_template(); //コメント欄の出力 ?>
	
	<div class="postinfo">
	カテゴリー: <?php the_category(', ') ?><?php the_tags('｜タグ: ', ', ', ''); ?><br />
	<?php //comments_popup_link('コメントorトラックバックはまだありません', '1 件のコメントorトラックバック', '% 件のコメントorトラックバック'); ?>
	</div>
	
	</div><!-- /.post -->

<?php endwhile; endif; ?>
<!-- /投稿ループここまで -->


<!-- /loop -->