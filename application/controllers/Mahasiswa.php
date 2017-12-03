<?php 
class Mahasiswa extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('mahasiswa_model'); //pemanggilan model mahasiswa
	}

	function index(){
		$data['data']=$this->mahasiswa_model->get_all_mahasiswa();
		$this->load->view('mahasiswa_view',$data);
	}

	function simpan(){
		$nim=$this->input->post('nim');
		$nama=$this->input->post('nama');
		$prodi=$this->input->post('prodi');

		$this->load->library('ciqrcode'); //pemanggilan library QR CODE

		$config['cacheable']	= true; //boolean, the default is true
		$config['cachedir']		= './assets/'; //string, the default is application/cache/
		$config['errorlog']		= './assets/'; //string, the default is application/logs/
		$config['imagedir']		= './assets/images/'; //direktori penyimpanan qr code
		$config['quality']		= true; //boolean, the default is true
		$config['size']			= '1024'; //interger, the default is 1024
		$config['black']		= array(224,255,255); // array, default is array(255,255,255)
		$config['white']		= array(70,130,180); // array, default is array(0,0,0)
		$this->ciqrcode->initialize($config);

		$image_name=$nim.'.png'; //buat name dari qr code sesuai dengan nim

		$params['data'] = $nim; //data yang akan di jadikan QR CODE
		$params['level'] = 'H'; //H=High
		$params['size'] = 10;
		$params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
		$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

		$this->mahasiswa_model->simpan_mahasiswa($nim,$nama,$prodi,$image_name); //simpan ke database
		redirect('mahasiswa'); //redirect ke mahasiswa usai simpan data
	}
}