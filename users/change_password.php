<?php
    require_once('../utils/db_helper.php');
    require_once('../utils/utils.php');

    if(isset($_POST['newPassword']) && isset($_POST['oldPassword']) && isset($_POST['confirmPassword']) && isset($_POST['id'])){
        $oldPassword = validate_data($_POST['oldPassword']);
        $newPassword = validate_data($_POST['newPassword']);
        $confirmPassword = validate_data($_POST['confirmPassword']);
        $id = validate_data($_POST['id']);

        if(empty($id)){
            echo json_encode(array('status' => 'error', 'message' => 'Thiếu mã người dùng'));
            exit();
        }
        if(empty($confirmPassword) || empty($newPassword) || empty($oldPassword)){
            echo json_encode(array('status' => 'error', 'message' => 'Vui lòng nhập đầy đủ thông tin'));
            exit();
        }

        $sql = "SELECT * FROM user_tbl WHERE id = '".$id."';";

        $result = executeResult($sql);
        if(count($result) == 0){
            echo json_encode(array('status' => 'error', 'message' => 'Không tìm thấy người dùng'));
            exit();
        }

        if(!password_verify($oldPassword, $result[0]['password'])){
            echo json_encode(array('status' => 'error', 'message' => 'Mật khẩu cũ không đúng!!!!'));
            exit();
        }

        $error = validate_password($newPassword);
        if($error){
            echo json_encode(array('status' => 'error', 'message' => $error));
            exit();
        }

        if($newPassword != $confirmPassword){
            echo json_encode(array('status' => 'error', 'message' => 'Mật khẩu mới và xác nhận mật khẩu không khớp'));
            exit();
        }

        $newPassword = password_hash($newPassword, PASSWORD_BCRYPT);
        $sql = 'UPDATE user_tbl SET password = "'.$newPassword.'", updateAt=CURRENT_TIMESTAMP WHERE id = "'.$id.'";';

        executeQuery($sql);

        echo json_encode(array('status' => 'success', 'message' => 'Cập nhật mật khẩu thành công'));
        exit();
    }else{
        echo json_encode(array('status' => 'error', 'message' => 'Vui lòng nhập đầy đủ thông tin'));
        exit();
    }
