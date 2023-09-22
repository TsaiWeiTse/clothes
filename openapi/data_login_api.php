<?php
    // 前台網域名稱
    header("Access-Control-Allow-Origin: https://tsaiweitse.github.io");

    $url = 'https://twjzi14200.000webhostapp.com/api/login_api.php';
    $thisData = file_get_contents($url);
    echo $thisData;
?>