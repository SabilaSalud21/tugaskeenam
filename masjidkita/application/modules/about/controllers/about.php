<?php
defined('BASEPATH') or exit('No direct script access allowed');

class about extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        // model
        $this->load->model('m_about');
        $this->load->model('login/m_session');
    }


    // index
    function index()
    {
        $data = array(
            'namamodule'     => "about",
            'namafileview'     => "V_about",
            'tampil'        => $this->m_about->tampil(),
        );
        echo Modules::run('template/tampilCore', $data);
    }

    function tambah()
    {
        $this->m_about->tambah();
        redirect('user');
    }

    function edit()
    {
        $this->m_about->edit();
        redirect('user');
    }

    function hapus($id)
    {
        $this->m_about->hapus($id);
        redirect('user');
    }

    function cari()
    {
        $data = array(
            'namamodule'     => "about",
            'namafileview'     => "V_about",
            'tampil'        => $this->m_about->cari(),
        );
        echo Modules::run('template/tampilCore', $data);
    }
}
