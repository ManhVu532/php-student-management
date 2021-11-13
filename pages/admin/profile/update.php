<?php
    require_once('../../../utils/db_helper.php');
    require_once('../../../utils/utils.php');
    session_start();

    if(isset($_POST['id']) && isset($_POST['email']) && isset($_POST['phoneNumber'])&& isset($_POST['password'])){
        $id = validate_data($_POST['id']);
        $email = validate_data($_POST['email']);
        $phoneNumber = validate_data($_POST['phoneNumber']);
        $password = validate_data($_POST['password']);

        if(empty($id)){
            echo json_encode(array('status' => 'error', 'message' => 'Thiếu id người dùng'));
            exit();
        }

        $sql = "SELECT * FROM user_tbl WHERE id='$id';";

        $result = executeResult($sql);
        if(count($result) == 0){
            echo json_encode(array('status' => 'error', 'message' => 'Không tìm thấy người dùng'));
            exit();
        }
        $user = $result[0];

        if(!password_verify($password, $user['password'])){
            echo json_encode(array('status' => 'error', 'message' => 'Mật khẩu không chính xác'));
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
            if(!preg_match("/^[0-9]{9,11}$/", $phoneNumber)) {
                echo json_encode(array("status" => "error", "message" => "Số điện thoại không đúng định dạng"));
                exit();
            }
            $sql = "SELECT * FROM user_tbl WHERE phoneNumber = '$phoneNumber' AND id != '$id'";
            $result = executeResult($sql);

            if (count($result) > 0) {
                echo json_encode(array("status" => "error", "message" => "Số điện thoại đã tồn tại"));
                exit();
            }
        }

        $sql = "UPDATE user_tbl SET email = '".$email."', phoneNumber = '".$phoneNumber."', updateAt=CURRENT_TIMESTAMP WHERE id = '".$id."'";
        $user['email'] = $email;
        $user['phoneNumber'] = $phoneNumber;
        $_SESSION['user'] = JSON_encode($user);
        executeQuery($sql);
        echo json_encode(array('status' => 'success', 'message'=> 'Cập nhật thông tin thành công!'));
    }
