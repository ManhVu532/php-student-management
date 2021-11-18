<?php
require_once("../../../utils/db_helper.php");
require_once("../../../utils/utils.php");

if (!empty($_POST)) {
    $id = $examAt = $roomExam = $examType = $totalTime = '';
    if (isset($_POST['id']) && isset($_POST['roomExam']) && isset($_POST['examType']) && isset($_POST['totalTime']) && isset($_POST['examAt'])) {
        $id = validate_data($_POST['id']);
        $roomExam = validate_data($_POST['roomExam']);
        $examType = validate_data($_POST['examType']);
        $totalTime = validate_data($_POST['totalTime']);
        $examAt = validate_data($_POST['examAt']);

        if (empty($examAt) || $examAt == 'null') {
            $examAt = null;
        }

        if (empty($totalTime) || $totalTime == '' || strlen($totalTime) == 0) {
            $totalTime = 'NULL';
        }
        $sql = 'SELECT * FROM subject_semester WHERE id = "' . $id . '";';

        $result = executeResult($sql);

        if (count($result) == 0) {
            echo json_encode(array("status" => "error", "message" => "Học phần này không tồn tại"));
            exit();
        }
        if ($examAt != null) {
            $query = "UPDATE subject_semester SET `roomExam` = '" . $roomExam . "', examType = '" . $examType . "', totalTime = " . $totalTime . ", examAt = '" . $examAt . "' WHERE id = '" . $id . "';";
        } else {
            $query = "UPDATE subject_semester SET `roomExam` = '" . $roomExam . "', examType = '" . $examType . "', totalTime = " . $totalTime . ", examAt = NULL WHERE id = '" . $id . "';";
        }
        executeQuery($query);
        echo json_encode(array("status" => "success", "message" => "Cập nhật thành công"));
        exit();
    } else {
        echo json_encode(array("status" => "error", "message" => "Vui lòng điền đầy dủ thông tin"));
        exit();
    }
}
echo json_encode(array("status" => "error", "message" => "Vui lòng điền đầy dủ thông tin"));
exit();
