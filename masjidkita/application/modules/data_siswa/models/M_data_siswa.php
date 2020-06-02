<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_data_siswa extends CI_Model
{

    function tampil()
    {
        return $this->db->get('users')->result();
    }

    function tambah()
    {
        $nama_siswa        = $this->input->post('nama_siswa');
        $kelas_siswa    = $this->input->post('kelas_siswa');


        $this->load->library('upload');
        $nmfile = "file_" . time();
        $config['upload_path']        = 'assets/img/';
        $config['allowed_types']    = 'gif|jpg|png|jpeg';
        $config['max_size']            = 5120;
        $config['max_width']        = 4300;
        $config['max_height']        = 4300;
        $config['file_name']         = $nmfile;

        $this->upload->initialize($config);

        if ($_FILES['foto_siswa']['name']) {
            if ($this->upload->do_upload('foto_siswa')) {
                $gbr = $this->upload->data();
                $data = array(
                    'nama_siswa'        => $nama_siswa,
                    'kelas_siswa'        => $kelas_siswa,
                    'foto_siswa'                 => $gbr['file_name'],


                );
                $this->db->insert('users', $data);
            }
        } else {
            $data = array(
                'nama_siswa'        => $nama_siswa,
                'kelas_siswa'        => $kelas_siswa,
                'foto_siswa'                 => 'kosong1.png',
            );
            $this->db->insert('users', $data);
        }
    }

    function edit()
    {
        $id_siswa = $this->input->post('id_siswa');
        $nama_siswa         = $this->input->post('nama_siswa');
        $kelas_siswa    = $this->input->post('kelas_siswa');


        $this->load->library('upload');
        $nmfile = "file_" . time();
        $config['upload_path']        = 'assets/img/';
        $config['allowed_types']    = 'gif|jpg|png|jpeg';
        $config['max_size']            = 5120;
        $config['max_width']        = 4300;
        $config['max_height']        = 4300;
        $config['file_name']         = $nmfile;

        $this->upload->initialize($config);

        if ($_FILES['foto_siswa']['name']) {
            if ($this->upload->do_upload('foto_siswa')) {
                $gbr = $this->upload->data();
                $data = array(
                    'nama_siswa'        => $nama_siswa,
                    'kelas_siswa'        => $kelas_siswa,
                    'foto_siswa'                 => $gbr['file_name'],
                );
                $this->db->where('id_siswa', $id_siswa)->update('users', $data);
            }
        } else {
            $data = array(
                'nama_siswa'        => $nama_siswa,
                'kelas_siswa'        => $kelas_siswa,
            );
            $this->db->where('id_siswa', $id_siswa)->update('users', $data);
        }
    }

    function hapus($id)
    {
        $this->db->where('id_siswa', $id)->delete('users');
    }

    function cari()
    {
        $cari         = $this->input->post('cari');
        return $this->db->like('nama_siswa', $cari)->get('users')->result();
    }
}
