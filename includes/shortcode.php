<?php

    function rc_shortcode($atts) {
        
        if ($_POST['user_address'] != '') {
            update_option('rc_user_address', $_POST['user_address']);
            // update_option('rc_action_url_inside', $_POST['action_url_inside']);
            // update_option('rc_action_url_outside', $_POST['action_url_outside']);
        }
        
        $data = shortcode_atts(
            array(
                'user_address' => $user_address,
                'rc_gmaps_api_key_user' => get_option('rc_gmaps_api_key')
            ),$atts
        );
        
        return '
        <style>
        .rc-form-group {
            margin-bottom: 1rem;
        }
        label {
            display: inline-block;
            margin-bottom: 0.5rem;
        }
        .rc-form-control {
            display: block;
            width: 100%;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            max-width: -webkit-fill-available;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }
        .rc-form-text {
            display: block;
            margin-top: 0.25rem;
            color:#6c757d;
        }
        .rc-btn {
            display: inline-block;
            font-weight: 400;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: -9.75rem;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
            cursor:pointer;
        }
        .rc-btn-primary {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 0.25rem;
        }
        </style>
        <form action="" method="POST" novalidate="novalidate">
            <div class="rc-form-group">
                <label for="user_address">Input address</label>
                <input type="text" class="rc-form-control" name="user_address" id="user_address" aria-describedby="rcinputAddressHelp" placeholder="Enter the address">
                <small id="rcinputAddressHelp" class="rc-form-text">Please input the address so we can check the weather</small>
             </div>
            <button type="submit" class="rc-btn rc-btn-primary">Submit</button>
        </form>
        ';
    }

?>