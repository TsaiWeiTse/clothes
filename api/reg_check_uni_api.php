<?php
if (isset($_POST["username"])) {
    if ($_POST["username"] != "") {

        require_once "dbtools.php";
        $conn = create_connect();

        $p_username = $_POST["username"];

        $sql = "SELECT userName FROM member WHERE userName = '$p_username'";
        $result = execute_sql($conn, 'id21250012_clothes', $sql);

        if (mysqli_num_rows($result) == 0) {
            echo '{"state" : true, "message" : "此帳號不存在，可以使用"}';
        } else {
            echo '{"state" : false, "message" : "此帳號已存在，不可以使用"}';
        }
        mysqli_close($conn);
    } else {
        echo '{"state" : false, "message" : "欄位不得空白"}';
    }
} else {
    echo '{"state" : false, "message" : "欄位錯誤"}';
}
mysqli_close($conn);
