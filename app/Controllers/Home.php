<?php

namespace App\Controllers;
use App\Models\M_belajar;


class Home extends BaseController
{
	public function index()
	{
		echo view('header');
		echo view('login');	
		echo view('footer');
	}
	public function aksi_login() 
	{
		$a=$this->request->getPost('nama');
		$b=$this->request->getPost('pass');

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
	public function barangfn()
	{
		if (session()->get('level')==1 || session()->get('level')==3){
		
		$Joyce= new M_belajar;
		$wendy['anjas'] = $Joyce->tampil('barang');
		echo view('header');
		echo view('menu');
		echo view('barangfl', $wendy);
		echo view('footer');
	}else if (session()->get('id')>0){
		return redirect()->to('error');
	} else {
		return redirect()->to('index');
	}
	}

	public function barangmasuk()
	{
		if (session()->get('level')==1 || session()->get('level')==3){
		$brgmsk= new M_belajar;
		$brm['masukbrg'] = $brgmsk->join('brg_masuk', 'barang', 'brg_masuk.id_brg=barang.id_brg');
		echo view('header');
		echo view('menu');
		echo view('barangmasuk', $brm);
		echo view('footer');
		
		}else if (session()->get('id')>0){
			return redirect()->to('error');
	} else {
		return redirect()->to('index');
	}
	
	}
	public function tabeldatauser()
	{
		if (session()->get('level')==1){
		$Joyce= new M_belajar;
		$wendy['anjas'] = $Joyce->tampil('user');
		echo view('header');
		echo view('menu');
		echo view('tabeluser', $wendy);
		echo view('footer');
		} else if (session()->get('id')>0){
			return redirect()->to('error');
	} else {
		return redirect()->to('index');
	}
	}
	public function tabeldatakaryawan()
	{
		if(session()->get('level') ==1){
		$Joyce= new M_belajar;
		$wendy['anjas'] = $Joyce->tampil('karyawan');
		echo view('header');
		echo view('menu');
		echo view('tabelkaryawan', $wendy);
		echo view('footer');
		} else if (session()->get('id')>0){
			return redirect()->to('error');
	} else {
		return redirect()->to('index');
	}
	}
	public function barangkeluar()
	{
		if(session()->get('id')>0){
		$brgklr= new M_belajar;
		$brk['keluarbrg'] = $brgklr->tampil('brg_keluar');
		echo view('header');
		echo view('menu');
		echo view('barangkeluar', $brk);
		echo view('footer');
	} else {
		return redirect()->to('index');
	}
	}

	public function inputuser()
	{
		if(session()->get('id')>0){
		echo view('header');
		echo view('menu');
		echo view('inputuser');
		echo view('footer');
	} else {
		return redirect()->to('index');
	}
	}
	public function inputbarang()
	{
		if(session()->get('id')>0){
		echo view('header');
		echo view('menu');
		echo view('inputbarang');
		echo view('footer');
	} else {
		return redirect()->to('index');
	}
	
	}
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

	public function hapus_barang($id){
		if(session()->get('id')>0){
		$Joyce= new M_belajar;
		$wece= array('id_brg' => $id);
		$wendy['anjas'] = $Joyce->hapus('barang', $wece);
		return redirect()->to('barangfn');
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


	public function edit_barang($id){
		if(session()->get('id')>0){
		$Joyce= new M_belajar;
		$wece= array('id_brg' => $id);
		$wendy['anjas'] = $Joyce->edit('barang', $wece);
		echo view('header');
		echo view('menu');
		echo view('editbrg', $wendy);
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
	    $a=$this->request->getpost('id_brg');
	    $b=$this->request->getpost('nama_brg');
	    $c=$this->request->getpost('kode_brg');
	    $d=$this->request->getpost('stok_brg');
		$data = array(
			"id_brg"=>$a,
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
	
	public function edit_barangklr($id){
		if(session()->get('id')>0){
		$Joyce= new M_belajar;
		$wece= array('id_bk' => $id);
		$wendy['anjas'] = $Joyce->edit('brg_keluar', $wece);
		echo view('header');
		echo view('menu');
		echo view('editbrgklr', $wendy);
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

	 public function edit_barangmsk($id){
		if(session()->get('id')>0){
		$Joyce= new M_belajar;
		$wece= array('id_bm' => $id);
		$wendy['anjas'] = $Joyce->edit('brg_masuk', $wece);
		echo view('header');
		echo view('menu');
		echo view('editbrgmsk', $wendy);
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
		$wendy['anjas'] = $Joyce->tampil('barang');
		echo view('header');
		echo view('menu');
		echo view('tbarangmasuk', $wendy);
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
	
	
}
