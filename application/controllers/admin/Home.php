<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$username = $this->session->userdata('username');
		if($username){
			redirect('admin/Wisata','refresh');
		}else{
			redirect('admin/Home/Login','refresh');
		}
	}
	public function Settings()
	{
		$username = $this->session->userdata('username');
		if($username){
			$data['Title'] = "Settings";
			$this->load->model('Admin_Model','Admin');
			$data['profil'] = $this->Admin->GetDetailAdmin($username);
			
			if($this->input->POST('update')){
				$id_admin			= $this->input->post('id_admin');
				$nama				= $this->input->post('nama');
				$email				= $this->input->post('email');
				$username			= $this->input->post('username');
				$password			= $this->input->post('password');
				$this->load->library('form_validation');
				$this->form_validation->set_rules('id_admin', 'Id_admin', 'trim|required');
				$this->load->model('Admin_Model','Admin');
				if ($this->form_validation->run()){
					if($password){
						$this->Admin->USettingYesPass($id_admin,$nama,$email,$username,$password);
						echo "<script type=text/javascript>alert('Username atau Password Dirubah Silahkan Login Ulang');</script>";
						redirect('admin/Home/Logout','refresh');
					}elseif($username){
						$this->Admin->USettingNoPassYesUsername($id_admin,$nama,$email,$username);
						echo "<script type=text/javascript>alert('Username Dirubah Silahkan Login Ulang');</script>";
						redirect('admin/Home/Logout','refresh');
					}else{
						$this->Admin->USettingNoPassNoUser($id_admin,$nama,$email);
					}
				}else{
					echo "<script type=text/javascript>alert('Username Tidak Boleh Kosong');</script>";
					redirect('admin/Home/Settings','refresh');
				}
				redirect('admin/Home/Settings','refresh');
			}
			$this->load->view('admin/Settings_View',$data);
		}else{
			redirect('admin/Home/Login','refresh');
		}
	}

	function login(){
		$username = $this->session->userdata('username');
		if($username){
			redirect('admin/Home','refresh');
		}else{
			if($this->input->POST()){
				$username	= $this->input->post('username');
				$password	= $this->input->post('password');
				$this->load->library('form_validation');
				$this->form_validation->set_rules('username', 'Username', 'trim|required');
				$this->form_validation->set_rules('password', 'Password', 'trim|required');
				$this->load->model('Admin_Model','Admin');
				if ($this->form_validation->run()){
					if($this->Admin->cekAdmin($username,$password))
					{
						$data = array(
						'tipe'		=> 'admin',
						'username' 	=> $username,
						'logged_in' => TRUE
					);
						$this->session->set_userdata($data);
						redirect('Admin/Home/Login','refresh');
						
					}else{
						$data['ufocus'] = 'autofocus';
						$data['Message'] = "Username dan Password Tidak Dikenal";
					}
				}else{	
					if($username <> $password){
						if($username){
							$data['username'] = $username;$data['pfocus'] = 'autofocus';
							$data['Message'] = "Password Kosong";
						}else{
							if($password){
								$data['password'] = $password;$data['ufocus'] = 'autofocus';
								$data['Message'] = "Username Kosong";
							}
						}
					}else{
						$data['ufocus'] = 'autofocus';
						$data['Message'] = "Username & Password Kosong";
					}
				}
			}
		$data['']='';
		$data['Title'] = "Login";
		$this->load->view('admin/Login_view',$data);
		}
	}	
	
	function Logout(){
		$this->session->unset_userdata('username');
        redirect('Admin/Home/Login','refresh');
	}
}
