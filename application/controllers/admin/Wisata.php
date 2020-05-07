<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wisata extends CI_Controller {

	public function index($Starting=0)
	{
		$username = $this->session->userdata('username');
		if($username){
			$data['Title'] = "Wisata";
			$data['addwisata'] = "Wisata/add";
			$data['refresh'] = "wisata";
			$this->load->model('Admin_Model','Admin');
			
			$this->load->library("pagination");
			$config['base_url'] = base_url().'Admin/Wisata/index/';
			$TotalRows = $this->db->count_all("wisata");
			$config['total_rows'] = $TotalRows;
			$config['per_page'] = 7; 
			$config['num_links'] = 5;
			$TotalRecord = $config['per_page'];
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['first_link'] = false;
			$config['last_link'] = false;
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['prev_link'] = '&laquo';
			$config['prev_tag_open'] = '<li class="prev">';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = '&raquo';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$this->pagination->initialize($config); 
			$data['Links'] = $this->pagination->create_links();
			$data['result'] = $this->Admin->GetAllWisataku($Starting,$TotalRecord);
			
			// $data["Wisata"] = $this->Admin->GetAllWisata();
			$this->load->view('admin/Wisata_View',$data);
		}else{
			redirect('admin/Home/Login','refresh');
		}
	}

	public function SetStatus($id_wisata)
	{
		$username = $this->session->userdata('username');
		if($username){
			$this->load->model('Admin_Model','Admin');
			$get = $this->Admin->CekStatusWisata($id_wisata);
			$status =$get->status;
			if($status==0){
				$status = 1;
				$this->Admin->UpdateStatusWisata($id_wisata,$status);
			}else{
				$status = 0;
				$this->Admin->UpdateStatusWisata($id_wisata,$status);
			}
			redirect('admin/Wisata','refresh');
		}else{
			redirect('admin/Home/Login','refresh');
		}
	}

	public function More($id_wisata)
	{
		$username = $this->session->userdata('username');
		if($username){
			$this->load->model('Admin_Model','Admin');
			$data['Wisata'] = $this->Admin->GetWisata($id_wisata);
			$this->load->view('admin/MoreWisata_View',$data);
		}else{
			redirect('admin/Home/Login','refresh');
		}
	}
	
	public function Hapus($id_wisata)
	{
		$username = $this->session->userdata('username');
		if($username){
			$this->load->model('Admin_Model','Admin');
			$this->Admin->HapusWisata($id_wisata);
			redirect('admin/Wisata','refresh');
		}else{
			redirect('admin/Home/Login','refresh');
		}
	}

	public function add()
	{
		$username = $this->session->userdata('username');
		if($username){
			$data['Title'] = "Wisata";
			$data['addwisata'] = "Wisata/add";
			$data['refresh'] = "wisata/add";
			$this->load->model('Admin_Model','Admin');
			$data["Kategori"] = $this->Admin->GetAllKategori();	
			
			if($this->input->POST('baru')){
				$wisata			= $this->input->post('wisata');
				$id_kategori	= $this->input->post('id_kategori');
				$location		= $this->input->post('location');
				$lat			= $this->input->post('lat');
				$lng			= $this->input->post('lng');
				
				$telephone		= $this->input->post('telephone');
				$buka			= $this->input->post('buka');
				$tutup			= $this->input->post('tutup');
				$this->load->library('form_validation');
				$this->form_validation->set_rules('wisata', 'Wisata', 'trim|required');
				$this->form_validation->set_rules('id_kategori', 'Id_kategori', 'trim|required');
				if ($this->form_validation->run()){
					$this->Admin->TambahWisata($wisata,$id_kategori,$location,$lat,$lng,$telephone,$buka,$tutup);
				}else{
					echo "<script type=text/javascript>alert('Bidang Teks Kosong');</script>";
					redirect('Admin/Wisata/Add','refresh');
				}
				redirect('Admin/Wisata','refresh');
			}
			$this->load->view('admin/TambahWisata_View',$data);
		}else{
			redirect('admin/Home/Login','refresh');
		}
	}


	public function Edit($id_wisata)
	{
		$username = $this->session->userdata('username');
		if($username){
			$data['Title'] = "Wisata";
			$data['addwisata'] = "Wisata/add";
			$data['refresh'] = "wisata";
			$this->load->model('Admin_Model','Admin');
			$data["Kategori"] = $this->Admin->GetAllKategori();	
			$data["Wisata"] = $this->Admin->GetWisata($id_wisata);
			
			if($this->input->POST('update')){
				$wisata			= $this->input->post('wisata');
				$id_kategori	= $this->input->post('id_kategori');
				$location		= $this->input->post('location');
				$lat			= $this->input->post('lat');
				$lng			= $this->input->post('lng');
				$telephone		= $this->input->post('telephone');
				$buka			= $this->input->post('buka');
				$tutup			= $this->input->post('tutup');
				$id_wisata		= $this->input->post('id_wisata');
				$status			= $this->input->post('status');
				
				$this->load->library('form_validation');
				$this->form_validation->set_rules('wisata', 'Wisata', 'trim|required');
				$this->form_validation->set_rules('id_kategori', 'Id_kategori', 'trim|required');
				if ($this->form_validation->run()){
					$this->Admin->UpdateWisata($wisata,$id_kategori,$location,$lat,$lng,$telephone,$buka,$tutup,$id_wisata,$status);
				}else{
					echo "<script type=text/javascript>alert('Bidang Teks Kosong');</script>";
					redirect("Admin/Wisata/Edit"."/".$id_wisata);
				}
				redirect('Admin/Wisata','refresh');
			}
			$this->load->view('admin/EditWisata_View',$data);
		}else{
			redirect('admin/Home/Login','refresh');
		}
	}

	public function coba()
	{
		$username = $this->session->userdata('username');
		if($username){
			$this->load->view('admin/coba');
		}else{
			redirect('admin/Home/Login','refresh');
		}
	}
}
