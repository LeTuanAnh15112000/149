<?php
include( TEMPLATEPATH . '/inc/constants.php' );
?>
<!doctype html>
<html lang="ja">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
<meta charset="<?php bloginfo('charset'); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no">
<title>おにぎり屋HANS</title>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php //メタ情報　※ACF必須
// get_template_part('parts/temp', 'meta';
?>
<?php //Headerに入れるcss,jsの記述用
// get_template_part('parts/modules', 'header');?>
<?php wp_head(); ?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=League+Gothic&family=Noto+Sans+JP:wght@400;500;600;700&family=Reggae+One&family=Zen+Maru+Gothic:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<?php
$pageClass = "";
$pageID = "";
if ( is_404() ) {
  $pageClass = "pages";
} else if ( get_post_type( get_the_ID() ) == 'news' && is_single() ) {
  $pageClass = "pages news-details";
  $pageID = "news";
} else if ( get_post_type( get_the_ID() ) == 'news' && is_tax() ) {
  $pageClass = "pages news-tax";
  $pageID = "news";
} else if ( get_post_type( get_the_ID() ) == 'news' ) {
  $pageClass = "pages";
  $pageID = "news";
} else if ( is_front_page() == false || is_home() == false ) {
  $pageClass = "pages";
  $pageID = $post->post_name;
} else {
  $pageID = "home";
}
?>
<body id="<?php echo $pageID; ?>" class="<?php echo $pageClass; ?>">
<div id="wrapper">
<header id="header">
    <div id="toggle-menu">
      <span></span>
      <span></span>
      <span></span>
    </div>
    <div class="menu">
      <div class="menu_block">
        <nav>
          <ul class="menu_list">
            <li class="menu_item"><a href="no_link">ABOUT</a></li>
            <li class="menu_item"><a href="no_link">SERVICE</a></li>
            <li class="menu_item"><a href="no_link">PHOTO</a></li>
            <li class="menu_item"><a href="no_link">HAIRMAKE</a></li>
            <li class="menu_item"><a href="no_link">CEREMONY </a></li>
            <li class="menu_item"><a href="no_link">COLLECTION</a></li>
            <li class="menu_item"><a href="no_link">NEWS</a></li>
            <li class="menu_item"><a href="no_link">CONTACT</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </header>

<!-- main start -->
<main id="main">
