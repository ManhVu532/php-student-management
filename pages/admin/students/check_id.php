<?php
require_once("../../../utils/db_helper.php");
require_once("../../../utils/utils.php");

if (isset($_POST['id'])) {
    if (!empty($_POST['id'])) {
        $id = $_POST['id'];
        $sql = "SELECT * FROM user_tbl WHERE id = '$id'";
        $result = executeResult($sql);
        if (count($result) > 0) {
            echo json_encode(array("status" => "success", "message" => "Mã sinh viên đã tồn tại"));
            exit();
        } else {
            echo json_encode(array("status" => "error", "message" => "OK"));
            exit();
        }
    }
}
echo json_encode(array("status" => "error", "message" => "Không có id!"));
exit();
