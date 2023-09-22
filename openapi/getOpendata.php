<?php
    // 前台網域名稱
    header("Access-Control-Allow-Origin: https://tsaiweitse.github.io/clothes/");
    // 後臺連結用變數
    $apiLinks = 'https://twjzi14200.000webhostapp.com/api/';




    // 後臺php連結（api）
    $api_url = [
        $apiLinks + 'admin_d_api.php',
        $apiLinks + 'admin_r_api.php',
        $apiLinks + 'admin_u_api.php',
        $apiLinks + 'admin_u_userState_api.php',
        $apiLinks + 'car_c_api.php',
        $apiLinks + 'car_d_api.php',
        $apiLinks + 'car_r_api.php',
        $apiLinks + 'car_u_api.php',
        $apiLinks + 'check_uid_api.php',
        $apiLinks + 'control_panel_u_form_userstate_api.php',
        $apiLinks + 'dbtools.php',
        $apiLinks + 'file_img_api.php',
        $apiLinks + 'form_c_api.php',
        $apiLinks + 'form_d_api.php',
        $apiLinks + 'form_r_api.php',
        $apiLinks + 'form_u_api.php',
        $apiLinks + 'form_u_api_userstate_api.php',
        $apiLinks + 'login_api.php',
        $apiLinks + 'product_c_api.php',
        $apiLinks + 'product_d_api.php',
        $apiLinks + 'product_r_api.php',
        $apiLinks + 'product_u_api.php',
        $apiLinks + 'product_u_product_api.php',
        $apiLinks + 'reg_api.php',
        $apiLinks + 'reg_check_uni_api.php',
    ];
    
    // 循環輸出 $urls 列表
    foreach ($api_url as $url) {
        $api = file_get_contents($url);
        echo $api;
    }
?>