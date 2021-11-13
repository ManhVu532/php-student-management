<?php
require_once("../../../utils/db_helper.php");
require_once("../../../utils/utils.php");

if (!empty($_POST)) {
    $user_id = '';
    if (isset($_POST['id']) && isset($_POST['password'])) {
        $user_id = validate_data(strtoupper($_POST['id']));
        $password = validate_data($_POST['password']);
        if (empty($user_id) || empty($password)) {
            echo json_encode(array("status" => "error", "message" => "Thiếu thông tin các trường bắt buộc"));
            exit();
        }

        $sql = "SELECT `password` FROM user_tbl WHERE id = 'admin'";

        $result = executeResult($sql);
        if (count($result) > 0) {
            $admin_password = $result[0]['password'];
            if (password_verify($password, $admin_password)) {
                $password = password_hash(DEFAULT_PASSWORD, PASSWORD_BCRYPT);
                $sql = "UPDATE user_tabl SET `password` = '$password' WHERE id = '$user_id'";
                executeQuery($sql);
                echo json_encode(array("status" => "success", "message" => "Đặt lại mật khẩu cho sinh viên thành công!"));
                exit();
            } else {
                echo json_encode(array("status" => "error", "message" => "Mật khẩu không chính xác"));
                exit();
            }
        } else {
            echo json_encode(array("status" => "error", "message" => "Không tìm thấy tài khoản admin"));
            exit();
        }
    }
}
