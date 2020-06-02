<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_kegiatan extends CI_Model
{

    function tampil()
    {
        return $this->db->get('tb_kegiatan')->result();
    }

    function tambah()
    {
        
        $id_masjid_kegiatan    = $this->input->post('id_masjid_kegiatan');
        $tanggal_kegiatan   = $this->input->post('tanggal_kegiatan');
        $waktu_kegiatan   = $this->input->post('waktu_kegiatan');
        $penanggung_jawab_acara   = $this->input->post('penanggung_jawab_acara');
        $deskripsi_kegiatan   = $this->input->post('deskripsi_kegiatan');
       



        $this->load->library('upload');
        $nmfile = "file_" . time();
        $config['upload_path']        = 'assets/img/';
        $config['allowed_types']    = 'gif|jpg|png|jpeg';
        $config['max_size']            = 5120;
        $config['max_width']        = 4300;
        $config['max_height']        = 4300;
        $config['file_name']         = $nmfile;

        $this->upload->initialize($config);

        if ($_FILES['foto_kegiatan']['name']) {
            if ($this->upload->do_upload('foto_kegiatan')) {
                $gbr = $this->upload->data();
                $data = array(
                    'id_masjid_kegiatan'        => $id_masjid_kegiatan,
                    'tanggal_kegiatan'          => $tangal_kegiatan,
                    'waktu_kegiatan'            => $waktu_kegiatan,
                    'penanggung_jawab_acara'    => $penanggung_jawab_acara,
                    'deskripsi_kegiatan'        => $deskripsi_kegiatan,
                    'foto_kegiatan'             => $gbr['file_name'],


                );
                $this->db->insert('tb_kegiatan', $data);
            }
        } else {
            $data = array(
                'id_masjid_kegiatan'        => $id_masjid_kegiatan,
                'tanggal_kegiatan'          => $tangal_kegiatan,
                'waktu_kegiatan'            => $waktu_kegiatan,
                'penanggung_jawab_acara'    => $penanggung_jawab_acara,
                'deskripsi_kegiatan'        => $deskripsi_kegiatan,
                'foto_siswa'                => 'kosong1.png',
            );
            $this->db->insert('tb_kegiatan', $data);
        }
    }

    function edit()
    {
        $id_kegiatan = $this->input->post('id_kegiatan');
        $id_masjid_kegiatan    = $this->input->post('id_masjid_kegiatan');
        $tanggal_kegiatan   = $this->input->post('tanggal_kegiatan');
        $waktu_kegiatan   = $this->input->post('waktu_kegiatan');
        $penanggung_jawab_acara   = $this->input->post('penanggung_jawab_acara');
        $deskripsi_kegiatan   = $this->input->post('deskripsi_kegiatan');


        $this->load->library('upload');
        $nmfile = "file_" . time();
        $config['upload_path']        = 'assets/img/';
        $config['allowed_types']    = 'gif|jpg|png|jpeg';
        $config['max_size']            = 5120;
        $config['max_width']        = 4300;
        $config['max_height']        = 4300;
        $config['file_name']         = $nmfile;

        $this->upload->initialize($config);

        if ($_FILES['foto_kegiatan']['name']) {
            if ($this->upload->do_upload('foto_kegiatan')) {
                $gbr = $this->upload->data();
                $data = array(
                    'id_masjid_kegiatan'        => $id_masjid_kegiatan,
                    'tanggal_kegiatan'          => $tangal_kegiatan,
                    'waktu_kegiatan'            => $waktu_kegiatan,
                    'penanggung_jawab_acara'    => $penanggung_jawab_acara,
                    'deskripsi_kegiatan'        => $deskripsi_kegiatan,
                    'foto_siswa'                => $gbr['file_name'],
                );
                $this->db->where('id_kegiatan', $id_siswa)->update('tb_kegiatan', $data);
            }
        } else {
            $data = array(
                'id_masjid_kegiatan'        => $id_masjid_kegiatan,
                'tanggal_kegiatan'          => $tangal_kegiatan,
                'waktu_kegiatan'            => $waktu_kegiatan,
                'penanggung_jawab_acara'    => $penanggung_jawab_acara,
                'deskripsi_kegiatan'        => $deskripsi_kegiatan,
            );
            $this->db->where('id_kegiatan', $id_siswa)->update('tb_kegiatan', $data);
        }
    }

    function hapus($id)
    {
        $this->db->where('id_kegiatan', $id)->delete('tb_kegiatan');
    }

    function cari()
    {
        $cari         = $this->input->post('cari');
        return $this->db->like('deskripsi_kegiatan', $cari)->get('tb_kegiatan')->result();
    }
}
