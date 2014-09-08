<?php
/*
    Plugin Name: Export WPMU Site List to CSV
    Plugin URI: 
    Description: Exports the list of WPMU sites to a csv file.
    Version: 1.0
    Author: Matt Danskine - Lane Community College
    Author URI: http://www.lanecc.edu
*/

    // Add a page to the dashboard to display the output.
    function add_output_page() {
        add_menu_page( 'admin-menu', 'CSV Site List', 'administrator', __FILE__, 'csv_site_list');
    }

    // csv_site_list() displays the page content
    function csv_site_list() {
        echo '
            <div class="wrap">
                <h2>CSV of Site List</h2>
                <p>&nbsp;</p>
                <p><b>Below you will see an output of the site list for this WPMU server.<br>
                Just copy/paste it into a text file with a .csv extension and you can open it in Excel.</b></p>
            ';

        // Column Titles
        $content = 'BLOG_ID,SITE,REGISTERED,LAST_UPDATED,ARCHIVED,DELETED\n <br>';

        // Data in the CSV
        $sites = wp_get_sites();
        foreach( $sites as $site ){
            $content .= $site['blog_id'];
            $content .= ',';
            $content .= trim($site['path'], '/');
            $content .= ',';
            $content .= $site['registered'];
            $content .= ',';
            $content .= $site['last_updated'];
            $content .= ',';
            $content .= $site['archived'];
            $content .= ',';
            $content .= $site['deleted'];
            $content .= '\n <br>';
        }

        // Output CSV data to screen
        echo $content;

        echo '</div>';
    }

    // Added because we were throwing an error trying to get the user level
    // for if(is_super_admin()) below.
    if( ! function_exists( 'wp_get_current_user' ) ) {
        include(ABSPATH . 'wp-includes/pluggable.php');
    }

    // Add a button to the dashboard
    if( is_super_admin() ) {
        add_action( 'admin_menu', 'add_output_page');
    }
?>
