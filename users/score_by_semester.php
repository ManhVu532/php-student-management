<?php
    require_once("../utils/db_helper.php");
    require_once("../utils/utils.php");
    if(isset($_GET['userId']) && isset($_GET['semesterId'])){
        $userId = validate_data($_GET['userId']);
        $semesterId = validate_data($_GET['semesterId']);
        
        $sql = 'SELECT rs.pointCC, rs.pointKT, rs.pointBT, rs.pointTH, rs.pointExam, s.id AS subjectId, s.name
        FROM register_subject AS rs, subject_tbl AS s, subject_semester AS ss
        WHERE rs.subjectSemesterId = ss.id
        AND rs.userId = "' . $userId . '"
        AND ss.semesterId = "' . $semesterId . '"
        AND ss.subjectId = s.id
        ORDER BY rs.createAt DESC;';

        $result = executeResult($sql);
        echo json_encode(array("status" => "success", "message" => "Thiếu thông tin", "data" => $result));
    }else{
        echo json_encode(array("status" => "error", "message" => "Thiếu thông tin"));
        exit();
    }
