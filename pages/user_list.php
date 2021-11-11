<?php
    session_start();
    if(isset($_SESSION['username']) && isset($_SESSION['user_id']) && isset($_SESSION['type'])){

    }else{

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
        <div class="content-wrapper pb-4">
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
                    <div class="row">
                        <div class="col-12">

                            <div class="card">
                                <div class="card-header row">
                                    <div class="col-6">
                                        <h3>Danh sách người dùng</h3>
                                    </div>
                                    <div class="col-6 row justify-content-end">
                                        <div class="form-inline">
                                            <div class="input-group">
                                                <input id="input_search" class="form-control" type="search" placeholder="Tìm kiếm">
                                                <div class="input-group-append">
                                                    <button id="btn_search" class="btn btn-outline-primary">
                                                        <i class="fas fa-search fa-fw"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <a href="user.php" class="btn btn-outline-success">Thêm mới</a>
                                    </div>
                                </div>
                                <!-- select -->
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="user_tbl" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Tên</th>
                                                <th>Họ</th>
                                                <th>Email</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbl_body">
                                            <?php
                                            require_once("../utils/db_helper.php");
                                            $query = "SELECT * FROM user_tbl WHERE type = '0'";
                                            $listUser = executeResult($query);
                                            foreach ($listUser as $user) {
                                                echo "<tr><td>" . $user['id'] . "</td>";
                                                echo "<td>" . $user['firstName'] . "</td>";
                                                echo "<td>" . $user['lastName'] . "</td>";
                                                echo "<td>" . $user['email'] . "</td>";
                                                echo "<td>
                                                        <button class = 'btn btn-warning mx-2'>Sửa</button>
                                                        <button class = 'btn btn-danger mx-2' onclick='deleteUser(" . $user['id'] . ")'>Xóa</button>
                                                    </td>";
                                                echo "</tr>";
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Id</th>
                                                <th>Người dùng</th>
                                                <th>Tuổi</th>
                                                <th>Email</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Pie Chart -->
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Pie Chart</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /. Pie Chart -->
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
        $(function() {
            $("#user_tbl").DataTable({
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
                "buttons": ["copy", {
                    extend: "csv",
                    charset: "UTF-8",
                    title: "Người dùng",
                    filename: "users",
                    fieldSeparator: ';',
                    bom: true,
                    exportOptions: {
                        columns: ':not(:last-child)',
                    },
                }, {
                    extend: "excel",
                    title: "Người dùng",
                    filename: "users",
                    exportOptions: {
                        columns: ':not(:last-child)',
                    },
                }, {
                    extend: "pdf",
                    title: "Người dùng",
                    filename: "users",
                    exportOptions: {
                        columns: ':not(:last-child)',
                    },
                }, {
                    extend: "print",
                    title: "Người dùng",
                    filename: "users",
                    exportOptions: {
                        columns: ':not(:last-child)',
                    },}, "colvis"]
            }).buttons().container().appendTo('#user_tbl_wrapper .col-md-6:eq(0)');
            
            var donutData = {
                labels: [
                    'Chrome',
                    'IE',
                    'FireFox',
                    'Safari',
                    'Opera',
                    'Navigator',
                ],
                datasets: [{
                    data: [700, 500, 400, 600, 300, 100],
                    backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                }]
            }

            //-------------
            //- PIE CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
            var pieData = donutData;
            var pieOptions = {
                maintainAspectRatio: false,
                responsive: true,
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            new Chart(pieChartCanvas, {
                type: 'pie',
                data: pieData,
                options: pieOptions
            })
        });

        function searching() {
            let q = $("#input_search").val();
            $.ajax({
                url: 'search_user.php',
                type: 'GET',
                dataType: 'JSON',
                data: {
                    'q': q
                },
                success: function(data) {
                    data = JSON.parse(data);
                    if (data.status == 'success') {
                        if (data.data.length > 0) {
                            let list = "";
                            list = data.data.map((item) => {
                                return `<tr>
                                                <td>${item.id}</td>
                                                <td>${item.username}</td>
                                                <td>${item.age}</td>
                                                <td>${item.email}</td>
                                                <td>
                                                    <button class = 'btn btn-warning mx-2'>Sửa</button>
                                                    <button class = 'btn btn-danger mx-2' onclick='deleteUser(${item.id})'>Xóa</button>
                                                </td>
                                            </tr>`
                            });
                            $("#tbl_body").html(list.join(""));
                        } else {
                            $("#tbl_body").html(
                                `<tr class="odd"><td valign="top" colspan="5" class="dataTables_empty">Không có dữ liệu</td></tr>`
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

        $("#input_search").on('keyup', (e) => {
            searching()
        });


        function deleteUser(id) {
            if (confirm("Bạn có chắc chắn muốn xóa?")) {
                $.ajax({
                    url: 'delete_user.php',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        data = JSON.parse(data);
                        if (data.status == 'success') {
                            Swal.fire({
                                title: 'Xóa thành công!',
                                text: data.message,
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then(function() {
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                title: 'Xóa thất bại!',
                                text: data.message,
                                icon: 'error',
                                confirmButtonText: 'OK'
                            })
                        }
                    }
                });
            }
        }
    </script>
</body>

</html>