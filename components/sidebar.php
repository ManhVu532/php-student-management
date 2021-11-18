<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
$avatar = $firstName = '';
if ($user) {
  $avatar = $user['avatar'];
  $firstName = $user['firstName'];
}
if (!isset($pathSidebar)) $pathSidebar = 'dashboard';
?>

<style>
  .user-panel.active {
    background-color: #007bff;
    color: #fff;
    border-radius: 8px;
    box-shadow: 1px 2px 2px rgba(0, 0, 0, 0.2);
  }
</style>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 position-fixed">
  <!-- Brand Logo -->
  <a href="<?= HOST . "pages/admin/index.php" ?>" class="brand-link">
    <img class="bg-white brand-image img-circle elevation-3" src="<?= '' . HOST . 'assets/images/logo-xl.png' ?>" alt="AdminLTE Logo">
    <span class="brand-text font-weight-light">Admin PTIT</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <a href="<?= HOST . "pages/admin/profile/index.php" ?>">
      <div class="user-panel mt-3 py-2 mb-3 d-flex <?= $pathSidebar == 'profile-admin' ? 'active' : '' ?>">
        <div class="bg-light image d-flex justify-content-center ml-3 align-items-center p-0 img-circle elevation-2 overflow-hidden" style="max-width: 32px; min-width:32px; height: 32px;">
          <img src="<?= $avatar ? HOST . $avatar : HOST . 'assets/images/admin.png' ?>" style="width: auto" class="h-100" alt="User Image">
        </div>
        <div class="info d-flex align-items-center">
          <a href="<?= HOST . "pages/admin/profile/index.php" ?>" class="d-block"><?= empty($firstName) ? 'admin' : $firstName ?></a>
        </div>
      </div>
    </a>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?= HOST . "pages/admin/index.php" ?>" class="nav-link <?= $pathSidebar == 'dashboard' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Bảng điều khiển
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= HOST . "pages/admin/students/index.php" ?>" class="nav-link <?= $pathSidebar == 'students' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Sinh viên
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= HOST . "pages/admin/subjects/index.php" ?>" class="nav-link <?= str_contains($pathSidebar, 'subjects') ? "active" : "" ?>">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Môn học
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= HOST . "pages/admin/subjects/semesters/index.php" ?>" class="nav-link <?= str_contains($pathSidebar, '-semester') ? "active" : "" ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Môn học theo học kỳ</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= HOST . "pages/admin/subjects/educate/index.php" ?>" class="nav-link <?= str_contains($pathSidebar, 'educate') ? "active" : "" ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Môn học đào tạo</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="<?= HOST . "pages/admin/semesters/index.php" ?>" class="nav-link <?= str_contains($pathSidebar, 'semesters') ? "active" : "" ?>">
            <i class="fas fa-university nav-icon"></i>
            <p>
              Học kỳ
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= HOST . "pages/admin/scores/index.php" ?>" class="nav-link <?= str_contains($pathSidebar, 'scores') ? "active" : "" ?>">
            <i class="nav-icon fas fa-graduation-cap"></i>
            <p>
              Điểm
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= HOST . "pages/admin/schedules/index.php" ?>" class="nav-link <?= str_contains($pathSidebar, 'schedules') ? "active" : "" ?>">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Lịch thi
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= HOST . 'pages/auth/logout.php' ?>" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              Đăng xuất
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>