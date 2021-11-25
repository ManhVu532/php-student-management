<?php
require_once("utils/db_helper.php");
require_once("utils/utils.php");
session_start();
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    if ($user) {
        $user = json_decode($user, true);
        if ($user['type'] == 1) {
            header("Location: pages/403.php");
        }
    } else {
        header("Location: pages/auth/login.php");
    }
} else {
    header("Location: pages/auth/login.php");
}

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets/images/favicon.png">
    <title>Học viện Công nghệ Bưu chính Viễn thông</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">

    <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="university/assets/css/setup.css">
    <link rel="stylesheet" href="university/assets/css/main.css">
    <link rel="stylesheet" href="plugins/bootstrap-select-1.13.14/dist/css/bootstrap-select.min.css">

    <style>
        .inner-space {
            height: 4rem;
        }

        * {
            scroll-behavior: smooth;
        }

        .nav-link:hover {
            background-color: rgba(0, 0, 0, 0.2);
        }

        .nav-link {
            min-width: 120px;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini bg-light">
    <div class="navbar-warpper position-sticky sticky-top">
        <nav class="navbar navbar-expand-lg navbar-white bg-white text-red">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <div style="height: 54px" class="rounded-circle overflow-hidden">
                        <img src="<?= HOST ?>/assets/images/logo-xl.png" class="h-100" alt="logo">
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav justify-content-between w-100 d-flex">
                        <a class="nav-link text-white rounded-lg text-center text-bold ml-2" href="#home">Trang chủ<span class="sr-only">(current)</span></a>
                        <a class="nav-link text-white rounded-lg text-center text-bold " href="#info">TT Cá nhân</a>
                        <a class="nav-link text-white rounded-lg text-center text-bold " href="#score">Điểm</a>
                        <a class="nav-link text-white rounded-lg text-center text-bold " href="#schedule">Lịch thi</a>
                        <a class="nav-link text-white rounded-lg text-center text-bold " href="#fee">Học phí</a>
                        <a class="nav-link text-white rounded-lg text-center text-bold " href="pages/auth/logout.php">Đăng xuất</a>
                    </div>
                </div>
                <!-- avatar in the navbar -->
                <div class="avatar-wrapper d-flex align-items-center ml-3" style="cursor: pointer">
                    <div class="profile-img rounded-circle overflow-hidden d-flex aligin-items-center justify-content-center" style="width: 48px; height: 48px">
                        <img src="<?= $user['avatar'] ? HOST . $user['avatar'] : 'university/assets/images/avatar.jpeg' ?>" alt="avatar" class="w-100" />
                    </div>
                    <div class="profile-text text-white">
                        <p class="name ml-2 mb-0"><?= $user['firstName'] ?></p>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div class="wrapper mb-5">
        <section id="home" class="main-slide">
            <div id="carouselExampleIndicators" class="carousel slide" data-touch="false" data-interval="3000" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?= HOST ?>/university/assets/images/BANNER-WEBSITE_BANNER-WEBSITE-PTIT.png" class="d-block w-100" alt="slide-1">
                    </div>
                    <div class="carousel-item">
                        <img src="<?= HOST ?>/university/assets/images/Slide-Baner-Web-PTIT-01.png" class="d-block w-100" alt="slide-2">
                    </div>
                    <div class="carousel-item">
                        <img src="<?= HOST ?>/university/assets/images/Slide-Banner-Web.jpg" class="d-block w-100" alt="slide-3">
                    </div>
                    <div class="carousel-item">
                        <img src="<?= HOST ?>/university/assets/images/Slide-Banner-Web2.jpg" class="d-block w-100" alt="slide-4">
                    </div>
                    <div class="carousel-item">
                        <img src="<?= HOST ?>/university/assets/images/Slide-Banner-Web3.jpg" class="d-block w-100" alt="slide-5">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="btn-navigate rounded-sm">
                        <i class="fa fa-chevron-left display-5"></i>
                    </span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="btn-navigate rounded-sm">
                        <i class="fa fa-chevron-right display-5"></i>
                    </span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </section>

        <section id="info" class="mt-4 pt-3">
            <!-- user info -->
            <div class="container">
                <h1 class="text-center">
                    Xin chào <?= $user['lastName'] . " " . $user['firstName'] ?>
                </h1>
                <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="card mb-0 h-100 elevation-2">
                            <div class="card-body d-flex align-items-center">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="avatar-wrapper">
                                            <div class="profile-img rounded-circle overflow-hidden elevation-2">
                                                <img src="<?= $user['avatar'] ? HOST . $user['avatar'] : 'university/assets/images/avatar.jpeg' ?>" alt="avatar" class="w-100" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8 d-flex align-items-center">
                                        <div class="user-info-wrapper">
                                            <div class="user-info">
                                                <p class="name text-bold mb-0"><?= $user['lastName'] . " " . $user['firstName'] ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 d-flex justify-content-between mt-3 border-top pt-2">
                                        <p class="email mb-0 text-primary text-nowrap"><?= $user['email'] ?? "Chưa cập nhật" ?></p>
                                        <p class="phone text-primary text-nowrap"><?= $user['phoneNumber'] ?? "Chưa cập nhật" ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card h-100 elevation-2" style="height: 120px">
                            <div class="card-body h-100">
                                <div class="row">
                                    <div class="col-md-6 border-bottom">
                                        <div class="user-info-wrapper">
                                            <div class="user-info mt-2">
                                                <h6 class="name text-bold">Mã sinh viên</h6>
                                                <p class="email"><?= $user['id'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 border-bottom">
                                        <div class="user-info-wrapper">
                                            <div class="user-info mt-2">
                                                <h6 class="name text-bold">Lớp</h6>
                                                <p class="email"><?= $user['classId'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 border-bottom">
                                        <div class="user-info-wrapper">
                                            <div class="user-info  mt-2">
                                                <h6 class="name text-bold">Giới tính</h6>
                                                <p class="email"><?= $user['gender'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 border-bottom">
                                        <div class="user-info-wrapper">
                                            <div class="user-info  mt-2">
                                                <h6 class="name text-bold">Địa chỉ</h6>
                                                <p class="email"><?= $user['address'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 border-bottom">
                                        <div class="user-info-wrapper">
                                            <div class="user-info  mt-2">
                                                <?php
                                                $date_format = '';
                                                if ($user['dob']) {
                                                    $date = $user['dob'];
                                                    $date_format = DateTime::createFromFormat("Y-m-d H:i:s",  $date);
                                                    $date_format = $date_format->format("d/m/Y");
                                                    if (str_contains($date_format, '-0001')) {
                                                        $date_format = '';
                                                    }
                                                }
                                                ?>
                                                <h6 class="name text-bold">Ngày sinh</h6>
                                                <p class="email"><?= $date_format ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <button class="btn btn-primary mt-4 elevation-2" type="button" data-toggle="collapse" data-target="#info-form" aria-expanded="false" aria-controls="info-form">
                    <i class="fa fa-edit"></i>
                    Cập nhật thông tin
                </button>
                <!-- show form update user info when click the button -->
                <div class="mt-4 collapse" id="info-form">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card h-100 elevation-2">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="user-info-wrapper">
                                                <div class="user-info">
                                                    <form class="row" onsubmit="return false;">
                                                        <div class="form-group text--center d-flex flex-column align-items-center col-12">
                                                            <label for="avatar" class="display-5">Ảnh đại diện</label>
                                                            <input type="file" class="form-control-file" id="avatar" name="avatar" hidden="true">
                                                            <!-- avatar circle -->
                                                            <div id="avatar-image" class="avatar-wrapper" style="cursor: pointer">
                                                                <div class="profile-img rounded-circle overflow-hidden elevation-2 d-flex aligin-items-center justify-content-center" style="width:240px; height: 240px">
                                                                    <img src="<?= $user['avatar'] ? HOST . $user['avatar'] : 'university/assets/images/avatar.jpeg' ?>" alt="avatar" class="w-100" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-lg-6 col-sm-12">
                                                            <label for="firstName">Tên*</label>
                                                            <input type="text" class="form-control" id="firstName" placeholder="Nhập tên" value="<?= $user['firstName'] ?>" required>
                                                        </div>
                                                        <div class="form-group col-lg-6 col-sm-12">
                                                            <label for="lastName">Họ*</label>
                                                            <input type="text" class="form-control" id="lastName" placeholder="Nhập họ" value="<?= $user['lastName'] ?>" required>
                                                        </div>
                                                        <div class="form-group col-lg-6 col-sm-12">
                                                            <label for="email">Địa chỉ email</label>
                                                            <input type="email" class="form-control" id="email" placeholder="Nhập địa chỉ email" value="<?= $user['email'] ?>">
                                                        </div>
                                                        <div class="form-group col-lg-6 col-sm-12">
                                                            <label for="phoneNumber">Số điện thoại</label>
                                                            <input type="text" class="form-control" id="phoneNumber" placeholder="Nhập số điện thoại" value="<?= $user['phoneNumber'] ?>">
                                                        </div>
                                                        <div class="form-group col-lg-6 col-sm-12">
                                                            <label for="address">Địa chỉ</label>
                                                            <input type="text" class="form-control" id="address" placeholder="Nhập địa chỉ" value="<?= $user['address'] ?>">
                                                        </div>
                                                        <div class="form-group col-lg-6 col-sm-12">
                                                            <label for="dob">Ngày sinh</label>
                                                            <?php
                                                            $dob = '';
                                                            if ($user['dob']) {
                                                                $date = $user['dob'];
                                                                $date_format = DateTime::createFromFormat("Y-m-d H:i:s",  $date);
                                                                $dob = $date_format->format("Y-m-d");
                                                            }
                                                            ?>
                                                            <input type="date" class="form-control" id="dob" placeholder="Nhập ngày sinh" format="DD/MM/YYYY" value="<?= $dob ?>">
                                                        </div>
                                                        <div class="form-group col-lg-6 col-sm-12">
                                                            <div>
                                                                <label>Giới tính</label>
                                                                <select id="gender" class="form-control">
                                                                    <option value="Nam" <?= $user['gender'] == 'Nam' ? 'selected="selected"' : '' ?>>Nam</option>
                                                                    <option value="Nữ" <?= $user['gender'] == 'Nữ' ? 'selected="selected"' : '' ?>>Nữ</option>
                                                                    <option value="Khác" <?= ($user['gender'] != 'Nam' && $user['gender'] != 'Nữ') ? 'selected="selected"' : '' ?>>Khác</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-6">
                                                            <label for="classId">Lớp</label>
                                                            <input type="text" class="form-control" id="classId" name="classId" value="<?= $user['classId'] ?>" disabled>
                                                        </div>
                                                        <div class="col-12 mt-4">
                                                            <div>
                                                                <button type="submit" id="update-info" class="btn btn-outline-danger">Cập nhật</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="btn btn-danger mt-4 elevation-2" type="button" data-toggle="collapse" data-target="#change-password-form" aria-expanded="false" aria-controls="change-password-form">
                    <i class="fa fa-key"></i>
                    Đổi mật khẩu
                </button>

                <div class="mt-4 collapse" id="change-password-form">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card h-100 elevation-2">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form onsubmit="return false" id="form-change-password" class="row">
                                                <div class="form-group col-6">
                                                    <label for="old-password">Mật khẩu cũ</label>
                                                    <input type="password" class="form-control" autocomplete="current-password" id="old-password" name="old-password" placeholder="Nhập mật khẩu cũ">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="new-password">Mật khẩu mới</label>
                                                    <input type="password" class="form-control" id="new-password" autocomplete="current-password" name="new-password" placeholder="Nhập mật khẩu mới">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="confirm-password">Xác nhận mật khẩu</label>
                                                    <input type="password" class="form-control" id="confirm-password" autocomplete="current-password" name="confirm-password" placeholder="Xác nhận mật khẩu">
                                                </div>
                                                <div class="col-12 mt-4">
                                                    <div>
                                                        <button type="submit" id="change-password-btn" class="btn btn-outline-danger">Cập nhật</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="score" class="score container bg-white pt-4 mt-4 rounded-lg elevation-2">
            <h1 class="text-center">
                Điểm
            </h1>
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <label for="semester">Chọn kỳ học:</label>
                        <select id="semester" class="selectpicker w-100 mb-2 elevation-1 rounded-lg" data-live-search="true" data-style="btn-info" title="Chọn học phần...">
                            <?php
                            $sql = "SELECT DISTINCT s.* FROM subject_semester AS ss, semester_tbl AS s, register_subject AS rs
                            WHERE ss.semesterId = s.id
                            AND rs.subjectSemesterId = ss.id
                            AND rs.userId = '" . $user['id'] . "'
                            ORDER BY s.startYear DESC, s.type DESC;";
                            $isSelected = false;
                            $list = executeResult($sql);
                            if (count($list) > 0) {
                                foreach ($list as $item) {
                                    $id = $item['id'];
                                    $type = $item['type'];
                                    if (!$isSelected) {
                                        $semester = $id;
                                        $isSelected = true;
                                        echo '
                                            <option value="' . $id . '" data-tokens="' . $id . " Học kỳ " . $type . $item['startYear'] . "-" . $item['endYear'] . '" selected="selected"> Học kỳ ' . $type . " " . $item['startYear'] . "-" . $item['endYear'] . '</option>
                                        ';
                                    } else {
                                        echo '
                                            <option value="' . $id . '" data-tokens="' . $id . " Học kỳ " . $type . $item['startYear'] . "-" . $item['endYear'] . '"> Học kỳ ' . $type . " " . $item['startYear'] . "-" . $item['endYear'] . '</option>
                                        ';
                                    }
                                }
                            };
                            ?>
                        </select>
                    </div>
                </div>
                <div class="header-score_tbl mb-3"></div>
                <table id="score_tbl" class="w-100 table table-bordered table-striped">
                    <thead>
                        <tr class="bg-dark">
                            <th>STT</th>
                            <th>Mã môn học</th>
                            <th>Tên môn học</th>
                            <th>Điểm CC</th>
                            <th>Điểm BT</th>
                            <th>Điểm TH</th>
                            <th>Điểm KT</th>
                            <th>Điểm thi</th>
                            <th>Tổng kết(Hệ 10)</th>
                            <th>Tổng kết(Hệ chữ)</th>
                        </tr>
                    </thead>
                    <tbody id="tbl_body">
                        <?php
                        $query = 'SELECT rs.pointCC, rs.pointKT, rs.pointBT, rs.pointTH, rs.pointExam, s.id AS subjectId, s.name
                                    FROM register_subject AS rs, subject_tbl AS s, subject_semester AS ss
                                    WHERE rs.subjectSemesterId = ss.id
                                    AND rs.userId = "' . $user['id'] . '"
                                    AND ss.semesterId = "' . $semester . '"
                                    AND ss.subjectId = s.id
                                    ORDER BY rs.createAt DESC;';
                        $list = executeResult($query);
                        $index = 0;

                        foreach ($list as $item) {
                            $final = calcFinal($item['pointCC'], $item['pointBT'], $item['pointTH'], $item['pointKT'], $item['pointExam']);
                            $index++;
                            echo "<tr>";
                            echo "<td>" . $index . "</td>";
                            echo "<td>" . $item['subjectId'] . "</td>";
                            echo "<td>" . $item['name'] . "</td>";
                            echo "<td>" . $item['pointCC'] . "</td>";
                            echo "<td>" . $item['pointBT'] . "</td>";
                            echo "<td>" . $item['pointTH'] . "</td>";
                            echo "<td>" . $item['pointKT'] . "</td>";
                            echo "<td>" . $item['pointExam'] . "</td>";
                            echo "<td>" . $final . "</td>";
                            echo "<td>" . calc($final) . "</td>";
                            echo "</tr>";
                        }
                        if (count($list) ==  0) {
                            echo "<tr><td colspan='10' class='text-center'>Không có dữ liệu hoặc không có sinh viên nào</td></tr>";
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr class="bg-dark">
                            <th>STT</th>
                            <th>Mã môn học</th>
                            <th>Tên môn học</th>
                            <th>Điểm CC</th>
                            <th>Điểm BT</th>
                            <th>Điểm TH</th>
                            <th>Điểm KT</th>
                            <th>Điểm thi</th>
                            <th>Tổng kết(Hệ 10)</th>
                            <th>Tổng kết(Hệ chữ)</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="chart-core card-body">
                <!-- STACKED BAR CHART -->
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Biểu đồ điểm qua các kỳ học</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="stackedBarChart" style="min-height: 480px; height: 480px; max-height: 480px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </section>

        <div class="inner-space mt-5">
            <hr>
        </div>

        <section id="schedule">
            <div class="container bg-white elevation-2 rounded-lg pt-4 mt-4">
                <h1 class="text-center">
                    Lịch thi
                </h1>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <label for="semesterSchedule">Chọn kỳ học:</label>
                            <select id="semesterSchedule" class="selectpicker w-100 mb-2 elevation-1 rounded-lg" data-live-search="true" data-style="btn-info" title="Chọn học phần...">
                                <?php
                                $sql = "SELECT DISTINCT s.* FROM subject_semester AS ss, semester_tbl AS s, register_subject AS rs
                            WHERE ss.semesterId = s.id
                            AND rs.subjectSemesterId = ss.id
                            AND rs.userId = '" . $user['id'] . "'
                            ORDER BY s.startYear DESC, s.type DESC;";
                                $isSelected = false;
                                $list = executeResult($sql);
                                if (count($list) > 0) {
                                    foreach ($list as $item) {
                                        $id = $item['id'];
                                        $type = $item['type'];
                                        if (!$isSelected) {
                                            $semesterSchedule = $id;
                                            $isSelected = true;
                                            echo '
                                            <option value="' . $id . '" data-tokens="' . $id . " Học kỳ " . $type . $item['startYear'] . "-" . $item['endYear'] . '" selected="selected"> Học kỳ ' . $type . " " . $item['startYear'] . "-" . $item['endYear'] . '</option>
                                        ';
                                        } else {
                                            echo '
                                            <option value="' . $id . '" data-tokens="' . $id . " Học kỳ " . $type . $item['startYear'] . "-" . $item['endYear'] . '"> Học kỳ ' . $type . " " . $item['startYear'] . "-" . $item['endYear'] . '</option>
                                        ';
                                        }
                                    }
                                };
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="header-schedule_tbl mb-3"></div>
                    <table id="schedule_tbl" class="w-100 table table-bordered table-striped">
                        <thead>
                            <tr class="bg-dark">
                                <th>STT</th>
                                <th>Mã môn học</th>
                                <th>Tên môn học</th>
                                <th>Ngày thi</th>
                                <th>Giờ thi</th>
                                <th>Phòng thi</th>
                                <th>Thời lượng (phút)</th>
                                <th>Hình thức thi</th>
                            </tr>
                        </thead>
                        <tbody id="tbl_body">
                            <?php
                            $query = 'SELECT ss.subjectId, s.name, ss.examAt, ss.totalTime, ss.examType, ss.roomExam
                                        FROM subject_tbl AS s, subject_semester AS ss, register_subject AS rs
                                        WHERE s.id = ss.subjectId
                                        AND rs.subjectSemesterId = ss.id
                                        AND rs.userId = "' . $user['id'] . '"
                                        AND ss.semesterId = "' . $semesterSchedule . '"
                                        ';

                            $list = executeResult($query);
                            $index = 1;
                            foreach ($list as $item) {
                                $date_format = '';
                                $time_format = '';
                                if ($item['examAt']) {
                                    $date_format = DateTime::createFromFormat("Y-m-d H:i:s",  $item['examAt']);
                                    $time_format = DateTime::createFromFormat("Y-m-d H:i:s",  $item['examAt']);
                                    $date_format = $date_format->format("d/m/Y");
                                    $time_format = $time_format->format("H:i");
                                }
                                echo "<tr>";
                                echo "<td>" . $index++ . "</td>";
                                echo "<td>" . $item['subjectId'] . "</td>";
                                echo "<td>" . $item['name'] . "</td>";
                                echo "<td>" . $date_format . "</td>";
                                echo "<td>" . $time_format . "</td>";
                                echo "<td>" . $item['roomExam'] . "</td>";
                                echo "<td>" . $item['totalTime'] . "</td>";
                                echo "<td>" . $item['examType'] . "</td>";
                                echo "</tr>";
                            }

                            if (count($list) == 0) {
                                echo "<tr><td colspan='8' class='text-center'>Không có dữ liệu</td></tr>";
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr class="bg-dark">
                                <th>STT</th>
                                <th>Mã môn học</th>
                                <th>Tên môn học</th>
                                <th>Ngày thi</th>
                                <th>Giờ thi</th>
                                <th>Phòng thi</th>
                                <th>Thời lượng (phút)</th>
                                <th>Hình thức thi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </section>

        <div class="inner-space mt-5">
            <hr>
        </div>

        <section id="fee">
            <div class="container bg-white elevation-2 rounded-lg pt-4 mt-4">
                <h1 class="text-center">
                    Học phí
                </h1>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <label for="semesterFee">Chọn kỳ học:</label>
                            <select id="semesterFee" class="selectpicker w-100 mb-2 elevation-1 rounded-lg" data-live-search="true" data-style="btn-info" title="Chọn học phần...">
                                <?php
                                $sql = "SELECT DISTINCT s.* FROM subject_semester AS ss, semester_tbl AS s, register_subject AS rs
                                    WHERE ss.semesterId = s.id
                                    AND rs.subjectSemesterId = ss.id
                                    AND rs.userId = '" . $user['id'] . "'
                                    ORDER BY s.startYear DESC, s.type DESC;";
                                $isSelected = false;
                                $list = executeResult($sql);
                                if (count($list) > 0) {
                                    foreach ($list as $item) {
                                        $id = $item['id'];
                                        $type = $item['type'];
                                        if (!$isSelected) {
                                            $semesterFee = $id;
                                            $isSelected = true;
                                            echo '
                                            <option value="' . $id . '" data-tokens="' . $id . " Học kỳ " . $type . $item['startYear'] . "-" . $item['endYear'] . '" selected="selected"> Học kỳ ' . $type . " " . $item['startYear'] . "-" . $item['endYear'] . '</option>
                                        ';
                                        } else {
                                            echo '
                                            <option value="' . $id . '" data-tokens="' . $id . " Học kỳ " . $type . $item['startYear'] . "-" . $item['endYear'] . '"> Học kỳ ' . $type . " " . $item['startYear'] . "-" . $item['endYear'] . '</option>
                                        ';
                                        }
                                    }
                                };
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="header-fee_tbl mb-3"></div>
                    <table id="fee_tbl" class="w-100 table table-bordered table-striped">
                        <thead>
                            <tr class="bg-dark">
                                <th>STT</th>
                                <th>Mã môn học</th>
                                <th>Tên môn học</th>
                                <th>Số tín chỉ</th>
                                <th>Học phí</th>
                            </tr>
                        </thead>
                        <tbody id="tbl_body">
                            <?php
                            $query = 'SELECT s.id AS subjectId, s.name AS subjectName, se.fee*s.numberOfCredits AS fee, s.numberOfCredits
                                        FROM subject_tbl AS s, subject_semester AS ss, register_subject AS rs, semester_tbl AS se
                                        WHERE s.id = ss.subjectId
                                        AND rs.subjectSemesterId = ss.id
                                        AND rs.userId = "' . $user['id'] . '"
                                        AND ss.semesterId = "' . $semesterFee . '"
                                        AND se.id = "' . $semesterFee . '"
                                        ';

                            $list = executeResult($query);
                            $index = 1;
                            $totalFee = 0;
                            $totalCredits = 0;
                            foreach ($list as $item) {
                                $totalFee += (int)$item['fee'];
                                $totalCredits += (int)$item['numberOfCredits'];
                                echo "<tr>";
                                echo "<td>" . $index++ . "</td>";
                                echo "<td>" . $item['subjectId'] . "</td>";
                                echo "<td>" . $item['subjectName'] . "</td>";
                                echo "<td>" . $item['numberOfCredits'] . "</td>";
                                echo "<td>" . number_format($item['fee']) . "</td>";
                                echo "</tr>";
                            }

                            if (count($list) == 0) {
                                echo "<tr><td colspan='8' class='text-center'>Không có dữ liệu</td></tr>";
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr class="bg-dark">
                                <th>STT</th>
                                <th>Mã môn học</th>
                                <th>Tên môn học</th>
                                <th>Số tín chỉ</th>
                                <th>Học phí</th>
                            </tr>
                        </tfoot>
                    </table>

                    <ul class="list-group list-group-flush fee-info mt-3">
                        <?php
                        $sql = 'SELECT * FROM user_semester AS us
                            WHERE us.userId = "' . $user['id'] . '"
                            AND us.semesterId = "' . $semesterFee . '";
                            ';

                        $result = executeResult($sql);

                        $amountPaid = 0;

                        if (count($result) > 0) {
                            $amountPaid = $result[0]['amountPaid'];
                        }
                        ?>
                        <li class="list-group-item">Tổng số tin chỉ: <span id="totalCredits"><?= $totalCredits ?></span></li>
                        <li class="list-group-item">Tổng số tiền học phí học kỳ: <span id="totalFee"><?= number_format($totalFee) ?></span> VNĐ</li>
                        <li class="list-group-item">Số tiền đã đóng: <span id="amountPaid"><?= number_format($amountPaid) ?></span> VNĐ</li>
                        <li class="list-group-item">Còn lại: <span id="remain"><?= number_format($totalFee - $amountPaid) ?></span> VNĐ</li>
                    </ul>

                </div>
            </div>
        </section>


    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.js"></script>
    <script src="plugins/bootstrap-select-1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="plugins/bootstrap-select-1.13.14/dist/js/i18n/defaults-vi_VN.min.js"></script>
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/accounting/accounting.min.js"></script>

    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="assets/js/utils.js"></script>


    <script>
        $(function() {
            $("#score_tbl").DataTable({
                "responsive": true,
                "searching": false,
                "lengthChange": false,
                "bPaginate": false,
                "language": {
                    "info": "",
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
                    "sInfoFiltered": "",
                    "sInfoEmpty": ""
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

            $("#schedule_tbl").DataTable({
                "responsive": true,
                "searching": false,
                "lengthChange": false,
                "bPaginate": false,
                "language": {
                    "info": "",
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
                    "sInfoFiltered": "",
                    "sInfoEmpty": ""
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
            }).buttons().container().appendTo('.header-schedule_tbl');

            $("#fee_tbl").DataTable({
                "responsive": true,
                "searching": false,
                "lengthChange": false,
                "bPaginate": false,
                "language": {
                    "info": "",
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
                    "sInfoFiltered": "",
                    "sInfoEmpty": ""
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
            }).buttons().container().appendTo('.header-fee_tbl');
        });

        $("#semester").on('change', () => {
            updateScore();
        });
        $("#semesterSchedule").on('change', () => {
            updateSchedule();
        });
        $("#semesterFee").on('change', () => {
            updateFee();
        });

        function updateFee() {
            let semester = $("#semesterFee").val().trim();
            let id = "<?= $user['id'] ?>";

            $.ajax({
                url: "users/fee_by_semester.php",
                type: "GET",
                dataType: "json",
                data: {
                    semesterId: semester,
                    userId: id
                },
                success: function(response) {
                    let table = $("#fee_tbl").DataTable();
                    if (response.status == "success") {
                        let listFee = response.data.listFee;
                        let totalCredits = response.data.totalCredits ?? 0;
                        let totalFee = response.data.totalFee ?? 0;
                        let amountPaid = response.data.amountPaid ?? 0;
                        let remain = response.data.remain ?? 0;
                        table.clear().draw();
                        listFee.map((item, index) => {
                            table.row.add([
                                index + 1,
                                item.subjectId,
                                item.subjectName,
                                item.numberOfCredits,
                                accounting.formatNumber(item.fee)
                            ]).draw();
                        });

                        $("#totalCredits").text(totalCredits);
                        $("#totalFee").text(totalFee);
                        $("#amountPaid").text(amountPaid);
                        $("#remain").text(remain);
                    } else {
                        table.clear().draw();
                        Swal.fire({
                            icon: 'error',
                            title: 'Lỗi',
                            text: data.message
                        })
                    }
                }
            })
        }

        function updateScore() {
            let semester = $("#semester").val().trim();
            let id = "<?= $user['id'] ?>";

            $.ajax({
                url: "users/score_by_semester.php",
                type: "GET",
                dataType: "json",
                data: {
                    semesterId: semester,
                    userId: id
                },
                success: function(data) {
                    let table = $("#score_tbl").DataTable();
                    if (data.status == "success") {
                        table.clear().draw();

                        data.data.map((item, index) => {
                            let final = calcFinal(item.pointCC,
                                item.pointBT,
                                item.pointTH,
                                item.pointKT,
                                item.pointExam);

                            table.row.add([
                                index + 1,
                                item.subjectId,
                                item.name,
                                item.pointCC,
                                item.pointBT,
                                item.pointTH,
                                item.pointKT,
                                item.pointExam,
                                final,
                                calc(final)
                            ]).draw();
                        });
                    } else {
                        table.clear().draw();
                        Swal.fire({
                            icon: 'error',
                            title: 'Lỗi',
                            text: data.message
                        })
                    }
                }
            })
        }

        function updateSchedule() {
            let semester = $("#semesterSchedule").val().trim();
            let id = "<?= $user['id'] ?>";

            $.ajax({
                url: "users/schedule_by_semester.php",
                type: "GET",
                dataType: "json",
                data: {
                    semesterId: semester,
                    userId: id
                },
                success: function(data) {
                    console.log("schedule: ", data);
                    let table = $("#schedule_tbl").DataTable();
                    if (data.status == "success") {
                        table.clear().draw();

                        data.data.map((item, index) => {
                            let date = moment(item.examAt, 'YYYY-MM-DD hh:mm:ss');

                            table.row.add([
                                index + 1,
                                item.subjectId,
                                item.name,
                                date.format('DD/MM/YYYY') != 'Invalid date' ? date.format('DD/MM/YYYY') : '',
                                date.format('HH:mm') != 'Invalid date' ? date.format('HH:mm') : '',
                                item.roomExam,
                                item.totalTime,
                                item.examType,
                            ]).draw();
                        });
                    } else {
                        table.clear().draw();
                        Swal.fire({
                            icon: 'error',
                            title: 'Lỗi',
                            text: data.message
                        })
                    }
                }
            })
        }

        $("#change-password-btn").on("click", function() {
            var oldPassword = $("#old-password").val();
            var newPassword = $("#new-password").val();
            var confirmPassword = $("#confirm-password").val();

            $.ajax({
                url: "users/change_password.php",
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
                                location.reload();
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

        $("#avatar-image").on("click", function() {
            $("#avatar").click();
        });

        $().ready(function() {
            $('#avatar').on('change', function() {
                var file = $('#avatar').prop('files')[0];
                var form_data = new FormData();
                form_data.append('file', file);

                $.ajax({
                    url: 'users/upload.php',
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
                url: 'users/update_avatar.php',
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

        $('#update-info').click(function(e) {
            console.log("clicked");
            e.preventDefault();
            let firstName = $('#firstName').val().trim();
            let lastName = $('#lastName').val().trim();
            let email = $('#email').val().trim();
            let phoneNumber = $('#phoneNumber').val().trim();
            let address = $('#address').val().trim();
            let dob = $('#dob').val();
            let gender = $('#gender').val();
            let id = "<?= $user['id'] ?>";

            if (!id || !firstName || !lastName || firstName.length == 0 || lastName.length == 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Thông báo',
                    text: 'Vui lòng nhập đầy đủ thông tin!',
                })
                return;
            }

            Swal.fire({
                title: `Bạn có chắc chắn muốn cập nhật thông tin của mình?`,
                text: "Bạn sẽ không thể khôi phục lại dữ liệu này!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Có, cập nhật ngay!'
            }).then((result) => {
                if (result.value) {
                    Swal.fire({
                        html: `
                        <form class="form-inline">
                            <label for="confirm-password-verify">Mật khẩu:</label>
                            <input class="form-control flex-grow-1 ml-2" id="confirm-password-verify" type="password" placeholder="Nhập mật khẩu của bạn"/>
                        </form>
                        `,
                        icon: 'warning',
                        title: 'Xác nhận mật khẩu!',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Xác nhận!',
                        cancelButtonText: 'Hủy',
                    }).then(result => {
                        if (result.value) {
                            let password = $("#confirm-password-verify").val().trim();
                            $.ajax({
                                url: 'users/update.php',
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
                                    'gender': gender,
                                    'password': password
                                },
                                success: function(data) {
                                    if (data.status == 'success') {
                                        Swal.fire({
                                                title: 'Thành công',
                                                text: data.message,
                                                icon: 'success',
                                                confirmButtonText: 'OK'
                                            })
                                            .then(() => {
                                                location.reload();
                                            })
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
                }
            })
        })

        function getDataChart() {
            $.ajax({
                url: 'users/scores.php',
                type: 'GET',
                dataType: 'JSON',
                data: {
                    userId: '<?= $user['id'] ?>'
                },
                success: function(res) {
                    let data = {
                        labels: [],
                        datasets: [{
                            label: 'Điểm tổng kết',
                            backgroundColor: '#396EB0',
                            borderColor: '#000',
                            data: []
                        }],
                    }
                    if (res.status == 'success') {
                        let scores = res.data;
                        data.datasets[0].data = scores.avg.map(score => score.toFixed(2));
                        data.labels = scores.semesters.map(semester => {
                            return semester.id;
                        });
                        drawChart(data);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Lỗi tải dữ liệu cho biểu đồ',
                            text: res.message,
                        });
                    }
                }
            });
        }

        $().ready(function() {
            getDataChart();
        });

        function drawChart(data) {
            //---------------------
            //- STACKED BAR CHART -
            //---------------------
            var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
            var stackedBarChartData = $.extend(true, {}, data)

            var stackedBarChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        barPercentage: 0.4
                    }],
                    yAxes: [{
                        stacked: true
                    }], 
                }
            }

            new Chart(stackedBarChartCanvas, {
                type: 'bar',
                data: stackedBarChartData,
                options: stackedBarChartOptions
            })
        }
    </script>
</body>

</html>