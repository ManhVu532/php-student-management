<?php
    require_once('../utils/db_helper.php');
    require_once('../utils/utils.php');
    if(isset($_GET['userId'])){
        $id = validate_data($_GET['userId']);

        $sql = "SELECT * FROM user_tbl WHERE id = '$id'";

        $users = executeResult($sql);
        if(count($users) == 0){
            echo json_encode(array('status' => 'error', 'message' => 'Không tìm thấy người dùng!'));
            exit();
        }

        $sql = "SELECT DISTINCT s.* FROM subject_semester AS ss, semester_tbl AS s, register_subject AS rs
            WHERE ss.semesterId = s.id
            AND rs.subjectSemesterId = ss.id
            AND rs.userId = '" . $id . "'
            ORDER BY s.startYear, s.type;";

        $semesters = executeResult($sql);
        $avg = [];

        foreach($semesters as $semester){
            $sql = 'SELECT rs.pointCC, rs.pointKT, rs.pointBT, rs.pointTH, rs.pointExam, (rs.pointCC + rs.pointKT + rs.pointBT + rs.pointTH + rs.pointExam*6)/10 AS avgPoint
                FROM register_subject AS rs, subject_tbl AS s, subject_semester AS ss
                WHERE rs.subjectSemesterId = ss.id
                AND rs.userId = "' . $id . '"
                AND ss.semesterId = "' . $semester['id'] . '"
                AND ss.subjectId = s.id
                ORDER BY rs.createAt DESC;';

            $subjects = executeResult($sql);
            $avgPoint = 0;
            foreach ($subjects as $subject){
                $point = $subject['avgPoint'];
                $avgPoint += (float)calcGpa($point);
            }
            $avgPoint = $avgPoint / count($subjects);
            $avg[] = $avgPoint;
        }

        echo json_encode(array('status' => 'success', 'message' => 'Lấy dữ liệu thành công!', "data" => array('semesters'=>$semesters, 'avg'=>$avg)));
        exit();
    }else{
        echo json_encode(array('status' => 'error', 'message' => 'Không tìm thấy người dùng!'));
        exit();
    }
