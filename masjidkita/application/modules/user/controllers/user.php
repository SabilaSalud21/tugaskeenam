<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        // model
        $this->load->model('M_user');
        $this->load->model('login/m_session');
    }


    // index
    function index()
    {
        $data = array(
            'namamodule'     => "user",
            'namafileview'     => "V_user",
            'tampil'        => $this->M_user->tampil(),
        );
        echo Modules::run('template/tampilCore', $data);
    }

    function tambah()
    {
        $this->M_user->tambah();
        redirect('user');
    }

    function edit()
    {
        $this->M_user->edit();
        redirect('user');
    }

    function hapus($id)
    {
        $this->M_user->hapus($id);
        redirect('user');
    }

    function cari()
    {
        $data = array(
            'namamodule'     => "user",
            'namafileview'     => "V_user",
            'tampil'        => $this->M_user->cari(),
        );
        echo Modules::run('template/tampilCore', $data);
    }
}
