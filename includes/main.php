<?php
    if (isset($_POST['gmaps_api_key'])) {
        update_option('rc_gmaps_api_key', $_POST['gmaps_api_key']);
        update_option('rc_gmaps_zone_url', $_POST['gmaps_zone_url']);
        // update_option('rc_action_url_inside', $_POST['action_url_inside']);
        // update_option('rc_action_url_outside', $_POST['action_url_outside']);
       
        echo '
        <div class="notice notice-success is-dismissible">
            <p>Settings saved.</p>
        </div>';
    }
    
    include('preview-maps.php');
    
    echo 
    '
    <link rel="stylesheet" href="//cdn.jsdelivr.net/gh/dmhendricks/bootstrap-grid-css@4.1.3/dist/css/bootstrap-grid.min.css" />
    <div class="bootstrap-wrapper">
        <div class="container-fluid" style="padding-left:0;">
            <div class="row">
                <div class="col-md-6">
                    <div class="card" style="max-width:100%;"> 
                        <form action="" method="POST" novalidate="novalidate">
                            <table class="form-table">
                                <tbody>
                                    <tr>
                                    <th scope="row"><label for="gmaps_api_key">Google Map API key</label></th>
                                    <td><input name="gmaps_api_key" type="text" id="gmaps_api_key" value="'.get_option('rc_gmaps_api_key').'" class="regular-text">
                                    <p class="description" id="gmaps_zone_url">
                                    learn this <a href="//developers.google.com/maps/documentation/javascript/get-api-key" target="_blank">Documentation</a> to get Google maps API Key</p></td>
                                    </tr>
                                    
                                    <tr>
                                    <th scope="row"><label for="gmaps_zone_url">Google Map Zone URL</label></th>
                                    <td>
                                    <input name="gmaps_zone_url" type="text" id="gmaps_zone_url" 
                                    value="'.get_option('rc_gmaps_zone_url').'" class="regular-text">
                                    <p class="description" id="gmaps_zone_url">
                                    for the input you should use the KML link</p>
                                    </td>
                                    </tr>
                                    
                                    <tr>
                                        <td style="padding-left:0;">
                                        <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"></p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card" style="max-width:100%; padding:0;">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    ';
    
    echo '
     <div class="bootstrap-wrapper" style="margin-top:1.2rem;">
        <div class="container-fluid" style="padding-left:0;">
            <div class="row">
                <div class="col-md-6">
                    <h2><span class="dashicons dashicons-heart"></span> Working with shortcode</h2>
                    <p>for using shortcode you can put code below into the page that you want</p>
                    <div class="code"> [radius_checker] </div>
                </div>
            </div>
        </div>
    </div>
    ';
    
    //  <tr>
    //                                 <th scope="row"><label for="action_url_inside">Action URL (Inside)</label></th>
    //                                 <td><input name="action_url_inside" type="text" id="action_url_inside" value="'.get_option('rc_action_url_inside').'" class="regular-text"></td>
    //                                 </tr>
                                    
    //                                 <tr>
    //                                 <th scope="row"><label for="action_url_outside">Action URL (Outside)</label></th>
    //                                 <td><input name="action_url_outside" type="text" id="action_url_outside" value="'.get_option('rc_action_url_outside').'" class="regular-text"></td>
    //                                 </tr>
?>