<?php
session_start();
if (isset($_SESSION['user'])) {
    header('Location: ../404.php');
}
require_once("../../utils/db_helper.php");
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/images/favicon.png">
    <title>Học viện Công nghệ Bưu chính Viễn thông</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../plugins/sweetalert2/sweetalert2.min.css">
    <style>
        .bg-red {
            background: rgba(255, 0, 0, 0.8);
        }
    </style>
</head>

<body class="bg-red">
    <div class="container d-flex align-items-center h-100" style="min-height:100vh">
        <div class="col-12 row">
            <div class="col-md-3 col-md-offset-3"></div>
            <div class="col-md-6 col-md-offset-3 bg-light shadow-lg rounded-lg p-4" style="min-height: 50vh;">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Đặt lại mật khẩu</h3>
                    </div>
                    <div class="panel-body form-container">
                        <!--Bootstrap spinner-->
                        <div class="spinner-border text-primary" role="status">
                            <span class="sr-only"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="../../assets/js/jquery.min.js"></script>

    <script>
        let form = $(".form-container");

        function resetPassword(email) {
            $("#reset-password").on('click', function(e) {
                e.preventDefault();
                let newPassword = $("#newPassword").val();
                let repeatPassword = $("#repeatPassword").val();

                if(newPassword.length < 8){
                    Swal.fire({
                        title: 'Đặt lại mật khẩu thất bại',
                        icon: 'error',
                        title: 'Mật khẩu phải có ít nhất 8 ký tự',
                    });
                    return;
                }

                $.ajax({
                    url: 'reset_password.php',
                    method: 'POST',
                    data: {
                        email: email,
                        newPassword: newPassword,
                        repeatPassword: repeatPassword
                    },
                    beforeSend: function() {
                        Swal.fire({
                            icon: 'info',
                            html: '<div class="spinner-border" role="status"><span class="visually-hidden"></span></div>',
                            title: 'Đang tải...',
                            showConfirmButton: false,
                            allowOutsideClick: false
                        });
                    },
                    success: function(data) {
                        console.log("password; ", newPassword.length);
                        data = JSON.parse(data);
                        if (data.status == "success") {
                            Swal.fire({
                                title: 'Đặt lại mật khẩu thành công',
                                icon: 'success',
                                confirmButtonText: 'Quay lại trang đăng nhập'
                            }).then(function() {
                                window.location.href = "login.php";
                            });
                        } else {
                            Swal.fire({
                                title: 'Đặt lại mật khẩu thất bại',
                                icon: 'error',
                                text: data.message
                            });
                        }
                    }
                })
            });
        }

        function validLink() {
            form.html(
                `
                <form action="change_password.php" method="POST">
                    <div class="form-group">
                        <label for="newPassword">Mật khẩu mới</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Nhập mật khẩu mới của bạn" required>
                    </div>
                    <div class="form-group">
                        <label for="repeatPassword">Nhập lại mật khẩu mới</label>
                        <input type="password" class="form-control" id="repeatPassword" name="repeatPassword" placeholder="Nhập lại mật khẩu mới của bạn" required>
                    </div>
                    <button type="submit" id="reset-password" class="btn btn-success">Đổi mật khẩu</button>
                </form>
                `
            )
        }

        function invalidLink() {
            form.html(`
                <div class="alert alert-danger" role="alert">
                    Liên kết đặt lại mật khẩu không hợp lệ hoặc đã hết hạn
                </div>
                <div class="text-center">
                    <a href="login.php" class="btn btn-outline-primary mt-5">Quay lại trang đăng nhập</a>
                </div>
            `);
        }

        invalidLink();
    </script>
</body>

</html>
<?php
if (isset($_GET['code']) && isset($_GET['email'])) {
    $code = $_GET['code'];
    $email = $_GET['email'];
    if (!empty($email) && !empty($code)) {
        //check email format
        if (filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($code) == 8) {
            $date = date('Y-m-d H:i:s');
            $sql = "SELECT * FROM user_tbl WHERE email = '" . $email . "';";

            $users = executeResult($sql);
            if (count($users) > 0) {
                $user = $users[0];

                if ($user['expriedAt'] && $user['verifyCode'] == $code) {
                    if ($user['expriedAt'] >= $date) {
                        echo '
                            <script>
                                validLink();
                                resetPassword("' . $email . '");
                            </script>
                        ';
                        die();
                    } else {
                        echo '
                            <script>
                                Swal.fire({
                                    title: "Lỗi",
                                    text: "Liên kết đã hết hạn",
                                    icon: "error",
                                    confirmButtonText: "OK"
                                });
                            </script>
                        ';
                    }
                }
            }
        }
    }
}

?>