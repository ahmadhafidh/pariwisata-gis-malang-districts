<?php
class Search_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
	public function cariWisata()
	{
		$cari = $this->input->GET('cari', TRUE);
		$data = $this->db->query("SELECT * FROM `wisata` WHERE nama_wisata = "'$cari'"");
		return $data->result();
	}
 
 
}