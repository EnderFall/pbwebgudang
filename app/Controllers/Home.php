<?php

namespace App\Controllers;
use App\Models\M_belajar;
use TCPDF;
use Dompdf\Dompdf;



class Home extends BaseController
{
	public function index()
	{
		echo view('header');
		echo view('pages-login');	
		echo view('footer');
	}

//Login
	public function aksi_login() 
	{
		$a=$this->request->getPost('usrnm');
		$b=$this->request->getPost('pwd');

		$Joyce= new M_belajar;
		$wendy = array (
			'username'=>$a,
			'password'=>$b,
		);

		$cek = $Joyce->edit('user',$wendy);
		
		if($cek != null){
			session()->set('id', $cek->id_user);
			session()->set('u', $cek->username);
			session()->set('level', $cek->level);

			return redirect()->to('dashboard');
		} else {
			return redirect()->to('index');
		}
	}
	public function logout(){
		session()->destroy();
		return redirect()->to('index');
	}
	public function dashboard()
	{
		if(session()->get('id')>0){
		echo view('header');
		echo view('menu');
		echo view('dashboard');
		echo view('footer');
		} else {
			return redirect()->to('index');
		}
	}


//Tabel Barang	
	public function barangfn()
	{
		if (session()->get('level')==1 || session()->get('level')==3){
		
		$Joyce= new M_belajar;
		$where= ('id_brg');
		$wendy['anjas'] = $Joyce->tampil('barang', $where);
		echo view('header');
		echo view('menu');
		echo view('Barang/barangfl', $wendy);
		echo view('footer');
	}else if (session()->get('id')>0){
		return redirect()->to('error');
	} else {
		return redirect()->to('index');
	}
	}

	public function laporanbarang()
	{
		if (session()->get('level')==1 || session()->get('level')==3){
		
		$Joyce= new M_belajar;
		$where = ('id_brg');
		$wendy['anjas'] = $Joyce->tampil('barang', $where);
		echo view('header');
		echo view('menu');
		echo view('Barang/laporanbarang', $wendy);
		echo view('footer');
	}else if (session()->get('id')>0){
		return redirect()->to('error');
	} else {
		return redirect()->to('index');
	}
	}

	public function printbarang()
	{
		if (session()->get('level')==1 || session()->get('level')==3){
		
		$Joyce= new M_belajar;
		$a=$this->request->getpost('tglmasuk');
		$b=$this->request->getpost('tglklr');
		
		$wendy['anjas'] = $Joyce->filter('brg_masuk', 'barang', 'brg_masuk.id_brg=barang.id_brg', 'tanggal >=','tanggal <=',$a,$b);
		
		echo view('Barang/printbarang', $wendy);
		
	}else if (session()->get('id')>0){
		return redirect()->to('error');
	} else {
		return redirect()->to('index');
	}
	}

	public function excelbrg()
	{
		if (session()->get('level')==1 || session()->get('level')==3){
		
		$Joyce= new M_belajar;
		$a=$this->request->getpost('tglmasuk');
		$b=$this->request->getpost('tglklr');
		
		$wendy['anjas'] = $Joyce->filter('brg_masuk', 'barang', 'brg_masuk.id_brg=barang.id_brg', 'tanggal >=','tanggal <=',$a,$b);
		
		echo view('Barang/excelbarang', $wendy);
		
	}else if (session()->get('id')>0){
		return redirect()->to('error');
	} else {
		return redirect()->to('index');
	}
	}

	

public function pdfbrg()
{
	if (session()->get('level')==1 || session()->get('level')==3){
	
	$Joyce= new M_belajar;
	$a=$this->request->getpost('tglmasuk');
	$b=$this->request->getpost('tglklr');
	
	$wendy['anjas'] = $Joyce->filter('brg_masuk', 'barang', 'brg_masuk.id_brg=barang.id_brg', 'tanggal >=','tanggal <=',$a,$b);
	
	echo view('Barang/pdfbarang', $wendy);
	
}else if (session()->get('id')>0){
	return redirect()->to('error');
} else {
	return redirect()->to('index');
}
}
public function pdfprint1() {
    if (session()->get('level') == 1 || session()->get('level') == 3) {
        $Joyce = new M_belajar();
        $a = $this->request->getPost('tglmasuk');
        $b = $this->request->getPost('tglklr');

        // Validate dates
        if (!$a || !$b) {
            return redirect()->back()->with('error', 'Tanggal tidak boleh kosong.');
        }

        // Fetch data using filter method
        $data = $Joyce->filter('brg_masuk', 'barang', 'brg_masuk.id_brg = barang.id_brg', 'tanggal >=', $a, 'tanggal <=', $b);

        // Clear output buffer to prevent interference
        ob_clean();

        // Set headers for PDF output
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="laporan_barang.pdf"');
        header('Cache-Control: private, max-age=0, must-revalidate');
        header('Pragma: public');

        // Initialize TCPDF and set metadata
        $pdf = new TCPDF();
        $pdf->SetCreator('TCPDF');
        $pdf->SetAuthor('Nama Anda');
        $pdf->SetTitle('Laporan Barang');
        $pdf->SetSubject('Laporan PDF');
        $pdf->SetKeywords('TCPDF, PDF, laporan, barang');

        // Add a page to the PDF
        $pdf->AddPage();

        // Build the HTML content for the PDF directly
        $html = '<h1>Laporan Barang</h1>';
        $html .= '<table border="1" cellpadding="5" cellspacing="0" style="width: 100%;">';
        $html .= '<thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th width="10%">Stok</th>
                    </tr>
                  </thead>';
        $html .= '<tbody>';

        // Populate table rows with data
        $no = 1;
        foreach ($data as $value) {
            $html .= '<tr>';
            $html .= '<td>' . $no++ . '</td>';
            $html .= '<td>' . htmlspecialchars($value->kode_brg) . '</td>';
            $html .= '<td>' . htmlspecialchars($value->nama_brg) . '</td>';
            $html .= '<td>' . htmlspecialchars($value->stok) . '</td>';
            $html .= '</tr>';
        }

        $html .= '</tbody></table>';

        // Render HTML to PDF
        $pdf->writeHTML($html, true, false, true, false, '');

        // Close and output PDF document
        $pdf->Output('laporan_barang.pdf', 'I'); // 'I' to view in browser, 'D' to download
        exit(); // End the script to prevent additional output

    } else if (session()->get('id') > 0) {
        return redirect()->to('error');
    } else {
        return redirect()->to('index');
     }
}

	public function inputbarang()
	{
		if(session()->get('id')>0){
		echo view('header');
		echo view('menu');
		echo view('Barang/inputbarang');
		echo view('footer');
	} else {
		return redirect()->to('index');
	}
}
public function hapus_barang($id){
	if (session()->get('level')==1 || session()->get('level')==3){
		$Joyce= new M_belajar;
		$wece= array('id_brg' => $id);
		$wendy['anjas'] = $Joyce->hapus('barang', $wece);
		return redirect()->to('barangfn');
	} else if (session()->get('id')>0){
		return redirect()->to('error');
	} else {
		return redirect()->to('index');
	}
	}

	public function edit_barang($id){
		if(session()->get('id')>0){
		$Joyce= new M_belajar;
		$wece= array('id_brg' => $id);
		$wendy['anjas'] = $Joyce->edit('barang', $wece);
		echo view('header');
		echo view('menu');
		echo view('Barang/editbrg', $wendy);
		echo view('footer');
	} else {
		return redirect()->to('index');
	}
	}

	public function update_barang(){
		if(session()->get('id')>0){
		$a=$this->request->getpost('nama');
		$b=$this->request->getpost('kodebrg');
		$c=$this->request->getpost('stokbrg');
		$id=$this->request->getpost('idbrg');
		$Joyce= new M_belajar;
		$wece= array('id_brg' => $id);
		$data = array(
			"nama_brg"=>$a,
			"kode_brg"=>$b,
			"stok"=>$c
		);
	
		$Joyce->updat('barang', $data,$wece);
		return redirect()->to('barangfn');
	} else {
		return redirect()->to('index');
	}
	 }
	 
	 
	 public function simpan_barang(){
		if(session()->get('id')>0){
	    
	    $b=$this->request->getpost('nama_brg');
	    $c=$this->request->getpost('kode_brg');
	    $d=$this->request->getpost('stok_brg');
		$data = array(
			
			"nama_brg"=>$b,
			"kode_brg"=>$c,
			"stok"=>$d
		);
		$Joyce= new M_belajar;
		$Joyce->input('barang', $data);
		return redirect()->to('barangfn');
	} else {
		return redirect()->to('index');
	}
	}


	// <--Barang Masuk-->

	public function barangmasuk()
	{
		if (session()->get('level')==1 || session()->get('level')==3){
		$brgmsk= new M_belajar;
		$where = ('id_bk');
		$brm['masukbrg'] = $brgmsk->join('brg_masuk', 'barang', 'brg_masuk.id_brg=barang.id_brg',);
		echo view('header');
		echo view('menu');
		echo view('BrgM/barangmasuk', $brm);
		echo view('footer');
		
		}else if (session()->get('id')>0){
			return redirect()->to('error');
	} else {
		return redirect()->to('index');
	}
	}

	public function laporanbarangmasuk()
	{
		if (session()->get('level')==1 || session()->get('level')==3){
		$brgmsk= new M_belajar;
		$brm['masukbrg'] = $brgmsk->join('brg_masuk', 'barang', 'brg_masuk.id_brg=barang.id_brg');
		echo view('header');
		echo view('menu');
		echo view('BrgM/laporanbrgm', $brm);
		echo view('footer');
		
		}else if (session()->get('id')>0){
			return redirect()->to('error');
	} else {
		return redirect()->to('index');
	}
	}

	public function tabelbarangmasuk()
	{
		if (session()->get('level')==1 || session()->get('level')==3){
		$brgmsk= new M_belajar;
		$brm['masukbrg'] = $brgmsk->join('brg_masuk', 'barang', 'brg_masuk.id_brg=barang.id_brg');
		
		
		echo view('BrgM/tabelbrgm', $brm);
		
		
		}else if (session()->get('id')>0){
			return redirect()->to('error');
	} else {
		return redirect()->to('index');
	}
	}
	public function hapus_barangmasuk($id){
		if(session()->get('id')>0){
		$Joyce= new M_belajar;
		$wece= array('id_bm' => $id);
		$wendy['anjas'] = $Joyce->hapus('brg_masuk', $wece);
		return redirect()->to('barangmasuk');
	} else {
		return redirect()->to('index');
	}
	}
	public function edit_barangmsk($id){
		if(session()->get('id')>0){
		$Joyce= new M_belajar;
		$wece= array('id_bm' => $id);
		$wendy['anjas'] = $Joyce->edit('brg_masuk', $wece);
		echo view('header');
		echo view('menu');
		echo view('BrgM/editbrgmsk', $wendy);
		echo view('footer');
	} else {
		return redirect()->to('index');
	}
	}

	public function update_barangmsk(){
		if(session()->get('id')>0){
		$a=$this->request->getpost('idbrg');
		$b=$this->request->getpost('jumlahbrg');
		$c=$this->request->getpost('tanggalmsk');
		$id=$this->request->getpost('idbm');
		$Joyce= new M_belajar;
		$wece= array('id_bm' => $id);
		$data = array(
			"id_brg"=>$a,
			"jumlah"=>$b,
			"tanggal"=>$c
		);
	
		$Joyce->updat('brg_masuk', $data,$wece);
		return redirect()->to('barangmasuk');
	} else {
		return redirect()->to('index');
	}
	 }
	public function tbm(){
		if(session()->get('id')>0){
		$Joyce= new M_belajar;
		$where = ('id_bm');
		$wendy['anjas'] = $Joyce->tampil('barang', $where);
		echo view('header');
		echo view('menu');
		echo view('BrgM/tbarangmasuk', $wendy);
		echo view('footer');
	} else {
		return redirect()->to('index');
	}

	 }
	 public function simpan_barang_m(){
		if(session()->get('id')>0){
	    $a=$this->request->getpost('id_brgm');
	    $b=$this->request->getpost('jumlahbrg');
	    $c=$this->request->getpost('tanggalmsk');
		$data = array(
			"id_brg"=>$a,
			"jumlah"=>$b,
			"tanggal"=>$c
		);
		$Joyce= new M_belajar;
		$Joyce->input('brg_masuk', $data);
		return redirect()->to('barangmasuk');
	} else {
		return redirect()->to('index');
	}
	}


	//Barang Keluar
	public function barangkeluar()
	{
		if(session()->get('id')>0){
		$brgklr= new M_belajar;
		$brk['keluarbrg'] = $brgklr->join('brg_keluar', 'barang', 'brg_keluar.id_brg=barang.id_brg');
		echo view('header');
		echo view('menu');
		echo view('BrgK/barangkeluar', $brk);
		echo view('footer');
	} else {
		return redirect()->to('index');
	}
	}

	public function hapus_barangkeluar($id){
		if(session()->get('id')>0){
		$Joyce= new M_belajar;
		$wece= array('id_bk' => $id);
		$wendy['anjas'] = $Joyce->hapus('brg_keluar', $wece);
		return redirect()->to('barangkeluar');
	} else {
		return redirect()->to('index');
	}
	}
	public function edit_barangklr($id){
		if(session()->get('id')>0){
		$Joyce= new M_belajar;
		$wece= array('id_bk' => $id);
		$wendy['anjas'] = $Joyce->edit('brg_keluar', $wece);
		echo view('header');
		echo view('menu');
		echo view('BrgK/editbrgklr', $wendy);
		echo view('footer');
	} else {
		return redirect()->to('index');
	}
	}

	public function update_barangklr(){
		if(session()->get('id')>0){
		$a=$this->request->getpost('nama');
		$b=$this->request->getpost('kodebrg');
		$c=$this->request->getpost('stokbrg');
		$id=$this->request->getpost('idbrg');
		$Joyce= new M_belajar;
		$wece= array('id_bk' => $id);
		$data = array(
			"nama_brg"=>$a,
			"kode_brg"=>$b,
			"stok"=>$c
		);
	
		$Joyce->updat('brg_keluar', $data,$wece);
		return redirect()->to('barangkeluar');
	} else {
		return redirect()->to('index');
	}
	 }
	 public function laporanbarangklr()
	 {
		 if (session()->get('level')==1 || session()->get('level')==3){
		 
		 $Joyce= new M_belajar;
		 $wendy['anjas'] = $Joyce->tampil('brg_keluar');
		 echo view('header');
		 echo view('menu');
		 echo view('BrgK/laporanbrgk', $wendy);
		 echo view('footer');
	 }else if (session()->get('id')>0){
		 return redirect()->to('error');
	 } else {
		 return redirect()->to('index');
	 }
	 }
	 public function printbarangk()
	{
		if (session()->get('level')==1 || session()->get('level')==3){
		
		$Joyce= new M_belajar;
		
		$wendy['anjas'] = $Joyce->tampil('brg_keluar');
		
		echo view('BrgK/printbrgklr', $wendy);
		
	}else if (session()->get('id')>0){
		return redirect()->to('error');
	} else {
		return redirect()->to('index');
	}
	}

	public function tbk(){
		if(session()->get('id')>0){
		$Joyce= new M_belajar;
		$where= ('id_bk');
		$wendy['anjas'] = $Joyce->tampil('barang', $where);
		echo view('header');
		echo view('menu');
		echo view('BrgK/tbarangkeluar', $wendy);
		echo view('footer');
	} else {
		return redirect()->to('index');
	}

	 }
	 public function simpan_barang_k(){
		if(session()->get('id')>0){
	    $a=$this->request->getpost('id_brgk');
	    $b=$this->request->getpost('jumlahbrg');
	    $c=$this->request->getpost('tanggalmsk');
		$data = array(
			"id_brg"=>$a,
			"jumlah"=>$b,
			"tanggal"=>$c
		);
		
		$Joyce= new M_belajar;
		$Joyce->input('brg_keluar', $data);
		return redirect()->to('barangkeluar');
	} else {
		return redirect()->to('index');
	}
	}

	 //Tabel User
	public function tabeldatauser()
	{
		if (session()->get('level')==1){
		$Joyce= new M_belajar;
		$where = ('id_user');
		$wendy['anjas'] = $Joyce->tampil('user', $where);
		echo view('header');
		echo view('menu');
		echo view('User/tabeluser', $wendy);
		echo view('footer');
		} else if (session()->get('id')>0){
			return redirect()->to('error');
	} else {
		return redirect()->to('index');
	}
	}

	public function inputuser()
	{
		if(session()->get('id')>0){
		echo view('header');
		echo view('menu');
		echo view('User/inputuser');
		echo view('footer');
	} else {
		return redirect()->to('index');
	}
	}

	public function hapus_user($id){
		if(session()->get('id')>0){
		$Joyce= new M_belajar;
		$wece= array('id_user' => $id);
		$wendy['anjas'] = $Joyce->hapus('user', $wece);
		return redirect()->to('tabeluser');
	} else {
		return redirect()->to('index');
	}
	}
	




	//Tabel Karyawan
	public function tabeldatakaryawan()
	{
		if(session()->get('level') ==1){
		$Joyce= new M_belajar;
		$by = ('id_kry');
		$wendy['anjas'] = $Joyce->tampil('karyawan', $by);
		echo view('header');
		echo view('menu');
		echo view('Karyawan/tabelkaryawan', $wendy);
		echo view('footer');
		} else if (session()->get('id')>0){
			return redirect()->to('error');
	} else {
		return redirect()->to('index');
	}
	}
	

	
	public function inputkaryawan()
	{
		if(session()->get('id')>0){
		echo view('header');
		echo view('menu');
		echo view('Karyawan/tambahkry');
		echo view('footer');
	} else {
		return redirect()->to('tabeldatakaryawan');
	}
}
	
public function simpan_karyawan(){
	if(session()->get('id')>0){
	$Joyce= new M_belajar;

	$a=$this->request->getpost('nama');
	$b=$this->request->getpost('email');
	$c=$this->request->getpost('pw');
	$d=$this->request->getpost('nik');
	$e=$this->request->getpost('jk');
	$f=$this->request->getpost('tmptlhr');
	$g=$this->request->getpost('dt');
	$h=$this->request->getpost('alamat');
	$i=$this->request->getpost('nohp');
	$j=$this->request->getpost('lvl');

	$data = array(
		"username"=>$b,
		"password"=>$c,
		"level"=>$j
	);
	$data2 = array (
			"nama"=>$a,
			"nik"=>$d,
			"tmpt_lahir"=>$f,
			"tgl_lahir"=>$g,
			"jenis_kelamin"=>$e,
			"alamat"=>$h,
			"no_telp"=>$i
	);
	$where=array(
		"username"=>$b,

	);
	
	$wendy=$Joyce->edit('user',$where);
	$Joyce->input('user', $data);
	$Joyce->input('karyawan', $data2, $where);
	return redirect()->to('tabeldatakaryawan');
} else {
	return redirect()->to('index');
}
}

	public function hapus_karyawan($id){
		if(session()->get('id')>0){
		$Joyce= new M_belajar;
		$wece= array('id_user' => $id);
		$wendy['anjas'] = $Joyce->hapus('karyawan', $wece);
		return redirect()->to('tabelkaryawan');
	} else {
		return redirect()->to('index');
	}
	}






	//Barang Rusak
	public function barangrusak()
	{
		if(session()->get('id')>0){
		echo view('header');
		echo view('menu');
		echo view('barangrusak');
		echo view('footer');
	} else {
		return redirect()->to('index');
	}
	}
	public function error (){
		echo view('error');
	}
	

	public function laporan()
	{
		if(session()->get('id')>0){
		echo view('header');
		echo view('menu');
		echo view('laporan');
		echo view('footer');
		} else {
			return redirect()->to('index');
		}
	}
	
	public function makan()
	{
		if (session()->get('level')==1){
		
		$Joyce= new M_belajar;
		$where= ('id_makan');
		$wendy['anjas'] = $Joyce->tampil('makan', $where);
		echo view('header');
		echo view('menu');
		echo view('makan', $wendy);
		echo view('footer');
	}else if (session()->get('id')>0){
		return redirect()->to('error');
	} else {
		return redirect()->to('index');
	}
	}
	
}
