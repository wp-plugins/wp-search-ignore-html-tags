<?php
/*
Plugin Name: Search Ignore HTML Tags
Description: Updated the native search to ignore html tags.
Version: 1.0
Author: Pramod Sivadas
License: GPL2
*/

add_filter('posts_where', 'update_search_query' );

function update_search_query($where)
{
    if( is_search() ) {
        global $wpdb;
        $query = get_search_query();
        $query = like_escape($query );

        $where .=" AND {$wpdb->posts}.post_content NOT REGEXP  '\<{1}.*$query.*\>{1}' ";
    }
    return $where;
}