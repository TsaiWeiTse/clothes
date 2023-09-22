<?php
    // 前台網域名稱
    header("Access-Control-Allow-Origin: https://tsaiweitse.github.io/clothes/");
    // 後臺連結用變數
    $apiLinks = 'https://twjzi14200.000webhostapp.com/api/';

    $url = 'https://twjzi14200.000webhostapp.com/api/login_api.php';
    $thisData = file_get_contents($url);
    echo $thisData;
?>