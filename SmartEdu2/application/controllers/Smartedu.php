<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Smartedu extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		parent::__construct();
		$this->load->library('session');
		 $this->load->helper(array('form', 'url'));
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('smartedu/index');
	}
	public function index()
	{
		$this->load->view('index.php');
	}
	public function buku(){
		$this->load->view('buku.php');
	}
	public function login_page(){
		$result['notif'] = 0;
		$this->load->view('login.php',$result);
	}
	public function user_auth(){
		extract($_POST);
		$this->load->model('User');
		$user = $this->User->select_user($_POST['username']);

		if($user==null){
			$result['notif'] = 1;
				$this->load->view('login',$result);
		}
		else{
			if($user['username']==$_POST['username']&&$user['password']==md5($_POST['password'])){
				$this->session->set_userdata($user);
				$this->load->view('dashboard',$user);
			}
			else if($user['username']!=$_POST['username']||$user['password']!=md5($_POST['password'])){
				$result['notif'] = 2;
				$this->load->view('login',$result);
			}
		}
	}
	public function register_page(){
		$result['notif'] = null;
		$this->load->view('register.php',$result);
	}
	public function register_auth(){
		extract($_POST);
		 $user['email']  = $_POST['email'];
		 $user['username'] = $_POST['username'];
		 $user['status'] = "SI";
		 $user['password'] = md5($_POST['password']);
		 $this->load->model('User');
		 $res = $this->User->register($user);
		 if($res){
		 	$result['notif'] = true;
		 	$this->load->view('register',$result);
		 }
		 else{
		 	$result['notif'] = false;
		 	$this->load->view('register',$result);
		 }
	}
	public function dashboard_page(){
		$user['status'] = $this->session->userdata('status');
		$this->load->view('dashboard.php',$user);
	}
	public function buku_page(){
		$user = $this->session->userdata('username');
		$this->load->model('Buku');
		$row = $this->Buku->getRowBuku($user);
		$config['base_url'] = 'http://localhost/SmartEdu2/index.php/smartedu/buku_page';
		$config['total_rows'] = $row;
		$config['per_page'] = 3;
		$start = $this->uri->segment(3);
		$this->pagination->initialize($config);
		
		$buku = $this->Buku->getBuku($config['per_page'],$start,$user);
		$data['buku'] = $buku;
		$this->load->view('caribuku',$data);
	}
	public function carikelas_page(){
		$user = $this->session->userdata('username');
		$this->load->model('Kelas');
		$row = $this->Kelas->getRowKelas($user);
		$config['base_url'] = 'http://localhost/SmartEdu2/index.php/smartedu/carikelaas_page';
		$config['total_rows'] = $row;
		$config['per_page'] = 3;
		$start = $this->uri->segment(3);
		$this->pagination->initialize($config);
		
		$kelas = $this->Kelas->getKelas($config['per_page'],$start,$user);
		$data['kelas'] = $kelas;
		$this->load->view('carikelas',$data);
	}
	public function uploadbuku_page(){
		$this->load->view('uploadbuku',array('error' => ' ' ));
	}
	public function uploadbuku_auth(){
		extract($_POST);
		$this->load->model('Buku');
		$user = $this->session->userdata('username');
		$config['upload_path'] = './assets/img-buku/'.$user.'/';
    	$config['allowed_types'] = 'jpg|jpeg|gif|png';
    	$config['max_size'] = '204800';
		if(!is_dir($config['upload_path'])){
			mkdir('./assets/img-buku/'.$user.'/',077,TRUE);
		}
		$buku['isbn'] = $_POST['isbn'];
		$buku['judul_iklan'] = $_POST['judul_iklan'];
		$buku['judul_buku'] = $_POST['judul_buku'];
		$buku['penerbit'] = $_POST['penerbit'];
		$buku['pemilik_buku'] = $user;
		$filename = $_FILES["foto_buku"]["name"];
		$buku['foto_buku'] = json_encode(array(
			'foto_buku[0]' => $filename
		));
		$detail_buku['isbn'] = $_POST['isbn'];
		$detail_buku['sinopsis'] = $_POST['sinopsis'];
		$detail_buku['kategori'] = $_POST['kategori'];
		$this->load->library('upload', $config);
		if( !$this->upload->do_upload('foto_buku')){
			$error = $this->upload->display_errors(); 
			$this->session->set_flashdata('error_upload','gagal upload!!');
			redirect('smartedu/uploadbuku_page');
			}
		else{
			$success = $this->Buku->uploadbuku($buku,$detail_buku);
			if($success){
				$this->session->set_flashdata('success_upload','gagal upload!!');
				redirect('smartedu/uploadbuku_page');
			}
			else{
				$this->session->set_flashdata('error_upload','gagal upload!!');
				redirect('smartedu/uploadbuku_page');
			}
		}
	}
	public function peminjaman_auth(){
		extract($_POST);
		$peminjaman_buku['username_peminjam'] = $user_peminjam = $this->session->userdata('username');
		$peminjaman_buku['username_pemilik'] = $_POST['username_pemilik'];
		$peminjaman_buku['isbn'] = $_POST['isbn'];
		$peminjaman_buku['tanggal_kembali'] = $_POST['tanggal_kembali'];
		$peminjaman_buku['tanggal_pinjam'] = date("Y-m-d");
		$peminjaman_buku['metode_peminjaman'] = $_POST['metode_peminjaman'];
		$this->load->model('Buku');
		$result = $this->Buku->insert_peminjaman($peminjaman_buku);
		if($result){
			$res = $this->Buku->update_buku($peminjaman_buku['isbn']);
			if($res){
				$data['metode'] = $peminjaman_buku['metode_peminjaman'];
				$data['success'] = true;
				$this->load->view('setelahpeminjaman',$data);
			}
			else{
				$data['metode'] = null;
				$data['success'] = true;
				$this->load->view('setelahpeminjaman',$data);
			}
		}
		else{
			$data['metode'] = null;
			$data['success'] = true;
			$this->load->view('setelahpeminjaman',$data);
		}

	}
	public function editprofile_page(){
		$user = $this->session->userdata('username');
		$this->load->model('User');
		$this->load->model('Wilayah');
		$result['data']  = $this->User->select_profile($user);
		$result['provinsi'] = $this->Wilayah->ambil_provinsi();
		if($result==null){
			echo "null data";
		}
		else{
			$this->load->view("editprofile",$result);
		}
	}
	public function profile_page(){
		$user = $this->session->userdata('username');
		$this->load->model('User');
		$this->load->model('Wilayah');
		$data = $this->User->select_profile($user);
		$alamat= $this->Wilayah->get_alamat($data['provinsi_id'],$data['kabupaten_id'],$data['kecamatan_id'],$data['kelurahan_id']);
		$result['data'] = $data;
		$result['provinsi_nama'] = $alamat['provinsi'];
		$result['kabupaten_nama'] = $alamat['kabupaten'];
		$result['kecamatan_nama'] = $alamat['kecamatan'];
		$result['kelurahan_nama'] = $alamat['kelurahan'];
		if($result==null){
			echo "null data";
		}
		else{
			$this->load->view('profile',$result);
		}
	}
	// dijalankan saat provinsi di klik
	public function pilih_kabupaten(){
		$this->load->model('Wilayah');
		$data['kabupaten']=$this->Wilayah->ambil_kabupaten($this->uri->segment(3));
		$this->load->view('v_drop_down_kabupaten',$data);
	}

	// dijalankan saat kabupaten di klik
	public function pilih_kecamatan(){
		$this->load->model('Wilayah');
		$data['kecamatan']=$this->Wilayah->ambil_kecamatan($this->uri->segment(3));
		$this->load->view('v_drop_down_kecamatan',$data);
	}
	
	// dijalankan saat kecamatan di klik
	public function pilih_kelurahan(){
		$this->load->model('Wilayah');
		$data['kelurahan']=$this->Wilayah->ambil_kelurahan($this->uri->segment(3));
		$this->load->view('v_drop_down_kelurahan',$data);
	}
	public function editprofile_auth(){
		extract($_POST);
		$detail_user['username'] = $user = $this->session->userdata('username');
		$detail_user['nama_lengkap'] = $_POST['nama_lengkap'];
		$detail_user['foto_profil'] = $_POST['foto_profil'];
		$detail_user['jenis_kelamin'] = $_POST['jenis_kelamin'];
		$detail_user['provinsi_id'] = $_POST['provinsi_id'];
		$detail_user['kabupaten_id'] = $_POST['kabupaten_id'];
		$detail_user['kecamatan_id'] = $_POST['kecamatan_id'];
		$detail_user['kelurahan_id'] = $_POST['kelurahan_id'];

		$this->load->model('User');
		$result = $this->User->insert_detail_user($detail_user);
		if($result){
			$this->session->set_flashdata('success_upload','gagal upload!!');
			redirect('smartedu/profile_page1');
		}
		else{
			$this->session->set_flashdata('error_upload','gagal upload!!');
			redirect('smartedu/profile_page');
		}
	}
	public function jadimentor_page(){
		$this->load->view('jadimentor');
	}
	public function jadimentor_auth(){
		extract($_POST);
		$user = $this->session->userdata('username');
		$config['upload_path'] = './assets/pendaftaran_mentor/'.$user.'/';
    	$config['allowed_types'] = 'mp4|MKV|webm|jpg|jpeg|png|pdf';
    	$config['max_size'] = '10240000';
		if(!is_dir($config['upload_path'])){
			mkdir('./assets/pendaftaran_mentor/'.$user.'/',077,TRUE);
		}
		$mentor['username'] = $user;
		$mentor['mata_kuliah'] = $_POST['mata_kuliah'];
		$mentor['validasi_pendaftaran'] = "belum";
		$mentor['no_rekening'] = $_POST['no_rekening'];
		$mentor['bank'] = $_POST['bank'];
		$file_transkrip = $_FILES["transkrip_nilai"]["name"];
		$mentor['transkrip_nilai'] = $file_transkrip;
		$file_video = $_FILES['video_singkat']['name'];
		$mentor['video_singkat'] = $file_video;
		$this->load->model('User');
		$this->load->library('upload', $config);
		$res = $this->User->daftar_mentor($mentor);
		if($res){
			if(!$this->upload->do_upload('video_singkat')||!$this->upload->do_upload('transkrip_nilai')){
				$error = $this->upload->display_errors(); 
				$this->session->set_flashdata('success_upload','gagal upload!!');
				redirect('smartedu/jadimentor_page');

			}
			else{
				$this->session->set_flashdata('success_upload','gagal upload!!');
				redirect('smartedu/jadimentor_page');
			}
		}
		else{
			$this->session->set_flashdata('success_upload','gagal upload!!');
			redirect('smartedu/jadimentor_page');
		}
	}
	public function live_search(){
		
		$search_data = $_POST['search-term'];
		$this->load->model('Buku');
        $query = $this->Buku->get_live_books($search_data);

        foreach ($query as $row):
            echo "<li><a href='#'>" . $row->judul_buku . "</a></li>";

        endforeach;
	}
	public function bukakelas_page(){
		$this->load->model('Wilayah');
		$result['provinsi'] = $this->Wilayah->ambil_provinsi();
		$this->load->view('bukakelas',$result);
	}
	public function bukakelas_auth(){
		extract($_POST);
		$user = $this->session->userdata('username');
		$lokasi['kabupaten_id'] = $_POST['kabupaten_id'];
		$lokasi['provinsi_id'] = $_POST['provinsi_id'];
		$lokasi['kecamatan_id'] = $_POST['kecamatan_id'];
		$lokasi['detail_lokasi'] = $_POST['detail_lokasi'];
		for($x=0; $x<(int)$_POST['jumlah_hari']; $x++){
			$hari_belajar['hari ke-'.$x] = $_POST['hari_belajar-'.$x];
			$hari_belajar['jam_mulai ke-'.$x] = $_POST['jam_mulai-'.$x];
			$hari_belajar['jam_selesai ke-'.$x] = $_POST['jam_selesai-'.$x];
		}
		$kelas['username_mentor'] = $user;
		$kelas['hari_belajar'] = json_encode($hari_belajar);
		$kelas['nama_kelas'] = $_POST['nama_kelas'];
		$kelas['tempat_belajar'] = json_encode($lokasi);
		$kelas['mata_pelajaran'] = $_POST['mata_pelajaran'];
		$kelas['tipe_kelas'] = $_POST['tipe_kelas'];
		$kelas['start'] = $_POST['start'];
		$kelas['end'] = $_POST['end'];
		$kelas['biaya'] = $_POST['biaya'];
		$kelas['avaible'] =true;
		$kelas['jumlah_siswa_daftar'] =0;
		$kelas['peraturan'] = $_POST['peraturan'];
		if($_POST['tipe_kelas']=="Private"){
			$kelas['jumlah_max_siswa']=1;
		}
		else{
			$kelas['jumlah_max_siswa']=(int)$_POST['jumlah_siswa'];
		}
		$this->load->model('Kelas');
		$res = $this->Kelas->insert_kelas($kelas);
		if($res){
			$this->session->set_flashdata('success_upload','Buka kelas sukses');
				redirect('smartedu/bukakelas_page');
		}
		else{
			$this->session->set_flashdata('error_upload','Buka kelas gagal');
				redirect('smartedu/bukakelas_page');
		}
	}
	function check_email_avalibility()  
      {  
      		extract($_POST);

           if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))  
           {  
                echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Invalid Email</span></label>';  
           }  
           else  
           {  
                $this->load->model("User");  
                if($this->User->is_email_available($_POST["email"]))  
                {  
                     echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Email Already register</label>';  
                }  
                else  
                {  
                     echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span> Email Available</label>';  
                }  
           }  
      }       
      function check_username_avalibility()  
      {  
      		extract($_POST);  
                $this->load->model("User");  
                if($this->User->is_username_available($_POST["username"]))  
                {  
                     echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Username Already register</label>';  
                }  
                else  
                {  
                     echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span> Username Available</label>';  
                }   
      }       
}
