<?php
require_once("../../../utils/db_helper.php");
require_once("../../../utils/utils.php");
if (isset($_GET['q']) && isset($_GET['subjectSemester'])) {
    $q = $_GET['q'];
    $subjectSemester = $_GET['subjectSemester'];
    $q = validate_data($q);
    $subjectSemester= validate_data($subjectSemester);
    
    if (!empty($q)) {
        $sql = 'SELECT u.id, u.firstName, u.lastName, rs.pointCC, rs.pointKT, rs.pointBT, rs.pointTH, rs.pointExam, s.id AS subjectId, s.name, ss.semesterId
        FROM register_subject AS rs, user_tbl AS u, subject_tbl AS s, subject_semester AS ss
        WHERE rs.userId = u.id 
        AND rs.subjectSemesterId = "'.$subjectSemester.'"
        AND ss.id = "'.$subjectSemester.'"
        AND ss.subjectId = s.id
        AND (u.id LIKE "%'.$q.'%" OR r.firstName LIKE "%'.$q.'" OR u.lastName LIKE "%'.$q.'" OR s.id LIKE "%'.$q.'" OR s.name LIKE "%'.$q.'" OR ss.semesterId LIKE "%'.$q.'")
        ORDER BY rs.createAt DESC;';

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
        $sql = 'SELECT u.id, u.firstName, u.lastName, rs.pointCC, rs.pointKT, rs.pointBT, rs.pointTH, rs.pointExam, s.id AS subjectId, s.name, ss.semesterId
        FROM register_subject AS rs, user_tbl AS u, subject_tbl AS s, subject_semester AS ss
        WHERE rs.userId = u.id 
        AND rs.subjectSemesterId = "'.$subjectSemester.'"
        AND ss.id = "'.$subjectSemester.'"
        AND ss.subjectId = s.id
        ORDER BY rs.createAt DESC;';
        $result = executeResult($sql);
        $data = array('status' => 'success', 'data' => $result, 'message' => 'Tìm kiếm thành công');
        echo json_encode($data);
        exit();
    }
}
$data = array('status' => 'error', 'data' => '', 'message' => 'Không có từ khóa tìm kiếm!');
echo json_encode($data);
