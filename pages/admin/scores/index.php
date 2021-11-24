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
                            <h1>Điểm của sinh viên</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                                <li class="breadcrumb-item active">Điểm</li>
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
                            <div class="card elevation-2">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-users mr-1"></i>Danh sách điểm sinh viên
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6 search-box my-2">
                                            <div class="input-group">
                                                <input type="text" id="input-search" class="form-control" placeholder="Tìm kiếm...">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="button">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4"></div>
                                        <div class="col-2">
                                            <div class="text-right">
                                                <a href="form.php" class="btn btn-success">
                                                    <i class="fas fa-plus mr-1"></i>Thêm mới
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="subject-semester">Chọn học phần</label>
                                            <select id="subject-semester" class="selectpicker w-100 mb-2 elevation-1 rounded-lg" data-live-search="true" data-style="btn-info" title="Chọn học phần...">
                                                <?php
                                                $sql = "SELECT ss.semesterId, ss.subjectId, s.name AS subjectName, ss.id FROM subject_semester AS ss, subject_tbl AS s
                                                WHERE ss.subjectId = s.id
                                                ORDER BY ss.semesterId DESC, ss.subjectId DESC, ss.id;";
                                                $isSelected = false;
                                                $list = executeResult($sql);
                                                if (count($list) > 0) {
                                                    foreach ($list as $item) {
                                                        $id = $item['id'];
                                                        $subjectName = $item['subjectName'];
                                                        $semesterId = $item['semesterId'];
                                                        $subjectId = $item['subjectId'];
                                                        if (!$isSelected) {
                                                            $subjectSemester = $id;
                                                            $isSelected = true;
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
                                    </div>
                                    <div class="header-score_tbl mb-3"></div>
                                    <table id="score_tbl" class="w-100 table table-bordered table-striped">
                                        <thead>
                                            <tr class="bg-dark">
                                                <th>STT</th>
                                                <th>Mã sinh viên</th>
                                                <th>Tên sinh viên</th>
                                                <th>Mã môn học</th>
                                                <th>Tên môn học</th>
                                                <th>Kỳ học</th>
                                                <th>Điểm CC</th>
                                                <th>Điểm BT</th>
                                                <th>Điểm TH</th>
                                                <th>Điểm KT</th>
                                                <th>Điểm thi</th>
                                                <th>Tổng kết(Hệ 10)</th>
                                                <th>Tổng kết(Hệ chữ)</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbl_body">
                                            <?php
                                            $query = 'SELECT u.id, u.firstName, u.lastName, rs.pointCC, rs.pointKT, rs.pointBT, rs.pointTH, rs.pointExam, s.id AS subjectId, s.name, ss.semesterId
                                                FROM register_subject AS rs, user_tbl AS u, subject_tbl AS s, subject_semester AS ss
                                                WHERE rs.userId = u.id 
                                                AND rs.subjectSemesterId = "' . $subjectSemester . '"
                                                AND ss.id = "' . $subjectSemester . '"
                                                AND ss.subjectId = s.id
                                                ORDER BY rs.createAt DESC;';
                                            $list = executeResult($query);
                                            $index = 0;

                                            foreach ($list as $item) {
                                                $final = calcFinal($item['pointCC'], $item['pointBT'], $item['pointTH'], $item['pointKT'], $item['pointExam']);
                                                $index++;
                                                echo "<tr>";
                                                echo "<td>" . $index . "</td>";
                                                echo "<td>" . $item['id'] . "</td>";
                                                echo "<td>" . $item['lastName'] . $item['firstName'] . "</td>";
                                                echo "<td>" . $item['subjectId'] . "</td>";
                                                echo "<td>" . $item['name'] . "</td>";
                                                echo "<td>" . $item['semesterId'] . "</td>";
                                                echo "<td>" . $item['pointCC'] . "</td>";
                                                echo "<td>" . $item['pointBT'] . "</td>";
                                                echo "<td>" . $item['pointTH'] . "</td>";
                                                echo "<td>" . $item['pointKT'] . "</td>";
                                                echo "<td>" . $item['pointExam'] . "</td>";
                                                echo "<td>" . $final . "</td>";
                                                echo "<td>" . calc($final) . "</td>";
                                                echo '<td>
                                                        <div>
                                                            <a href="form.php?id=' . $item["id"] . '&subjectSemesterId=' . $subjectSemester . '" target="_blank" title="Cập nhật điểm sinh viên" class = "btn btn-warning rounded-circle mx-2" style = "height: 46px; padding-top: 10px">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <button title="Xóa thông tin của sinh viên này" data-id=' . $item["id"] . ' data-ssid="' . $subjectSemester . '" class = "btn btn-danger rounded-circle mt-2 mx-2 btn-delete" style = "min-height: 46px">
                                                                <i class="fas fa-user-minus"></i>
                                                            </button>
                                                        </div>
                                                      </td>';
                                                echo "</tr>";
                                            }
                                            if (count($list) ==  0) {
                                                echo "<tr><td colspan='14' class='text-center'>Không có dữ liệu hoặc không có sinh viên nào</td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>STT</th>
                                                <th>Mã sinh viên</th>
                                                <th>Tên sinh viên</th>
                                                <th>Mã môn học</th>
                                                <th>Tên môn học</th>
                                                <th>Kỳ học</th>
                                                <th>Điểm CC</th>
                                                <th>Điểm BT</th>
                                                <th>Điểm TH</th>
                                                <th>Điểm KT</th>
                                                <th>Điểm thi</th>
                                                <th>Tổng kết(Hệ 10)</th>
                                                <th>Tổng kết(Hệ chữ)</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.card-body -->
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
    <script src="../../../assets/js/utils.js"></script>
    <script src="../../../plugins/bootstrap-select-1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="../../../plugins/bootstrap-select-1.13.14/dist/js/i18n/defaults-vi_VN.min.js"></script>

    <!-- ChartJS -->
    <script src="../../../plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../../dist/js/adminlte.min.js"></script>
    <script src="../../../plugins/sweetalert2/sweetalert2.min.js"></script>

    <script>
        $(function() {
            $("#score_tbl").DataTable({
                "responsive": true,
                "searching": false,
                "lengthChange": true,
                "language": {
                    "info": "Hiển thị _START_ / _END_ của _TOTAL_ bản ghi",
                    "lengthMenu": 'Hiển thị <select>' +
                        '<option value="10">10</option>' +
                        '<option value="20">20</option>' +
                        '<option value="30">30</option>' +
                        '<option value="40">40</option>' +
                        '<option value="50">50</option>' +
                        '<option value="-1">Tất cả</option>' +
                        '</select> bản ghi',
                    "paginate": {
                        "next": "Sau",
                        "previous": "Trước"
                    },
                    "emptyTable": "Không có dữ liệu",
                    "search": "Tìm kiếm:",
                    "sZeroRecords": "Không tìm thấy dữ liệu khớp",
                    "sInfoFiltered": "(Tìm kiếm trong _MAX_ tổng số bản ghi)",
                    "sInfoEmpty": "Hiển thị 0 đến 0 của 0 bản ghi"
                },
                code: "utf-8",
                "buttons": [{
                    extend: "copy",
                    className: 'btn btn-outline-danger mt-2',
                    init: function(api, node, config) {
                        $(node).removeClass('btn-secondary')
                    },
                }, {
                    extend: "csv",
                    charset: "UTF-8",
                    title: "Điểm",
                    filename: "score",
                    fieldSeparator: ';',
                    className: 'btn btn-outline-danger mt-2',
                    bom: true,
                    init: function(api, node, config) {
                        $(node).removeClass('btn-secondary')
                    },
                    exportOptions: {
                        columns: ':not(:last-child)',
                    },
                }, {
                    extend: "excel",
                    title: "Điểm",
                    filename: "score",
                    exportOptions: {
                        columns: ':not(:last-child)',
                    },
                    className: 'btn btn-outline-danger mt-2',
                    init: function(api, node, config) {
                        $(node).removeClass('btn-secondary')
                    },
                }, {
                    extend: "pdf",
                    title: "Điểm",
                    filename: "score",
                    exportOptions: {
                        columns: ':not(:last-child)',
                    },
                    className: 'btn btn-outline-danger mt-2',
                    init: function(api, node, config) {
                        $(node).removeClass('btn-secondary')
                    },
                }, {
                    extend: "print",
                    title: "Điểm",
                    filename: "score",
                    exportOptions: {
                        columns: ':not(:last-child)',
                    },
                    className: 'btn btn-outline-danger mt-2',
                    init: function(api, node, config) {
                        $(node).removeClass('btn-secondary')
                    },
                }, {
                    extend: "colvis",
                    className: 'btn btn-outline-danger mt-2',
                    init: function(api, node, config) {
                        $(node).removeClass('btn-secondary')
                    },
                }]
            }).buttons().container().appendTo('.header-score_tbl');

            var table = $('#score_tbl').DataTable();
            $('#score_tbl tbody').on('click', 'button.btn-delete', function() {
                let id = this.dataset.id;
                let subjectSemesterId = this.dataset.ssid;
                deleteScore(id, subjectSemesterId, table.row($(this).parents('tr')));
            });
        });

        $("#subject-semester").on('change', () => {
            searching();
        });


        function searching() {
            let q = $("#input-search").val();
            let subjectSemester = $("#subject-semester").val().trim();
            q = q.trim();
            $.ajax({
                url: 'search.php',
                type: 'GET',
                dataType: 'JSON',
                data: {
                    'q': q,
                    'subjectSemester': subjectSemester
                },
                success: function(data) {
                    console.log();
                    if (data.status == 'success') {
                        var table = $('#score_tbl').DataTable();
                        table.clear().draw();
                        if (data.data.length > 0) {
                            data.data.map((item, index) => {
                                let final = calcFinal(item.pointCC,
                                    item.pointBT,
                                    item.pointTH,
                                    item.pointKT,
                                    item.pointExam);
                                let score = [index + 1,
                                    item.id,
                                    item.lastName + " " + item.firstName,
                                    item.subjectId,
                                    item.name,
                                    item.semesterId,
                                    item.pointCC,
                                    item.pointBT,
                                    item.pointTH,
                                    item.pointKT,
                                    item.pointExam,
                                    final,
                                    calc(final),
                                    `
                                    <div>
                                        <a href="form.php?id=${item.id}&subjectSemesterId=${subjectSemester}" target="_blank" title="Sửa sinh viên" class = "btn btn-warning rounded-circle mx-2" style = "height: 46px; padding-top: 10px">
                                            <i class="fas fa-user-edit"></i>
                                        </a>
                                        <button title="Xóa thông tin của sinh viên này" data-id="${item.id}" data-ssid="${subjectSemester}" class = "btn btn-danger mt-2 rounded-circle mx-2 btn-delete" style = "min-height: 46px">
                                            <i class="fas fa-user-minus"></i>
                                        </button>
                                    </div>
                                `
                                ];
                                table.row.add(score).draw();
                            });
                        }
                    } else {
                        Swal.fire({
                            title: 'Lỗi tìm kiếm!',
                            text: data.message,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        })
                    }
                }
            });
        }

        $("#input-search").on('keyup', () => {
            searching();
        });

        function deleteScore(id, subjectSemesterId, row) {
            if (!id || !subjectSemesterId) {
                Swal.fire({
                    icon: 'error',
                    title: 'Thông báo',
                    text: 'Thông tìn không đầy đủ!'
                })
                return;
            }
            Swal.fire({
                title: `Bạn có chắc chắn muốn xóa học kỳ ${id}?`,
                text: "Bạn sẽ không thể khôi phục lại dữ liệu này!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Có, xóa ngay!'
            }).then((result) => {
                if (result.value) {
                    Swal.fire({
                        html: `
                        <form class="form-inline">
                            <label for="confirm-password">Mật khẩu:</label>
                            <input class="form-control flex-grow-1 ml-2" id="confirm-password" type="password" placeholder="Nhập mật khẩu của bạn"/>
                        </form>
                        `,
                        icon: 'warning',
                        title: 'Xác nhận mật khẩu!',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Xác nhận xóa!',
                        cancelButtonText: 'Hủy',
                    }).then(result => {
                        if (result.value) {
                            let password = $("#confirm-password").val();
                            $.ajax({
                                url: 'delete.php',
                                type: 'POST',
                                dataType: 'JSON',
                                data: {
                                    'id': id,
                                    'password': password,
                                    'subjectSemesterId': subjectSemesterId
                                },
                                success: function(data) {
                                    if (data.status == 'success') {
                                        Swal.fire({
                                            title: 'Xóa thành công!',
                                            text: data.message,
                                            icon: 'success',
                                            confirmButtonText: 'OK'
                                        }).then(() => {
                                            row.remove().draw();
                                        });
                                    } else {
                                        Swal.fire({
                                            title: 'Lỗi xóa!',
                                            text: data.message,
                                            icon: 'error',
                                            confirmButtonText: 'OK'
                                        })
                                    }
                                }
                            })
                        }
                    })
                }
            })
        }
    </script>
</body>

</html>