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
$pathSidebar = 'profile-admin';
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
              <h1>Thông tin admin</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item active">Trang cá nhân</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="card elevation-2">
            <div class="card-header d-flex justify-content-between">
              <h3 class="card-title col-md-6">
                <i class="fas fa-user mr-1"></i> Admin
              </h3>
              <div class="col-md-6 text-right">
                <button type="button" class="btn btn-warning btn-sm mx-2" data-toggle="modal" data-target="#modal-changepassword">
                  <i class="fas fa-key mr-1"></i> Đổi mật khẩu
                </button>
                <button type="button" class="btn btn-primary btn-sm mx-2" data-toggle="modal" data-target="#modal-update-profile">
                  <i class="fas fa-edit mr-1"></i> Cập nhật
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  <!-- circle avatar -->
                  <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                      <div class="card-body box-profile">
                        <div class="text-center position-relative" style="cursor: pointer">
                          <form onsubmit="return false" id="avatar-form">
                            <input id="avatar" name="file" type="file" accept="image/*" hidden />
                          </form>
                          <div class="profile-user-img p-0 img-circle overflow-hidden d-flex align-items-center justify-content-center"  style="width: 240px; height:240px">
                            <img class="h-100" id="avatar-image" title="Chọn để đổi avatar mới" src="<?=$user['avatar'] ? HOST.$user['avatar'] : '../../../university/assets/images/avatar.jpeg'?>" alt="Ảnh nhười dùng">
                          </div>
                        </div>
                        <h3 class="profile-username text-center text-uppercase mt-3 mb-2"><?= $user['firstName'] ?></h3>
                        <ul class="list-group list-group-unbordered mb-3">
                          <li class="list-group-item">
                            <b>Tài khoản</b> <a class="float-right"><?= $user['firstName'] ?></a>
                          </li>
                          <li class="list-group-item">
                            <b>Email</b> <a class="float-right">
                              <?php
                              echo $user['email'] ? $user['email'] : 'Chưa cập nhật';
                              ?>
                            </a>
                          </li>
                          <li class="list-group-item">
                            <b>Số điện thoại</b> <a class="float-right">
                              <?php
                              echo $user['phoneNumber'] ? $user['phoneNumber'] : 'Chưa cập nhật';
                              ?>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
            </div>
            <!-- /.container-fluid -->
      </section>

      <!-- Modal update password -->
      <div class="modal fade" id="modal-changepassword" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Đổi mật khẩu</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- form change password -->
              <form id="form-change-password">
                <div class="form-group">
                  <label for="old-password">Mật khẩu cũ</label>
                  <input type="password" class="form-control" autocomplete="current-password" id="old-password" name="old-password" placeholder="Nhập mật khẩu cũ">
                </div>
                <div class="form-group">
                  <label for="new-password">Mật khẩu mới</label>
                  <input type="password" class="form-control" id="new-password" autocomplete="current-password" name="new-password" placeholder="Nhập mật khẩu mới">
                </div>
                <div class="form-group">
                  <label for="confirm-password">Xác nhận mật khẩu</label>
                  <input type="password" class="form-control" id="confirm-password" autocomplete="current-password" name="confirm-password" placeholder="Xác nhận mật khẩu">
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
              <button type="button" id="change-password-btn" class="btn btn-primary">Đổi mật khẩu</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal update profile -->
      <div class="modal fade" id="modal-update-profile" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Cập nhật thông tin</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- update email and phone number form -->
              <form id="form-update-profile">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email" value="<?= $user['email'] ?>">
                </div>
                <div class="form-group">
                  <label for="phone-number">Số điện thoại</label>
                  <input type="text" class="form-control" id="phone-number" name="phone-number" placeholder="Nhập số điện thoại" value="<?= $user['phoneNumber'] ?>">
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
              <button type="button" id="update-btn" class="btn btn-primary">Cập nhật</button>
            </div>
          </div>
        </div>
      </div>
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

  <!-- ChartJS -->
  <script src="../../../plugins/chart.js/Chart.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../../dist/js/adminlte.min.js"></script>
  <script src="../../../plugins/sweetalert2/sweetalert2.min.js"></script>


  <script>
    $("#avatar-image").on("click", function() {
      $("#avatar").click();
    });

    $().ready(function() {
      $('#avatar').on('change', function() {
        var file = $('#avatar').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file);

        $.ajax({
          url: 'upload.php',
          type: 'POST',
          data: form_data,
          dataType: 'JSON',
          contentType: false,
          processData: false,
          beforeSend: () => {
            Swal.fire({
              icon: 'info',
              title: 'Đang tải lên...',
              allowOutsideClick: false,
              showCancelButton: false,
              showCancelButton: false,
              showConfirmButton: false,
            })
          },
          success: function(data) {
            console.log("data: ", data);
            if (data.status == 'success') {
              Swal.fire({
                  icon: 'success',
                  title: 'Tải lên thành công',
                })
                .then(res => {
                  Swal.fire({
                      icon: 'info',
                      title: 'Thông báo',
                      text: 'Bạn có chắc chắn muốn đổi ảnh đại diện không?',
                      showConfirmButton: true,
                      showCancelButton: true,
                      confirmButtonText: 'Có',
                      cancelButtonText: 'Không',
                    })
                    .then(res => {
                      if (res.value) {
                        updateAvatar(data.data);
                      }
                    })
                })

            } else {
              Swal.fire({
                icon: 'error',
                title: 'Lỗi',
                text: data.message,
              });
            }
          }
        })
      });
    });

    function updateAvatar(url) {
      $.ajax({
        url: 'update_avatar.php',
        type: 'POST',
        data: {
          avatar: url,
          id: '<?= $user['id'] ?>'
        },
        dataType: 'JSON',
        success: function(data) {
          console.log("data: ", data);
          if (data.status == 'success') {
            Swal.fire({
                icon: 'success',
                title: 'Cập nhật thành công',
              })
              .then(res => {
                location.reload();
              })
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Lỗi',
              text: data.message,
            });
          }
        }
      })
    }


    $("#update-btn").on("click", function() {
      let email = $("#email").val();
      let phoneNumber = $("#phone-number").val();

      email = email.trim();
      phoneNumber = phoneNumber.trim();
      $("#modal-update-profile").modal("hide");
      Swal.fire({
        title: 'Xác nhận mật khẩu',
        html: `
                <form class="form-inline">
                    <label for="password">Mật khẩu:</label>
                    <input class="form-control flex-grow-1 ml-2" id="password" autocomplete="password" type="password" placeholder="Nhập mật khẩu của bạn"/>
                </form>
                `,
        icon: 'warning',
        title: 'Xác nhận mật khẩu!',
        showCancelButton: true,
        cancelButtonText: 'Hủy',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xác nhận!'
      }).then(function(res) {
        if (res.value) {
          let password = $("#password").val();
          password = password.trim();
          updateProfile(email, phoneNumber, password);
        }
      })
    });

    function updateProfile(email, phoneNumber, password) {
      $.ajax({
        url: "update.php",
        type: "POST",
        dataType: "json",
        data: {
          email: email,
          phoneNumber: phoneNumber,
          id: "<?= $user['id'] ?>",
          password: password
        },
        success: function(data) {
          if (data.status == "success") {
            Swal.fire({
                title: "Cập nhật thành công",
                icon: "success",
                text: data.message,
              })
              .then(function() {
                location.reload();
              });
          } else {
            Swal.fire({
                title: "Cập nhật thất bại",
                icon: "error",
                text: data.message,
              })
              .then(() => {
                $("#modal-update-profile").modal("show");
              })
          }
        }
      });
    }

    $("#change-password-btn").on("click", function() {
      var oldPassword = $("#old-password").val();
      var newPassword = $("#new-password").val();
      var confirmPassword = $("#confirm-password").val();

      $.ajax({
        url: "change_password.php",
        type: "POST",
        dataType: 'JSON',
        data: {
          id: "<?= $user['id'] ?>",
          oldPassword: oldPassword,
          newPassword: newPassword,
          confirmPassword: confirmPassword
        },
        success: function(data) {
          if (data.status == "success") {
            Swal.fire({
                title: 'Thành công!',
                text: 'Đổi mật khẩu thành công!',
                icon: 'success',
                confirmButtonText: 'OK'
              })
              .then(() => {
                $("#modal-change-password").modal("hide");
              })
          } else {
            Swal.fire({
              title: 'Thất bại!',
              text: data.message,
              icon: 'error',
              confirmButtonText: 'OK'
            });
          }
        }
      });
    });
  </script>
</body>

</html>