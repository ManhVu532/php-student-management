<?php
session_start();
require_once("../../../utils/db_helper.php");
require_once("../../../utils/utils.php");
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    if ($user) {
        $user = json_decode($user, true);
        if ($user['type'] == 0) {
            header("Location: ../../403.php");
        }
    } else {
        header("Location: ../../auth/login.php");
    }
} else {
    header("Location: ../../auth/login.php");
}
$pathSidebar = 'semesters';

$title = "Thêm mới kỳ học";
$submitText = "Thêm mới";
$u_id = $u_type = $u_startYear = $u_endYear = $u_fee = '';

if (isset($_GET['id'])) {
    $u_id = $_GET['id'];
    $u_id =  validate_data($u_id);
    if (!empty($u_id)) {
        $title = "Cập nhật thông tin kỳ học";
        $submitText = "Cập nhật";

        $query = "SELECT * FROM semester_tbl WHERE id = '" . $u_id . "';";
        $res = executeResult($query);

        if (count($res) > 0) {
            $u = $res[0];
            $u_type = $u['type'];
            $u_startYear = $u['startYear'];
            $u_endYear = $u['endYear'];
            $u_fee = $u['fee'];
        } else {
            header("Location: ../../404.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../../../assets/images/favicon.png">
    <title>Học viện Công nghệ Bưu chính Viễn thông</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../../plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../dist/css/adminlte.min.css">

    <link rel="stylesheet" href="../../../plugins/sweetalert2/sweetalert2.min.css">

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php
        include "../../../components/navbar.php";
        include "../../../components/sidebar.php";
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper pb-4">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Kỳ học</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                                <li class="breadcrumb-item active">Kỳ học</li>
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
                                            <label for="id">Mã kỳ học*</label>
                                            <?php
                                            if (empty($u_id)) {
                                                echo "<input type='text' class='form-control' id='id' placeholder='Nhập mã kỳ học' value='" . $u_id . "' required>";
                                            } else {
                                                echo "<input type='text' class='form-control' id='id' placeholder='Nhập mã kỳ học' value='" . $u_id . "' disabled required>";
                                            }
                                            ?>
                                            <div id="id-validate" class="alert alert-danger mt-1 d-none" role="alert">
                                                Mã kỳ học đã tồn tại!
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6 col-sm-12">
                                            <div>
                                                <label>Học kỳ*</label>
                                                <select id="type" class="form-control">
                                                    <option value="1" <?= $u_type == '1' ? 'selected="selected"' : '' ?>>Học kỳ 1</option>
                                                    <option value="2" <?= $u_type == '2' ? 'selected="selected"' : '' ?>>Học kỳ 2</option>
                                                    <option value="3" <?= ($u_type == '3') ? 'selected="selected"' : '' ?>>Học kỳ 3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6 col-sm-12">
                                            <label for="startYear">Năm kỳ học bắt đầu*</label>
                                            <input type="number" min="2000" max="3000" class="form-control" id="startYear" placeholder="Nhập kỳ học bắt đầu" value="<?= $u_startYear ?>">
                                        </div>
                                        <div class="form-group col-lg-6 col-sm-12">
                                            <label for="endYear">Năm kỳ học kết thúc*</label>
                                            <input type="number" min="2000" max="3000" class="form-control" id="endYear" placeholder="Nhập kỳ học kết thúc" value="<?= $u_endYear ?>" disabled>
                                        </div>
                                        <div class="form-group col-lg-6 col-sm-12">
                                            <label for="fee">Học phí (VNĐ/tín chỉ)*</label>
                                            <input type="number" min="0" class="form-control" id="fee" placeholder="Nhập học phí" value="<?= $u_fee ?>">
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
    <script src="../../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../../../plugins/jszip/jszip.min.js"></script>
    <script src="../../../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../../../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../../../plugins/datatables-buttons/js/buttons.html5.js"></script>
    <script src="../../../plugins/datatables-buttons/js/buttons.print.js"></script>
    <script src="../../../plugins/datatables-buttons/js/buttons.colVis.js"></script>
    <script src="../../../plugins/moment/moment.min.js"></script>

    <!-- ChartJS -->
    <script src="../../../plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../../dist/js/adminlte.min.js"></script>
    <script src="../../../plugins/sweetalert2/sweetalert2.min.js"></script>


    <script>
        $("#startYear").on('change', function() {
            $("#endYear").val(parseInt($(this).val()) + 1);
        });

        $("#id").on('keyup', () => {
            let id = $("#id").val();
            id = id.trim();

            if (id.length == 0) {
                $("#id-validate").removeClass('d-none');
                $("#id-validate").addClass('d-block');
                $("#id-validate").html('ID không được để trống');
                $("#submit-btn").attr('disabled', true);
                return;
            }
            if (id.length >= 20) {
                $("#id-validate").removeClass('d-none');
                $("#id-validate").addClass('d-block');
                $("#id-validate").html('ID không được để quá 20 ký tự');
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
        $("#submit-btn").click(function(e) {
            e.preventDefault();
            var id = $("#id").val();
            var type = $("#type").val();
            var startYear = $("#startYear").val();
            var endYear = $("#endYear").val();
            var fee = $("#fee").val();

            if (type == '' || startYear == '' || endYear == '' || fee == '' || id == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Thông báo',
                    text: 'Vui lòng nhập đầy đủ thông tin'
                });
                return;
            }

            const urlParams = new URLSearchParams(window.location.search);
            const idParam = urlParams.get('id');

            if (idParam) {
                $.ajax({
                    url: 'update.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        id: id,
                        type: type,
                        startYear: startYear,
                        endYear: endYear,
                        fee: fee
                    },
                    beforeSend: function() {
                        Swal.fire({
                            icon: 'info',
                            title: 'Đang xử lý...',
                            showCancelButton: false,
                            showConfirmButton: false,
                            onBeforeOpen: () => {
                                Swal.showLoading()
                            }
                        });
                    },
                    success: function(data) {
                        if (data.status == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Thông báo',
                                text: 'Cập nhật thành công'
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Thông báo',
                                text: data.message,
                            });
                        }
                    }
                });
            } else {
                $.ajax({
                    url: 'create.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        id: id,
                        type: type,
                        startYear: startYear,
                        endYear: endYear,
                        fee: fee
                    },
                    beforeSend: function() {
                        Swal.fire({
                            icon: 'info',
                            title: 'Đang xử lý...',
                            showCancelButton: false,
                            showConfirmButton: false,
                            onBeforeOpen: () => {
                                Swal.showLoading()
                            }
                        });
                    },
                    success: function(data) {
                        if (data.status == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Thông báo',
                                text: 'Thêm mới thành công'
                            }).then(function() {
                                window.location.href = 'index.php';
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Thông báo',
                                text: data.message,
                            });
                        }
                    }
                });
            }
        });
    </script>
</body>

</html>