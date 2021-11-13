<?php
require_once('../../../utils/db_helper.php');
require_once('../../../utils/utils.php');
session_start();
    if(isset($_POST['avatar']) && $_POST['id']){
        $id = $_POST['id'];
        $avatar = $_POST['avatar'];
        $avatar = validate_data($avatar);
        $id = validate_data($id);

        $sql = "SELECT * FROM user_tbl WHERE id = '$id'";
        $users = executeResult($sql);
        if(count($users)==0) {
            echo json_encode(array('status' => 'error', 'message' => 'Không tìm thấy người dùng!'));
            exit();
        }

        $query = "UPDATE user_tbl SET avatar = '$avatar', updateAt=CURRENT_TIMESTAMP WHERE id = '$id'";
        executeQuery($query);
        $user = $users[0];

        $user['avatar'] = $avatar;
        $_SESSION['user'] = json_encode($user);
        
        echo json_encode(array('status' => 'success', 'message' => 'Cập nhật avatar thành công'));
    }else{
        echo json_encode(array('status' => 'error', 'message' => 'Thiếu thông tin!'));
    }

?>