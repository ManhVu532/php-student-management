<?php
require_once("../../../../utils/db_helper.php");
require_once("../../../../utils/utils.php");

if (!empty($_POST)) {
    $subjectId = $semesterId = $room = $numberOfSlots = $startAt = $endAt = $dayOfWeek = $lecturer = '';
    if (isset($_POST['subjectId']) && isset($_POST['semesterId']) && isset($_POST['room']) && isset($_POST['numberOfSlots']) && isset($_POST['startAt']) && isset($_POST['endAt']) && isset($_POST['dayOfWeek']) && isset($_POST['lecturer'])) {
        $subjectId = validate_data($_POST['subjectId']);
        $semesterId = validate_data($_POST['semesterId']);
        $room = validate_data(strtoupper($_POST['room']));
        $numberOfSlots = validate_data($_POST['numberOfSlots']);
        $startAt = validate_data($_POST['startAt']);
        $endAt = validate_data($_POST['endAt']);
        $dayOfWeek = validate_data($_POST['dayOfWeek']);
        $lecturer = validate_data($_POST['lecturer']);

       if(empty($_POST['subjectId']) || empty($_POST['semesterId']) || empty($_POST['room']) || empty($_POST['numberOfSlots']) || empty($_POST['startAt']) || empty($_POST['endAt']) || empty($_POST['dayOfWeek']) || empty($_POST['lecturer'])) {
            echo json_encode(array("status" => "error", "message" => "Thiếu thông tin các trường bắt buộc"));
            exit();
        }

        $sql = 'SELECT * FROM semester_tbl WHERE id = "'.$semesterId.'";';

        $result = executeResult($sql);

        if(count($result) == 0){
            echo json_encode(array("status" => "error", "message" => "Không tìm thấy kỳ học"));
            exit();
        }

        $sql = 'SELECT * FROM subject_tbl WHERE id = "'.$subjectId.'";';

        $result = executeResult($sql);

        if(count($result) == 0){
            echo json_encode(array("status" => "error", "message" => "Không tìm thấy môn học"));
            exit();
        }


        $sql = 'SELECT * FROM subject_semester WHERE semesterId = "'.$semesterId.'" AND room = "'.$room.'" AND dayOfWeek = "'.$dayOfWeek.'" AND ((startAt <= "'.$startAt.'" AND endAt >= "'.$startAt.'") OR (startAt >= "'.$startAt.'" AND startAt <= "'.$endAt.'"));';

        $result = executeResult($sql);

        if (count($result) > 0) {
            echo json_encode(array("status" => "error", "message" => "Đã trùng lịch học"));
            exit();
        }

        $query = "INSERT INTO subject_semester(semesterId, subjectId, room, numberOfSlots, startAt, endAt, dayOfWeek, lecturer) VALUES('" . $semesterId . "','" . $subjectId . "','" . $room . "','" . $numberOfSlots . "', '".$startAt."', '".$endAt."', '".$dayOfWeek."', '".$lecturer."');";
        executeQuery($query);
        echo json_encode(array("status" => "success", "message" => "Tạo mới thành công"));
    }
}
