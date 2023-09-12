<?php
if (isset($_POST["id"]) && isset($_POST["nickname"]) && isset($_POST["email"]) && isset($_POST["address"]) && isset($_POST["phonenumber"])) {
    if ($_POST["id"] != "" && $_POST["nickname"] != "" && $_POST["email"] != "" && $_POST["address"] != "" && ($_POST["phonenumber"])) {
        $p_id = $_POST["id"];
        $p_nickname = $_POST["nickname"];
        $p_email = $_POST["email"];
        $p_address = $_POST["address"];
        $p_phonenumber = $_POST["phonenumber"];

        require_once "dbtools.php";
        $conn = create_connect();

        $sql = "UPDATE member SET Nickname = '$p_nickname', Email = '$p_email', Address = '$p_address' , Phonenumber = '$p_phonenumber' WHERE ID = $p_id";

        if (execute_sql($conn, 'testdb', $sql)) {
            echo '{"state" : true, "message" : "更新成功"}';
        } else {
            echo '{"state" : false, "message" : "更新失敗"}';
        }
        mysqli_close($conn);
    }else{
        echo '{"state" : false, "message" : "欄位不允許空白"}';
    }
}else{
    echo '{"state" : false, "message" : "欄位錯誤"}';
}


// id：編號PK（不得為空，必須存在）
// nickname：暱稱（不得為空，必須存在）
// email：信箱（不得為空，必須存在）
// address：地址（不得為空，必須存在）
// phonenumber：手機（不得為空，必須存在）