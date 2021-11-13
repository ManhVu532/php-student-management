<?php
require_once("../../../utils/db_helper.php");
require_once("../../../utils/utils.php");

if (isset($_POST['phoneNumber']) && isset($_POST['id'])) {
    if (!empty($_POST['phoneNumber'])) {
        $phoneNumber = $_POST['phoneNumber'];
        $id = $_POST['id'];
        $sql = "SELECT * FROM user_tbl WHERE phoneNumber = '$phoneNumber' AND id != '$id'";
        $result = executeResult($sql);
        if (count($result) > 0) {
            echo json_encode(array("status" => "success", "message" => "Số điện thoại đã tồn tại"));
            exit();
        } else {
            echo json_encode(array("status" => "error", "message" => "OK"));
            exit();
        }
    }
}
echo json_encode(array("status" => "error", "message" => "Không có phoneNumber!"));
exit();
