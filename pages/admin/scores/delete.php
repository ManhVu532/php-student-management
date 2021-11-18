<?php
require_once("../../../utils/db_helper.php");
require_once("../../../utils/utils.php");

if (isset($_POST['id']) && isset($_POST['password']) && isset($_POST['subjectSemesterId'])) {
    $id = validate_data($_POST['id']);
    $subjectSemesterId = validate_data($_POST['subjectSemesterId']);
    $password = validate_data($_POST['password']);

    $sql = "SELECT `password` FROM user_tbl WHERE id = 'admin'";
    $result = executeResult($sql);
    
    if (count($result) > 0) {
        $admin_password = $result[0]['password'];
        if (password_verify($password, $admin_password)) {
            $sql = "SELECT * FROM register_subject WHERE userId = '$id' AND subjectSemesterId = '$subjectSemesterId';";
            $result = executeResult($sql);
            
            if (count($result) == 0) {
                echo json_encode(array("status" => "error", "message" => "Không tìm thấy thông tin sinh viên cần xóa!"));
                exit();
            }
            
            $sql = "DELETE FROM register_subject WHERE userId = '$id' AND subjectSemesterId = '$subjectSemesterId';";
            executeQuery($sql);
            echo json_encode(array("status" => "success", "message" => "Xóa thông tin sinh viên thành công!"));
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
