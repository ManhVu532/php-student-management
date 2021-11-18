<?php
require_once("../../../utils/db_helper.php");
require_once("../../../utils/utils.php");

if (!empty($_POST)) {
    $id = $type = $startYear = $endYear = $fee = '';
    if(isset($_POST['id']) && isset($_POST['type']) && isset($_POST['startYear']) && isset($_POST['endYear']) && isset($_POST['fee'])) {
        if(empty($_POST['id']) || empty($_POST['type']) || empty($_POST['startYear']) || empty($_POST['endYear']) || empty($_POST['fee'])) {
            echo json_encode(array("status" => "error", "message" => "Vui lòng điền đầy dủ thông tin"));
            exit();
        }
        $id = validate_data(strtoupper($_POST['id']));
        $type = validate_data($_POST['type']);
        $startYear = validate_data($_POST['startYear']);
        $endYear = validate_data($_POST['endYear']);
        $fee = validate_data($_POST['fee']);
        

        $sql = 'SELECT * FROM semester_tbl WHERE id = "'.$id.'";';

        $result = executeResult($sql);

        if(count($result) == 0){
            echo json_encode(array("status" => "error", "message" => "Học kỳ không tồn tại"));
            exit();
        }

        $query = "UPDATE semester_tbl SET `type` = '".$type."', startYear = '".$startYear."', endYear = '".$endYear."', fee = '".$fee."' WHERE id = '".$id."';";
        executeQuery($query);
        echo json_encode(array("status" => "success", "message" => "Tạo mới thành công"));
    }else{
        echo json_encode(array("status" => "error", "message" => "Vui lòng điền đầy dủ thông tin"));
        exit();
    }
}
echo json_encode(array("status" => "error", "message" => "Vui lòng điền đầy dủ thông tin"));
exit();