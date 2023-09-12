<?php
if (isset($_POST["uid"])) {
    if ($_POST["uid"] != "") {

        require_once "dbtools.php";
        $conn = create_connect();

        $p_uid = $_POST["uid"];

        $sql = "SELECT Uid, userName, userPwd, userPhone, userAddr, userMail, userAdmin, userState FROM member WHERE Uid = '$p_uid'";

        $result = execute_sql($conn, 'id21250012_clothes', $sql);

        if (mysqli_num_rows($result) == 1) {
            $userDataBase = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $userDataBase[] = $row;
            }
            echo '{"state" : true, "message" : "UID驗證成功", "data" : ' . json_encode($userDataBase) . '}';
        } else {
            echo '{"state" : false, "message" : "UID驗證失敗"}';
        }
    } else {
        echo '{"state" : false, "message" : "欄位不得空白"}';
    }
} else {
    echo '{"state" : false, "message" : "欄位錯誤"}';
}

mysqli_close($conn);
