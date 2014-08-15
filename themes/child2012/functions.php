<?php 
/*
 * 在每篇文章的结尾声明原创。
 */
function insertFootNote($content) {
        if(!is_feed() && !is_home()) {
                $content.= "<div class='subscribe' style='color: red; font-weight: bold; font-size: 18px'; font-size: 1.2857142857rem>";
                $content.= "<p>原创文字，请勿转载；如需转载，请联系：<span style='color:#444;'>mouly_miro@126.com</span></p>";
                $content.= "</div>";
        }
        return $content;
}
add_filter ('the_content', 'insertFootNote');

/*
 * 用“更多欣赏”代替[...]
 */
function new_excerpt_more( $more ) {
	return ' <a class="read-more" style="float: right;" href="'. get_permalink( get_the_ID() ) . '">更多欣赏</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

/*
 * 自定义摘要内容的多少
 */
function custom_excerpt_length( $length ) {
	return 150;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// include widgets fiels
include(get_stylesheet_directory().'/widgets/Fenlei_Title.php');

/*
 * add js file to wp header
 */
function child2012_load_javascript_files() {
 
 	wp_register_script('main', get_stylesheet_directory_uri() . '/js/main.js', false,'1.10.2', true);
  //wp_register_script('jquery', get_stylesheet_directory_uri() . '/js/jquery-1.10.2.min.js', false,'1.10.2', true);
  wp_enqueue_script( 'jquery' );
  //wp_enqueue_script( 'main' );
  //add js

}

add_action( 'init', 'child2012_load_javascript_files' );
