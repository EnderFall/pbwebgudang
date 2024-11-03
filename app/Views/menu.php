<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link collapsed" href="<?= base_url('home/dashboard') ?>">
        <i class="bi bi-house" style="font-size: 25px;"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide" style="font-size: 25px;"></i><span>Data Master</span><i
          class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="<?= base_url('home/barangfn') ?>">
            <i class="bi bi-cart-fill" style="font-size: 15px;"></i><span>Barang</span>
          </a>
        </li>
        <li>
          <a href="<?= base_url('home/tabeldatauser') ?>">
            <i class="ri-creative-commons-by-fill" style="font-size: 15px;"></i><span>User</span>
          </a>
        </li>
        <li>
          <a href="<?= base_url('home/tabeldatakaryawan') ?>">
            <i class="ri-group-fill" style="font-size: 15px;"></i><span>Karyawan</span>
          </a>
        </li>
        <li>
          <a href="<?= base_url('home/barangmasuk') ?>">
            <i class="bx bxs-shopping-bags" style="font-size: 15px;"></i><span>Barang Masuk</span>
          </a>
        </li>
        <li>
          <a href="<?= base_url('home/barangkeluar') ?>">
            <i class="ri-luggage-cart-fill" style="font-size: 15px;"></i><span>Barang Keluar</span>
          </a>
        </li>


      </ul>
    </li><!-- End Data Master Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#transaksi-nav" data-bs-toggle="collapse" href="#">
        <i class="ri-coins-fill" style="font-size: 25px;"></i><span>Transaksi</span><i
          class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="transaksi-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">


      </ul>
    </li><!-- End Laporan Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text" style="font-size: 25px;"></i><span>Laporan</span><i
          class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="<?= base_url('home/laporanbarang') ?>">
            <i class="bi bi-cart-fill" style="font-size: 15px;"></i><span>Barang</span>
          </a>
        </li>
        <li>
          <a href="<?= base_url('home/laporanbarangmasuk') ?>">
            <i class="bx bxs-shopping-bags" style="font-size: 15px;"></i><span>Barang Masuk</span>
          </a>
        </li>
        <li>
          <a href="<?= base_url('home/laporanbarangklr') ?>">
            <i class="ri-luggage-cart-fill" style="font-size: 15px;"></i><span>Barang Keluar</span>
          </a>
        </li>

      </ul>
    </li><!-- End Laporan Nav -->




    <li class="nav-heading">Pages</li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="users-profile.html">
        <i class="bi bi-person"></i>
        <span>Profile</span>
      </a>
    </li><!-- End Profile Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="pages-contact.html">
        <i class="bi bi-envelope"></i>
        <span>Contact</span>
      </a>
    </li><!-- End Contact Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="pages-register.html">
        <i class="bi bi-card-list"></i>
        <span>Register</span>
      </a>
    </li><!-- End Register Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="pages-login.html">
        <i class="bi bi-box-arrow-in-right"></i>
        <span>Login</span>
      </a>


  </ul>

</aside>

<main id="main" class="main">