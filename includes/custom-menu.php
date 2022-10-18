<?php

//add menu Radius Checker with dashicons-admin-site
function add_menu_admin() {
    add_menu_page(
        'Setting Radius Checker', 
        'Radius Checker', 
        'manage_options', 
        'radius-checker', 
        'radius_checker_function', 
        'dashicons-admin-site');
}

//add wording and function on main container
function radius_checker_function(){
    echo '
    <div class="wrap">
        <h1 style="
        font-size: 23px;
        font-weight: 400;
        margin: 0;
        padding: 9px 0 4px;
        line-height: 1.3;">
            Setting Radius Checker Plugin
        </h1>
             <p style="max-width:50%;">Custom plugin that can check whether an address is inside or outside of the service area.
             </p>
    </div>';
    include('main.php');
}

function rc_shortcode($atts) {
    
    $data = shortcode_atts(
        array(
            'user_address' => $user_address,
            'rc_gmaps_api_key_user' => get_option('rc_gmaps_api_key')
        ),$atts
    );
    
    return '
    <div id="rc_shortcode_show"> '.$data['rc_gmaps_api_key_user']. '</div>
    ';
}

//define shortcode radius_checker
add_shortcode('radius_checker', 'rc_shortcode');
//call hook add_menu with add_menu_admin function
add_action('admin_menu', 'add_menu_admin');
?>