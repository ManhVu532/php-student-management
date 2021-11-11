<?php
function validate_data($data){
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = str_replace('\'', '\\\'', $data);
    return $data;
}

function validate_password($data){
    $data = trim($data);
    $error = '';
    // has at least one number
    if(!preg_match('/^(?=.*\d)/', $data)){
        $error = 'Mật khẩu phải chứa ít nhất 1 số!';
        return $error;
    }
    // has at least one letter
    if(!preg_match('/^(?=.*[a-zA-Z])/', $data)){
        $error = 'Mật khẩu phải chứa ít nhất 1 chữ cái!';
        return $error;
    }
    // has at least one special character
    if(!preg_match('/^(?=.*[!@#$%^&*()\-_=+{};:,<.>])/', $data)){
        $error = 'Mật khẩu phải chứa ít nhất 1 ký tự đặc biệt!';
        return $error;
    }

    return null;
}
?>