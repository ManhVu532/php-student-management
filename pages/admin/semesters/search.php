<?php
require_once("../../../utils/db_helper.php");
require_once("../../../utils/utils.php");
if (isset($_GET['q'])) {
    if (!empty($_GET['q'])) {
        $q = $_GET['q'];
        $q = validate_data($q);
        $sql = "SELECT * FROM semester_tbl WHERE `id` LIKE '%$q%' OR `type` LIKE '%$q%' OR `startYear` LIKE '%$q%' OR `endYear` LIKE '%$q%' OR `fee` LIKE '%$q%' ORDER BY createAt DESC;";
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
        $sql = "SELECT * FROM semester_tbl ORDER BY createAt DESC;";
        $result = executeResult($sql);
        $data = array('status' => 'success', 'data' => $result, 'message' => 'Tìm kiếm thành công');
        echo json_encode($data);
        exit();
    }
}
$data = array('status' => 'error', 'data' => '', 'message' => 'Không có từ khóa tìm kiếm!');
echo json_encode($data);
