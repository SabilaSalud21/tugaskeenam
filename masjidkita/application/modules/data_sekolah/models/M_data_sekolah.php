<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_sekolah extends CI_Model {

	function tampil()
	{
		return $this->db->get('sekolah')->result();
	}

	function tambah()
	{
		$nama 		= $this->input->post('nama_sekolah');
		$keterangan	= $this->input->post('keterangan');


		$this->load->library('upload');
		$nmfile = "file_".time();
		$config['upload_path']		= 'assets/img/';
		$config['allowed_types']	= 'gif|jpg|png|jpeg';
		$config['max_size']			= 5120;
		$config['max_width']		= 4300;
		$config['max_height']		= 4300;
		$config['file_name'] 		= $nmfile;
		
		$this->upload->initialize($config);
		
		if($_FILES['gambar']['name'])
        {
            if ($this->upload->do_upload('gambar'))
            {
				$gbr = $this->upload->data();
				$data = array(
					'nama_sekolah'		=> $nama,
					'keterangan'		=> $keterangan,
					'logo' 				=> $gbr['file_name'],
					
					
				);
				$this->db->insert('sekolah', $data);
			
			}	 
		}
		else{
				$data = array(
					'nama_sekolah'		=> $nama,
					'keterangan'		=> $keterangan,
					'logo' 				=> 'kosong1.png',
				);
				$this->db->insert('sekolah', $data);
			}
	}

	function edit()
	{
		$id_sekolah = $this->input->post('id_sekolah');
		$nama 		= $this->input->post('nama_sekolah');
		$keterangan	= $this->input->post('keterangan');


		$this->load->library('upload');
		$nmfile = "file_".time();
		$config['upload_path']		= 'assets/img/';
		$config['allowed_types']	= 'gif|jpg|png|jpeg';
		$config['max_size']			= 5120;
		$config['max_width']		= 4300;
		$config['max_height']		= 4300;
		$config['file_name'] 		= $nmfile;
		
		$this->upload->initialize($config);
		
		if($_FILES['gambar']['name'])
        {
            if ($this->upload->do_upload('gambar'))
            {
				$gbr = $this->upload->data();
				$data = array(
					'nama_sekolah'		=> $nama,
					'keterangan'		=> $keterangan,
					'logo' 				=> $gbr['file_name'],
				);
				$this->db->where('id_sekolah',$id_sekolah)->update('sekolah', $data);
			
			}	 
		}
		else{
				$data = array(
					'nama_sekolah'		=> $nama,
					'keterangan'		=> $keterangan,
				);
				$this->db->where('id_sekolah',$id_sekolah)->update('sekolah', $data);
			}
	}

	function hapus($id)
	{
		$this->db->where('id_sekolah', $id)->delete('sekolah');
	}

	function cari()
	{
		$cari 		= $this->input->post('cari');
		return $this->db->like('nama_sekolah',$cari)->get('sekolah')->result();
	}
}