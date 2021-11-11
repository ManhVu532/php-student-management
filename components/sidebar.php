<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
$avatar = $firstName = '';
if($user){
  $avatar = $user['avatar'];
  $firstName = $user['firstName'];
}
if(!isset($path)) $path = 'dashboard';
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= HOST . "pages/admin/index.php" ?>" class="brand-link">
    <img class="bg-white brand-image img-circle elevation-3" src="<?= '' . HOST . 'assets/images/logo-xl.png' ?>" alt="AdminLTE Logo">
    <span class="brand-text font-weight-light">Admin PTIT</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= $avatar ? HOST . $avatar : HOST . 'assets/images/admin.png' ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?= empty($firstName) ? 'admin' : $firstName ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?=HOST."pages/admin/index.php"?>" class="nav-link <?=$path == 'dashboard' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Bảng điều khiển
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?=HOST."pages/admin/students/index.php"?>" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Sinh viên
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?=HOST."pages/admin/subjects/index.php"?>" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Môn học
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href=""<?=HOST."pages/admin/scores/index.php"?>"" class="nav-link">
            <i class="nav-icon fas fa-graduation-cap"></i>
            <p>
              Điểm
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?=HOST."pages/admin/schedules/index.php"?>" class="nav-link">
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