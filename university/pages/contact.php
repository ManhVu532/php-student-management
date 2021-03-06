<?php
    require_once("../../utils/config.php");
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/images/favicon.png">
    <title>Học viện Công nghệ Bưu chính Viễn thông</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap-4.6.0-dist/css/bootstrap.min.css" />

    <!-- Fontawesome -->
    <link rel="stylesheet" href="../assets/vendor/fontawesome-free-5.15.4-web/css/all.min.css" />

    <!-- External css files -->
    <link rel="stylesheet" href="../assets/css/setup.css" />
    <link rel="stylesheet" href="../assets/css/main.css" />

    <!-- AOS css files -->
    <link rel="stylesheet" href="../assets/vendor/aos.css" />
</head>

<body>
    <!-- Topbar -->
    <header class="topbar bg-white">
        <section class="container py-4">
            <div class="row">
                <div class="xol-xl-9 col-lg-9 d-flex col-md-12 col-sm-12">
                    <div class="university-name d-flex">
                        <div>
                            <a href="../index.php">
                                <img src="../assets/images/ptit-logo.png" alt="logo" />
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
                        <li class="nav-item">
                            <a class="nav-link text-white mx-1 py-2 px-4 rounded text-center" href="../index.php">Trang chủ <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white py-2 px-4 rounded text-center mx-1" href="../pages/introductions/index.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Giới thiệu
                        </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-red" href="../pages/introductions/index.html">Lịch sử - Truyền thống</a>
                                <a class="dropdown-item text-red" href="../pages/introductions/misson.html">Tầm nhìn - Sứ mệnh</a>
                                <a class="dropdown-item text-red" href="../pages/introductions/logo.html">Ý nghĩa logo Học Viện</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white py-2 px-4 rounded text-center mx-1" href="../pages/news/index.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Tin tức
                        </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-red" href="../pages/news/index.html">Sự kiện</a>
                                <a class="dropdown-item text-red" href="../pages/news/notify.html">Thông báo</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white py-2 px-4 rounded text-center mx-1" href="../pages/majors/index.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Ngành học
                        </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-red" href="../pages/majors/index.html">Công nghệ thông tin</a>
                                <a class="dropdown-item text-red" href="../pages/majors/index.html">Đa phương tiện</a>
                                <a class="dropdown-item text-red" href="../pages/majors/index.html">Điện tử viễn thông</a>
                                <a class="dropdown-item text-red" href="../pages/majors/index.html">Quản trị kinh doanh</a>
                                <a class="dropdown-item text-red" href="../pages/majors/index.html">Marketing</a>
                                <a class="dropdown-item text-red" href="../pages/majors/index.html">Công nghệ tài chính</a>
                                <a class="dropdown-item text-red" href="../pages/majors/index.html">Thương mại điện tử</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white py-2 px-4  mx-1 rounded text-center" href="../pages/admissions.html">Tuyển sinh</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white py-2 px-4  mx-1 rounded text-center" href="../pages/student.html">Sinh viên</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link text-white py-2 px-4  mx-1 rounded text-center" href="../pages/contact.html">Liên hệ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white py-2 px-4  mx-1 rounded text-center" href="<?=HOST."pages/auth/login.php"?>">Đăng nhập</a>
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
    <div class="content pb-5 bg-light">
        <div class="container__news__image__header position-relative mb-4">
            <div class="container__news__image__mask position-absolute"></div>
            <img src="../assets/images/header.jpg" alt="header" />
            <h2 class="position-absolute text-white font-weight-bold">Liên hệ với chúng tôi</h2>
        </div>

        <div class="container">
            <hr/>
            <h3 class="heading font-family-bold" data-aos="fade-up">
                Thông tin liên hệ
                <div class="line line--red mt-1 line--w-8"></div>
            </h3>
            <div class="m-lg-5 m-l-5 m-md-0 m-sm-0 my-5">
                <table class="table table-striped table-hover table-bordered w-100 table-responsive" data-aos="fade-up">
                    <tbody>
                        <tr>
                            <th class="font-family-bold">Phòng ban</th>
                            <th class="font-family-bold">Chức năng</th>
                            <th class="font-family-bold">Liên hệ</th>
                        </tr>
                        <tr>
                            <td>Tuyển sinh</td>
                            <td>Tư vấn, hướng dẫn và giải đáp những thắc mắc của học sinh, phụ huynh trong công tác tuyển sinh.</td>
                            <td class="text-nowrap">(024) 07243621</td>
                        </tr>
                        <tr>
                            <td>Giáo vụ</td>
                            <td>Giải quyết các vấn đề liên quan đến thủ tục hành chính sv, thủ tục học vụ, kí túc xá, tài chính, chương trình đào tạo, kết quả học tập, đăng kí tín chỉ, lịch thi,...</td>
                            <td class="text-nowrap">(024) 73081723</td>
                        </tr>
                        <tr>
                            <td>Thư viện</td>
                            <td>Quản lý, cung cấp và giải đáp các thắc mắc về tài liệu học tập của sinh viên đại học FPT: Giáo trình, tài liệu tham khảo, tạp chí, sách nghiên cứu,</td>
                            <td class="text-nowrap">(024) 87326726</td>
                        </tr>
                        <tr>
                            <td>Công tác sinh viên</td>
                            <td>Quản lý các hoạt động, sự kiện, chương trình đoàn thể của sinh viên và kết nối doanh nghiệp với nhà trường qua các hội thảo, ký kết hợp tác,….</td>
                            <td class="text-nowrap">(024) 87239873</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <hr/>

            <h3 class="heading font-family-bold" data-aos="fade-up">
                Liên hệ ngay
                <div class="line line--red mt-1 line--w-8"></div>
            </h3>
            <div class="mx-lg-5 mx-xl-5 mx-md-0 mx-sm-0 mt-5">
                <form class="row bg-white px-3 py-4 rounded-lg shadow-sm" data-aos="fade-up">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                        <label for="username" class="form-label">Họ và tên*</label>
                        <input type="text" class="form-control" id="username">
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                        <label for="email" class="form-label">Email*</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                        <label for="address" class="form-label">Địa chỉ</label>
                        <input type="text" class="form-control" id="address">
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                        <label for="phone" class="form-label">Số điện thoại*</label>
                        <input type="text" class="form-control" id="phone">
                    </div>
                    <div class="col-12 mb-3">
                        <label for="comment" class="form-label">Nội dung*</label>
                        <textarea type="text" rows="5" class="form-control" id="comment"></textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-outline-danger">Gửi đi</button>
                    </div>
                </form>
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
                            <img src="../assets/images/ptit-logo.png" alt="logo" />
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
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6184.594910678308!2d105.78332901342435!3d20.97310420111682!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acce762c2bb9%3A0xbb64e14683ccd786!2zSOG7jWMgVmnhu4duIENOIELGsHUgQ2jDrW5oIFZp4buFbiBUaMO0bmcgLSBIw6AgxJDDtG5n!5e0!3m2!1svi!2s!4v1635313100919!5m2!1svi!2s"
                        style="border:0;" allowfullscreen="" loading="lazy"></iframe></div>
            </div>
        </div>
    </section>

    <!-- Bootstrap core JavaScript and Jquery -->
    <script src="../assets/vendor/bootstrap-4.6.0-dist/js/jquery-3.6.0.min.js"></script>
    <!-- <script src="/assets/vendor/bootstrap-4.6.0-dist/js/popper.min.js"></script> -->
    <script src="../assets/vendor/bootstrap-4.6.0-dist/js/bootstrap.bundle.min.js"></script>

    <!-- External js files -->
    <script src="../assets/js/main.js"></script>

    <!-- AOS initial -->
    <script src="../assets/vendor/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>