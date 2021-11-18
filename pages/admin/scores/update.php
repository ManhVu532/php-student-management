<?php
require_once("../../../utils/db_helper.php");
require_once("../../../utils/utils.php");

if (!empty($_POST)) {
    $userId = $subjectSemesterId = $pointCC = $pointBT = $pointTH = $pointKT = $pointExam = '';

    if (isset($_POST['studentId']) && isset($_POST['ssId']) && isset($_POST['pointCC']) && isset($_POST['pointBT']) && isset($_POST['pointTH']) && isset($_POST['pointKT'])  && isset($_POST['pointExam'])) {
        $userId = validate_data(strtoupper($_POST['studentId']));
        $subjectSemesterId = validate_data(strtoupper($_POST['ssId']));
        $pointCC = validate_data($_POST['pointCC']);
        $pointBT = validate_data($_POST['pointBT']);
        $pointTH = validate_data($_POST['pointTH']);
        $pointKT = validate_data($_POST['pointKT']);
        $pointExam = validate_data($_POST['pointExam']);

        if (empty($pointCC) || strlen($pointCC) == 0 || !is_numeric($pointCC)) $pointCC = 'NULL';
        if (empty($pointBT) || strlen($pointBT) == 0 || !is_numeric($pointBT)) $pointBT = 'NULL';
        if (empty($pointTH) || strlen($pointTH) == 0 || !is_numeric($pointTH)) $pointTH = 'NULL';
        if (empty($pointKT) || strlen($pointKT) == 0 || !is_numeric($pointKT)) $pointKT = 'NULL';
        if (empty($pointExam) || strlen($pointExam) == 0 || !is_numeric($pointExam)) $pointExam = 'NULL';

        if (empty($userId) || empty($subjectSemesterId)) {
            echo json_encode(array("status" => "error", "message" => "Vui lòng điền đầy dủ thông tin"));
            exit();
        }

        $sql = 'SELECT * FROM subject_semester WHERE id = "' . $subjectSemesterId . '";';
        $result =  executeResult($sql);


        if (count($result) == 0) {
            echo json_encode(array("status" => "error", "message" => "Không tìm thấy học phần này"));
            exit();
        }
        $semester = $result[0];

        $sql = 'SELECT * FROM user_tbl WHERE id = "' . $userId . '";';

        $result = executeResult($sql);

        if (count($result) == 0) {
            echo json_encode(array("status" => "error", "message" => "Không tìm thấy sinh viên"));
            exit();
        }

        $query = 'UPDATE register_subject SET pointCC = ' . $pointCC . ', pointBT = ' . $pointBT . ', pointTH = ' . $pointTH . ', pointKT = ' . $pointKT . ', pointExam = ' . $pointExam . ' WHERE userId = "' . $userId . '" AND subjectSemesterId= "' . $subjectSemesterId . '";';
        
        executeQuery($query);
        echo json_encode(array("status" => "success", "message" => "Cập nhật thành công"));
    } else {
        echo json_encode(array("status" => "error", "message" => "Vui lòng điền đầy dủ thông tin"));
        exit();
    }
} else {
    echo json_encode(array("status" => "error", "message" => "Vui lòng điền đầy dủ thông tin"));
    exit();
}
