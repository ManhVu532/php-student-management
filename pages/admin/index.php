<?php
session_start();
require_once("../../utils/db_helper.php");
if (isset($_SESSION['user'])) {
  $user = $_SESSION['user'];
  if ($user) {
    $user = json_decode($user, true);
    if ($user['type'] == 0) {
      header("Location: ../403.php");
    }
  } else {
    header("Location: ../auth/login.php");
  }
} else {
  header("Location: ../auth/login.php");
}
$pathSidebar = 'dashboard';
?>

<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="../../assets/images/favicon.png">
  <title>Học viện Công nghệ Bưu chính Viễn thông</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

  <link rel="stylesheet" href="../../plugins/sweetalert2/sweetalert2.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <?php
    include "../../components/navbar.php";
    include "../../components/sidebar.php";
    ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper pb-4">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Bảng điều khiển</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item active">Bảng điều khiển</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box elevation-1 bg-info">
                <div class="inner">
                  <?php
                  $sql = "SELECT COUNT(id) AS total FROM user_tbl";
                  $result = executeResult($sql);
                  $total = 0;
                  if (count($result) > 0) {
                    $total = $result[0]['total'];
                  }
                  echo '<h3>' . $total . '</h3>';
                  ?>

                  <p>Sinh viên</p>
                </div>
                <div class="icon">
                  <i class="nav-icon fas fa-users"></i>
                </div>
                <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box elevation-1 bg-success">
                <div class="inner">
                  <?php
                  $sql = "SELECT COUNT(id) AS total FROM subject_tbl";
                  $result = executeResult($sql);
                  $total = 0;
                  if (count($result) > 0) {
                    $total = $result[0]['total'];
                  }
                  echo '<h3>' . $total . '</h3>';
                  ?>

                  <p>Môn học</p>
                </div>
                <div class="icon">
                  <i class="nav-icon fas fa-book"></i>
                </div>
                <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box elevation-1 bg-warning">
                <div class="inner">
                  <?php
                  $sql = "SELECT COUNT(*) AS total FROM register_subject";
                  $result = executeResult($sql);
                  $total = 0;
                  if (count($result) > 0) {
                    $total = $result[0]['total'];
                  }
                  echo '<h3>' . $total . '</h3>';
                  ?>

                  <p>Kết quả điểm</p>
                </div>
                <div class="icon">
                  <i class="nav-icon fas fa-graduation-cap"></i>
                </div>
                <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box elevation-1 bg-danger">
                <div class="inner">
                  <?php
                  $sql = "SELECT COUNT(id) AS total FROM subject_semester";
                  $result = executeResult($sql);
                  $total = 0;
                  if (count($result) > 0) {
                    $total = $result[0]['total'];
                  }
                  echo '<h3>' . $total . '</h3>';
                  ?>

                  <p>Lịch thi</p>
                </div>
                <div class="icon">
                  <i class="nav-icon far fa-calendar-alt"></i>
                </div>
                <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>

          <!-- ./Small Boxes -->


          <!-- Birth day table -->

          <div class="row">
            <div class="col-lg-7">
              <div class="card elevation-2">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="fas fa-birthday-cake mr-1"></i> Sinh viên sắp sinh nhật
                  </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="header-user_tbl mb-3"></div>
                  <table id="user_tbl" class="w-100 table table-bordered table-striped">
                    <thead>
                      <tr class="bg-dark">
                        <th>STT</th>
                        <th>Mã sinh viên</th>
                        <th>Họ và tên</th>
                        <th>Ngày sinh</th>
                        <th>Thao tác</th>
                      </tr>
                    </thead>
                    <tbody id="tbl_body">
                      <?php
                      $query = 'SELECT * FROM user_tbl WHERE DATE_ADD(dob, INTERVAL YEAR(CURDATE())-YEAR(dob) + IF(DAY(CURDATE()) > DAY(dob),1,0) YEAR) BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 30 DAY) AND `type` = 0 ORDER BY  MONTH(dob), DAY(dob) ASC;';
                      $listUser = executeResult($query);
                      $index = 0;
                      foreach ($listUser as $user) {
                        $index++;
                        $dob = $user['dob'];
                        $date_format = 'Không có';
                        $action = "Gửi mail";
                        $disabled = $user['email'] ? "" : "disabled";
                        if ($dob) {
                          $date = $dob;
                          $date_format = DateTime::createFromFormat("Y-m-d H:i:s",  $date);
                          $date_format = $date_format->format("d/m/Y");
                        }
                        echo "<tr>";
                        echo "<td>" . $index . "</td>";
                        echo "<td>" . $user['id'] . "</td>";
                        echo "<td>" . $user['lastName'] . ' ' . $user['firstName'] . "</td>";
                        echo "<td>" . $date_format . "</td>";
                        echo "<td>
                                <button class = 'btn btn-outline-success mx-2' " . $disabled . ">
                                  <i class='fas fa-envelope'></i>
                                    " . $action . "
                                </button>
                              </td>";
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
                        <th>Ngày sinh</th>
                        <th>Thao tác</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
            </div>

            <!-- DONUT CHART -->
            <div class="col-lg-5">
              <div class="card card-danger elevation-2">
                <div class="card-header">
                  <h3 class="card-title">Biểu đồ sinh viên các khối ngành</h3>

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
                  <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
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
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="../../plugins/jszip/jszip.min.js"></script>
  <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
  <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
  <script src="../../plugins/datatables-buttons/js/buttons.html5.js"></script>
  <script src="../../plugins/datatables-buttons/js/buttons.print.js"></script>
  <script src="../../plugins/datatables-buttons/js/buttons.colVis.js"></script>

  <!-- ChartJS -->
  <script src="../../plugins/chart.js/Chart.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>

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
          filename: "users",
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
          filename: "users",
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
          filename: "users",
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
          filename: "users",
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
      }).buttons().container().appendTo('.header-user_tbl');
    });

    let cntt = attt = dpt = dt = vt = mr = kt = other = 0;

    function getCountUsers() {
      $.when(
        $.ajax({
          url: 'count_major.php?major=CN',
          type: 'GET',
          success: function(data) {
            console.log("response: ", data);
            data = JSON.parse(data);
            cntt = data.data;
          }
        }),

        $.ajax({
          url: 'count_major.php?major=PT',
          type: 'GET',
          success: function(data) {
            data = JSON.parse(data);
            dpt = data.data;
          }
        }),

        $.ajax({
          url: 'count_major.php?major=DT',
          type: 'GET',
          success: function(data) {
            data = JSON.parse(data);
            dt = data.data;
          }
        }),

        $.ajax({
          url: 'count_major.php?major=VT',
          type: 'GET',
          success: function(data) {
            data = JSON.parse(data);
            vt = data.data;
          }
        }),

        $.ajax({
          url: 'count_major.php?major=MR',
          type: 'GET',
          success: function(data) {
            data = JSON.parse(data);
            mr = data.data;
          }
        }),
        $.ajax({
          url: 'count_major.php?major=KT',
          type: 'GET',
          success: function(data) {
            data = JSON.parse(data);
            kt = data.data;
          }
        }),

        $.ajax({
          url: 'count_major.php?major=other',
          type: 'GET',
          success: function(data) {
            data = JSON.parse(data);
            other = data.data;
          }
        }),

        $.ajax({
          url: 'count_major.php?major=AT',
          type: 'GET',
          success: function(data) {
            data = JSON.parse(data);
            attt = data.data;
          }
        })
      ).then(function() {
        drawChart();
      });
    }
    getCountUsers();

    function drawChart() {
      var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
      var donutData = {
        labels: [
          'CNTT',
          'ATTT',
          'ĐPT',
          'ĐT',
          'VT',
          'Marketing',
          'KT',
          'khác'
        ],
        datasets: [{
          data: [cntt, attt,dpt, dt, vt, mr, kt, other],
          backgroundColor: ['#f56954', '#C85C5C', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#113CFC', '#d2d6de'],
        }]
      }
      var donutOptions = {
        maintainAspectRatio: false,
        responsive: true,
      }
      //Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      new Chart(donutChartCanvas, {
        type: 'doughnut',
        data: donutData,
        options: donutOptions
      })
    }
  </script>
</body>

</html>