<button class="btn btn-success">+Tambah</button>

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
       foreach($keluarbrg as $key => $value){
      ?>
      <tr>
        <td><?= $ms++ ?></td>
        <td><?= $value->id_brg ?></td>
         <td><?= $value->jumlah ?></td>
         <td><?= $value->tanggal ?></td>
         <td>
          <a href="<?= base_url('home/edit_barangklr/' .$value->id_bk) ?>"><button class="btn btn-warning">Edit</button></a>
          
          <a href="<?= base_url('home/hapus_barangkeluar/' .$value->id_bk) ?>"><button class="btn btn-danger">Hapus</button></a>
        </td>


      </tr>


    <?php 
          }
       ?>

      
    </tbody>
  </table>