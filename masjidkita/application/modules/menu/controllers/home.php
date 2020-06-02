<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kegiatan extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        // model
        $this->load->model('M_kegiatan');
        $this->load->model('login/m_session');
    }


    // index
    function index()
    {
        $data = array(
            'namamodule'     => "kegiatan",
            'namafileview'     => "V_kegiatan",
            'tampil'        => $this->M_kegiatan->tampil(),
        );
        echo Modules::run('template/tampilCore', $data);
    }

    function tambah()
    {
        $this->M_kegiatan->tambah();
        redirect('kegiatan');
    }

    function edit()
    {
        $this->M_kegiatan->edit();
        redirect('kegiatan');
    }

    function hapus($id)
    {
        $this->M_kegiatan->hapus($id);
        redirect('kegiatan');
    }

    function cari()
    {
        $data = array(
            'namamodule'     => "kegiatan",
            'namafileview'     => "V_kegiatan",
            'tampil'        => $this->M_kegiatan->cari(),
        );
        echo Modules::run('template/tampilCore', $data);
    }
}
