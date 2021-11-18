<?php
require_once("../../../../utils/db_helper.php");
require_once("../../../../utils/utils.php");
if (isset($_GET['q']) && isset($_GET['semester'])) {
    $q = $_GET['q'];
    $semester = $_GET['semester'];
    $q = validate_data($q);
    $semester= validate_data($semester);
    
    if (!empty($q)) {
        $sql = 'SELECT ss.id, ss.subjectId, s.name, ss.semesterId, ss.lecturer, ss.room, ss.dayOfWeek,
        ss.numberOfSlots, ss.startAt, ss.endAt, rs.total
        FROM subject_tbl AS s, subject_semester AS ss,
            (SELECT COUNT(userId) AS total, subjectSemesterId
                FROM `register_subject`
                GROUP BY subjectSemesterId) 
            AS rs
        WHERE s.id = ss.subjectId
        AND rs.subjectSemesterId = ss.id
        AND ss.semesterId = "'.$semester.'"
        AND (ss.id LIKE "%'.$q.'%" OR s.name LIKE "%'.$q.'%" OR ss.lecturer LIKE "%'.$q.'%"
        OR ss.room LIKE "%'.$q.'%" OR ss.dayOfWeek LIKE "%'.$q.'%" OR ss.startAt LIKE "%'.$q.'%" OR ss.endAt LIKE "%'.$q.'%"
        OR ss.numberOfSlots LIKE "%'.$q.'%" OR ss.subjectId LIKE "%'.$q.'%"  OR rs.total LIKE "%'.$q.'%")
        UNION DISTINCT
        SELECT ss.id, ss.subjectId, s.name, ss.semesterId, ss.lecturer, ss.room, ss.dayOfWeek,
            ss.numberOfSlots, ss.startAt, ss.endAt, 0 AS total
        FROM subject_tbl AS s, subject_semester AS ss
        WHERE s.id = ss.subjectId
        AND ss.id NOT IN (SELECT subjectSemesterId FROM register_subject)
        AND ss.semesterId = "'.$semester.'"
        AND (ss.id LIKE "%'.$q.'%" OR s.name LIKE "%'.$q.'%" OR ss.lecturer LIKE "%'.$q.'%"
        OR ss.room LIKE "%'.$q.'%" OR ss.dayOfWeek LIKE "%'.$q.'%" OR ss.startAt LIKE "%'.$q.'%" OR ss.endAt LIKE "%'.$q.'%"
        OR ss.numberOfSlots LIKE "%'.$q.'%" OR ss.subjectId LIKE "%'.$q.'%");';

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
        $sql = 'SELECT ss.id, ss.subjectId, s.name, ss.semesterId, ss.lecturer, ss.room, ss.dayOfWeek,
        ss.numberOfSlots, ss.startAt, ss.endAt, rs.total
        FROM subject_tbl AS s, subject_semester AS ss,
            (SELECT COUNT(userId) AS total, subjectSemesterId
                FROM `register_subject`
                GROUP BY subjectSemesterId) 
        AS rs
        WHERE s.id = ss.subjectId
        AND rs.subjectSemesterId = ss.id
        AND ss.semesterId = "'.$semester.'"
        UNION DISTINCT
        SELECT ss.id, ss.subjectId, s.name, ss.semesterId, ss.lecturer, ss.room, ss.dayOfWeek,
            ss.numberOfSlots, ss.startAt, ss.endAt, 0 AS total
        FROM subject_tbl AS s, subject_semester AS ss
        WHERE s.id = ss.subjectId
        AND ss.id NOT IN (SELECT subjectSemesterId FROM register_subject)
        AND ss.semesterId = "'.$semester.'"';
        $result = executeResult($sql);
        $data = array('status' => 'success', 'data' => $result, 'message' => 'Tìm kiếm thành công');
        echo json_encode($data);
        exit();
    }
}
$data = array('status' => 'error', 'data' => '', 'message' => 'Không có từ khóa tìm kiếm!');
echo json_encode($data);
