<?php
require_once("../../../utils/db_helper.php");
require_once("../../../utils/utils.php");
if (isset($_GET['q']) && isset($_GET['semesterId'])) {
    $semesterId = validate_data($_GET['semesterId']);
    if (!empty($_GET['q'])) {
        $q = $_GET['q'];
        $q = validate_data($q);
        
        $sql = 'SELECT ss.subjectId, s.name, ss.examAt, ss.totalTime, ss.examType, ss.roomExam,
                rs.total, ss.id
                FROM subject_tbl AS s, subject_semester AS ss,
                    (SELECT COUNT(userId) AS total, subjectSemesterId
                        FROM `register_subject`
                        GROUP BY subjectSemesterId) AS rs
                WHERE s.id = ss.subjectId
                AND ss.id = rs.subjectSemesterId
                AND ss.semesterId = "'.$semesterId.'"
                AND (s.name LIKE "%'.$q.'%" OR ss.subjectId LIKE "%'.$q.'%" OR ss.examType LIKE "%'.$q.'%" OR ss.roomExam LIKE "%'.$q.'%" OR ss.id LIKE "%'.$q.'%")
                UNION
                SELECT ss.subjectId, s.name, ss.examAt, ss.totalTime, ss.examType, ss.roomExam,
                0 AS total, ss.id
                FROM subject_tbl AS s, subject_semester AS ss
                WHERE s.id = ss.subjectId
                AND ss.id NOT IN (SELECT subjectSemesterId FROM register_subject)
                AND ss.semesterId = "'.$semesterId.'"
                AND (s.name LIKE "%'.$q.'%" OR ss.subjectId LIKE "%'.$q.'%" OR ss.examType LIKE "%'.$q.'%" OR ss.roomExam LIKE "%'.$q.'%" OR ss.id LIKE "%'.$q.'%")
                ';
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
        $sql = 'SELECT ss.subjectId, s.name, ss.examAt, ss.totalTime, ss.examType, ss.roomExam,
            rs.total, ss.id
            FROM subject_tbl AS s, subject_semester AS ss,
                (SELECT COUNT(userId) AS total, subjectSemesterId
                    FROM `register_subject`
                    GROUP BY subjectSemesterId) AS rs
            WHERE s.id = ss.subjectId
            AND ss.id = rs.subjectSemesterId
            AND ss.semesterId = "'.$semesterId.'"
            UNION
            SELECT ss.subjectId, s.name, ss.examAt, ss.totalTime, ss.examType, ss.roomExam,
            0 AS total, ss.id
            FROM subject_tbl AS s, subject_semester AS ss
            WHERE s.id = ss.subjectId
            AND ss.id NOT IN (SELECT subjectSemesterId FROM register_subject)
            AND ss.semesterId = "'.$semesterId.'"
            ';
        $result = executeResult($sql);
        $data = array('status' => 'success', 'data' => $result, 'message' => 'Tìm kiếm thành công');
        echo json_encode($data);
        exit();
    }
}
$data = array('status' => 'error', 'data' => '', 'message' => 'Không có từ khóa tìm kiếm!');
echo json_encode($data);
