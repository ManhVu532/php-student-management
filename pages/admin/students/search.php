<?php
require_once("../../../utils/db_helper.php");
require_once("../../../utils/utils.php");
if (isset($_GET['q'])) {
    if ($_GET['q']) {
        $q = $_GET['q'];
        $q = validate_data($q);
        $sql = "SELECT * FROM user_tbl WHERE (`id` LIKE '%$q%' OR `firstName` LIKE '%$q%' OR `lastName` LIKE '%$q%' OR `email` LIKE '%$q%' OR `phoneNumber` LIKE '%$q%' OR `address` LIKE '%$q%') AND `type` = 0 ORDER BY createAt DESC;";
        $result = executeResult($sql);
        if (count($result) > 0) {
            $data = array('status' => 'success', 'data' => $result, 'message' => 'Tìm kiếm thành công');
            echo json_encode($data);
            exit();
        } else {
            $data = array('status' => 'success', 'data' => $result, 'message' => 'Không tìm thấy kết quả khớp');
            echo json_encode($data);
            exit();
        }
    } else {
        $sql = "SELECT * FROM user_tbl WHERE `type` = 0 ORDER BY createAt DESC;";
        $result = executeResult($sql);
        $data = array('status' => 'success', 'data' => $result, 'message' => 'Tìm kiếm thành công');
        echo json_encode($data);
        exit();
    }
}
$data = array('status' => 'error', 'data' => '', 'message' => 'Không có từ khóa tìm kiếm!');
echo json_encode($data);
