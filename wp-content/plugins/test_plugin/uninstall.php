<?php
/**
 *  @package TestPlugin
 */


 if(!defined('WP_UNISTALL_PLUGIN')){
     die;
 }

 //clear database

/*  $books=get_post( array('post_type'=> 'book','numberposts'=> -1) );
 foreach ($books as $book) {
     wp_delete_post( $book->ID,true );
 } */


 global $wbdb;
 $wpdb->query("DELETE From wp_posts Where post_type = 'book'");

 $wpdb->query("DELETE From wp_postmeta where post_id NOT IN ( select id from wp_posts)");