<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function index()
	{
		$username = $this->session->userdata('username');
		if($username){
			$data['Title'] = "Kategori";
			$data['add'] = "add";
			$data['icon'] = "icon";
			$data['refresh'] = "kategori";
			$this->load->model('Admin_Model','Admin');
			$data["Kategori"] = $this->Admin->GetAllKategori();
			$data["Icon"] = $this->Admin->GetAllIcon();
			if($this->input->POST('baru')){
				$kategori	= $this->input->post('kategori');
				$icon		= $this->input->post('icon');
				$this->load->library('form_validation');
				$this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
				if ($this->form_validation->run()){
					$this->Admin->TambahKategori($kategori,$icon);
				}else{
					echo "<script type=text/javascript>alert('Masukkan Nama Kategori');</script>";
					redirect('Admin/Kategori','refresh');
				}
				redirect('Admin/Kategori','refresh');
			}
			
			if($this->input->POST('update')){
				$kategori		= $this->input->post('kategori');
				$icon		= $this->input->post('icon');
				$id_kategori	= $this->input->post('id_kategori');
				
				$this->load->library('form_validation');
				$this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
				if ($this->form_validation->run()){
					$this->Admin->UpdateKategori($kategori,$icon,$id_kategori);
				}else{
					echo "<script type=text/javascript>alert('Masukkan Nama Kategori');</script>";
					redirect('Admin/Kategori','refresh');
				}
				redirect('Admin/Kategori','refresh');
			}
			
			$this->load->view('admin/Kategori_View',$data);
			
		}else{
			redirect('admin/Home/Login','refresh');
		}
	}
	
	public function Icon()
	{
		$username = $this->session->userdata('username');
		if($username){
			$data['Title'] = "Icon";
			$data['add'] = "add";
			$data['icon'] = "icon";
			$data['refresh'] = "Kategori/Icon";
			$this->load->model('Admin_Model','Admin');
			$data["Icon"] = $this->Admin->GetAllIcon();
			
			if($this->input->POST('baru')){
				$nama	= $this->input->post('nama');
				$this->load->library('form_validation');
				$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
				if ($this->form_validation->run()){
					$config['upload_path']          = './assets/admin/ikon/';
					$config['allowed_types']        = 'gif|jpg|png|icon';
					$config['max_size']             = 5000;
					$config['max_width']            = 2024;
					$config['max_height']           = 9068;
					$this->load->helper(array('form'));
					$this->load->library('upload', $config);
					if($this->upload->do_upload('userfile')){
						$uploadData = $this->upload->data();
						$picture = $uploadData['file_name'];
						$this->Admin->NewYesGambar($nama,$picture);
					}else{
						$this->Admin->NewNoGambar($nama);
					}
					redirect('Admin/Kategori/Icon','refresh');
				}else{
					echo "<script type=text/javascript>alert('Masukkan Nama Icon');</script>";
					redirect('Admin/Kategori/Icon','refresh');	
				}
				
				
				
				
			}
			$this->load->view('admin/Icon_View',$data);
			
		}else{
			redirect('admin/Home/Login','refresh');
		}
	}
	
	
	public function Hapus($id_kategori)
	{
		$username = $this->session->userdata('username');
		if($username){
			$this->load->model('Admin_Model','Admin');
			$this->Admin->HapusKategori($id_kategori);
			$this->Admin->HapusWisataKategori($id_kategori);
			redirect('admin/Kategori','refresh');
		}else{
			redirect('admin/Home/Login','refresh');
		}
	}
	
	
	public function HapusIcon($id_icon)
	{
		$username = $this->session->userdata('username');
		if($username){
			$this->load->model('Admin_Model','Admin');
			$this->Admin->iconHapus($id_icon);
			redirect('admin/Kategori/Icon','refresh');
		}else{
			redirect('admin/Home/Login','refresh');
		}
	}
}
