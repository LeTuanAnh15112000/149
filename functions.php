<?php
/* functions.php *
	テーマにさまざまな付加機能を設定するためのファイル。

 */


function pluscloud_setup_theme()
{
	add_theme_support('title-tag');
}
add_action('after_setup_theme', 'pluscloud_setup_theme');

/* タイトルからキャッチフレーズを削除 */
function remove_tagline($title)
{
	if (isset($title['tagline'])) {
		unset($title['tagline']);
	}
	return $title;
}
add_filter('document_title_parts', 'remove_tagline');
function custom_title_separator($sep)
{
	$sep = '|';
	return $sep;
}
add_filter('document_title_separator', 'custom_title_separator');


function pluscloud_scripts()
{

	//google font読み込み方法（ex:notosans）
	// wp_enqueue_style('notosansjp', 'https://fonts.googleapis.com/earlyaccess/notosansjapanese.css');

	//　CSS、JSの読み込み方法
	// wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer );
	//wp_enqueue_style( $handle, $src, $deps, $ver, $media );

	// WordPress本体のjquery.jsを読み込まない
	wp_deregister_script('jquery');
	//　jQueryの読み込み（ここではver3.4,1をCDNで読み込んでいる）
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', array(), '1', true);
	wp_enqueue_script('jquery-easing', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js', array(), '1', true);

	//　自分が使用しているjsファイルを指定
	// wp_enqueue_script( 'commonjs', get_theme_file_uri( '/js/common.js' ), array(), '1', true );

	wp_enqueue_style('normalize', get_template_directory_uri() . '/normalize.css');
	wp_enqueue_style('style', get_template_directory_uri() . '/style.css');

	//IE8以前での表示のためのもの
	wp_enqueue_script('html5', get_theme_file_uri('/js/html5.js'), array());
	wp_script_add_data('html5', 'conditional', 'lt IE 9');
}
add_action('wp_enqueue_scripts', 'pluscloud_scripts');





// wp_head()の出力タグの消去　表示させたくないもののコメントアウトを外す
//remove_action('wp_head', 'wp_enqueue_scripts', 1);
//remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
//remove_action('wp_head', 'feed_links_extra',3,0);
//remove_action('wp_head', 'rsd_link');
//remove_action('wp_head', 'wlwmanifest_link');
//remove_action('wp_head', 'index_rel_link');
//remove_action('wp_head', 'parent_post_rel_link');
//remove_action('wp_head', 'start_post_rel_link');
//remove_action('wp_head', 'rel_canonical');
//remove_action('wp_head', 'wp_generator');

//ウィジェット有効化
register_sidebar(array(
	'name' => 'サイドバーウィジェット',
	//ウィジェット項目の前後に出力するタグ
	'before_widget' => '<div class="widget">',
	'after_widget' => '</div>',
	//ウィジェット項目のタイトル前後に出力するタグ
	'before_title' => '<h3>',
	'after_title' => '</h3>'
));

//ウィジェット有効化
register_sidebar(array(
	'name' => 'フッターウィジェット（左）',
	//ウィジェット項目の前後に出力するタグ
	'before_widget' => '<div class="widget">',
	'after_widget' => '</div>',
	//ウィジェット項目のタイトル前後に出力するタグ
	'before_title' => '<h3>',
	'after_title' => '</h3>'
));

//ウィジェット有効化
register_sidebar(array(
	'name' => 'フッターウィジェット（中）',
	//ウィジェット項目の前後に出力するタグ
	'before_widget' => '<div class="widget">',
	'after_widget' => '</div>',
	//ウィジェット項目のタイトル前後に出力するタグ
	'before_title' => '<h3>',
	'after_title' => '</h3>'
));

//ウィジェット有効化
register_sidebar(array(
	'name' => 'フッターウィジェット（右）',
	//ウィジェット項目の前後に出力するタグ
	'before_widget' => '<div class="widget">',
	'after_widget' => '</div>',
	//ウィジェット項目のタイトル前後に出力するタグ
	'before_title' => '<h3>',
	'after_title' => '</h3>'
));

//カスタムメニュー有効化
register_nav_menus(array(
	'global' => 'グローバルナビゲーション',
	//2つ目のメニューを作りたい時は上の行と同様に増やす
	//'menu-slug' => 'メニューの日本語名'
));

//カスタムヘッダー機能有効化
add_theme_support('custom-header', array(
	'width'         => 940,
	'height'        => 240,
	'default-image' => get_template_directory_uri() . '/img/headerimg.jpg',
));

//背景画像をアップロードして変更できる機能を有効化
add_theme_support('custom-background');

//投稿とコメントの RSS フィードリンクを有効化
add_theme_support('automatic-feed-links');

//アイキャッチ画像に対応
add_theme_support('post-thumbnails');
//　↓width,height,切り抜き(true)orリサイズ(false)
set_post_thumbnail_size(650, 160, true);

//ビジュアルエディタ用のCSSを有効化
add_editor_style('editor-style.css');

//「続きを読む」クリック後のURLから#more-$id を削除
function custom_content_more_link($output)
{
	$output = preg_replace('/#more-[\d]+/i', '', $output);
	return $output;
}
add_filter('the_content_more_link', 'custom_content_more_link');





//★★★バージョン更新を非表示にする★★★
if (!current_user_can('level_10')) {
	add_filter('pre_site_transient_update_core', '__return_zero');
	// APIによるバージョンチェックの通信をさせない
	remove_action('wp_version_check', 'wp_version_check');
	remove_action('admin_init', '_maybe_update_core');
}

//★★★ダッシュボードの特定のウィジェットを非表示★★★
function example_remove_dashboard_widgets()
{
	if (!current_user_can('level_10')) { //level10以下のユーザーの場合ウィジェットをunsetする
		global $wp_meta_boxes;
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']); // WordPressブログ
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']); // 現在の状況
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_browser_nag']); // 現在の状況
	}
}
add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets');

//★★★メニューを非表示にする★★★
function remove_menus()
{
	if (!current_user_can('level_10')) { //level10以下のユーザーの場合メニューをunsetする
		remove_menu_page('wpcf7'); //Contact Form 7
		global $menu;
		//unset($menu[20]); // 固定ページ
		unset($menu[25]); // コメント
		unset($menu[60]); // テーマ
		unset($menu[65]); // プラグイン
		unset($menu[75]); // ツール
		unset($menu[80]); // 設定
	}
}
add_action('admin_menu', 'remove_menus');


//★★★管理画面のフッター★★★
// add_filter('admin_footer_text', 'custom_admin_footer');
// function custom_admin_footer() {
// $ch = curl_init(); curl_setopt($ch, CURLOPT_URL, "http://admin.plust.biz/wp-plus-cloud/admin_footer.php"); curl_setopt($ch, CURLOPT_HEADER, 0); curl_exec($ch); curl_close($ch);
// }

//★★★ログイン画面のロゴ★★★
/*function custom_login_logo() {
$ch = curl_init(); curl_setopt($ch, CURLOPT_URL, "http://admin.plust.biz/wp-plus-cloud/admin_login.php"); curl_setopt($ch, CURLOPT_HEADER, 0); curl_exec($ch); curl_close($ch);
}
add_action('login_head', 'custom_login_logo');*/
function custom_login()
{
	echo '<style>.login h1 a { background-image:url(' . get_template_directory_uri() . '/logo-login.png) !important; background-size:312px 253px !important; width:312px !important; height:253px !important; }</style>';
}
add_action('login_enqueue_scripts', 'custom_login');


//★★★上部ツールバー★★★
function my_admin_bar_custom($wp_admin_bar)
{
	$wp_admin_bar->remove_menu('wp-logo');
	$wp_admin_bar->remove_menu('header');
	$wp_admin_bar->remove_menu('background');
	$wp_admin_bar->remove_menu('menus');
	$wp_admin_bar->remove_menu('widgets');
	$wp_admin_bar->remove_menu('customize');
	$wp_admin_bar->remove_menu('themes');
	$wp_admin_bar->remove_menu('new-page');
}
add_action('admin_bar_menu', 'my_admin_bar_custom', 1000);


//★★★archive・category・taxonomyでのterm取得★★★
function get_current_term()
{
	$id;
	$tax_slug;
	if (is_category()) {
		$tax_slug = "category";
		$id = get_query_var('cat');
	} else if (is_tag()) {
		$tax_slug = "post_tag";
		$id = get_query_var('tag_id');
	} else if (is_tax()) {
		$tax_slug = get_query_var('taxonomy');
		$term_slug = get_query_var('term');
		$term = get_term_by("slug", $term_slug, $tax_slug);
		$id = $term->term_id;
	}

	return get_term($id, $tax_slug);
}


// the_excerpt のカスタマイズ
function custom_excerpt_length($length)
{
	return 40;
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);

function new_excerpt_more($more)
{
	return '<a href="' . get_permalink() . '">' . '･･･続きを読む</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

// wp_get_archives のカスタマイズ
add_filter('get_archives_link', 'my_archives_link');
function my_archives_link($output)
{
	$html = str_replace('年', '.', $output);
	$html = str_replace('月', '', $html);
	$output = preg_replace('/<\/a>\s*(&nbsp;)\((\d+)\)/', ' ($2)</a>', $html);
	return $output;
}

//wp_list_categories　のカスタマイズ
add_filter('wp_list_categories', 'my_list_categories');
function my_list_categories($output)
{
	$output = preg_replace('/<\/a>\s*\((\d+)\)/', ' ($1)</a>', $output);
	return $output;
}


//カテゴリーの選択数を１件に制限（使用しない場合は削除してください。）
/*
add_action('admin_print_footer_scripts', 'limit_category_select');
function limit_category_select()
{
	?>
<script type="text/javascript"> 
		jQuery(function($) {
			// 投稿画面のカテゴリー選択を制限
			var cat_checklist = $('.categorychecklist input[type=checkbox]');
			cat_checklist.click(function() {
				$(this).parents('.categorychecklist').find('input[type=checkbox]').attr('checked', false);
				$(this).attr('checked', true);
			});

			// クイック編集のカテゴリー選択を制限
			var quickedit_cat_checklist = $('.cat-checklist input[type=checkbox]');
			quickedit_cat_checklist.click(function() {
				$(this).parents('.cat-checklist').find('input[type=checkbox]').attr('checked', false);
				$(this).attr('checked', true);
			});

			$('.categorychecklist>li:first-child, .cat-checklist>li:first-child').before('<p style="padding-top:5px;">カテゴリーは1つしか選択できません</p>');
		});
	</script>
<?php
} */
//カテゴリーの選択数を１件に制限　ここまで


//アイキャッチ画像に対応
add_theme_support('post-thumbnails');
//　↓width,height,切り抜き(true)orリサイズ(false)
set_post_thumbnail_size(350, 350, true);
add_image_size('thumb01', 125, 125, true);
add_image_size('teaser02', 1000, 320, true);


function imagepassshort($arg)
{
	$content = str_replace('"image/', '"' . get_template_directory_uri() . '/image/', $arg);
	return $content;
}
add_action('the_content', 'imagepassshort');


/* archive author redirect */
function slug_redirect_author_archive()
{
	if (is_author()) {
		wp_redirect(home_url());
		exit;
	}
}
add_action('template_redirect', 'slug_redirect_author_archive');


/* カスタム投稿
add_action( 'init', 'create_post_type' );
function create_post_type() {

	register_post_type( 'aboutus', array(
		'label' => 'お客様の声',
		'labels' => array(
			'all_items' => '一覧',
			'add_new_item' => '追加',//「新規投稿」の代わりに表示させる、ダッシュボードのボタン下の言葉
			'add_new' => '追加',//「新規投稿を追加」の代わりに表示させる、新規投稿画面の左上に表示される言葉
			'view_item' => 'ページを確認',//「投稿を表示」の代わりに表示される、記事編集画面の上に表示されるボタンの言葉
			'search_items' => 'トピックスを検索',//「投稿を検索」の代わりに表示させる、記事一覧画面の右上検索BOX横に表示されるボタンの言葉
		),
		'public' => true,//publicly_queriable, show_ui, show_in_nav_menus, exclude_from_search の値をまとめてtrueに
		'exclude_from_search' => false, //検索結果からこの投稿タイプを除外しない
		'hierarchical' => false,//投稿っぽく記事を積み上げていくならfalse, ページっぽく階層を認めるならtrue
		'supports' => array(  //このカスタム投稿の編集ページで表示させる項目
			//title/タイトル　editor/本文　author/作成者　thumbnail/アイキャッチ画像　excerpt/抜粋　comments/コメント
			//trackbacks/トラックバック　custom-fields/カスタムフィールド　revisions/リビジョン　page-attributes/属性
			'title', 'editor', 'thumbnail',
		),
		'menu_position' => 5, //このカスタム投稿のボタンをダッシュボード上からの何番目に表示させるか。
		'has_archive' => true,//アーカイブページを生成するかどうか。 true またはスラッグを指定で生成
		'rewrite' => true //このフォーマットでパーマリンクをリライト。trueならカスタム投稿タイプのスラッグを使う。'hoge'と指定すると、パーマリンクはhogeが使われる
		)
	);
	register_taxonomy(
		'aboutus_cat', // 分類名
		'aboutus',  // 投稿タイプ名
		array(
			//'label' => '', // フロントで表示する分類名
			'hierarchical' => true,   // 階層構造か否か（trueの場合はカテゴリー、falseの場合はタグ）
			'query_var' => true,
			'rewrite' => true
		)
	);

}*/


// //カスタム投稿のページ送りを設定
// function parse_query( $query ) {
// 	if ( is_admin()  ){//管理画面の編集一覧の時のページ送り設定
// 			return;
// 	}else if (  get_query_var( 'post_type' ) == 'info' ) {//posttypeがinfoの時
// 			$query->set( 'posts_per_page', 10 );
// 	}else if(　is_tax('staff_cat') ){//タクソノミーがstaff_catのとき
// 		$query->set( 'posts_per_page', 6 );
// 	}else if (  is_archive( )) {//arichiveの時
// 		$query->set( 'posts_per_page', 6 );
// 	}

// 	return;
// }
// add_action( 'pre_get_posts', 'parse_query'  );



//カスタム投稿ページのパーマリンク名を投稿タイトルからページIDに変更
// add_filter( 'post_type_link', 'my_post_type_link', 1, 2 );
// function my_post_type_link( $link, $post ){
//   if ( 'service' === $post->post_type ) {
//     return home_url( '/service/' . $post->ID );
// 	} else {
//     return $link;
//   }
// }
 
// add_filter( 'rewrite_rules_array', 'my_rewrite_rules_array' );
// function my_rewrite_rules_array( $rules ) {
//   $service_rules = array( 
//     'service/([0-9]+)/?$' => 'index.php?post_type=service&p=$matches[1]',
// 	);
//   return $service_rules + $rules;
// }