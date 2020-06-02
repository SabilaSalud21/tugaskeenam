<?php
defined('BASEPATH') or exit('No direct script access allowed');

class profile extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        // model
        $this->load->model('m_profile');
        $this->load->model('login/m_session');
    }


    // index
    function index()
    {
        $data = array(
            'namamodule'     => "profile",
            'namafileview'     => "V_profile",
            'tampil'        => $this->m_profile->tampil(),
        );
        echo Modules::run('template/tampilCore', $data);
    }

    function tambah()
    {
        $this->m_profile->tambah();
        redirect('user');
    }

    function edit()
    {
        $this->m_profile->edit();
        redirect('user');
    }

    function hapus($id)
    {
        $this->m_profile->hapus($id);
        redirect('user');
    }

    function cari()
    {
        $data = array(
            'namamodule'     => "profile",
            'namafileview'     => "V_profile",
            'tampil'        => $this->m_profile->cari(),
        );
        echo Modules::run('template/tampilCore', $data);
    }
}
