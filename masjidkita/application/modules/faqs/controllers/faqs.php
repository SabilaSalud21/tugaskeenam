<?php
defined('BASEPATH') or exit('No direct script access allowed');

class faqs extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        // model
        $this->load->model('m_faqs');
        $this->load->model('login/m_session');
    }


    // index
    function index()
    {
        $data = array(
            'namamodule'     => "faqs",
            'namafileview'     => "V_faqs",
            'tampil'        => $this->m_faqs->tampil(),
        );
        echo Modules::run('template/tampilCore', $data);
    }

    function tambah()
    {
        $this->m_faqs->tambah();
        redirect('user');
    }

    function edit()
    {
        $this->m_faqs->edit();
        redirect('user');
    }

    function hapus($id)
    {
        $this->m_faqs->hapus($id);
        redirect('user');
    }

    function cari()
    {
        $data = array(
            'namamodule'     => "faqs",
            'namafileview'     => "V_faqs",
            'tampil'        => $this->m_faqs->cari(),
        );
        echo Modules::run('template/tampilCore', $data);
    }
}
