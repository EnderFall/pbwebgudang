<main id="main" class="main">

  <div class="pagetitle">
    <h1>Data Tables</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active">Data</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Datatables</h5>
            <p>Add lightweight datatables to your project with using the <a
                href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library.
              Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p>




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


            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal">
              <i class="fas fa-plus-square"></i>
            </button>

            <!-- The Modal -->
            <div class="modal fade" id="myModal">
              <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Tambah Data</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                    <form action="<?= base_url('home/simpan_barang') ?>" method="POST">

                      <tr>
                        <td>Nama Barang</td>
                        <td><input type="text" class="form-control" placeholder="Nama Barang" id="nama_brg"
                            name="nama_brg" required></td>
                      </tr>
                      <tr>
                        <td>Kode Barang</td>
                        <td><input type="text" class="form-control" placeholder="Kode Barang" id="kode_brg"
                            name="kode_brg" required></td>
                      </tr>
                      <tr>
                        <td>Stok Barang</td>
                        <td><input type="number" class="form-control" placeholder="Stok Barang" id="stok_brg"
                            name="stok_brg" required></td>
                      </tr>



                      </table>
                  </div>

                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th width="3%">No</th>
                  <th>ID Makan</th>
                  
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>

                <?php
                $ms = 1;
                foreach ($anjas as $key => $value) {
                  ?>
                  <tr>
                    <td><?= $ms++ ?></td>
                    <td><?= $value->id_makan ?></td>
                    
                    <td>
                      <a href="<?= base_url('home/edit_barang/' . $value->id_brg) ?>"><button class="btn btn-warning"><i
                            class="fas fa-edit"></i></button></a>

                      <a href="<?= base_url('home/hapus_barang/' . $value->id_brg) ?>"><button class="btn btn-danger"><i
                            class="fas fa-minus-square"></i></button></a>
                    </td>


                  </tr>


                <?php
                }
                ?>


              </tbody>
            </table>

          </div>
        </div>

      </div>
    </div>
  </section>

</main