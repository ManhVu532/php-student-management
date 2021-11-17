<?php
require_once("../../utils/db_helper.php");

if (isset($_GET['code']) && isset($_GET['email'])) {
    $code = $_GET['code'];
    $to = $_GET['email'];

    $date = date('Y-m-d H:i:s');
    $currentDate = strtotime($date);
    $futureDate = $currentDate + EXPRIED_TIME;
    $expriedAt = date("Y-m-d H:i:s", $futureDate);

    $sql = "UPDATE user_tbl SET verifyCode = '$code', expriedAt = '$expriedAt' WHERE email = '$to'";

    executeQuery($sql);

    $resetPasswordPath = HOST . "pages/auth/reset-password.php?code=$code&email=$to";

    $subject = 'Lấy lại mật khẩu [' . $code . ']';
    $message = "Bạn cần lấy lại mật khẩu của mình?\nHãy sử dụng liên kết khôi phục mật khẩu dưới đây!\n"
        . $resetPasswordPath .
        "   (Liên kết có hiệu lực trong 5 phút)\n\nNếu bạn không quên mật khẩu của mình, bạn có thể bỏ qua email này.";
    $headers = 'From: manhvvdev.app@gmail.com';


    mail($to, $subject, $message, $headers);

    echo json_encode(array('status' => 'success', 'message' => "Gửi thành công"));
}
else{
    echo json_encode(array('status' => 'error', 'message' => "Không tìm thấy thông tin"));
}
