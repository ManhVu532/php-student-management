<?php
require_once("../utils/db_helper.php");
require_once("../utils/utils.php");
session_start();

if (!empty($_POST)) {
    $firstName = $lastName = $dob = $email = $phoneNumber = $gender = $address = $id = $password = '';
    if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['dob']) && isset($_POST['phoneNumber']) && isset($_POST['email']) && isset($_POST['gender']) && isset($_POST['address']) && isset($_POST['id']) && isset($_POST['password'])) {
        $firstName = validate_data($_POST['firstName']);
        $firstName = ucwords($firstName);
        $lastName = validate_data($_POST['lastName']);
        $lastName = ucwords($lastName);
        $phoneNumber = validate_data($_POST['phoneNumber']);
        $email = validate_data(strtolower($_POST['email']));
        $gender = validate_data($_POST['gender']);
        $dob = validate_data($_POST['dob']);
        $address = validate_data($_POST['address']);
        $password = validate_data($_POST['password']);
        if(empty($firstName) || empty($lastName) || empty($id)){
            echo json_encode(array("status" => "error", "message" => "Thiếu thông tin các trường bắt buộc"));
            exit();
        }

        if(empty($password)){
            echo json_encode(array("status" => "error", "message" => "Thiếu thông tin các trường bắt buộc"));
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
        }else{
            $email = null;
        }

        if(!empty($phoneNumber)){
            if(!preg_match("/^[0-9]{9,11}$/", $phoneNumber)) {
                echo json_encode(array("status" => "error", "message" => "Số điện thoại không đúng định dạng"));
                exit();
            }
            $sql = "SELECT * FROM user_tbl WHERE phoneNumber = '$phoneNumber' AND id != '$id';";
            $result = executeResult($sql);

            if (count($result) > 0) {
                echo json_encode(array("status" => "error", "message" => "Số điện thoại đã tồn tại"));
                exit();
            }
        }else{
            $phoneNumber = null;
        }

        $sql = "SELECT * FROM user_tbl WHERE id = '$id'";
        $result = executeResult($sql);
        if (count($result) == 0) {
            echo json_encode(array("status" => "error", "message" => "Không tồn tại người dùng này"));
            exit();
        }

        if(!password_verify($password, $result[0]['password'])){
            echo json_encode(array('status' => 'error', 'message' => 'Mật khẩu cũ không đúng!!!!'));
            exit();
        }
        $query = "UPDATE user_tbl SET firstName = '$firstName', lastName = '$lastName', email = '$email', dob = STR_TO_DATE('" . $dob . "', '%Y-%m-%d'), `address`= '$address', gender = '$gender',  phoneNumber = ".($phoneNumber == null ? "NULL" : "'".$phoneNumber."'").", email = ".($email == null ? "NULL" : "'".$email."'").", updateAt=CURRENT_TIMESTAMP WHERE id = '$id';";
        executeQuery($query);
        $user = json_decode($_SESSION['user']);
        $user['firstname'] = $firstName;
        $user['lastname'] = $lastName;
        $user['email'] = $email;
        $user['dob'] = $dob;
        $user['address'] = $address;
        $user['phoneNumber'] = $phoneNumber;
        $user['address'] = $address;
        $user['gender'] = $gender;

        $_SESSION['user'] = json_encode($user);
        echo json_encode(array("status" => "success", "message" => "Cập nhật thành công"));
    }
}
