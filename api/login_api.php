<?php
if (isset($_POST["username"]) && isset($_POST["userpwd"])) {
    if ($_POST["username"] != "" && $_POST["userpwd"] != "") {

        require_once "dbtools.php";
        $conn = create_connect();

        $p_username = $_POST["username"];
        $p_userpwd = substr(md5($_POST["userpwd"]), 5, 5) . substr(md5($_POST["userpwd"]), 0, 3);

        $sql = "SELECT userName, userPwd FROM member WHERE userName = '$p_username' AND userPwd = '$p_userpwd'";
        $result = execute_sql($conn, 'id21250158_clothes', $sql);

        if (mysqli_num_rows($result) == 1) {
            //登入成功
            //產生uid：
            //1. 回傳至前端（儲存至cookie）
            $uid = substr(hash('sha256', uniqid(time())), 0, 10);
            //2. 也要儲存至資料庫
            $sql = "UPDATE member SET Uid = '$uid' WHERE userName = '$p_username'";
            if (execute_sql($conn, 'id21250158_clothes', $sql)) {
                $sql = "SELECT Uid, userName, userPwd, userPhone, userAddr, userMail, userAdmin, userState FROM member WHERE userName = '$p_username' AND userPwd = '$p_userpwd'";

                $result = execute_sql($conn, 'id21250158_clothes', $sql);

                //撈取最新會員資料，儲存到陣列
                $userDataBase = array();
                while($row = mysqli_fetch_assoc($result)){
                    $userDataBase[] = $row;
                }

                //登入成功
                echo '{"state" : true, "message" : "登入成功", "data" : '.json_encode($userDataBase).'}';
            } else {
                //UID更新失敗
                echo '{"state" : false, "message" : "UID更新失敗"}';
            }
        } else {
            //登入失敗
            echo '{"state" : false, "message" : "登入失敗"}';
        }
        mysqli_close($conn);
    } else {
        echo '{"state" : false, "message" : "欄位不得空白"}';
    }
} else {
    echo '{"state" : false, "message" : "欄位錯誤"}';
}
mysqli_close($conn);
?>