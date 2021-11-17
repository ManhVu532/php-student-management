<?php
require_once("../../../utils/db_helper.php");
require_once("../../../utils/utils.php");

if (isset($_POST['id']) && isset($_POST['password'])) {
    $user_id = $_POST['id'];
    $password = validate_data($_POST['password']);

    $sql = "SELECT `password` FROM user_tbl WHERE id = 'admin'";

    $result = executeResult($sql);
    if (count($result) > 0) {
        $admin_password = $result[0]['password'];
        if (password_verify($password, $admin_password)) {
            $sql = "SELECT * FROM user_tbl WHERE id ='$user_id';";
            $result = executeResult($sql);

            if (count($result) == 0) {
                echo json_encode(array("status" => "error", "message" => "Không tìm thấy sinh viên cần xóa!"));
                exit();
            }

            $sql = "DELETE FROM user_tbl WHERE id = '$user_id'";
            executeQuery($sql);
            echo json_encode(array("status" => "success", "message" => "Xóa tài khoản sinh viên thành công!"));
            exit();
        } else {
            echo json_encode(array("status" => "error", "message" => "Mật khẩu không chính xác"));
            exit();
        }
    } else {
        echo json_encode(array("status" => "error", "message" => "Không tìm thấy tài khoản admin"));
        exit();
    }
} else {
    echo json_encode(array("status" => "error", "message" => "Thiếu thông tin yêu cầu"));
    exit();
}
