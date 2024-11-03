<h1>Cetak Laporan Barang</h1>


<h3>Print Barang</h3>
<form action="<?= base_url('home/printbarang') ?>" method="POST" target="_blank">
<div class="container" >
	<div class="row">
		<div class= "col">
		<label>Tanggal Masuk</label>
		<input type="date" class="form-control" name="tglmasuk" required>
</div>

    <div class= "col">
		<label>Tanggal Akhir</label>
		<input type="date" class="form-control" name="tglklr" required>
	</div>
	
	<div class= "col">

    <a href= "<?= base_url('home/printbarang') ?>"><button type="submit" class= "btn btn-primary" target="_blank"><i class="fas fa-save"></i></button></a>
   		</div>
	</div>
</div>
</form>

<h3>PDF Barang</h3>
<form action="<?= base_url('home/pdfprint1') ?>" method="POST" target="_blank">
    <div class="container">
        <div class="row">
            <div class="col">
                <label for="tglmasuk">Tanggal Masuk</label>
                <input type="date" class="form-control" id="tglmasuk" name="tglmasuk" required>
            </div>

            <div class="col">
                <label for="tglklr">Tanggal Akhir</label>
                <input type="date" class="form-control" id="tglklr" name="tglklr" required>
            </div>

            <div class="col">
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-file-pdf"></i>
                </button>
            </div>
        </div>
    </div>
</form>



<h3>Excel Barang</h3>
	<form action="<?= base_url('home/excelbrg') ?>" method="POST" target="_blank">
<div class="container" >
	
	<div class="row">
		<div  class= "col">
		<label for="jumlah_brg">Tanggal Masuk</label>
		<input type="date" class="form-control" placeholder="Jumlah Barang Masuk" name="tglmasuk" required>
	</div>

    <div  class= "col">
		<label for="jumlah_brg">Tanggal Akhir</label>
		<input type="date" class="form-control" placeholder="Jumlah Barang Masuk" name="tglklr" required>
	</div>
	<div  class= "col">
    <a href= "<?= base_url('home/excelbrg') ?>"><button type="submit" class= "btn btn-success" target= "_blank"><i class="fas fa-file-excel"></i></button></a>
</div>
</div>
</div>
</form>