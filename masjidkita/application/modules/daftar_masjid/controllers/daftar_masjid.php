<?php
defined('BASEPATH') or exit('No direct script access allowed');

class daftar_masjid extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        // model
        $this->load->model('m_daftar_masjid');
        $this->load->model('login/m_session');
    }


    // index
    function index()
    {
        $data = array(
            'namamodule'     => "daftar_masjid",
            'namafileview'     => "V_daftar_masjid",
            'tampil'        => $this->m_daftar_masjid->tampil(),
        );
        echo Modules::run('template/tampilCore', $data);
    }

    function tambah()
    {
        $this->m_daftar_masjid->tambah();
        redirect('user');
    }

    function edit()
    {
        $this->m_daftar_masjid->edit();
        redirect('user');
    }

    function hapus($id)
    {
        $this->m_daftar_masjid->hapus($id);
        redirect('user');
    }

    function cari()
    {
        $data = array(
            'namamodule'     => "daftar_masjid",
            'namafileview'     => "V_daftar_masjid",
            'tampil'        => $this->m_daftar_masjid->cari(),
        );
        echo Modules::run('template/tampilCore', $data);
    }
}
