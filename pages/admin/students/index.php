<?php
session_start();
require_once("../../../utils/db_helper.php");
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
$pathSidebar = 'students';
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
                            <h1>Sinh viên</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                                <li class="breadcrumb-item active">Sinh viên</li>
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
                                        <i class="fas fa-users mr-1"></i> Danh sách sinh viên
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
                                    </div>
                                    <div class="header-student_tbl mb-3"></div>
                                    <table id="student_tbl" class="w-100 table table-bordered table-striped">
                                        <thead>
                                            <tr class="bg-dark">
                                                <th>STT</th>
                                                <th>Mã sinh viên</th>
                                                <th>Họ và tên</th>
                                                <th>Lớp</th>
                                                <th>Ngày sinh</th>
                                                <th>Giới tính</th>
                                                <th>Địa chỉ</th>
                                                <th>Email</th>
                                                <th>Số điện thoại</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbl_body">
                                            <?php
                                            $query = 'SELECT * FROM user_tbl WHERE `type` = 0 ORDER BY createAt DESC;';
                                            $listUser = executeResult($query);
                                            $index = 0;
                                            foreach ($listUser as $user) {
                                                $index++;
                                                $dob = $user['dob'];
                                                $date_format = 'Không có';
                                                $action = "Gửi mail";
                                                $id = "'" . $user['id'] . "'";
                                                if ($dob) {
                                                    $date = $dob;
                                                    $date_format = DateTime::createFromFormat("Y-m-d H:i:s",  $date);
                                                    $date_format = $date_format->format("d/m/Y");
                                                    if (str_contains($date_format, '-0001')) {
                                                        $date_format = '';
                                                    }
                                                }
                                                echo "<tr>";
                                                echo "<td>" . $index . "</td>";
                                                echo "<td>" . $user['id'] . "</td>";
                                                echo "<td>" . $user['lastName'] . ' ' . $user['firstName'] . "</td>";
                                                echo "<td>" . $user['classId'] . "</td>";
                                                echo "<td>" . $date_format . "</td>";
                                                echo "<td>" . $user['gender'] . "</td>";
                                                echo "<td>" . $user['address'] . "</td>";
                                                echo "<td>" . $user['email'] . "</td>";
                                                echo "<td>" . $user['phoneNumber'] . "</td>";
                                                echo '<td>
                                                        <div class="text-nowrap">
                                                            <button title="Đặt lại mật khẩu" class = "btn btn-primary rounded-circle mx-2" style = "min-height: 46px" onclick="resetPassword(' . $id . ')">
                                                                <i class="fas fa-lock mx-1"></i>
                                                            </button>
                                                            <a href="form.php?id=' . $user["id"] . '" target="_blank" title="Sửa sinh viên" class = "btn btn-warning rounded-circle mx-2" style = "height: 46px; padding-top: 10px">
                                                                <i class="fas fa-user-edit"></i>
                                                            </a>
                                                            <button title="Xóa sinh viên" class = "btn btn-danger rounded-circle mx-2" style = "min-height: 46px" onclick="deleteStudent(' . $id . ')">
                                                                <i class="fas fa-user-minus"></i>
                                                            </button>
                                                        </div>
                                                      </td>';
                                                echo "</tr>";
                                            }

                                            if (count($listUser) == 0) {
                                                echo "<tr><td colspan='5' class='text-center'>Không có dữ liệu hoặc không có sinh viên nào sắp tới ngày sinh nhật</td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>STT</th>
                                                <th>Mã sinh viên</th>
                                                <th>Họ và tên</th>
                                                <th>Lớp</th>
                                                <th>Ngày sinh</th>
                                                <th>Giới tính</th>
                                                <th>Địa chỉ</th>
                                                <th>Email</th>
                                                <th>Số điện thoại</th>
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

    <!-- ChartJS -->
    <script src="../../../plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../../dist/js/adminlte.min.js"></script>
    <script src="../../../plugins/sweetalert2/sweetalert2.min.js"></script>

    <script>
        $(function() {
            $("#student_tbl").DataTable({
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
            }).buttons().container().appendTo('.header-student_tbl');
        });


        function searching() {
            let q = $("#input-search").val();
            q = q.trim();
            $.ajax({
                url: 'search.php',
                type: 'GET',
                dataType: 'JSON',
                data: {
                    'q': q
                },
                success: function(data) {
                    if (data.status == 'success') {
                        if (data.data.length > 0) {
                            let list = "";
                            list = data.data.map((item, index) => {
                                let date = moment(item.dob, 'YYYY-MM-DD hh:mm:ss');
                                return `<tr>
                                            <td>${index+1}</td>
                                            <td>${item.id}</td>
                                            <td>${item.lastName + " " + item.firstName}</td>
                                            <td>${item.classId}</td>
                                            <td>${date.format('DD/MM/YYYY') != 'Invalid date' ? date.format('DD/MM/YYYY') : ''}</td>
                                            <td>${item.gender ?? ''}</td>
                                            <td>${item.address ?? ''}</td>
                                            <td>${item.email ?? ''}</td>
                                            <td>${item.phoneNumber ?? ''}</td>
                                            <td>
                                                <div class="text-nowrap">
                                                    <button title="Đặt lại mật khẩu" class = "btn btn-primary rounded-circle mx-2" style = "min-height: 46px" onclick="resetPassword("${item.id}")">
                                                        <i class="fas fa-lock mx-1"></i>
                                                    </button>
                                                    <a href='form.php?id=${item.id}' target='_blank' title='Sửa sinh viên' class = 'btn btn-warning rounded-circle mx-2' style = 'height: 46px; padding-top: 10px'>
                                                        <i class='fas fa-user-edit'></i>
                                                    </a>
                                                    <button title='Xóa sinh viên' class = 'btn btn-danger rounded-circle mx-2' onclick='deleteStudent("${item.id}")' style = 'min-height: 46px'>
                                                        <i class='fas fa-user-minus'></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>`
                            });
                            $("#tbl_body").html(list.join(""));
                        } else {
                            $("#tbl_body").html(
                                `<tr class="odd"><td valign="top" colspan="10" class="dataTables_empty">Không có dữ liệu</td></tr>`
                            );
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

        function resetPassword(id) {
            if (!id) return;
            Swal.fire({
                title: `Bạn có chắc chắn muốn đặt lại mật khẩu cho sinh viên sinh viên ${id}?`,
                text: "Bạn sẽ không thể khôi phục lại dữ liệu này!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Có, đặt lại ngay!'
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
                                url: 'reset_password.php',
                                type: 'POST',
                                dataType: 'JSON',
                                data: {
                                    'id': id,
                                    'password': password
                                },
                                success: function(data) {
                                    if (data.status == 'success') {
                                        Swal.fire({
                                            title: 'Thông báo!',
                                            text: data.message,
                                            icon: 'success',
                                            confirmButtonText: 'OK'
                                        })
                                    } else {
                                        Swal.fire({
                                            title: 'Lỗi đặt lại mật khẩu!',
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

        function deleteStudent(id) {
            if (!id) return;
            Swal.fire({
                title: `Bạn có chắc chắn muốn xóa sinh viên ${id}?`,
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
                                    if (data.status == 'success') {
                                        Swal.fire({
                                            title: 'Xóa thành công!',
                                            text: data.message,
                                            icon: 'success',
                                            confirmButtonText: 'OK'
                                        }).then(() => {
                                            location.reload();
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