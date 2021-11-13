<?php
require_once("../../../utils/db_helper.php");
require_once("../../../utils/utils.php");

if (!empty($_POST)) {
    $firstName = $lastName = $dob = $email = $phoneNumber = $gender = $address = $id = '';
    $isActive = true;
    if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['dob']) && isset($_POST['phoneNumber']) && isset($_POST['email']) && isset($_POST['gender']) && isset($_POST['address']) && isset($_POST['id']) && isset($_POST['isActive'])) {
        $firstName = validate_data($_POST['firstName']);
        $firstName = ucwords($firstName);
        $lastName = validate_data($_POST['lastName']);
        $lastName = ucwords($lastName);
        $phoneNumber = validate_data($_POST['phoneNumber']);
        $email = validate_data(strtolower($_POST['email']));
        $gender = validate_data($_POST['gender']);
        $id = validate_data(strtoupper($_POST['id']));
        $dob = validate_data($_POST['dob']);
        $address = validate_data($_POST['address']);
        $isActive = validate_data($_POST['isActive']) == true ? 1 : 0;
        $classId = validate_data(strtoupper($_POST['classId']));
        if(empty($firstName) || empty($lastName) || empty($id) || empty($classId)){
            echo json_encode(array("status" => "error", "message" => "Thiếu thông tin các trường bắt buộc"));
            exit();
        }

        $sql = "SELECT * FROM user_tbl WHERE id = '$id'";
        $result = executeResult($sql);
        if (count($result) == 0) {
            echo json_encode(array("status" => "error", "message" => "Không tồn tại sinh viên này"));
            exit();
        }

        if(!empty($email)){
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo json_encode(array("status" => "error", "message" => "Email không đúng định dạng"));
                exit();
            }
            $sql = "SELECT * FROM user_tbl WHERE email = '$email' AND id != '$id';";
        $result = executeResult($sql);
        if (count($result) > 0) {
            echo json_encode(array("status" => "error", "message" => "Email đã tồn tại"));
            exit();
        }
        }

        if(!empty($phoneNumber)){
            if(preg_match("/^[0-9]{9,11}$/", $phoneNumber)) {
                echo json_encode(array("status" => "error", "message" => "Số điện thoại không đúng định dạng"));
                exit();
            }
            $sql = "SELECT * FROM user_tbl WHERE phoneNumber = '$phoneNumber' AND id != '$id';";
            $result = executeResult($sql);

            if (count($result) > 0) {
                echo json_encode(array("status" => "error", "message" => "Số điện thoại đã tồn tại"));
                exit();
            }
        }

        $query = "UPDATE user_tbl SET firstName = '$firstName', lastName = '$lastName', email = '$email', dob = STR_TO_DATE('" . $dob . "', '%Y-%m-%d'), `address`= '$address', classId = '$classId', gender = '$gender', isActive = '$isActive', phoneNumber = '$phoneNumber', email = '$email', updateAt=CURRENT_TIMESTAMP WHERE id = '$id';";

        executeQuery($query);
        echo json_encode(array("status" => "success", "message" => "Cập nhật thành công"));
    }
}
