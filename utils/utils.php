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

function calcFinal($pointCC, $pointBT, $pointTH, $pointKT, $pointExam){
    
    if(!$pointCC || !$pointBT || !$pointTH || !$pointKT || !$pointExam){
        return '';
    }
    $pointCC = (float) $pointCC;
    $pointBT = (float) $pointBT;
    $pointTH = (float) $pointTH;
    $pointKT = (float) $pointKT;
    $pointExam = (float) $pointExam;
    $final = ($pointCC + $pointBT + $pointTH + $pointKT + $pointExam*6) / 10;
    return number_format($final, 2, '.', '');
}

function calc($final){
    if(empty($final)){
        return '';
    }
    if($final < 4){
        return 'F';
    }else if($final < 5){
        return 'D';
    }else if($final < 5.5){
        return 'D+';
    }else if($final < 6.5){   
        return 'C';
    }else if($final < 7){
        return 'C+';
    }else if($final < 8){
        return 'B';
    }else if($final < 8.5){
        return 'B+';
    }else if($final < 9){
        return 'A';
    }else{
        return 'A+';
    }
}
 function calcGpa($final){
    if(empty($final)){
        return '';
    }
    if($final < 4 || $final == 'F'){
        return 0;
    }else if($final < 5 || $final == 'D'){
        return 1;
    }else if($final < 5.5 || $final == 'D+'){
        return 1.5;
    }else if($final < 6.5 || $final == 'C'){   
        return 2;
    }else if($final < 7 || $final == 'C+'){
        return 2.5;
    }else if($final < 8 || $final == 'B'){
        return 3;
    }else if($final < 8.5 || $final == 'B+'){
        return 3.5;
    }else if($final < 9 || $final == 'A'){
        return 3.7;
    }else{
        return 4;
    }
 }
?>