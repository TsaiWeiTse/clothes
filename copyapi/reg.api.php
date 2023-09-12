<?php
if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["nickname"]) && isset($_POST["email"]) && isset($_POST["address"]) && isset($_POST["phonenumber"])){
    if(($_POST["username"]) != "" && ($_POST["password"]) != "" && ($_POST["nickname"]) != "" && ($_POST["email"]) != "" && ($_POST["address"]) != "" && ($_POST["phonenumber"]) != ""){
        require_once "dbtools.php";
        $conn = create_connect();
        
        $p_username     = $_POST["username"];
        //密碼加密
        $p_password     = substr(md5($_POST["password"]), 5, 5).substr(md5($_POST["password"]), 0, 3);
        $p_nickname     = $_POST["nickname"];
        $p_email        = $_POST["email"];
        $p_address      = $_POST["address"];
        $p_phonenumber  = $_POST["phonenumber"];
        
        $sql = "INSERT INTO member(Username, Password, Nickname, Email, Address, Phonenumber) VALUES ('$p_username', '$p_password', '$p_nickname', '$p_email', '$p_address', '$p_phonenumber')";

        if(execute_sql($conn, 'testdb', $sql)){
            echo '{"state" : true, "message" : "註冊成功"}';
        }else{
            echo '{"state" : false, "message" : "註冊失敗"}';
        }
        mysqli_close($conn);
    }else{
        echo '{"state" : false, "message" : "欄位不允許空白"}';
    }
}else{
    echo '{"state" : false, "message" : "欄位錯誤!"}';
}
