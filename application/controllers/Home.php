<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('Home_Model', 'Home');
	}

	public function index()
	{
		// $this->load->model('Home_Model','Home');
		$data["Kategori"] 	= $this->Home->GetAllKategori();
		$data["Maps"] 		= $this->Home->GetAllMaps();
		$this->load->view('Home_View',$data);
	}
	public function hasil()
	{
		// $this->load->model('Home_Model','Home');
		// $data["Kategori"] 	= $this->Home->GetAllKategori();
		$data["Kategori"] 	= $this->Home->GetAllKategori();
		$data["Maps"] = $this->Home->GetAllMaps();
		
		// $cari = $this->input->post('cari');
		
		$data['Maps'] = $this->Home->cariWisata();
		// print_r($data['Cari']);

		$this->load->view('Home_View', $data);
	}
}
