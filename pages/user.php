<?php
$username = $age = $email = $password = '';
if (!empty($_GET)) {

    if (isset($_GET["username"])) {
        $username = $_GET["username"];
    }
    if (isset($_GET["age"])) {
        $age = $_GET["age"];
    }
    if (isset($_GET["email"])) {
        $email = $_GET["email"];
    }

    if (isset($_GET["password"])) {
        $password = $_GET["password"];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | DataTables</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">

    <link rel="stylesheet" href="../plugins/sweetalert2/sweetalert2.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php
        include "../components/navbar.php";
        include "../components/sidebar.php";
        ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Người dùng</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                                <li class="breadcrumb-item active">Người dùng</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center my-3">
                                Tạo mới User
                            </h1>
                        </div>
                        <div class="card-body">
                            <form class="row" method="GET">
                                <div class="form-group col-6">
                                    <label for="username">Tên người dùng</label>
                                    <input type="text" required class="form-control" id="username" name="username" value="<?= $username ?>">
                                </div>
                                <div class="form-group col-6">
                                    <label for="email">Email</label>
                                    <input type="email" required class="form-control" id="email" name="email" value="<?= $email ?>">
                                </div>
                                <div class="form-group col-6">
                                    <label for="age">Tuổi</label>
                                    <input type="number" class="form-control" id="age" name="age" value="<?= $age ?>">
                                </div>
                                <div class="form-group col-6">
                                    <label for="password">Mật khẩu</label>
                                    <input type="password" required class="form-control" id="password" name="password">
                                </div>
                                <div class="col-12">
                                    <button id="create_user" type="submit" class="btn btn-primary">Tạo mới</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0-rc
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer> -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../plugins/jszip/jszip.min.js"></script>
    <script src="../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.html5.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.print.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.colVis.js"></script>

    <!-- ChartJS -->
    <script src="../plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    
    <script src="../plugins/sweetalert2/sweetalert2.min.js"></script>

    <script>
        $("#create_user").on("click", function(e) {
            e.preventDefault();
            $.ajax({
                url: 'create_user.php',
                type: 'GET',
                dataType: 'json',
                data: {
                    'username': $('#username').val(),
                    'email': $('#email').val(),
                    'age': $('#age').val(),
                    'password': $('#password').val()
                },
                success: function(data) {
                    data = JSON.parse(data);
                    if (data.status == 'success') {
                        Swal.fire({
                            title: 'Thành công!',
                            text: data.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(function() {
                            window.location.href = 'user_list.php';
                        })
                    } else {
                        Swal.fire({
                            title: 'Thất bại!',
                            text: data.message,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        })
                    }
                }
            })
        });
    </script>
</body>

</html>