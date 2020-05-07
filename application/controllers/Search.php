<?php
class Search extends CI_Controller {
 
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->model('search_model');
	}
 
	public function cari() 
	{
		$this->load->view('search');
	}
 
	public function hasil()
	{
		$data2['cari'] = $this->orang_model->cariOrang();
		$this->load->view('result', $data2);
	}
}