<?php
if (isset($_POST["username"]) && isset($_POST["password"])) {
    if ($_POST["username"] != "" && $_POST["password"] != "") {
        $p_username = $_POST["username"];
        $p_password = substr(md5($_POST["password"]), 5, 5) . substr(md5($_POST["password"]), 0, 3);
        require_once "dbtools.php";

        $conn = create_connect();
        $sql = "SELECT Username,Password FROM member WHERE Username = '$p_username' AND Password = '$p_password'";
        $result = execute_sql($conn, 'testdb', $sql);

        if (mysqli_num_rows($result) == 1) {
            //登入成功
            //產生uid01：
            //1. 回傳至前端（儲存至cookie）
            $uid01 = substr(hash('sha256', uniqid(time())), 0, 10);
            //2. 也要儲存至資料庫
            $sql = "UPDATE member SET Uid01 = '$uid01' WHERE Username = '$p_username'";
            if (execute_sql($conn, 'testdb', $sql)) {
                //撈取最新會員資料
                $sql = "SELECT Username, Nickname, Email, Address, Phonenumber, Uid01, UserState FROM member WHERE Username = '$p_username' AND Password = '$p_password'";
                $result = execute_sql($conn, 'testdb', $sql);

                $mydata = array();
                while($row = mysqli_fetch_assoc($result)){
                    $mydata[] = $row;
                }

                //更新成功
                echo '{"state" : true, "message" : "登入成功", "data" : '.json_encode($mydata).'}';
            } else {
                //更新失敗
                echo '{"state" : false, "message" : "UID更新失敗"}';
            }
        } else {
            //登錄失敗
            echo '{"state" : false, "message" : "登入失敗"}';
        }
        mysqli_close($conn);
    } else {
        echo '{"state" : false, "message" : "欄位不允許空白"}';
    }
} else {
    echo '{"state" : false, "message" : "欄位錯誤!"}';
}
?>