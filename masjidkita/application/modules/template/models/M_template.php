<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_template extends CI_Model {

	public function __construct(){

		parent::__construct();

	}
	public function tampil_pengguna_kesiswaan($username){

		$query = "SELECT username FROM tb_login where username='$username' AND status='1'";
		$result = $this->db->query($query);
		$nama = '';

		foreach($result->result_array() as $row)
		{
             $nama = $row['username'];
		}

		return $nama;
	}

	function lastDates()
	{
		$query = $this->db->query("SELECT * FROM tb_agenda ORDER BY created_at DESC LIMIT 1");
		return $query;

	}

	function kategori()
	{
		$this->db->select('*')
				 ->from('tb_setting_kategori');
		$query = $this->db->get();
		return $query;
	}

	function get($id_p)
	{
		$this->db->select('tb_grup_profile.*, tb_grup.*')
				 ->join('tb_grup', 'tb_grup_profile.id_grup = tb_grup.id_grup')
				 ->from('tb_grup_profile')
				 ->where('tb_grup_profile.id_profile',$id_p);
		$query = $this->db->get();
		return $query;
	}

	function getLimitProfile($id_p){
		$this->db->select('*')
				 ->from('tb_profile')
				 ->where('id_user',$id_p);
		$query = $this->db->get();
		return $query->row('limit_grup');
	}

	function cek($id)
	{
		$this->db->select('*')
				 ->from('tb_login')
				 // ->join('tb_setting_outlet', 'tb_setting_outlet.id_Setting_outlet = tb_login.id_outlet')
				 ->where('id_user',$id);
		$query = $this->db->get();
		return $query;
	}

	function outlet($id)
	{
		$this->db->select('*')
				 ->from('tb_login')
				 ->join('tb_setting_outlet', 'tb_setting_outlet.id_Setting_outlet = tb_login.id_outlet')
				 ->where('id_user',$id);
		$query = $this->db->get();
		return $query;
	}

	function kasir($id)
	{

		$this->db->select('*')
				 ->from('tb_login')
				 ->join('kontrak_kerja', 'kontrak_kerja.id_pegawai = tb_login.id_kasir')
				 ->where('id_user',$id);
		$query = $this->db->get();
		return $query;
	}

	function direktur($id)
	{

		$this->db->select('*')
				 ->from('tb_login')
				 ->join('tb_setting_direktur', 'tb_setting_direktur.id_setting_direktur = tb_login.id_direktur')
				 ->where('id_user',$id);
		$query = $this->db->get();
		return $query;
	}

	function perusahaan()
	{
		$this->db->select('*')
				 ->from('tb_setting_perusahaan');
				 // ->join('tb_setting_outlet', 'tb_setting_outlet.id_Setting_outlet = tb_login.id_outlet')
				 // ->where('id_user',$id);
		$query = $this->db->get();
		return $query;
	}

	function status()
	{
		$sekarang = date('Y-m-d ');
		$cari = array('status' => '0', 'tanggal' => $sekarang);
		$this->db->select('*')
				 ->from('tb_pembelian')
				 ->like($cari);
		$query = $this->db->get();
		return $query;
	}

	function buatId()
	{

		$data = array(
			'status'  => '0',
		);
		$this->db->insert('tb_pembelian',$data);
	}

	function idTerakhir()
	{
		$this->db->select_max('id_pembelian')
				 ->from('tb_pembelian');
		$data = $this->db->get();

		foreach ($data->result() as $res){
			$id = $res->id_pembelian;
		}
		return $id;
	}

	function baru()
	{
		$outlet = $this->session->userdata('id_outlet');

		$data = array(
			'status' 	=> '0',
			'id_outlet' => $outlet,
		);
		$this->db->insert('tb_penjualan',$data);
	}

	function add()
	{
		$this->db->select_max('id_penjualan')
			 	 ->from('tb_penjualan');
		$query = $this->db->get();
		return $query;
	}

	function sts()
	{
		$this->db->select('*')
				 ->from('tb_penjualan')
				 ->where('status','0');
		$query = $this->db->get();
		return $query;
	}

	function cekTanggal($id)
	{
		$sekarang = date('Y-m-d ');

		$this->db->select('*')
				 ->from('tb_pembelian')
				 ->like('tanggal',$sekarang);
		$query = $this->db->get();


		if($query->num_rows() == 0)
		{

			$kode = 001;
		}
		else{

			$data = $query->num_rows();
			$kode = $data;

		}

		$data2 = array(
				'code_pembelian' => $kode,
		);
		$this->db->where('id_pembelian',$id)->update('tb_pembelian',$data2);

	}

	function tampilProduk($outlet)
	{
		$this->db->select('*')
				 ->from('tb_produk')
				 ->join('tb_setting_kategori','tb_produk.id_kategori = tb_setting_kategori.id_kategori')
				 ->where('tb_produk.id_outlet',$outlet);
		$query = $this->db->get();
		return $query;
	}

	function njual()
	{
		$this->db->select('*')
				 ->from('tb_penjualan');
		$query = $this->db->get();
		return $query;
	}

	function tampil($id)
	{
		$this->db->select('*,list_produk.nama_produk as nama_item,list_produk.gambar as foto')
				 ->from('list_produk')
				 ->join('tb_produk','list_produk.id_produk = tb_produk.id_produk')
				 ->where('list_produk.id_produk',$id);
		$query = $this->db->where('list_produk.id_produk',$id)->get();
		return $query->result();
	}

	function jual()
	{
		$this->db->select('*')
				 ->from('tb_penjualan')
				 ->limit(3)
				 ->join('tb_setting_outlet','tb_penjualan.id_outlet = tb_setting_outlet.id_setting_outlet')
				 ->where('status','0');
		$query = $this->db->get();
		return $query;
	}

	function kasir2()
	{
		$id = $this->session->userdata('id_outlet');
		$cari = array('status' => 4, 'id_outlet' => $id);
		$this->db->select('*')
				 ->from('tb_login')
				 ->where($cari);
		$query = $this->db->get();
		return $query;
	}

	function diskon()
	{
		$this->db->select('*')
				 ->from('tb_setting_diskon');
		$query = $this->db->get();
		return $query;
	}

	function outlet2()
	{
		$id = $this->session->userdata('id_outlet');

		$this->db->select('*')
				 ->from('tb_setting_outlet')
				 ->where('id_setting_outlet',$id);
		$query = $this->db->get();
		return $query;
	}

	function struk($jual)
	{
		$this->db->select('*')
				 ->from('detail_penjualan')
				 ->join('list_produk','detail_penjualan.id_list_produk = list_produk.id_list_produk')
				 ->join('tb_penjualan','detail_penjualan.id_penjualan = tb_penjualan.id_penjualan')
				 ->where('tb_penjualan.id_penjualan',$jual);
		$query = $this->db->get();
		return $query;
	}

	function item()
	{
		$this->db->select('id_detail, COUNT(id_detail) as total ')
				 ->from('detail_penjualan')
				 ->join('tb_penjualan','detail_penjualan.id_penjualan = tb_penjualan.id_penjualan')
				 ->group_by('detail_penjualan.id_penjualan');
		$query = $this->db->get();
		return $query;
	}

	function find($outlet, $id_kat)
	{
		// $kategori = $this->input->post('id_kategori');
		echo "aa".$outlet;
		$cari = array( 'tb_produk.id_outlet' => $outlet);
		$this->db->select('*')
				 ->from('tb_produk')
				 ->join('tb_setting_kategori','tb_produk.id_kategori = tb_setting_kategori.id_kategori')
				 ->where($cari);
		$query = $this->db->get();
		return $query;
	}

}
