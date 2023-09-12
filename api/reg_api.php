<?php
if(isset($_POST["username"]) && isset($_POST["userpwd"]) && isset($_POST["userphone"]) && isset($_POST["useraddr"]) && isset($_POST["usermail"])){
    if(($_POST["username"]) != "" && ($_POST["userpwd"]) != "" && ($_POST["userphone"]) != "" && ($_POST["useraddr"]) != "" && ($_POST["usermail"]) != ""){

        require_once "dbtools.php";
        $conn = create_connect();
        
        $p_username   = $_POST["username"];
        $p_userpwd    = substr(md5($_POST["userpwd"]), 5, 5).substr(md5($_POST["userpwd"]), 0, 3); //密碼加密
        $p_userphone  = $_POST["userphone"];
        $p_useraddr   = $_POST["useraddr"];
        $p_usermail   = $_POST["usermail"];

        // userAdmin（管理權限） 1是管理員，2是使用者，所以固定為2
        // userState（是否啟用） Y是啟用，N是停權，預設是Y
        $sql = "INSERT INTO member(userName, userPwd, userPhone, userAddr, userMail, userAdmin, userState) VALUES ('$p_username', '$p_userpwd', '$p_userphone', '$p_useraddr', '$p_usermail', '2', 'Y')";

        if(execute_sql($conn, 'id21250012_clothes', $sql)){
            echo '{"state" : true, "message" : "註冊成功"}';
        }else{
            echo '{"state" : false, "message" : "註冊失敗"}';
        }
        mysqli_close($conn);
    }else{
        echo '{"state" : false, "message" : "欄位不得空白"}';
    }
}else{
    echo '{"state" : false, "message" : "欄位錯誤"}';
}
mysqli_close($conn);
