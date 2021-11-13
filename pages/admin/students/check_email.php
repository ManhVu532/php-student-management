<?php
require_once("../../../utils/db_helper.php");
require_once("../../../utils/utils.php");

if (isset($_POST['email']) && isset($_POST['id'])) {
    if (!empty($_POST['email'])) {
        $email = $_POST['email'];
        $id = $_POST['id'];
        $sql = "SELECT * FROM user_tbl WHERE email = '$email' AND id != '$id';";
        $result = executeResult($sql);
        if (count($result) > 0) {
            echo json_encode(array("status" => "success", "message" => "Email đã tồn tại"));
            exit();
        } else {
            echo json_encode(array("status" => "error", "message" => "OK"));
            exit();
        }
    }
}
echo json_encode(array("status" => "error", "message" => "Không có email!"));
exit();
