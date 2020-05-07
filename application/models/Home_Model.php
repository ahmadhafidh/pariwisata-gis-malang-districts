<?php
class Home_Model extends CI_Model
{

	function GetAllMaps(){
		$sql = $this->db->query("SELECT * from wisata 
				JOIN kategori on kategori.id_kategori = wisata.id_kategori 
				JOIN icon on icon.id_icon = kategori.id_icon
				WHERE wisata.status='1'");

		// $sql = "
		// 		SELECT * from wisata 
		// 		JOIN kategori on kategori.id_kategori = wisata.id_kategori 
		// 		JOIN icon on icon.id_icon = kategori.id_icon
		// 		WHERE wisata.status='1'
		// 	";
        // return $this->db->query($sql);
        return $sql;
	}

	function GetAllKategori(){
		$sql = "
				SELECT * from kategori 
				JOIN icon on icon.id_icon = kategori.id_icon
			";
        return $this->db->query($sql);
	}
	
	function GetKategoriById(){
		$sql = "SELECT * FROM icon
				JOIN kategori on kategori.id_icon=icon.id_icon";
        return $this->db->query($sql);
	}

	function cariWisata()
	{
		$cari = $this->input->get('cari', TRUE);
		$kategori = $this->input->get('kategori');
		
		$data = $this->db->query(
			"SELECT * from wisata 
				JOIN kategori on kategori.id_kategori = wisata.id_kategori 
				JOIN icon on icon.id_icon = kategori.id_icon
				WHERE wisata.status='1' and wisata.nama_wisata like '%".$cari ."%'");
				
		if(is_array($kategori))
		{
			$kat = "";			
			
			foreach($kategori as $k)
			{
				$kat.="'$k',";
				
				
			}
			$kat = substr($kat, 0, strlen($kat)-1);
				
			$data = $this->db->query(
			"SELECT * from wisata 
				JOIN kategori on kategori.id_kategori = wisata.id_kategori 
				JOIN icon on icon.id_icon = kategori.id_icon
				WHERE wisata.status='1' and (kategori.id_kategori in ($kat) or wisata.nama_wisata like '%".$cari ."%')");
		}

				
		return $data;
	}
}
