<?php
/* footer.php *
　すべてのページにおいて共通で読み込むフッターテンプレート。
 */
?>
	
	
	<!-- Footer -->
	<footer id="main-footer" class="">
		<div class="inner">
			<div class="footer-logo">
				<a href="<?php echo SITE_URL; ?>/">サイト名またはロゴ</a>
			</div>
			
			<nav class="footer-menu"><!-- デザインによって位置を変える -->
				<ul>
					<li><a href="#">ナビ</a></li>
					<li><a href="#">ナビ</a></li>
					<li><a href="#">ナビ</a></li>
					<li><a href="#">ナビ</a></li>
				</ul>
			</nav>
			<div class="clearfix"></div>
			
			<div class="footer-contact">
				アクセス情報
			</div>
			
		</div>
		<div class="copyright">
			Copyright (C) <?php bloginfo('name'); ?> all rights reserved.
		</div>
	</footer><!-- #main-footer -->
	<!-- Footer -->
	
<script src="<?php echo TMP_URL; ?>/js/slick/slick.min.js"></script>
<link href="<?php echo TMP_URL; ?>/js/slick/slick-theme.css" rel="stylesheet" type="text/css">
<link href="<?php echo TMP_URL; ?>/js/slick/slick.css" rel="stylesheet" type="text/css">

<?php wp_footer(); ?>
</body>
</html>