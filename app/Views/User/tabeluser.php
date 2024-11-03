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

<button class="btn btn-success">+Tambah</button>

<table class="table table-bordered">
    <thead>
      <tr>
        <th width="3%">No</th>
        <th>Username</th>
        <th>Password</th>
        <th width="5%">Level</th>
        
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>

      <?php
      $ms=1;
       foreach($anjas as $key => $value){
      ?>
      <tr>
        <td><?= $ms++ ?></td>
         <td><?= $value->username ?></td>
         <td><?= $value->password ?></td>
         <td><?= $value->level ?></td>

         
         <td>
          <a href="<?= base_url('home/edit_barang/' .$value->id_user) ?>"><button class="btn btn-warning">Edit</button></a>
          
          <a href="<?= base_url('home/hapus_user/' .$value->id_user) ?>"><button class="btn btn-danger">Hapus</button></a>
        </td>


      </tr>


    <?php 
          }
       ?>

      
    </tbody>
  </table>