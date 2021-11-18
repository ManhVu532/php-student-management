<?php
session_start();
require_once("../../../../utils/db_helper.php");
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
$pathSidebar = 'subjects-semester';
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
                            <h1>Môn học theo học kỳ</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                                <li class="breadcrumb-item active">Môn học theo học kỳ</li>
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
                                        <i class="nav-icon fas fa-book"></i> Danh sách môn học theo học kỳ
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
                                                    <i class="fas fa-plus mr-1"></i> Thêm mới
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label class="mt-2">Chọn học kỳ:</label>
                                            <select id="semester" class="selectpicker w-100 mb-2 elevation-1 rounded-lg" data-live-search="true" data-style="btn-info">
                                                <?php
                                                $sql = "SELECT * FROM semester_tbl ORDER BY createAt DESC;";
                                                $list = executeResult($sql);
                                                $isSelected = false;
                                                if (count($list) > 0) {
                                                    foreach ($list as $item) {
                                                        $id = $item['id'];
                                                        $type = $item['type'];
                                                        if(!$isSelected) {
                                                            $semester = $id;
                                                            $isSelected = true;
                                                            echo '
                                                                <option value="' . $id . '" data-tokens="' . $id . " Học kỳ " . $type . '" selected="selected">' . "Học kỳ " . $type . " " . $item['startYear'] . "-" . $item['endYear'] . '</option>
                                                            ';
                                                        }else{
                                                            echo '
                                                                <option value="' . $id . '" data-tokens="' . $id . " Học kỳ " . $type . '">' . "Học kỳ " . $type . " " . $item['startYear'] . "-" . $item['endYear'] . '</option>
                                                            ';
                                                        }
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="header-subjects_tbl mb-3"></div>
                                    <table id="subject_tbl" class="w-100 table table-bordered table-striped">
                                        <thead>
                                            <tr class="bg-dark">
                                                <th>Id</th>
                                                <th>Mã môn học</th>
                                                <th>Tên môn học</th>
                                                <th>Mã học kỳ</th>
                                                <th>Giảng viên</th>
                                                <th>Phòng</th>
                                                <th>Thứ</th>
                                                <th>Tiết bắt đầu</th>
                                                <th>Tiết kết thúc</th>
                                                <th>Số lượng</th>
                                                <th>Còn lại</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbl_body">
                                            <?php
                                            $query = 'SELECT ss.id, ss.subjectId, s.name, ss.semesterId, ss.lecturer, ss.room, ss.dayOfWeek,
                                                        ss.numberOfSlots, ss.startAt, ss.endAt, rs.total
                                                    FROM subject_tbl AS s, subject_semester AS ss,
                                                        (SELECT COUNT(userId) AS total, subjectSemesterId
                                                            FROM `register_subject`
                                                            GROUP BY subjectSemesterId) 
                                                        AS rs
                                                    WHERE s.id = ss.subjectId
                                                    AND rs.subjectSemesterId = ss.id
                                                    AND ss.semesterId = "'.$semester.'"
                                                    UNION DISTINCT
                                                    SELECT ss.id, ss.subjectId, s.name, ss.semesterId, ss.lecturer, ss.room, ss.dayOfWeek,
                                                        ss.numberOfSlots, ss.startAt, ss.endAt, 0 AS total
                                                    FROM subject_tbl AS s, subject_semester AS ss, register_subject AS rs
                                                    WHERE s.id = ss.subjectId
                                                    AND rs.subjectSemesterId != ss.id
                                                    AND ss.semesterId = "'.$semester.'";';
                                            $list = executeResult($query);
                                            $index = 0;
                                            foreach ($list as $item) {
                                                $id = "'" . $item['id'] . "'";
                                                $remain = intval($item['numberOfSlots']) - intval($item['total']);
                                                $index++;
                                                echo "<tr>";
                                                echo "<td>" . $item['id'] . "</td>";
                                                echo "<td>" . $item['subjectId'] . "</td>";
                                                echo "<td>" . $item['name'] . "</td>";
                                                echo "<td>" . $item['semesterId'] . "</td>";
                                                echo "<td>" . $item['lecturer'] . "</td>";
                                                echo "<td>" . $item['room'] . "</td>";
                                                echo "<td>" . $item['dayOfWeek'] . "</td>";
                                                echo "<td>" . $item['startAt'] . "</td>";
                                                echo "<td>" . $item['endAt'] . "</td>";
                                                echo "<td>" . $item['numberOfSlots'] . "</td>";
                                                echo "<td>" . ($remain == 0 ? 'Đã hết' : $remain) . "</td>";
                                                echo '<td>
                                                        <div class="text-nowrap">
                                                            <a href="form.php?id=' . $item["id"] . '" target="_blank" title="Sửa môn học" class = "btn btn-warning rounded-circle mx-2" style = "height: 46px; padding-top: 10px">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <button title="Xóa môn học" data-id="' . $item['id'] . '" class = "btn btn-danger rounded-circle mx-2 btn-delete" style = "min-height: 46px">
                                                                <i class="fas fa-trash-alt mx-1"></i>
                                                            </button>
                                                        </div>
                                                      </td>';
                                                echo "</tr>";
                                            }

                                            if (count($list) == 0) {
                                                echo "<tr><td colspan='12' class='text-center'>Không có dữ liệu</td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Id</th>
                                                <th>Mã môn học</th>
                                                <th>Tên môn học</th>
                                                <th>Mã học kỳ</th>
                                                <th>Giảng viên</th>
                                                <th>Phòng</th>
                                                <th>Thứ</th>
                                                <th>Tiết bắt đầu</th>
                                                <th>Tiết kết thúc</th>
                                                <th>Số lượng</th>
                                                <th>Còn lại</th>
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
        $(function() {
            $("#subject_tbl").DataTable({
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
                    "emptyTable": "Không có dữ liệu"
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
                    title: "Người dùng",
                    filename: "students",
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
                    title: "Người dùng",
                    filename: "students",
                    exportOptions: {
                        columns: ':not(:last-child)',
                    },
                    className: 'btn btn-outline-danger mt-2',
                    init: function(api, node, config) {
                        $(node).removeClass('btn-secondary')
                    },
                }, {
                    extend: "pdf",
                    title: "Người dùng",
                    filename: "students",
                    exportOptions: {
                        columns: ':not(:last-child)',
                    },
                    className: 'btn btn-outline-danger mt-2',
                    init: function(api, node, config) {
                        $(node).removeClass('btn-secondary')
                    },
                }, {
                    extend: "print",
                    title: "Người dùng",
                    filename: "students",
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
            }).buttons().container().appendTo('.header-subjects_tbl');

            var table = $('#subject_tbl').DataTable();
            $('#subject_tbl tbody').on('click', 'button.btn-delete', function() {
                let id = this.dataset.id;
                deleteSubject(id, table.row($(this).parents('tr')));
            });

            $("#semester").on('change', function() {
                console.log("change: ");
                searching();
            })
        });


        function searching() {
            let q = $("#input-search").val();
            let semester = $("#semester").val();
            console.log("semester: ", semester);
            q = q.trim();
            $.ajax({
                url: 'search.php',
                type: 'GET',
                dataType: 'JSON',
                data: {
                    'q': q,
                    'semester': semester,
                },
                success: function(data) {
                    var table = $('#subject_tbl').DataTable();
                    if (data.status == 'success') {
                        if (data.data.length > 0) {
                            let list = "";
                            table.clear().draw();

                            list = data.data.map((item) => {
                                let subject = [item.id, item.subjectId, item.name, item.semesterId, item.lecturer,
                                                item.room, item.dayOfWeek, item.startAt, item.endAt, item.numberOfSlots, '10', 'A', `
                                <div class="text-nowrap">
                                    <a href='form.php?id=${item.id}' target='_blank' title='Sửa sinh viên' class = 'btn btn-warning rounded-circle mx-2' style = 'height: 46px; padding-top: 10px'>
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button title='Xóa sinh viên' data-id="${item.id}" class = 'btn btn-danger rounded-circle mx-2 btn-delete' style = 'min-height: 46px'>
                                        <i class="fas fa-trash-alt mx-1"></i>
                                    </button>
                                </div>
                                `];
                                table.row.add(subject).draw();
                            });
                        } else {
                            table.clear().draw();
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

        function deleteSubject(id, row) {
            if (!id) return;
            Swal.fire({
                title: `Bạn có chắc chắn muốn xóa môn học ${id}?`,
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
                                    'password': password
                                },
                                success: function(data) {
                                    console.log("res: ", data);
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