<?php
class Admin_Model extends CI_Model
{
    function cekAdmin($username,$password){
        $this->db->where('username',$username);
		$this->db->where('password',MD5($password));
        // $this->db->where('password',$password);
        $this->db->from('admin');
        $cek = $this->db->count_all_results();
        if($cek == 1)
            return TRUE;
        else
            return FALSE;
    }

    function CekUsernameku($username,$id_admin){
        $this->db->where('username',$username);
        $this->db->where('id_admin',$id_admin);
        $this->db->from('admin');
        $cek = $this->db->count_all_results();
        if($cek == 1)
            return TRUE;
        else
            return FALSE;
    }

	function GetDetailAdmin($username){
		$sql = "Select * from admin WHERE username='$username'";
        return $this->db->query($sql)->row();
	}
	
	function TambahKategori($kategori,$icon){
		$data = array(
            'kategori' => $kategori,
            'id_icon' => $icon,
			'tanggal' => date('Y-m-d H:i:s'),
        );
        return $this->db->insert('kategori',$data);
	}

	function TambahWisata($wisata,$id_kategori,$location,$lat,$lng,$telephone,$buka,$tutup){
		$data = array(
            'nama_wisata' => $wisata,
            'id_kategori' => $id_kategori,
            'alamat' => $location,
            'longitude' => $lng,
            'latitude' => $lat,
            'telephone' => $telephone,
            'buka' => $buka,
            'tutup' => $tutup,
            'status' => 0,
        );
        return $this->db->insert('wisata',$data);
	}
	
	function NewYesGambar($nama,$picture){
		$data = array(
            'nama' => $nama,
            'icon' => $picture,
			'tanggal' => date('Y-m-d H:i:s'),
        );
        return $this->db->insert('icon',$data);
	}
	function NewNoGambar($nama){
		$data = array(
            'nama' => $nama,
			'tanggal' => date('Y-m-d H:i:s'),
        );
        return $this->db->insert('icon',$data);
	}
	
	function GetAllKategori(){
		$sql = "Select * from kategori ORDER BY kategori ASC";
        return $this->db->query($sql);
	}
	function GetAllIcon(){
		$sql = "Select * from icon ORDER BY nama ASC";
        return $this->db->query($sql);
	}
	function GetIcon($id_icon){
		$sql = "Select * from icon WHERE id_icon='$id_icon'";
        return $this->db->query($sql)->row();
	}

	
	function CekStatusWisata($id_wisata){
		$sql = "Select * from wisata where id_wisata='$id_wisata'";
        return $this->db->query($sql)->row();
	}

	function GetWisata($id_wisata){
		$sql = "SELECT * from wisata
		JOIN kategori on kategori.id_kategori = wisata.id_kategori
		JOIN icon on icon.id_icon = kategori.id_icon
		where wisata.id_wisata='$id_wisata'
		";
        return $this->db->query($sql)->row();
	}

	function GetAllWisataku($Starting,$TotalRecord) {
        $query = $this->db->query(
		"Select id_wisata,nama_wisata, status,kategori.kategori from wisata
		JOIN kategori on kategori.id_kategori = wisata.id_kategori limit $Starting,$TotalRecord");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
	
	
	function GetAllWisata(){
		$sql = "Select id_wisata,nama_wisata, status,kategori.kategori from wisata
			JOIN kategori on kategori.id_kategori = wisata.id_kategori";
        return $this->db->query($sql);
	}
	
	function UpdateKategori($kategori,$deskripsi,$id_kategori)
	{
		$data = array(
               'kategori' => $kategori,
               'deskripsi' => $deskripsi,
		);	
		$this->db->where('id_kategori', $id_kategori);
		$this->db->update('kategori', $data); 
	}

	function UpdateWisata($wisata,$id_kategori,$location,$lat,$lng,$telephone,$buka,$tutup,$id_wisata,$status)
	{
		$data = array(
			'nama_wisata' => $wisata,
            'id_kategori' => $id_kategori,
            'alamat' => $location,
            'longitude' => $lng,
            'latitude' => $lat,
            'telephone' => $telephone,
            'buka' => $buka,
            'tutup' => $tutup,
            'status' => $status,
		);	
		$this->db->where('id_wisata', $id_wisata);
		$this->db->update('wisata', $data); 
	}

	function UpdateStatusWisata($id_wisata,$status)
	{
		$data = array(
               'status' => $status,
		);	
		$this->db->where('id_wisata', $id_wisata);
		$this->db->update('wisata', $data); 
	}
	
	function HapusWisata($id_wisata){
		$this->db->where('id_wisata',$id_wisata);
        return $this->db->delete('wisata');
    }	
	
	function HapusKategori($id_kategori){
		$this->db->where('id_kategori',$id_kategori);
        return $this->db->delete('kategori');
    }	

	function iconHapus($id_icon){
		$this->db->where('id_icon',$id_icon);
		$query = $this->db->get('icon');
		$row = $query->row();
		unlink("./assets/admin/ikon/$row->icon");
		$this->db->delete('icon', array('id_icon' => $id_icon));
		
		
		$this->db->where('id_icon',$id_icon);
        return $this->db->delete('icon');
    }	
	
	function HapusWisataKategori($id_kategori){
		$this->db->where('id_kategori',$id_kategori);
        return $this->db->delete('wisata');
    }	

	function USettingYesPass($id_admin,$nama,$email,$username,$password)
	{
		$data = array(
               'nama' => $nama,
               'email' => $email,
               'username' => $username,
               'password' => MD5($password),
		);	
		$this->db->where('id_admin', $id_admin);
		$this->db->update('admin', $data); 
	}
	function USettingNoPassYesUsername($id_admin,$nama,$email,$username)
	{
		$data = array(
               'nama' => $nama,
               'email' => $email,
               'username' => $username,
		);	
		$this->db->where('id_admin', $id_admin);
		$this->db->update('admin', $data); 
	}

	function USettingNoPassNoUser($id_admin,$nama,$email)
	{
		$data = array(
               'nama' => $nama,
               'email' => $email,
		);	
		$this->db->where('id_admin', $id_admin);
		$this->db->update('admin', $data); 
	}
	
}
