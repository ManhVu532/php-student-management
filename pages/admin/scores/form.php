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
$pathSidebar = 'scores';

$title = "Thêm mới sinh viên vào lớp học phần";
$submitText = "Thêm mới";
$u_id = $u_subjectSemesterId = $u_pointCC = $u_pointBT = $u_pointTH = $u_pointKT = $u_pointExam = '';

if (isset($_GET['id']) && isset($_GET['subjectSemesterId'])) {
    $u_id = $_GET['id'];
    $u_id =  validate_data($u_id);
    $u_subjectSemesterId = validate_data($_GET['subjectSemesterId']);
    if (!empty($u_id) && !empty($u_subjectSemesterId)) {
        $title = "Cập nhật thông tin môn học";
        $submitText = "Cập nhật";

        $query = "SELECT rs.*, s.name, u.id AS userId, u.firstName, u.lastName 
        FROM register_subject AS rs, subject_semester AS ss, subject_tbl AS s, user_tbl AS u
        WHERE
        rs.subjectSemesterId = '" . $u_subjectSemesterId . "' AND
        ss.id = '" . $u_subjectSemesterId . "' AND
        ss.subjectId = s.id AND
        rs.userId = u.id AND
        rs.userId = '" . $u_id . "';";

        $res = executeResult($query);

        if (count($res) > 0) {
            $u = $res[0];
            $u_pointCC = $u['pointCC'];
            $u_pointBT = $u['pointBT'];
            $u_pointTH = $u['pointTH'];
            $u_pointKT = $u['pointKT'];
            $u_pointExam = $u['pointExam'];
        } else {
            header("Location: ../../404.php");
        }
    } else {
        $u_id = '';
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
    <link rel="stylesheet" href="../../../plugins/bootstrap-select-1.13.14/dist/css/bootstrap-select.min.css">

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
                            <h1>Sinh viên theo lớp học phần</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                                <li class="breadcrumb-item active">Điểm theo lớp học phần</li>
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
                                            <label for="subject-semester">Chọn học phần*</label>
                                            <select id="subject-semester" class="selectpicker w-100 mb-2 elevation-1 rounded-lg" data-live-search="true" data-style="btn-secondary" title="Chọn học phần..." <?= $u_subjectSemesterId ? "disabled" : "" ?>>
                                                <?php
                                                $sql = "SELECT ss.semesterId, ss.subjectId, s.name AS subjectName, ss.id FROM subject_semester AS ss, subject_tbl AS s
                                                WHERE ss.subjectId = s.id
                                                ORDER BY ss.createAt DESC;";
                                                $list = executeResult($sql);
                                                if (count($list) > 0) {
                                                    foreach ($list as $item) {
                                                        $id = $item['id'];
                                                        $subjectName = $item['subjectName'];
                                                        $semesterId = $item['semesterId'];
                                                        $subjectId = $item['subjectId'];
                                                        if ($id == $u_subjectSemesterId) {
                                                            echo '
                                                                <option value="' . $id . '" data-tokens="' . $id . $subjectName . $semesterId . $subjectId . '" selected="selected">' . $semesterId . " - " . $subjectName . "-" . $subjectId . " - " . $id . '</option>
                                                            ';
                                                        } else {
                                                            echo '
                                                                <option value="' . $id . '" data-tokens="' . $id . $subjectName . $semesterId . $subjectId . '">' . $semesterId . " - " . $subjectName . "-" . $subjectId .  " - " . $id . '</option>
                                                            ';
                                                        }
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-6 col-sm-12">
                                            <label for="student">Chọn sinh viên*</label>
                                            <select id="student" class="selectpicker w-100 mb-2 elevation-1 rounded-lg" data-live-search="true" data-style="btn-secondary" title="Chọn sinh viên..." <?= $u_id ? "disabled" : "" ?>>
                                                <?php
                                                $sql = "SELECT * FROM user_tbl ORDER BY createAt DESC;";
                                                $list = executeResult($sql);

                                                if (count($list) > 0) {
                                                    foreach ($list as $item) {
                                                        $id = $item['id'];
                                                        $studentName = $item['lastName'] . " " . $item['firstName'];
                                                        if ($id == $u_id) {
                                                            echo '
                                                                <option value="' . $id . '" data-tokens="' . $id . $studentName . '" selected="selected">' . $studentName . "-" . $id . '</option>
                                                            ';
                                                        } else {
                                                            echo '
                                                                <option value="' . $id . '" data-tokens="' . $id . $studentName . '">' . $studentName . "-" . $id . '</option>
                                                            ';
                                                        }
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-6 col-sm-12">
                                            <label for="pointCC">Điểm chuyên cần</label>
                                            <input type="number" min="0" max="10" step="0.01" class="form-control" id="pointCC" placeholder="Nhập điểm chuyên cần" value="<?= $u_pointCC ?>">
                                        </div>
                                        <div class="form-group col-lg-6 col-sm-12">
                                            <label for="pointBT">Điểm bài tập</label>
                                            <input type="number" min="0" max="10" step="0.01" class="form-control" id="pointBT" placeholder="Nhập điểm bài tập" value="<?= $u_pointBT ?>">
                                        </div>
                                        <div class="form-group col-lg-6 col-sm-12">
                                            <label for="pointTH">Điểm thực hành</label>
                                            <input type="number" min="0" max="10" step="0.01" class="form-control" id="pointTH" placeholder="Nhập điểm thực hành" value="<?= $u_pointTH ?>">
                                        </div>
                                        <div class="form-group col-lg-6 col-sm-12">
                                            <label for="pointKT">Điểm kiểm tra</label>
                                            <input type="number" min="0" max="10" step="0.01" class="form-control" id="pointKT" placeholder="Nhập điểm kiểm tra" value="<?= $u_pointKT ?>">
                                        </div>
                                        <div class="form-group col-lg-6 col-sm-12">
                                            <label for="pointExam">Điểm thi</label>
                                            <input type="number" min="0" max="10" step="0.01" class="form-control" id="pointExam" placeholder="Nhập điểm thi" value="<?= $u_pointExam ?>">
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
    <script src="../../../plugins/bootstrap-select-1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="../../../plugins/bootstrap-select-1.13.14/dist/js/i18n/defaults-vi_VN.min.js"></script>

    <!-- ChartJS -->
    <script src="../../../plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../../dist/js/adminlte.min.js"></script>
    <script src="../../../plugins/sweetalert2/sweetalert2.min.js"></script>


    <script>
        $("#submit-btn").click((e) => {
            e.preventDefault();
            let subjectSemesterId = $("#subject-semester").val();
            let studentId = $("#student").val();
            let pointCC = $("#pointCC").val();
            let pointBT = $("#pointBT").val();
            let pointTH = $("#pointTH").val();
            let pointKT = $("#pointKT").val();
            let pointExam = $("#pointExam").val();

            if (!subjectSemesterId || !studentId) {
                Swal.fire({
                    title: 'Lỗi',
                    text: 'Vui lòng nhập đầy đủ thông tin bắt buộc!',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                return;
            }

            const urlParams = new URLSearchParams(window.location.search);
            const idParam = urlParams.get('id');
            const ssParam = urlParams.get('subjectSemesterId');

            if (idParam && subjectSemesterId) {
                $.ajax({
                    url: 'update.php',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        ssId: ssParam,
                        studentId: idParam,
                        pointCC: pointCC,
                        pointBT: pointBT,
                        pointTH: pointTH,
                        pointKT: pointKT,
                        pointExam: pointExam,
                    },
                    beforeSend: function() {
                        Swal.fire({
                            title: 'Đang cập nhật...',
                            icon: 'info',
                            showConfirmButton: false,
                            showCancelButton: false,
                            onOpen: () => {
                                Swal.showLoading();
                            }
                        })
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
                    'subjectSemesterId': subjectSemesterId,
                    'studentId': studentId,
                    'pointCC': pointCC,
                    'pointBT': pointBT,
                    'pointTH': pointTH,
                    'pointKT': pointKT,
                    'pointExam': pointExam,
                },
                beforeSend: function() {
                    Swal.fire({
                        title: 'Đang thêm mới...',
                        icon: 'info',
                        showConfirmButton: false,
                        showCancelButton: false,
                        onOpen: () => {
                            Swal.showLoading();
                        }
                    })
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