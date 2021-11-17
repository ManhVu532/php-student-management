<?php
require_once("../../utils/db_helper.php");

if (isset($_GET['firstName']) && isset($_GET['email'])) {
    $firstName = $_GET['firstName'];
    $to = $_GET['email'];

    $subject = 'Chúc mừng sinh nhật ' . $firstName . '';
    $message = "Học viện Công nghệ Bưu chính Viễn thông chúc bạn có 1 ngày sinh nhật vui vẻ, hạnh phúc và tràn đầy niềm vui!";
    $headers = 'From: manhvvdev.app@gmail.com';


    mail($to, $subject, $message, $headers);

    echo json_encode(array('status' => 'success', 'message' => "Gửi thành công đến ".$firstName));
}else{
    echo json_encode(array('status' => 'error', 'message' => "Không tìm thấy thông tin email sinh viên"));
}
