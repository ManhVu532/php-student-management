<?php
require_once("../../../../utils/db_helper.php");
require_once("../../../../utils/utils.php");

if (!empty($_POST)) {
    $name = $id = '';
    $numberOfCredits = $numberOfLessons = 0;
    if (isset($_POST['name']) && isset($_POST['id']) && isset($_POST['numberOfCredits']) && isset($_POST['numberOfLessons'])) {

        $name = validate_data($_POST['name']);
        $name = ucwords($name);
        $id = validate_data(strtoupper($_POST['id']));
        $numberOfCredits = validate_data($_POST['numberOfCredits']);
        $numberOfLessons = validate_data($_POST['numberOfLessons']);

        if (empty($name) || empty($id) || empty($numberOfCredits) || empty($numberOfLessons)) {
            echo json_encode(array("status" => "error", "message" => "Thiếu thông tin các trường bắt buộc"));
            exit();
        }

        if($numberOfCredits == 0 || $numberOfCredits == '0'){
            echo json_encode(array("status" => "error", "message" => "Số tín chỉ phải lớn hơn 0"));
            exit();
        }
        if($numberOfLessons == 0 || $numberOfLessons == '0'){
            echo json_encode(array("status" => "error", "message" => "Số tiết học phải lớn hơn 0"));
            exit();
        }

        $sql = "SELECT * FROM subject_tbl WHERE id = '$id'";

        $result = executeResult($sql);

        if (count($result) > 0) {
            echo json_encode(array("status" => "error", "message" => "Mã môn học đã tồn tại"));
            exit();
        }
    
        $query = "INSERT INTO subject_tbl(id, `name`, numberOfCredits, numberOfLessons) VALUES('" . $id . "','" . $name . "','" . $numberOfCredits . "','".$numberOfLessons."');";
        executeQuery($query);
        echo json_encode(array("status" => "success", "message" => "Tạo mới thành công"));
    }
}
