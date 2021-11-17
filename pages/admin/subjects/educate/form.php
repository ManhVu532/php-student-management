<?php
session_start();
require_once("../../../../utils/db_helper.php");
require_once("../../../../utils/utils.php");
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    if ($user) {
        $user = json_decode($user, true);
        if ($user['type'] == 0) {
            header("Location: ../../../403.php");
        }
    } else {
        header("Location: ../../../auth/login.php");
    }
} else {
    header("Location: ../../../auth/login.php");
}
$pathSidebar = 'subject-educte';

$title = "Thêm mới môn học";
$submitText = "Thêm mới";
$u_name = $u_id =  '';
$u_numberOfCredits = $u_numberOfLessons = 0;

if (isset($_GET['id'])) {
    $u_id = $_GET['id'];
    $u_id =  validate_data($u_id);
    if (!empty($u_id)) {
        $title = "Cập nhật thông tin môn học";
        $submitText = "Cập nhật";

        $query = "SELECT * FROM subject_tbl WHERE id = '" . $u_id . "';";
        $res = executeResult($query);

        if (count($res) > 0) {
            $u = $res[0];
            $u_name = $u['name'];
            $u_numberOfCredits = $u['numberOfCredits'];
            $u_numberOfLessons = $u['numberOfLessons'];
        } else {
            header("Location: ../../../404.php");
        }
    }else{
        $u_id = '';
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../../../../assets/images/favicon.png">
    <title>Học viện Công nghệ Bưu chính Viễn thông</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../../../plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../../dist/css/adminlte.min.css">

    <link rel="stylesheet" href="../../../../plugins/sweetalert2/sweetalert2.min.css">

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php
        include "../../../../components/navbar.php";
        include "../../../../components/sidebar.php";
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper pb-4">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Môn học</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                                <li class="breadcrumb-item active">Thêm mới môn học</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <?php
                                    echo "<h3 class='card-title'>" . $title . "</h3>"
                                    ?>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form>
                                    <div class="card-body row">
                                        <div class="form-group col-lg-6 col-sm-12">
                                            <label for="id">Mã môn học*</label>
                                            <?php
                                            if (empty($u_id)) {
                                                echo "<input type='text' class='form-control' id='id' placeholder='Nhập mã môn học' value='" . $u_id . "' required>";
                                            } else {
                                                echo "<input type='text' class='form-control' id='id' placeholder='Nhập mã môn học' value='" . $u_id . "' disabled required>";
                                            }
                                            ?>
                                            <div id="id-validate" class="alert alert-danger mt-1 d-none" role="alert">
                                                Mã môn học đã tồn tại!
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6 col-sm-12">
                                            <label for="name">Tên môn học*</label>
                                            <input type="text" class="form-control" id="name" placeholder="Nhập tên môn học" value="<?= $u_name ?>" required>
                                        </div>
                                        <div class="form-group col-lg-6 col-sm-12">
                                            <label for="numberOfCredits">Số tín chỉ*</label>
                                            <input type="number" max="16" class="form-control" id="numberOfCredits" placeholder="Nhập số lượng tin chỉ" value="<?= $u_numberOfCredits ?>">
                                        </div>
                                        <div class="form-group col-lg-6 col-sm-12">
                                            <label for="numberOfLessons">Số tiết học*</label>
                                            <input type="number" class="form-control" id="numberOfLessons" placeholder="Nhập số lượng tiết học" value="<?= $u_numberOfLessons ?>">
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" id="submit-btn" class="btn <?= $u_id ? 'btn-warning' : 'btn-primary' ?>">
                                            <?= $u_id ? "Cập nhật" : "Thêm mới" ?>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../../../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../../../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../../../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../../../../plugins/jszip/jszip.min.js"></script>
    <script src="../../../../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../../../../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../../../../plugins/datatables-buttons/js/buttons.html5.js"></script>
    <script src="../../../../plugins/datatables-buttons/js/buttons.print.js"></script>
    <script src="../../../../plugins/datatables-buttons/js/buttons.colVis.js"></script>
    <script src="../../../../plugins/moment/moment.min.js"></script>

    <!-- ChartJS -->
    <script src="../../../../plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../../../dist/js/adminlte.min.js"></script>
    <script src="../../../../plugins/sweetalert2/sweetalert2.min.js"></script>


    <script>
        $("#id").on('keyup', () => {
            let id = $("#id").val();
            id = id.trim();

            if (id.length >= 20) {
                $("#id-validate").removeClass('d-none');
                $("#id-validate").addClass('d-block');
                $("#id-validate").html('Mã môn học không được để quá 20 ký tự');
                $("#submit-btn").attr('disabled', true);
                return;
            }

            $.ajax({
                url: 'check_id.php',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    'id': id
                },
                success: function(data) {
                    if (data.status == 'success') {
                        $("#id-validate").removeClass('d-none');
                        $("#id-validate").addClass('d-block');
                        $("#id-validate").html(data.message);
                        $("#submit-btn").attr('disabled', true);
                    } else {
                        $("#id-validate").removeClass('d-block');
                        $("#id-validate").addClass('d-none');
                        $("#submit-btn").removeAttr('disabled');
                    }
                }
            });
        });

        $("#submit-btn").click((e) => {
            e.preventDefault();
            let id = $("#id").val();
            id = id.trim();

            let name = $("#name").val();
            name = name.trim();

            let numberOfCredits = $("#numberOfCredits").val();
            numberOfCredits = numberOfCredits.trim();

            let numberOfLessons = $("#numberOfLessons").val();
            numberOfLessons = numberOfLessons.trim();

            const urlParams = new URLSearchParams(window.location.search);
            const idParam = urlParams.get('id');

            if(idParam){
                $.ajax({
                url: 'update.php',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    'id': id,
                    'name': name,
                    'numberOfCredits': numberOfCredits,
                    'numberOfLessons': numberOfLessons
                },
                success: function(data) {
                    if (data.status == 'success') {
                        Swal.fire({
                            title: 'Thành công!',
                            text: data.message,
                            icon: 'success'
                        })
                    } else {
                        Swal.fire({
                            title: 'Thất bại!',
                            text: data.message,
                            icon: 'error'
                        });
                    }
                }
            });
            return;
            }

            $.ajax({
                url: 'create.php',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    'id': id,
                    'name': name,
                    'numberOfCredits': numberOfCredits,
                    'numberOfLessons': numberOfLessons
                },
                success: function(data) {
                    if (data.status == 'success') {
                        Swal.fire({
                            title: 'Thành công!',
                            text: data.message,
                            icon: 'success'
                        }).then(() => {
                            window.location.href = 'index.php';
                        });
                    } else {
                        Swal.fire({
                            title: 'Thất bại!',
                            text: data.message,
                            icon: 'error'
                        });
                    }
                }
            });
        })
    </script>
</body>

</html>