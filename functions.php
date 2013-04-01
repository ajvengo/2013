<?php

add_action('wp_enqueue_scripts', 'flatui_js');
add_action('wp_enqueue_scripts', 'flatui_css');

function flatui_css() {
	wp_register_style('flatui-bootstrap.css', '//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.1/css/bootstrap.min.css');
	wp_enqueue_style('flatui-bootstrap.css'); 
	wp_register_style('flatui-bootstrap-responsive.css', "//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.1/css/bootstrap-responsive.min.css");
	wp_enqueue_style('flatui-bootstrap-responsive.css'); 

	wp_register_style('flatui-normalize.css', get_stylesheet_directory_uri() . '/css/normalize.css');
	wp_enqueue_style('flatui-normalize.css'); 

	wp_register_style('flatui-main.css', get_stylesheet_directory_uri() . '/css/main.css');
	wp_enqueue_style('flatui-main.css'); 
	if (!is_front_page()) {
		wp_register_style('flatui-blog.css', get_stylesheet_directory_uri() . '/css/blog.css');
		wp_enqueue_style('flatui-blog.css'); 
	}
}

function flatui_js() {
	wp_enqueue_script('modernizr.js', get_stylesheet_directory_uri() . "/js/vendor/modernizr-2.6.2.min.js", array(), '1.0');
	if (is_front_page()) {
		wp_enqueue_script('customize-twitter-1.1.min.js', get_stylesheet_directory_uri() . '/js/vendor/customize-twitter-1.1.min.js', array(), '1.0', true);
	}
	wp_enqueue_script('main.js', get_stylesheet_directory_uri() . '/js/main.js', array('jquery'), '1.0', true);
	wp_enqueue_script('plugins.js', get_stylesheet_directory_uri() . '/js/plugins.js', array('jquery'), '1.0', true);
}

function posted_on() {
    printf( __( '<span class="sep">Posted on </span><a href="%1$s"
title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s"
pubdate>%4$s</time></a>', 'twentyeleven' ),
        esc_url( get_permalink() ),
        esc_attr( get_the_time() ),
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date() )
    );
}

