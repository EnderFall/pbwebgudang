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


<a href = "<?=base_url('home/tbm')?>" ><button class="btn btn-success"><i class="fas fa-plus-square"></i></button></a>

<table class="table table-bordered">
    <thead>
      <tr>
        <th width="3%">No</th>
        <th>ID Barang</th>
        <th width="5%">Jumlah</th>
        <th>Date</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>

      <?php
      $ms=1;
       foreach($masukbrg as $key => $value){
      ?>
      <tr>
        <td><?= $ms++ ?></td>
        <td><?= $value->id_brg ?></td>
         <td><?= $value->jumlah ?></td>
         <td><?= $value->tanggal ?></td>
         <td>
          
          
          <a href="<?= base_url('home/hapus_barangmasuk/' .$value->id_bm) ?>"><button class="btn btn-danger"><i class="fas fa-minus-square"></i></button></a>
        </td>


      </tr>


    <?php 
          }
       ?>

      
    </tbody>
  </table>