<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Favorite extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        // model
        $this->load->model('m_favorite');
        $this->load->model('login/m_session');
    }


    // index
    function index()
    {
        $data = array(
            'namamodule'     => "favorite",
            'namafileview'     => "V_favorite",
            'tampil'        => $this->m_favorite->tampil(),
        );
        echo Modules::run('template/tampilCore', $data);
    }

    function tambah()
    {
        $this->m_favorite->tambah();
        redirect('user');
    }

    function edit()
    {
        $this->m_favorite->edit();
        redirect('user');
    }

    function hapus($id)
    {
        $this->m_favorite->hapus($id);
        redirect('user');
    }

    function cari()
    {
        $data = array(
            'namamodule'     => "favorite",
            'namafileview'     => "V_favorite",
            'tampil'        => $this->m_favorite->cari(),
        );
        echo Modules::run('template/tampilCore', $data);
    }
}
