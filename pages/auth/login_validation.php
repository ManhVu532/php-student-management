<?php
    session_start();

    require_once("../../utils/db_helper.php");
    define('EXPRIED_TIME_COOKIE', 60 * 60 * 24 * 7*1000);   // 7 days

    function validate_data($data){
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = str_replace('\'', '\\\'', $data);
        return $data;
    }

    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['remember'])){
        $username = validate_data($_POST['username']);
        $password = validate_data($_POST['password']);
        $remember = $_POST['remember'];

        if(empty($username)){
            echo json_encode(array('status' => 'error', 'message' => 'Yêu cầu tên tài khoản'));
            exit();
        }
        
        if(empty($password)){
            echo json_encode(array('status' => 'error', 'message' => 'Yêu cầu mật khẩu'));
            exit();
        }

        $query = 'SELECT * FROM user_tbl WHERE id = "'.$username.'";';

        $users = executeResult($query);

        if(count($users) == 0){
            echo json_encode(array('status' => 'error', 'message' => 'Tài khoản không tồn tại'));
            exit();
        }else{
            $user = $users[0];
            if(!password_verify($password, $user['password'])){
                echo json_encode(array('status' => 'error', 'message' => 'Mật khẩu không chính xác'));
            }else{
                $_SESSION['user'] = json_encode($user);
                
                if($remember == 'true'){
                    setcookie('user', json_encode(array('username' => $username, 'password' => $password, 'remember' => $remember)), time() + EXPRIED_TIME_COOKIE);
                }else{
                    if (isset($_COOKIE['user'])) {
                        unset($_COOKIE['user']); 
                        setcookie('user', null, -1); 
                    }
                }
                
                echo json_encode(array('status' => 'success', 'message' => 'Đăng nhật thành công', 'user' => $user, 'remember' => $remember));
                exit();
            }
        }
    }else{
        echo json_encode(array('status' => 'error', 'message' => 'Đăng nhập thất bại'));
        exit();
    }
?>