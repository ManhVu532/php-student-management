<?php
session_start();
require_once('../../utils/utils.php');
require_once('../../utils/db_helper.php');
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    if ($user)
        header("Location: ../403.php");
}
$email = '';
if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $email = validate_data($email);
}

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
        <div class="col-12 row justify-content-center">
            <div class="col-md-6 col-md-offset-3 bg-light shadow-lg rounded-lg p-4" style="min-height: 50vh;">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Quên mật khẩu?</h3>
                    </div>
                    <div class="panel-body">
                        <form action="forgot-password.php" method="GET">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?= $email ?>" placeholder="Nhập email của bạn" required>
                            </div>
                            <div id="btn-submit">
                                <button type="submit" class="btn btn-success">Tiếp tục</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="../../assets/js/jquery.min.js"></script>
    <script>
        function counterResent() {
            let counter = 30;
            let interval;
            interval = setInterval(() => {
                $("#btn-submit").html(
                    `
                    <div class="alert alert-info" role="alert">
                        Nếu bạn không nhận được email hãy nhấn gửi lại! ${counter > 0 ? '(Sau '+counter+')' : ''}
                    </div>
                    <button type="submit" class="btn btn-success" ${counter > 0 ? 'disabled' : ''}>Gửi lại</button>
                `
                );
                counter--;
                if (counter < 0) {
                    clearInterval(interval);
                }
            }, 1000);
        }

        function sendEmail(email, host) {
            let code = "";
            let length = 8;
            while (length--) {
                code += Math.floor(Math.random() * 10);
            }
            let url = host + "pages/auth/send_mail.php?email=" + email + "&code=" + code;

            $.ajax({
                url: url,
                type: "GET",
                beforeSend: function() {
                    Swal.fire({
                        icon: 'info',
                        html: '<div class="spinner-border" role="status"><span class="visually-hidden"></span></div>',
                        title: 'Đang gửi...',
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                },
                success: function(data) {
                    data = JSON.parse(data);
                    console.log("data: ", data);
                    if (data.status == "success") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Thông báo',
                            text: 'Chúng tôi đã gửi đường dẫn đổi mật khẩu của bạn! Hãy mở email của bạn và nhấp vào link'
                        })
                        .then(() => {
                            counterResent();
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Đã có lỗi xảy ra',
                            text: 'Vui lòng thử lại sau'
                        })
                        .then(() => {
                            counterResent();
                        });
                    }
                }
            });
        }
    </script>

    <?php
    if (!empty($email)) {
        $query = 'SELECT * FROM user_tbl WHERE email = "' . $email . '";';
        $users = executeResult($query);

        if (count($users) == 0) {
            echo '<script>
        Swal.fire({
            title: "Thông báo",
            text: "Email không tồn tại hoặc tài khoản của bạn không chứa email này",
            icon: "error",
            })
            </script>';
        } else {
            $user = $users[0];
            echo '<script>
        Swal.fire({
            title: "Thông báo",
            text: "Xin chào ' . $user['firstName'] . ', chúng tôi sẽ gửi mã xác nhận đến email ' . $user['email'] . ' của bạn!",
            icon: "info",
            cancelButtonText: "Hủy",
            showCancelButton: true,
            confirmButtonText: "Tiếp tục",
        }).then(result => {
            if(result.isConfirmed){
                sendEmail("' . $user['email'] . '", "' . HOST . '");
            }
            });
        </script>';
        }
    }
    ?>
</body>

</html>