<?php
defined('BASEPATH') or exit('No direct script access allowed');

class home extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        // model
        $this->load->model('M_home');
        $this->load->model('login/m_session');
    }


    // index
    function index()
    {
        $data = array(
            'namamodule'       => "home",
            'namafileview'     => "V_home",
            'tampil'        => $this->M_home->tampil(),
        );
        echo Modules::run('template/tampilCore', $data);
    }

    function tambah()
    {
        $this->M_home->tambah();
        redirect('user');
    }

    function edit()
    {
        $this->M_home->edit();
        redirect('user');
    }

    function hapus($id)
    {
        $this->M_home->hapus($id);
        redirect('user');
    }

    function cari()
    {
        $data = array(
            'namamodule'     =>  "home",
            'namafileview'     => "V_home",
            'tampil'        => $this->M_home->cari(),
        );
        echo Modules::run('template/tampilCore', $data);
    }
}
