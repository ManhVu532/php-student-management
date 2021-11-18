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
$pathSidebar = 'schedules';

$title = "Thêm mới môn học";
$submitText = "Thêm mới";
$u_subjectId = $u_name = $u_roomExam = $u_total = $u_examAt = $u_examType = $u_totalTime =  $u_semesterId = $u_dateExam = $u_hourExam = $u_minuteExam = '';

if (isset($_GET['id'])) {
    $u_id = $_GET['id'];
    $u_id =  validate_data($u_id);
    if (!empty($u_id)) {
        $title = "Cập nhật thông tin lịch học";
        $submitText = "Cập nhật";

        $query = 'SELECT ss.semesterId, ss.subjectId, s.name, ss.examAt, ss.totalTime, ss.examType, ss.roomExam,
                rs.total, ss.id
                FROM subject_tbl AS s, subject_semester AS ss,
                    (SELECT COUNT(userId) AS total, subjectSemesterId
                        FROM `register_subject`
                        GROUP BY subjectSemesterId) AS rs
                WHERE s.id = ss.subjectId
                AND ss.id = rs.subjectSemesterId
                AND ss.id = "' . $u_id . '"
                UNION
                SELECT ss.semesterId, ss.subjectId, s.name, ss.examAt, ss.totalTime, ss.examType, ss.roomExam,
                0 AS total, ss.id
                FROM subject_tbl AS s, subject_semester AS ss
                WHERE s.id = ss.subjectId
                AND ss.id NOT IN (SELECT subjectSemesterId FROM register_subject)
                AND ss.id = "' . $u_id . '"
                ';
        $res = executeResult($query);

        if (count($res) > 0) {
            $u = $res[0];
            $u_subjectId = $u['subjectId'];
            $u_name = $u['name'];
            $u_roomExam = $u['roomExam'];
            $u_total = $u['total'];
            $u_totalTime = $u['totalTime'];
            $u_examType = $u['examType'];
            $u_examAt = $u['examAt'];

            if (!empty($u_examAt)) {
                $u_dateExam = DateTime::createFromFormat("Y-m-d H:i:s",  $u_examAt);
                $u_dateExam = $u_dateExam->format("Y-m-d");
                $date_format = new DateTime($u_examAt);
                $u_hourExam = $date_format->format("H");
                $u_minuteExam = $date_format->format("i");
            }
            $u_semesterId = $u['semesterId'];
        } else {
            header("Location: ../../404.php");
        }
    } else {
        $u_id = '';
    }
} else {
    header("Location: ../../404.php");
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
                            <h1>Lịch thi</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                                <li class="breadcrumb-item active">Lịch thi</li>
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
                                            <label for="id">Mã học phần</label>
                                            <input type="text" class="form-control" id="id" value="<?= $u_id ?>" disabled>
                                        </div>
                                        <div class="form-group col-lg-6 col-sm-12">
                                            <label for="semester">Kỳ học</label>
                                            <input type="text" class="form-control" id="semester" value="<?= $u_semesterId ?>" disabled>
                                        </div>
                                        <div class="form-group col-lg-6 col-sm-12">
                                            <label for="subject">Môn học</label>
                                            <input type="text" class="form-control" id="subject" value="<?= $u_name . " - " . $u_subjectId ?>" disabled>
                                        </div>
                                        <div class="form-group col-lg-6 col-sm-12">
                                            <label for="roomExam">Phòng thi</label>
                                            <input type="text" class="form-control" id="roomExam" placeholder="Nhập mã phòng" value="<?= $u_roomExam ?>">
                                        </div>
                                        <div class="form-group col-lg-6 col-sm-12">
                                            <label for="examType">Hình thức thi</label>
                                            <input type="text" class="form-control" id="examType" placeholder="Nhập hình thức thi" value="<?= $u_examType ?>">
                                        </div>
                                        <div class="form-group col-lg-6 col-sm-12">
                                            <label for="dateExam">Ngày thi</label>
                                            <input type="date" class="form-control" id="dateExam" format="DD/MM/YYYY" placeholder="Nhập thời gian thi" value="<?= $u_dateExam ?>">
                                        </div>
                                        <div class="form-group col-lg-3 col-sm-6">
                                            <label for="hourExam">Giờ thi</label>
                                            <input type="number" min="0" max="23" class="form-control" id="hourExam" placeholder="Nhập giờ thi" value="<?= $u_hourExam ?>">
                                        </div>
                                        <div class="form-group col-lg-3 col-sm-6">
                                            <label for="minuteExam">Phút thi</label>
                                            <input type="number" min="0" max="59"class="form-control" id="minuteExam" placeholder="phút" value="<?= $u_minuteExam ?>">
                                        </div>
                                        <div class="form-group col-lg-6 col-sm-12">
                                            <label for="totalTime">Thời lượng (phút)</label>
                                            <input type="number" class="form-control" min="0" id="totalTime" placeholder="Nhập tổng thời gian thi" value="<?= $u_totalTime ?>">
                                        </div>
                                        <div class="form-group col-lg-6 col-sm-12">
                                            <label for="total">Số lượng sinh viên tham gia</label>
                                            <input type="number" class="form-control" id="total" placeholder="Nhập số lương sinh viên" value="<?= $u_total ?>" disabled>
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
            let roomExam = $("#roomExam").val().trim();
            let examType = $("#examType").val().trim();
            let dateExam = $("#dateExam").val().trim();
            let hourExam = $("#hourExam").val().trim();
            let minuteExam = $("#minuteExam").val().trim();
            let totalTime = $("#totalTime").val().trim();

            let examAt = '';
            if (dateExam.length == 0 && (hourExam.length > 0 || minuteExam.length > 0)) {
                Swal.fire({
                    title: 'Lỗi',
                    text: 'Nhập giờ thi yêu cầu phải nhập ngày thi!',
                    icon: 'error',
                    confirmButtonText: 'OK'
                })
                return;
            } else if (dateExam.length == 0 && hourExam.length == 0 && minuteExam.length == 0) {
                examAt = null;
            } else {
                if (hourExam.length == 0) hourExam = '00';
                if (minuteExam.length == 0) minuteExam = '00';
                dateExam = dateExam.split("/").join("-");
                examAt = dateExam + "T" + hourExam + ":" + minuteExam + ":00";
            }

            const urlParams = new URLSearchParams(window.location.search);
            const idParam = urlParams.get('id');

            if (idParam) {
                $.ajax({
                    url: 'update.php',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        'id': idParam,
                        'examAt': examAt,
                        'roomExam': roomExam,
                        'examType': examType,
                        'totalTime': totalTime
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
        })
    </script>
</body>

</html>