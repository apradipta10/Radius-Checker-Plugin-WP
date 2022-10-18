<?php

// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

$rc_gmaps_api_key = 'rc_gmaps_api_key';
$rc_gmaps_zone_url = 'rc_gmaps_zone_url';
$rc_action_url_inside = 'rc_action_url_inside';
$rc_action_url_outside = 'rc_action_url_outside';

delete_option($rc_gmaps_api_key);
delete_option($rc_gmaps_zone_url);
delete_option($rc_action_url_inside);
delete_option($rc_action_url_outside);

?>