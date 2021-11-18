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
$pathSidebar = 'subject-semester';

$title = "Thêm mới môn học";
$submitText = "Thêm mới";
$u_subjectId = $u_semesterId = $u_room = $u_numberOfSlots = $u_id = $u_startAt = $u_endAt = $u_dayOfWeek = $u_lecturer = '';

if (isset($_GET['id'])) {
    $u_id = $_GET['id'];
    $u_id =  validate_data($u_id);
    if (!empty($u_id)) {
        $title = "Cập nhật thông tin môn học";
        $submitText = "Cập nhật";

        $query = "SELECT * FROM subject_semester WHERE id = '" . $u_id . "';";
        $res = executeResult($query);

        if (count($res) > 0) {
            $u = $res[0];
            $u_subjectId = $u['subjectId'];
            $u_semesterId = $u['semesterId'];
            $u_room = $u['room'];
            $u_numberOfSlots = $u['numberOfSlots'];
            $u_dayOfWeek = $u['dayOfWeek'];
            $u_startAt = $u['startAt'];
            $u_endAt = $u['endAt'];
            $u_lecturer = $u['lecturer'];
        } else {
            header("Location: ../../../404.php");
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
    <link rel="stylesheet" href="../../../../plugins/bootstrap-select-1.13.14/dist/css/bootstrap-select.min.css">

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
                            <h1>Môn học theo kỳ học</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                                <li class="breadcrumb-item active">Môn học theo kỳ học</li>
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
                                            <label for="semester">Chọn học kỳ*</label>
                                            <select id="semester" class="selectpicker w-100 mb-2 elevation-1 rounded-lg" data-live-search="true" data-style="btn-secondary" title="Chọn học kỳ..." <?= $u_semesterId ? "disabled" : "" ?>>
                                                <?php
                                                $sql = "SELECT * FROM semester_tbl ORDER BY createAt DESC;";
                                                $list = executeResult($sql);
                                                if (count($list) > 0) {
                                                    foreach ($list as $item) {
                                                        $id = $item['id'];
                                                        $type = $item['type'];
                                                        if ($id == $u_semesterId) {
                                                            echo '
                                                                <option value="' . $id . '" data-tokens="' . $id . " Học kỳ " . $type . '" selected="selected">' . "Học kỳ " . $type . " " . $item['startYear'] . "-" . $item['endYear'] . '</option>
                                                            ';
                                                        } else {
                                                            echo '
                                                                <option value="' . $id . '" data-tokens="' . $id . " Học kỳ " . $type . '">' . "Học kỳ " . $type . " " . $item['startYear'] . "-" . $item['endYear'] . '</option>
                                                            ';
                                                        }
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-6 col-sm-12">
                                            <label for="subject">Chọn môn học*</label>
                                            <select id="subject" class="selectpicker w-100 mb-2 elevation-1 rounded-lg" data-live-search="true" data-style="btn-secondary" title="Chọn môn học..." <?= $u_semesterId ? "disabled" : "" ?>>
                                                <?php
                                                $sql = "SELECT * FROM subject_tbl ORDER BY createAt DESC;";
                                                $list = executeResult($sql);
                                                if (count($list) > 0) {
                                                    foreach ($list as $item) {
                                                        $id = $item['id'];
                                                        $name = $item['name'];
                                                        if ($id == $u_subjectId) {
                                                            echo '
                                                                <option value="' . $id . '" data-tokens="' . $id . $name . '" selected="selected">' . $name . " - " . $item['id'] . '</option>
                                                            ';
                                                        } else {
                                                            echo '
                                                                <option value="' . $id . '" data-tokens="' . $id . $name . '">' . $name . " - " . $item['id'] . '</option>
                                                            ';
                                                        }
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-6 col-sm-12">
                                            <label for="room">Phòng*</label>
                                            <input type="text" class="form-control" id="room" placeholder="Nhập mã phòng" value="<?= $u_room ?>">
                                        </div>
                                        <div class="form-group col-lg-6 col-sm-12">
                                            <label for="lecturer">Giảng viên*</label>
                                            <input type="text" class="form-control" id="lecturer" placeholder="Nhập tên giảng viên" value="<?= $u_lecturer ?>">
                                        </div>
                                        <div class="form-group col-lg-6 col-sm-12">
                                            <label for="dayOfWeek">Thứ*</label>
                                            <select id="dayOfWeek" class="selectpicker w-100 mb-2 elevation-1 rounded-lg" data-style="btn-secondary" title="Chọn ngày học trong tuần">
                                                <option value="2" <?= $u_dayOfWeek == "2" ? "selected='selected'" : "" ?>>Thứ 2</option>
                                                <option value="3" <?= $u_dayOfWeek == "3" ? "selected='selected'" : "" ?>>Thứ 3</option>
                                                <option value="4" <?= $u_dayOfWeek == "4" ? "selected='selected'" : "" ?>>Thứ 4</option>
                                                <option value="5" <?= $u_dayOfWeek == "5" ? "selected='selected'" : "" ?>>Thứ 5</option>
                                                <option value="6" <?= $u_dayOfWeek == "6" ? "selected='selected'" : "" ?>>Thứ 6</option>
                                                <option value="7" <?= $u_dayOfWeek == "7" ? "selected='selected'" : "" ?>>Thứ 7</option>
                                                <option value="1" <?= $u_dayOfWeek == "1" ? "selected='selected'" : "" ?>>Chủ nhật</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-6 col-sm-12">
                                            <label for="startAt">Tiết bắt đầu*</label>
                                            <input type="number" min="1" max="11" class="form-control" id="startAt" placeholder="Nhập tiết bắt đầu" value="<?= $u_startAt ?>">
                                        </div>
                                        <div class="form-group col-lg-6 col-sm-12">
                                            <label for="endAt">Tiết kết thúc*</label>
                                            <input type="number" min="2" max="12" class="form-control" id="endAt" placeholder="Nhập tiết kết thúc" value="<?= $u_endAt ?>">
                                        </div>
                                        <div class="form-group col-lg-6 col-sm-12">
                                            <label for="numberOfSlots">Số lượng sinh viên*</label>
                                            <input type="number" class="form-control" id="numberOfSlots" placeholder="Nhập số lượng sinh viên" value="<?= $u_numberOfSlots ?>">
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
    <script src="../../../../plugins/bootstrap-select-1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="../../../../plugins/bootstrap-select-1.13.14/dist/js/i18n/defaults-vi_VN.min.js"></script>

    <!-- ChartJS -->
    <script src="../../../../plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../../../dist/js/adminlte.min.js"></script>
    <script src="../../../../plugins/sweetalert2/sweetalert2.min.js"></script>


    <script>
        $("#submit-btn").click((e) => {
            e.preventDefault();
            let semesterId = $("#semester").val().trim();
            let subjectId = $("#subject").val().trim();
            let dayOfWeek = $("#dayOfWeek").val().trim();
            let startAt = $("#startAt").val().trim();
            let endAt = $("#endAt").val().trim();
            let numberOfSlots = $("#numberOfSlots").val().trim();
            let room = $("#room").val().trim();
            let lecturer = $("#lecturer").val().trim();

            if (room.length > 50) {
                swal({
                    icon: 'error',
                    title: 'Lỗi',
                    text: 'Mã phòng học không được quá 50 ký tự!'
                });
                return;
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
                        'semesterId': semesterId,
                        'subjectId': subjectId,
                        'room': room,
                        'lecturer': lecturer,
                        'startAt': startAt,
                        'endAt': endAt,
                        'dayOfWeek': dayOfWeek,
                        'numberOfSlots': numberOfSlots,
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
                    'semesterId': semesterId,
                    'subjectId': subjectId,
                    'dayOfWeek': dayOfWeek,
                    'startAt': startAt,
                    'endAt': endAt,
                    'numberOfSlots': numberOfSlots,
                    'room': room,
                    'lecturer': lecturer
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