<?php
/* sidebar.php *
	右側のサブカラム部分。複数ウィジェットに対応。
 */
?>
<!-- Sidebar -->
<aside id="sidebar">
	
	<h2>カテゴリー</h2>
	<ul>
		<?php wp_list_categories('show_count=0&title_li='); ?>
	</ul>
	
	<h2>月別アーカイブ</h2>
	<ul>
		<?php wp_get_archives( 'type=monthly&show_post_count=1' ); ?>
	</ul>
	
</aside><!-- /#side-bar -->
<!-- /Sidebar -->

<div class="clearfix"></div>