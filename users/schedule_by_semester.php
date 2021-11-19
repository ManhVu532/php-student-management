<?php
require_once("../utils/db_helper.php");
require_once("../utils/utils.php");
if (isset($_GET['userId']) && isset($_GET['semesterId'])) {
    $userId = validate_data($_GET['userId']);
    $semesterId = validate_data($_GET['semesterId']);

    $sql = 'SELECT ss.subjectId, s.name, ss.examAt, ss.totalTime, ss.examType, ss.roomExam
        FROM subject_tbl AS s, subject_semester AS ss, register_subject AS rs
        WHERE s.id = ss.subjectId
        AND rs.subjectSemesterId = ss.id
        AND rs.userId = "' . $userId . '"
        AND ss.semesterId = "' . $semesterId . '"
        ';

    $result = executeResult($sql);
    echo json_encode(array("status" => "success", "message" => "Thiếu thông tin", "data" => $result));
} else {
    echo json_encode(array("status" => "error", "message" => "Thiếu thông tin"));
    exit();
}
