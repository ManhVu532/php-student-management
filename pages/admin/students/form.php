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
$pathSidebar = 'students';

$title = "Thêm mới sinh viên";
$submitText = "Thêm mới";
$u_firstName = $u_lastName = $u_email = $u_phoneNumber = $u_address = $u_dob = $u_id = $u_classId = '';
$u_gender = "Khác";
$u_isActive = true;

if (isset($_GET['id'])) {
    $u_id = $_GET['id'];
    $u_id =  validate_data($u_id);
    if (!empty($u_id)) {
        $title = "Cập nhật thông tin sinh viên";
        $submitText = "Cập nhật";

        $query = "SELECT * FROM user_tbl WHERE id = '" . $u_id . "';";
        $res = executeResult($query);

        if (count($res) > 0) {
            $u = $res[0];
            $u_firstName = $u['firstName'];
            $u_lastName = $u['lastName'];
            $u_email = $u['email'];
            $u_phoneNumber = $u['phoneNumber'];
            $u_address = $u['address'];
            $u_dob = $u['dob'];
            if ($u_dob) {
                $date = $u_dob;
                $date_format = DateTime::createFromFormat("Y-m-d H:i:s",  $date);
                $u_dob = $date_format->format("Y-m-d");
            }
            $u_gender = $u['gender'];
            $u_classId = $u['classId'];
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
                                            <label for="firstName">Tên*</label>
                                            <input type="text" class="form-control" id="firstName" placeholder="Nhập tên" value="<?= $u_firstName ?>" required>
                                            <div id="firstName-validate" class="alert alert-danger mt-1 d-none" role="alert">
                                                Họ tên không được trống!
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6 col-sm-12">
                                            <label for="lastName">Họ*</label>
                                            <input type="text" class="form-control" id="lastName" placeholder="Nhập họ" value="<?= $u_lastName ?>" required>
                                            <div id="lastName-validate" class="alert alert-danger mt-1 d-none" role="alert">
                                                Họ tên không được trống!
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6 col-sm-12">
                                            <label for="id">Mã sinh viên*</label>
                                            <?php
                                            if (empty($u_id)) {
                                                echo "<input type='text' class='form-control' id='id' placeholder='Nhập mã sinh viên' value='" . $u_id . "' required>";
                                            } else {
                                                echo "<input type='text' class='form-control' id='id' placeholder='Nhập mã sinh viên' value='" . $u_id . "' disabled required>";
                                            }
                                            ?>
                                            <div id="id-validate" class="alert alert-danger mt-1 d-none" role="alert">
                                                Mã sinh viên đã tồn tại!
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6 col-sm-12">
                                            <label for="classId">Lớp*</label>
                                            <input type="text" class="form-control" id="classId" placeholder="Nhập lớp" value="<?= $u_classId ?>" required>
                                            <div id="classId-validate" class="alert alert-danger mt-1 d-none" role="alert">
                                                Lớp không được bỏ trống!
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6 col-sm-12">
                                            <label for="email">Địa chỉ email</label>
                                            <input type="email" class="form-control" id="email" placeholder="Nhập địa chỉ email" value="<?= $u_email ?>">
                                            <div id="email-validate" class="alert alert-danger mt-1 d-none" role="alert">
                                                Email đã tồn tại!
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6 col-sm-12">
                                            <label for="phoneNumber">Số điện thoại</label>
                                            <input type="text" class="form-control" id="phoneNumber" placeholder="Nhập số điện thoại" value="<?= $u_phoneNumber ?>">
                                            <div id="phoneNumber-validate" class="alert alert-danger mt-1 d-none" role="alert">
                                                Số điện thoại đã tồn tại!
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6 col-sm-12">
                                            <label for="address">Địa chỉ</label>
                                            <input type="text" class="form-control" id="address" placeholder="Nhập địa chỉ" value="<?= $u_address ?>">
                                        </div>
                                        <div class="form-group col-lg-6 col-sm-12">
                                            <label for="dob">Ngày sinh</label>
                                            <input type="date" class="form-control" id="dob" placeholder="Nhập ngày sinh" format="DD/MM/YYYY" value="<?= $u_dob ?>">
                                        </div>
                                        <div class="form-group col-lg-6 col-sm-12">
                                            <div>
                                                <label>Giới tính</label>
                                                <select id="gender" class="form-control">
                                                    <option value="Nam" <?=$u_gender == 'Nam' ? 'selected="selected"' : ''?>>Nam</option>
                                                    <option value="Nữ" <?=$u_gender == 'Nữ' ? 'selected="selected"' : ''?>>Nữ</option>
                                                    <option value="Khác" <?=($u_gender != 'Nam' && $u_gender != 'Nữ') ? 'selected="selected"' : ''?>>Khác</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group form-check col-lg-12 ml-2 col-sm-12">
                                            <input type="checkbox" class="form-check-input" id="active" checked="<?= $u_isActive ?>">
                                            <label class="form-check-label" for="active">
                                                Kích hoạt
                                            </label>
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
        let error = {
            firstName: "Họ tên khôn được để trống",
            lastName: "Họ tên không được để trống",
            classId: "Mã lớp không được để trống",
            id: "Mã sinh viên không được để trống"
        };

        $("#email").on('keyup', () => {
            const urlParams = new URLSearchParams(window.location.search);
            const idParam = urlParams.get('id');
            let email = $("#email").val();
            email = email.trim();
            if (!validateEmail(email) && email.length > 0) {
                $("#email-validate").removeClass('d-none');
                $("#email-validate").addClass('d-block');
                $("#email-validate").html('Email không đúng định dạng');
                error.email = 'Email không đúng định dạng';
                return;
            }
            if (email.length == 0) {
                $("#email-validate").addClass('d-none');
                $("#email-validate").removeClass('d-block');
                error.email = false;
                return;
            }

            $.ajax({
                url: 'check_email.php',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    'email': email,
                    'id': idParam ?? ''
                },
                success: function(data) {
                    if (data.status == 'success') {
                        $("#email-validate").removeClass('d-none');
                        $("#email-validate").addClass('d-block');
                        $("#email-validate").html('Email đã tồn tại');
                        error.email = 'Email đã tồn tại';
                    } else {
                        $("#email-validate").removeClass('d-block');
                        $("#email-validate").addClass('d-none');
                        error.email = false;
                    }
                }
            });
        });

        $("#phoneNumber").on('keyup', () => {
            let phoneNumber = $("#phoneNumber").val().trim();
            const urlParams = new URLSearchParams(window.location.search);
            const idParam = urlParams.get('id');
            phoneNumber = phoneNumber.trim();
            console.log("validate phonenumber: ", phoneNumber, validatePhoneNumber(phoneNumber));
            if (!validatePhoneNumber(phoneNumber) && phoneNumber.length > 0) {
                $("#phoneNumber-validate").removeClass('d-none');
                $("#phoneNumber-validate").addClass('d-block');
                $("#phoneNumber-validate").html('Số điện thoại không đúng định dạng');
                error.phoneNumber = 'Số điện thoại không đúng định dạng';
                return;
            }
            if (phoneNumber.length == 0) {
                $("#phoneNumber-validate").addClass('d-none');
                $("#phoneNumber-validate").removeClass('d-block');
                error.phoneNumber = false;
                return;
            }

            $.ajax({
                url: 'check_phoneNumber.php',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    'phoneNumber': phoneNumber,
                    'id': idParam ?? ''
                },
                success: function(data) {
                    if (data.status == 'success') {
                        $("#phoneNumber-validate").removeClass('d-none');
                        $("#phoneNumber-validate").addClass('d-block');
                        $("#phoneNumber-validate").html(data.message);
                        error.phoneNumber = data.message;
                    } else {
                        $("#phoneNumber-validate").removeClass('d-block');
                        $("#phoneNumber-validate").addClass('d-none');
                        error.phoneNumber = false;
                    }
                }
            });
        });

        $("#id").on('keyup', () => {
            let id = $("#id").val();
            id = id.trim();

            if (id.length == 0) {
                $("#id-validate").removeClass('d-none');
                $("#id-validate").addClass('d-block');
                $("#id-validate").html('ID không được để trống');
                error.id = 'ID không được để trống';
                return;
            }
            if (id.length >= 20) {
                $("#id-validate").removeClass('d-none');
                $("#id-validate").addClass('d-block');
                $("#id-validate").html('ID không được để quá 20 ký tự');
                error.id = 'ID không được để quá 20 ký tự';
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
                        $("#id-validate").html('Mã sinh viên đã tồn tại');
                        error.id = 'Mã sinh viên đã tồn tại';
                    } else {
                        $("#id-validate").removeClass('d-block');
                        $("#id-validate").addClass('d-none');
                        error.id = false;;
                    }
                }
            });
        });

        $("#firstName").on('keyup', function() {
            let firstName = $("#firstName").val();
            firstName = firstName.trim();

            if (firstName.length == 0) {
                $("#firstName-validate").removeClass('d-none');
                $("#firstName-validate").addClass('d-block');
                $("#firstName-validate").html('Tên không được để trống');
                error.firstName = 'Tên không được để trống';
                return;
            } else {
                $("#firstName-validate").removeClass('d-block');
                $("#firstName-validate").addClass('d-none');
                error.firstName = false;
            }

        })

        $("#lastName").on('keyup', () => {
            let lastName = $("#lastName").val();
            lastName = lastName.trim();

            if (lastName.length == 0) {
                $("#lastName-validate").removeClass('d-none');
                $("#lastName-validate").addClass('d-block');
                $("#lastName-validate").html('Họ không được để trống');
                error.lastName = 'Họ không được để trống';
                return;
            } else {
                $("#lastName-validate").removeClass('d-block');
                $("#lastName-validate").addClass('d-none');
                error.lastName = false;
            }
        })

        $("#classId").on('keyup', () => {
            let classId = $("#classId").val();
            classId = classId.trim();

            if (classId.length == 0) {
                $("#classId-validate").removeClass('d-none');
                $("#classId-validate").addClass('d-block');
                $("#classId-validate").html('Mã lớp không được để trống');
                error.classId = 'Mã lớp không được để trống';
                return;
            } else {
                $("#classId-validate").removeClass('d-block');
                $("#classId-validate").addClass('d-none');
                error.classId = false;
            }
        })



        $('#submit-btn').click(function(e) {
            e.preventDefault();
            let isValid = true;
            let firstName = $('#firstName').val().trim();
            let lastName = $('#lastName').val().trim();
            let email = $('#email').val().trim();
            let phoneNumber = $('#phoneNumber').val().trim();
            let address = $('#address').val().trim();
            let dob = $('#dob').val();
            let id = $('#id').val().trim();
            let isActive = $('#active').is(':checked');
            let gender = $('#gender').val();
            let classId = $('#classId').val();

            if(firstName.length > 0) error['firstName'] = false;
            if(lastName.length > 0) error['lastName'] = false;
            if(classId.length > 0) error['classId'] = false;
            if(id.length > 0) error['id'] = false;

            for (const key in error) {
                if (Object.hasOwnProperty.call(error, key)) {
                    const element = error[key];
                    if (element) {
                        isValid = false;
                        Swal.fire({
                            icon: 'error',
                            title: 'Thông báo',
                            text: element,
                        }).then(function() {
                            $("#" + key).focus();
                        });
                        break;
                    }
                }
            }

            if (!isValid) {
                return;
            }

            const urlParams = new URLSearchParams(window.location.search);
            const idParam = urlParams.get('id');

            console.log("idParam: ", idParam);

            if (idParam) {
                $.ajax({
                    url: 'update.php',
                    method: 'POST',
                    dataType: 'JSON',
                    data: {
                        'id': id,
                        'firstName': firstName,
                        'lastName': lastName,
                        'email': email,
                        'phoneNumber': phoneNumber,
                        'address': address,
                        'dob': dob,
                        'isActive': isActive,
                        'gender': gender,
                        'classId': classId,
                    },
                    success: function(data) {
                        if (data.status == 'success') {
                            Swal.fire({
                                title: 'Thành công',
                                text: data.message,
                                icon: 'success',
                                confirmButtonText: 'OK'
                            });
                        } else {
                            Swal.fire({
                                title: 'Thất bại',
                                text: data.message,
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    }
                })
            } else {
                $.ajax({
                    url: 'create.php',
                    method: 'POST',
                    dataType: 'JSON',
                    data: {
                        'id': id,
                        'firstName': firstName,
                        'lastName': lastName,
                        'email': email,
                        'phoneNumber': phoneNumber,
                        'address': address,
                        'dob': dob,
                        'isActive': isActive,
                        'gender': gender,
                        'classId': classId,
                    },
                    success: function(data) {
                        console.log("res: ", data);
                        if (data.status == 'success') {
                            Swal.fire({
                                title: 'Thành công',
                                text: 'Thêm thành công',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then(function() {
                                window.location.href = 'form.php?id='+id;
                            });
                        } else {
                            Swal.fire({
                                title: 'Thất bại',
                                text: data.message,
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    }
                })
            }
        })

        function validateEmail(email) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }

        function validatePhoneNumber(phoneNumber) {
            var re = /^[0-9]{9,11}$/;
            return re.test(String(phoneNumber).toLowerCase());
        }
    </script>
</body>

</html>