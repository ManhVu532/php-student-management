<?php
require_once("../utils/db_helper.php");
require_once("../utils/utils.php");
session_start();
$user = null;
if (isset($_SESSION['user'])) {
    $user = ($_SESSION['user']);
    if($user){
        $user = json_decode($user, true);
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/favicon.png">
    <title>Học viện Công nghệ Bưu chính Viễn thông</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap-4.6.0-dist/css/bootstrap.min.css" />

    <!-- Fontawesome -->
    <link rel="stylesheet" href="assets/vendor/fontawesome-free-5.15.4-web/css/all.min.css" />

    <!-- External css files -->
    <link rel="stylesheet" href="assets/css/setup.css" />
    <link rel="stylesheet" href="assets/css/main.css" />

    <!-- AOS css files -->
    <link rel="stylesheet" href="assets/vendor/aos.css" />
</head>

<body>
    <!-- Topbar -->
    <header class="topbar bg-white">
        <section class="container py-4">
            <div class="row">
                <div class="col-xl-9 col-lg-9 d-flex col-md-12 col-sm-12">
                    <div class="university-name d-flex">
                        <div>
                            <a href="index.html">
                                <img src="assets/images/ptit-logo.png" alt="logo" />
                            </a>
                        </div>
                        <div>
                            <h1 class="display-5">
                                HỌC VIỆN CÔNG NGHỆ BƯU CHÍNH VIỄN THÔNG
                            </h1>
                            <h3 class="text-red display-6">
                                Posts and Telecommunications Institute of Technology
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-sm-12 topbar__info row">
                    <p class="col-xl-12 col-lg-12 col-md-6 col-sm-6">
                        <i class="fa fa-envelope text-red"></i> admin@ptit.edu.vn
                    </p>
                    <p class="col-xl-12 col-lg-12 col-md-6 col-sm-6">
                        <i class="fa fa-phone text-red"></i> (024) 33528122
                    </p>
                </div>
            </div>
        </section>
    </header>
    <!-- Navbar -->
    <nav class="navbar-menu sticky-top navbar navbar-expand-lg navbar-light bg-light py-0 shadow">
        <div class="container">
            <button class="navbar-toggler border-dark my-2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars text-white"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="position-relative py-1 d-flex justify-content-between flex-grow-1">
                    <ul class="navbar-nav d-flex justify-content-between">
                        <li class="nav-item active">
                            <a class="nav-link text-white mx-1 py-2 px-4 rounded text-center" href="index.php">Trang chủ <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white py-2 px-4 rounded text-center mx-1" href="./pages/introductions/index.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Giới thiệu
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-red" href="./pages/introductions/index.html">Lịch sử - Truyền thống</a>
                                <a class="dropdown-item text-red" href="./pages/introductions/misson.html">Tầm nhìn - Sứ mệnh</a>
                                <a class="dropdown-item text-red" href="./pages/introductions/logo.html">Ý nghĩa logo Học Viện</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white py-2 px-4 rounded text-center mx-1" href="./pages/news/index.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Tin tức
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-red" href="./pages/news/index.html">Sự kiện</a>
                                <a class="dropdown-item text-red" href="./pages/news/notify.html">Thông báo</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white py-2 px-4 rounded text-center mx-1" href="./pages/majors/index.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Ngành học
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-red" href="./pages/majors/index.html">Công nghệ thông tin</a>
                                <a class="dropdown-item text-red" href="./pages/majors/index.html">Đa phương tiện</a>
                                <a class="dropdown-item text-red" href="./pages/majors/index.html">Điện tử viễn thông</a>
                                <a class="dropdown-item text-red" href="./pages/majors/index.html">Quản trị kinh doanh</a>
                                <a class="dropdown-item text-red" href="./pages/majors/index.html">Marketing</a>
                                <a class="dropdown-item text-red" href="./pages/majors/index.html">Công nghệ tài chính</a>
                                <a class="dropdown-item text-red" href="./pages/majors/index.html">Thương mại điện tử</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white py-2 px-4  mx-1 rounded text-center" href="./pages/admissions.html">Tuyển sinh</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white py-2 px-4  mx-1 rounded text-center" href="./pages/student.html">Sinh viên</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white py-2 px-4  mx-1 rounded text-center" href="./pages/contact.html">Liên hệ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white py-2 px-4  mx-1 rounded text-center" href="<?= HOST . "pages/auth/login.php" ?>"><?=($user == null) ?? 'Đăng nhập'?><?=$user['firstName'] ? 'Xin chào '.$user['firstName'] : ''?></a>
                        </li>
                    </ul>
                    <a class="search py-2 px-3 rounded" href="#">
                        <i class="fas fa-search text-white"></i>
                    </a>
                    <form class="search-box form-inline my-2 my-lg-0 d-none position-absolute bg-light py-3 px-4 rounded shadow-lg top" id="search-box">
                        <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
                        <button class="btn btn-outline-danger my-2 my-sm-0 search-btn" type="submit">Tìm</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- navbar -->

    <!-- content -->
    <div class="content bg-light pb-5">
        <section class="main-slide">
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
                        <img src="assets/images/BANNER-WEBSITE_BANNER-WEBSITE-PTIT.png" class="d-block w-100" alt="slide-1">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/Slide-Baner-Web-PTIT-01.png" class="d-block w-100" alt="slide-2">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/Slide-Banner-Web.jpg" class="d-block w-100" alt="slide-3">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/Slide-Banner-Web2.jpg" class="d-block w-100" alt="slide-4">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/images/Slide-Banner-Web3.jpg" class="d-block w-100" alt="slide-5">
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

        <!-- Section 2 -->
        <section class="reasons py-4 shadow-sm">
            <div class="container">
                <h3 class="text-uppercase text-white text-center mb-4">
                    VÌ SAO 25.000+ SINH VIÊN CHỌN PTIT?
                </h3>
                <div class="row text-white text-center">
                    <div class="col-lg-3 col-md-6">
                        <p class="reasons__title text-uppercase display-3">
                            5★
                        </p>
                        <p class="reasons_desc text-uppercase text-black">
                            CHẤT LƯỢNG <br /> ĐÀO TẠO
                        </p>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <p class="reasons__title text-uppercase d-flex align-items-center justify-content-center">
                            top <span class="display-3">5</span>
                        </p>
                        <p class="reasons_desc text-uppercase text-black">
                            Công nghệ thông tin <br /> tốt nhất Việt Nam
                        </p>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <p class="reasons__title text-uppercase display-3">
                            98%
                        </p>
                        <p class="reasons_desc text-uppercase text-black">
                            Sinh viên có <br /> việc làm ngay
                        </p>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <p class="reasons__title text-uppercase display-3 d-flex justify-content-center align-items-center">
                            8.5 <span class="display-6">Triệu đồng/<br />Tháng</span>
                        </p>
                        <p class="reasons_desc text-uppercase text-black">
                            Sinh viên có <br /> việc làm ngay
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 3 -->
        <!-- Education program -->

        <section class="education mt-4">
            <div class="container">
                <h3 class="heading font-family-bold" data-aos="fade-up">
                    Ngành đào tạo
                    <div class="line line--red mt-1 line--w-8"></div>
                </h3>
                <div class="row mt-4" data-aos="fade-up">
                    <div class="col-lg-1 col-md-2 education__col_inner"></div>
                    <div class="col-lg-2 col-md-4">
                        <div class="p-3">
                            <div class="mb-3">
                                <img src="assets/images/it.png" alt="it" />
                            </div>
                            <a href="#" class="text-decoration-none">
                                <p class="text-center text-desc">Công nghệ thông tin</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <div class="p-3">
                            <div class="mb-3">
                                <img src="assets/images/vt.png" alt="viễn thông" />
                            </div>
                            <a href="#" class="text-decoration-none">
                                <p class="text-center text-desc">Điện tử - Viễn thông</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <div class="p-3">
                            <div class="mb-3">
                                <img src="assets/images/multimedia.png" alt="multimedia" />
                            </div>
                            <a href="#" class="text-decoration-none">
                                <p class="text-center">Đa phương tiện</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <div class="p-3">
                            <div class="mb-3">
                                <img src="assets/images/fintech.png" alt="fintech" />
                            </div>
                            <a href="#" class="text-decoration-none">
                                <p class="text-center text-desc">Công nghệ tài chính</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <div class="p-3">
                            <div class="mb-3">
                                <img src="assets/images/tmdt.png" alt="fintech" />
                            </div>
                            <a href="#" class="text-decoration-none">
                                <p class="text-center text-desc">Thương mại điện tử</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-1 education__col_inner"></div>
                </div>
            </div>
        </section>
        <div class="container">
            <hr />
        </div>

        <!-- Section 4 -->
        <!-- lecturers program -->

        <section class="lecturers mt-4">
            <div class="container">
                <h3 class="heading font-family-bold" data-aos="fade-up">
                    Sinh viên tiêu biểu
                    <div class="line line--red mt-1 line--w-8"></div>
                </h3>
                <div class="row mt-4" data-aos="fade-up">
                    <?php
                    $sql = "SELECT * FROM `user_tbl` WHERE `type` = 0 AND `isActive` = 1 LIMIT 3";
                    $users = executeResult($sql);

                    if (count($users) == 0) {
                        echo '<h3 class="text-center">Không tìm thấy thông tin sinh viên nào</h3>';
                    } else {
                        foreach ($users as $user) {
                            $user_name = $user['lastName'] . " " . $user['firstName'];
                            $user_avatar = $user['avatar'];
                            if (empty($user_avatar) || !$user_avatar) {
                                $user_avatar = HOST . 'university/assets/images/avatar.jpeg';
                            } else {
                                $user_avatar = HOST . $user_avatar;
                            }
                            $user_id = $user['id'];

                            echo '
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-3">
                                            <div class="lecturers__card bg-white d-flex flex-column align-items-center rounded-lg shadow-sm p-3 pt-5">
                                                <a href="#" class="card-220 card-lg-220 card-md-160 rounded-circle overflow-hidden bg-light">
                                                    <img src="' . $user_avatar . '" class="card-img-top" alt="...">
                                                </a>
                                                <div class="mt-3">
                                                    <h6 class="text-center mb-0 font-family-bold">' . $user_name . '</h6>
                                                    <p class="text-center text-black-50 text-desc mb-0">' . $user_id . '</p>
                                                </div>
                                            </div>
                                        </div>
                                ';
                        }
                    }
                    ?>
                </div>
            </div>
        </section>
        <div class="container">
            <hr />
        </div>
        <!-- Section 5 -->
        <!-- News -->

        <section class="news mt-4">
            <div class="container">
                <h3 class="heading font-family-bold" data-aos="fade-up">
                    Tin tức
                    <div class="line line--red mt-1 line--w-4"></div>
                </h3>

                <div class="news__content row mt-4" data-aos="fade-up">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 my-2">
                        <div class="card">
                            <a href="./pages/news/event-details.html">
                                <div class="card__image position-relative">
                                    <img src="assets/images/news-1.jpg" class="card-img-top" alt="...">
                                    <div class="card__image__overlay position-absolute"></div>
                                    <div class="card__image__mask position-absolute">
                                        <p class="text-white text-center mb-2 mt-1">Xem chi tiết</p>
                                    </div>
                                </div>
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="./pages/news/event-details.html" class="text-black text-decoration-none">
                                        Sinh viên PTIT nhận được sự quan tâm lớn của cộng đồng doanh nghiệp số
                                    </a>
                                </h5>
                                <small class="text-mute text-black-50">26/20/2021</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 my-2">
                        <div class="card">
                            <a href="./pages/news/event-details.html">
                                <div class="card__image position-relative">
                                    <img src="assets/images/news-2.jpg" class="card-img-top" alt="...">
                                    <div class="card__image__overlay position-absolute"></div>
                                    <div class="card__image__mask position-absolute">
                                        <p class="text-white text-center mb-2 mt-1">Xem chi tiết</p>
                                    </div>
                                </div>
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="./pages/news/event-details.html" class="text-black text-decoration-none">
                                        Phiên họp thứ sáu Hội đồng Học viện Công nghệ Bưu chính Viễn thông
                                    </a>
                                </h5>
                                <small class="text-mute text-black-50">25/20/2021</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 my-2">
                        <div class="card">
                            <a href="./pages/news/event-details.html">
                                <div class="card__image position-relative">
                                    <img src="assets/images/news-3.jpg" class="card-img-top" alt="...">
                                    <div class="card__image__overlay position-absolute"></div>
                                    <div class="card__image__mask position-absolute">
                                        <p class="text-white text-center mb-2 mt-1">Xem chi tiết</p>
                                    </div>
                                </div>
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="./pages/news/event-details.html" class="text-black text-decoration-none">
                                        Năm học mới đặc biệt của Học viện Công nghệ Bưu chính Viễn thông
                                    </a>
                                </h5>
                                <small class="text-mute text-black-50">21/20/2021</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 my-2">
                        <div class="card">
                            <a href="./pages/news/event-details.html">
                                <div class="card__image position-relative">
                                    <img src="assets/images/news-4.jpg" class="card-img-top" alt="...">
                                    <div class="card__image__overlay position-absolute"></div>
                                    <div class="card__image__mask position-absolute">
                                        <p class="text-white text-center mb-2 mt-1">Xem chi tiết</p>
                                    </div>
                                </div>
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="./pages/news/event-details.html" class="text-black text-decoration-none">
                                        Học viện Công nghệ Bưu chính Viễn thông xúc tiến hợp tác với Tập đoàn Công nghệ HCL
                                    </a>
                                </h5>
                                <small class="text-mute text-black-50">21/20/2021</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 my-2">
                        <div class="card">
                            <a href="./pages/news/event-details.html">
                                <div class="card__image position-relative">
                                    <img src="assets/images/news-5.jpg" class="card-img-top" alt="...">
                                    <div class="card__image__overlay position-absolute"></div>
                                    <div class="card__image__mask position-absolute">
                                        <p class="text-white text-center mb-2 mt-1">Xem chi tiết</p>
                                    </div>
                                </div>
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="./pages/news/event-details.html" class="text-black text-decoration-none">
                                        Một hệ sinh thái ban đầu cho trường đại học số đã được hình thành ở Học viện Công nghệ Bưu chính Viễn thông
                                    </a>
                                </h5>
                                <small class="text-mute text-black-50">21/20/2021</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 my-2">
                        <div class="card">
                            <a href="./pages/news/event-details.html">
                                <div class="card__image position-relative">
                                    <img src="assets/images/news-6.jpg" class="card-img-top" alt="...">
                                    <div class="card__image__overlay position-absolute"></div>
                                    <div class="card__image__mask position-absolute">
                                        <p class="text-white text-center mb-2 mt-1">Xem chi tiết</p>
                                    </div>
                                </div>
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="./pages/news/event-details.html" class="text-black text-decoration-none">
                                        Thư chúc mừng 24 năm ngày truyền thống Học viện Công nghệ Bưu chính Viễn thông (17/9/1997 – 17/9/2021)
                                    </a>
                                </h5>
                                <small class="text-mute text-black-50">15/09/2021</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-right mt-4 load-more">
                    <a href="./pages/news/index.html" class="btn btn-outline-danger">Xem thêm</a>
                </div>
        </section>
        <div class="container">
            <hr />
        </div>
        <!-- Section 6-->
        <!-- Notification program -->

        <section class="notify mt-4">
            <div class="container">
                <h3 class="heading font-family-bold" data-aos="fade-up">
                    Thông báo
                    <div class="line line--red mt-1 line--w-8"></div>
                </h3>
                <div class="row" data-aos="fade-up">
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mt-3">
                        <div class="card">
                            <div class="position-relative">
                                <img src="assets/images/thong-bao-ptit.jpg" class="card-img-top" alt="thong bao">
                                <span class="notify__date text-black position-absolute">22/10/2021</span>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    <a href="./pages/news/notify-details.html" class="notify__link text-black text-decoration-none font-family-bold">
                                        Thông báo hướng dẫn sơ kết học kỳ 2 năm học 2020-2021
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mt-3">
                        <div class="card">
                            <div class="position-relative">
                                <img src="assets/images/thong-bao-ptit.jpg" class="card-img-top" alt="thong bao">
                                <span class="notify__date text-black position-absolute">15/09/2021</span>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    <a href="./pages/news/notify-details.html" class="notify__link text-black text-decoration-none font-family-bold">
                                        Thông báo tổ chức lớp đầu khóa học đối với các Tân sinh viên khóa 2021
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mt-3">
                        <div class="card">
                            <div class="position-relative">
                                <img src="assets/images/thong-bao-ptit.jpg" class="card-img-top" alt="thong bao">
                                <span class="notify__date text-black position-absolute">16/08/2021</span>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    <a href="./pages/news/notify-details.html" class="notify__link text-black text-decoration-none font-family-bold">
                                        Thông báo điểm chuẩn xét trúng tuyển đại học theo hình thức vừa làm vừa học Đợt 1 năm 2021
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mt-3">
                        <div class="card">
                            <div class="position-relative">
                                <img src="assets/images/thong-bao-ptit.jpg" class="card-img-top" alt="thong bao">
                                <span class="notify__date text-black position-absolute">10/08/2021</span>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    <a href="./pages/news/notify-details.html" class="notify__link text-black text-decoration-none font-family-bold">
                                        Chương trình học bổng Honda – Honda Award năm 2021
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-right mt-4 load-more">
                    <a href="./pages/news/notify.html" class="btn btn-outline-danger">Xem thêm</a>
                </div>
            </div>
        </section>

        <div class="container">
            <hr />
        </div>
        <!-- Section7 -->

        <section class="mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 mb-3" data-aos="fade-up">
                        <h3>
                            Video
                            <div class="line line--red mt-1 line--w-4"></div>
                        </h3>
                        <iframe class="mt-2" width="700" height="393.75" src="https://www.youtube.com/embed/f-tlfYppqQQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12" data-aos="fade-up">
                        <h3>Đối tác
                            <div class="line line--red mt-1 line--w-4"></div>
                        </h3>
                        <div class="bg-light mt-2 text-center">
                            <div id="carouselIndicators" class="carousel slide" data-touch="false" data-interval="3000" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item logo-item active">
                                        <img src="assets/images/Vin_Logo_horizontal.png" class="d-block w-100" alt="slide-1">
                                    </div>
                                    <div class="carousel-item logo-item">
                                        <img src="assets/images/samsung.png" class="d-block w-100" alt="slide-2">
                                    </div>
                                    <div class="carousel-item logo-item">
                                        <img src="assets/images/microsoft.png" class="d-block w-100" alt="slide-4">
                                    </div>
                                    <div class="carousel-item logo-item">
                                        <img src="assets/images/mobifone.png" class="d-block w-100" alt="slide-5">
                                    </div>
                                    <div class="carousel-item logo-item">
                                        <img src="assets/images/200601_Du-an-Motive_logo.png" class="d-block w-100" alt="slide-6">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
                                    <i class="fa fa-chevron-left text-black display-5" aria-hidden="true"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
                                    <i class="fa fa-chevron-right text-black display-5" aria-hidden="true"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- back to top button-->
    <div class="back-to-top d-flex align-items-center justify-content-center rounded shadow-sm">
        <i class="fas fa-angle-up"></i>
    </div>

    <!-- Model signup advise -->

    <!-- Button trigger modal -->
    <button type="button" class="signup-button position-fixed text-white shadow-sm" data-toggle="modal" data-target="#staticBackdrop">
        <i class="fas fa-edit"></i>
        <span class="text-nowrap">
            Đăng ký tư vấn
        </span>
    </button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-red text-white">
                <div class="modal-header">
                    <h5 class="modal-title font-family-bold" id="staticBackdropLabel">Đăng ký để nhận tư vấn tuyển sinh miễn phí</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times text-white"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="name">Họ và tên*</label>
                                <input type="text" placeholder="Họ và tên" class="form-control" id="name">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="phone">Điện thoại*</label>
                                <input type="text" placeholder="Điện thoại" class="form-control" id="phone">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="phone">Ngày sinh</label>
                                <input type="date" placeholder="Ngày sinh" class="form-control" id="phone">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" placeholder="Email" class="form-control" id="email">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="school">Trường THPT/ Đại học</label>
                                <input type="text" placeholder="Trường THPT/ Đại học" class="form-control" id="school">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="province">Tỉnh/ Thành phố*</label>
                                <input type="text" placeholder="Tỉnh/ Thành phố" class="form-control" id="province">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-danger" id="signup-advised" data-dismiss="modal">Đăng ký</button>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <section class="footer bg-white shadow-lg pt-3 pb-5 border-bottom-red">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 mt-2 mb-4">
                    <p class="text-center display-5 font-family-bold">
                        HỌC VIỆN CÔNG NGHỆ BƯU CHÍNH VIỄN THÔNG
                    </p>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12"></div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 footer__column mb-4">
                    <div class="footer__column-one d-flex align-items-center flex-column">
                        <div>
                            <img src="assets/images/ptit-logo.png" alt="logo" />
                        </div>
                        <div class="mt-4 d-flex justify-content-around w-100 mb-3">
                            <a href="#" class="icon-footer rounded-circle bg-light d-flex justify-content-center align-items-center">
                                <i class="fab fa-facebook-square"></i>
                            </a>
                            <a href="#" class="icon-footer rounded-circle bg-light d-flex justify-content-center align-items-center">
                                <i class="fab fa-youtube"></i>
                            </a>
                            <a href="#" class="icon-footer rounded-circle bg-light d-flex justify-content-center align-items-center">
                                <i class="fab fa-google-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 footer__column mb-4">
                    <div class="footer__column--two">
                        <h5 class="display-6 text-red font-family-bold">
                            Trụ sở chính:
                        </h5>
                        <p>
                            122 Hoàng Quốc Việt, Q.Cầu Giấy, Hà Nội.
                        </p>
                        <h5 class="display-6 text-red font-family-bold">
                            Cơ sở đào tạo tại Hà Nội:
                        </h5>
                        <p>
                            Km10, Đường Nguyễn Trãi, Q.Hà Đông, Hà Nội
                        </p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 footer__column mb-4">
                    <div class="footer__column--two">
                        <h5 class="display-6 text-red font-family-bold">
                            Học viện cơ sở tại TP. Hồ Chí Minh:
                        </h5>
                        <p>
                            122 Hoàng Quốc Việt, Q.Cầu Giấy, Hà Nội.11 Nguyễn Đình Chiểu, P. Đa Kao, Q.1 TP Hồ Chí Minh
                        </p>
                        <h5 class="display-6 text-red font-family-bold">
                            Cơ sở đào tạo tại TP Hồ Chí Minh:
                        </h5>
                        <p>
                            Đường Man Thiện, P. Hiệp Phú, Q.9 TP Hồ Chí Minh
                        </p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 footer__column mb-4">
                    <h5 class="display-6 text-red font-family-bold">
                        Địa chỉ:
                    </h5>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6184.594910678308!2d105.78332901342435!3d20.97310420111682!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acce762c2bb9%3A0xbb64e14683ccd786!2zSOG7jWMgVmnhu4duIENOIELGsHUgQ2jDrW5oIFZp4buFbiBUaMO0bmcgLSBIw6AgxJDDtG5n!5e0!3m2!1svi!2s!4v1635313100919!5m2!1svi!2s" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </section>

    <div class="position-fixed bottom-0 right-0 p-3" style="z-index: 9999; right: 0; bottom: 0;">
        <div id="liveToast" class="toast hide text-white" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
            <div class="toast-header d-flex justify-content-between">
                <div>
                    <i class="fas fa-check-circle text-success"></i>
                    <strong class="mx-3">PTIT</strong>
                    <small>Vừa xong</small>
                </div>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body bg-red">
                Đăng ký của bạn đã được gửi đi!
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript and Jquery -->
    <script src="assets/vendor/bootstrap-4.6.0-dist/js/jquery-3.6.0.min.js"></script>
    <script src="/assets/vendor/bootstrap-4.6.0-dist/js/popper.min.js"></script>
    <script src="assets/vendor/bootstrap-4.6.0-dist/js/bootstrap.bundle.min.js"></script>

    <!-- External js files -->
    <script src="assets/js/main.js"></script>

    <!-- AOS initial -->
    <script src="assets/vendor/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>