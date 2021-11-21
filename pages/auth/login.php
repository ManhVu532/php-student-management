<?php
session_start();
$username = $password = '';
$remember =  false;
if (isset($_COOKIE['user'])) {
    $user = $_COOKIE['user'];

    $user = json_decode($user, true);

    $username = $user['username'];
    $password = $user['password'];
    $remember = $user['remember'];
}
if (isset($_SESSION['user'])) {
    if ($_SESSION['user']) {
        $user = json_decode($_SESSION['user'], true);
        if ($user['type'] == 1) {
            header('Location: ../admin/index.php');
        } else if ($user['type'] == 0) {
            header('Location: ../../index.php');
        }
    }
}
?>
<!doctype html>
<html lang="vi">

<head>
    <link rel="shortcut icon" href="../../assets/images/favicon.png">
    <title>Học viện Công nghệ Bưu chính Viễn thông</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../../plugins/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">

    <style>
        * {
            font-family: 'San Pro', sans-serif !important;
        }
    </style>

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section text-uppercase font-weight-bold">Học viện công nghệ bưu chính viễn thông</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
                            <div class="text w-100">
                                <h1 class="text-white text-bold" style="font-weight: bold;">Chào mừng đến với PTIT</h1>
                            </div>
                        </div>
                        <div class="login-wrap p-4 p-lg-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Đăng nhập</h3>
                                </div>
                                <div class="w-100">
                                    <p class="social-media d-flex justify-content-end">
                                    </p>
                                </div>
                            </div>
                            <form class="signin-form" method="POST" action>
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Tên tài khoản</label>
                                    <input type="text" name="username" autocomplete="username" class="form-control" placeholder="Tên tài khoản/MSV" value="<?= $username ?>" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Mật khẩu</label>
                                    <input type="password" autocomplete="current-password" name="password" class="form-control" placeholder="Mật khẩu" value="<?= $password ?>" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" id="btn-login" class="form-control btn btn-primary submit px-3">Đăng nhập</button>
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50 text-left">
                                        <label class="checkbox-wrap checkbox-primary mb-0">Lưu lại
                                            <?php
                                            if ($remember === 'true') {
                                                echo '<input type="checkbox" name="remember" checked>
                                                <span class="checkmark"></span>';
                                            } else {
                                                echo '<input type="checkbox" name="remember">
                                                <span class="checkmark"></span>';
                                            }
                                            ?>
                                        </label>
                                    </div>
                                    <div class="w-50 text-md-right">
                                        <a href="forgot-password.php">Quên mật khẩu?</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/popper.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>

    <script>
        $("#btn-login").on("click", function(e) {
            e.preventDefault();
            var username = $("input[name='username']").val();
            var password = $("input[name='password']").val();
            var remember = $("input[name='remember']").is(":checked");

            $.ajax({
                url: "login_validation.php",
                type: "POST",
                data: {
                    username: username,
                    password: password,
                    remember: remember
                },
                success: function(data) {
                    console.log(data);
                    data = JSON.parse(data);
                    if (data.status == "success") {
                        if (data.user.type == 1)
                            window.location.href = "../admin/index.php";
                        else if (data.user.type == 0)
                            window.location.href = "../../index.php";
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Đăng nhập thất bại',
                            text: data.message,
                        })
                    }
                }
            });
        });
    </script>

</body>

</html>