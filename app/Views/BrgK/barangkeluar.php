<style>
input[name="search"] {
  width: 130px;
  -webkit-transition: width 0.4s ease-in-out;
  transition: width 0.4s ease-in-out;
}

/* When the input field gets focus, change its width to 100% */
input[name="search"]:focus {
  width: 100%;
}
</style>
<div class="container" flex="left">
  <button class="btn btn-primary"><i class="fas fa-search"></i><button>
<input type="text" class="form-control" name="search" placeholder="Pencarian">
</div>


<a href = "<?=base_url('home/tbk')?>" ><button class="btn btn-success">+Tambah</button></a>

<table class="table table-bordered">
    <thead>
      <tr>
        <th width="3%">No</th>
        <th>Nama Barang</th>
        <th width="5%">Jumlah</th>
        <th>Date</th>
        <?php
          if (session()->get('level')==1|| session()->get('level')==3){
            ?>
        <th>Aksi</th>
        <?php } ?>
      </tr>
    </thead>
    <tbody>

      <?php
      $ms=1;
       foreach($keluarbrg as $key => $value){
      ?>
      <tr>
        <td><?= $ms++ ?></td>
        <td><?= $value->nama_brg ?></td>
         <td><?= $value->jumlah ?></td>
         <td><?= $value->tanggal ?></td>
         
          <?php
          if (session()->get('level')==1|| session()->get('level')==3){
            ?>
            <td>
          <a href="<?= base_url('home/hapus_barangkeluar/' .$value->id_bk) ?>"><button class="btn btn-danger"><i class="fas fa-minus-square"></button></a>
         </td> 
         <?php } ?>
        


      </tr>


    <?php 
          }
       ?>

      
    </tbody>
  </table>