<?php
/* header.php *
　すべてのページにおいて共通で読み込むヘッダーテンプレート。
 */

include(TEMPLATEPATH . '/inc/constants.php');

?>
<!doctype html>
<html lang="ja">

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
	<meta name="format-detection" content="telephone=no">

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_head(); ?>
</head>

<body>
	<header class="global-header">
		<div class="inner">
			<div class="header-logo">
				<a href="<?php echo SITE_URL; ?>/">
					<h1><img src="<?= TMP_URL ?>/images/header/headerLogo.png" alt="サイト名"></h1>
				</a>
			</div>
			<nav class="global-menu" id="global-menu">
				<ul>
				</ul>
			</nav>
		</div>
		<!-- スマホハンバーガーメニュー	
		<div class="smp__inner">
			<div class="header-logo">
				<a href="<?php echo SITE_URL; ?>/"><img src="<?= TMP_URL ?>/images/header/headerLogo.png" alt="サイト名"></a>
			</div>
			<div class="menu">
				<span class="menu__line menu__line--top"></span>
				<span class="menu__line menu__line--center"></span>
				<span class="menu__line menu__line--bottom"></span>			
			</div>

			<nav class="global-menu">
				<ul>
				</ul>
			</nav>
			<script>
			$('.menu').on('click',function(){
				$('.menu__line').toggleClass('active');
				$('.gnav').toggleClass('menuopen');
			});
			</script>
		</div>
		 -->
	</header><!-- #main-header -->

	<!-- Header END -->