<?php
    require_once('../../utils/db_helper.php');
    require_once('../../utils/utils.php');

    if(isset($_POST['newPassword']) && isset($_POST['repeatPassword']) && $_POST['email']){
        $newPassword = $_POST['newPassword'];
        $repeatPassword = $_POST['repeatPassword'];
        $email = $_POST['email'];

        $newPassword = str_replace('\'', '\\\'', $newPassword);
        $repeatPassword = str_replace('\'', '\\\'', $repeatPassword);
        $error = validate_password($newPassword);
        if($error){
            echo json_encode(array('status' => 'error', 'message' => $error . " " . strlen($newPassword)));
            exit();
        }

        if($newPassword != $repeatPassword){
            echo json_encode(array('status' => 'error', 'message' => 'Mật khẩu không khớp nhau'));
            exit();
        }

        // Update password for user_tbl table and hash the password with bcrypt
        $newPassword = password_hash($newPassword, PASSWORD_BCRYPT);
        $sql = 'UPDATE user_tbl SET password = "'.$newPassword.'" WHERE email = "'.$email.'";';

        executeQuery($sql);

        echo json_encode(array('status' => 'success', 'message' => 'Cập nhật mật khẩu thành công'));
    }

?>