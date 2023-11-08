<div class = "col-lg-3">
        <nav class="navbar navbar-expand-lg bg-body-tertiary rounded-3 border mt-2">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style= "width:250px">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav nav-pills flex-column justify-content-end flex-grow-1">
          <li class="nav-item">
            <a class="nav-link ps-2 <?php echo ((isset($_GET['x']) && $_GET['x']== 'dashboard') || !isset($_GET['x'])) ? 'active link-light' : 'link-dark' ; ?> " aria-current="page" href="dashboard"> <i class="bi bi-house-heart"></i> Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x']== 'menu') ? 'active link-light' : 'link-dark' ; ?>" href="menu"> <i class="bi bi-bag-heart"></i> Daftar Menu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x']== 'transaksi') ? 'active link-light' : 'link-dark' ; ?>" href="transaksi"> <i class="bi bi-bag-heart"></i> Transaksi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x']== 'customer') ? 'active link-light' : 'link-dark' ; ?>" href="customer"> <i class="bi bi-person-heart"></i> Customer</a>
          </li>
          <?php
            if ($hasil['role']=='admin') {
            ?>
          <li class="nav-item">
            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x']== 'user') ? 'active link-light' : 'link-dark' ; ?>" href="user"> <i class="bi bi-postcard-heart"></i> User</a>
          </li>
          <li class="nav-item">
            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x']== 'report') ? 'active link-light' : 'link-dark' ; ?>" href="report"> <i class="bi bi-clipboard-heart"></i> Report</a>
          </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>
</nav>
        </div>