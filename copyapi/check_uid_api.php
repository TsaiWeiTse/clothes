<?php
    if(isset($_POST["uid"])){
        if($_POST["uid"] != ""){
            require_once "dbtools.php";
                $conn = create_connect();
                
                $p_uid = $_POST["uid"];
                $sql = "SELECT ID, Username, Nickname, Email, Address, Phonenumber, Created_at, Uid01 FROM member WHERE Uid01 = '$p_uid'";
                $result = execute_sql($conn, 'testdb', $sql);

                if (mysqli_num_rows($result) == 1) {
                    $mydata = array();
                    while($row = mysqli_fetch_assoc($result)){
                        $mydata[] = $row;
                    }
                    echo '{"state" : true, "message" : "UID驗證成功", "data" : ' .json_encode($mydata). '}';
                } else {
                    echo '{"state" : false, "message" : "UID驗證失敗"}';
                }
        }else{
                echo '{"state" : false, "message" : "欄位不允許空白"}';
        }
    }else{
        echo '{"state" : false, "message" : "欄位錯誤!"}';
    }
    

    mysqli_close($conn);
