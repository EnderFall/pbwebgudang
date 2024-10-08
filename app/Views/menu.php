<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
  <ul class="navbar-nav">
    <a class="navbar-brand">
      <img src="<?= base_url('image/useravatar.jpeg'); ?>" alt="Avatar Logo" style="width:30px;" class="rounded-pill" back> 
    </a>
  <li class="nav-item">
    <a class="nav-link active" href="<?= base_url('home/dashboard'); ?>">Home</a>
  </li>
  <?php
  if(session()->get('level')==1 || session()->get('level')==3 || session()->get('level')==4 || session()->get('level')==5){


  ?>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Tabel Data</a>
    <ul class="dropdown-menu">
      <?php
      if(session()->get('level')==1 || session()->get('level')==3 ){
      ?>
      <li><a class="dropdown-item" href="<?= base_url('home/barangfn'); ?>">Barang</a></li>
      

      <?php
      }
      if(session()->get('level')==1 || session()->get('level')==3 || session()->get('level')==4){
      ?>
      <li><a class="dropdown-item" href="<?= base_url('home/barangmasuk'); ?>">Barang Masuk</a></li>
      <?php
      }
      if(session()->get('level')==1 || session()->get('level')==3 || session()->get('level')==5){
      ?>
      <li><a class="dropdown-item" href="<?= base_url('home/barangkeluar'); ?>">Barang Keluar</a></li>
      <?php
      }
      if(session()->get('level')==1){
      ?>
      <li><a class="dropdown-item" href="<?= base_url('home/tabeldatauser'); ?>">User</a></li>
      <?php
      }
      if(session()->get('level')==1){
      ?>
      <li><a class="dropdown-item" href="<?= base_url('home/tabeldatakaryawan'); ?>">Karyawan</a></li>
      <?php }?>
    </ul>
  </li>
  <?php } ?>
  
  <li class="nav-item">
  <a class="nav-link active" href="<?= base_url('home/logout'); ?>">Logout</a>
</li>

  </ul>
</div>
</nav>