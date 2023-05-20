<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Zona extends CI_Controller
{

    // Load database
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('agenda_model');
        $this->log_user->add_log();
        // Tambahkan proteksi halaman
        $url_pengalihan = str_replace('index.php/', '', current_url());
        $pengalihan     = $this->session->set_userdata('pengalihan', $url_pengalihan);
        // Ambil check login dari simple_login
        $this->simple_login->check_login($pengalihan);
        // $this->load->library('excel');
    }

    // For homepage
    public function index()
    {
        $pengujian = $this->db->select('*')->from('pengujian')->get()->result();
        $data    = array(
            'datazona' => $this->db->get("zona_integritas")->result(),
            'title'    => 'Manajemen Data Zona Integritas',
            'pengujian' => $pengujian,
            'isi'    => 'admin/zona/list'
        );
        $this->load->view('admin/layout/wrapper', $data);
    }


    public function tambah()
    {
        date_default_timezone_set("Asia/Jakarta");
        $now = date("Y-m-d H:i:s");
        $file_image = $_FILES["file_img"];
        $new_name = time() . "-" . date('Ymd');
        $config['upload_path']          = './assets/upload/zona/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']            = 2048;
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file_img')) {
            // $error = array('error' => $this->upload->display_errors());
            $response = array(
                'status' => 'img_error',
                'message' => $this->upload->display_errors . " Upload failed",
            );
        } else {
            $data = array('upload_data' => $this->upload->data());
            $data2 = array(
                'file_img' => $data['upload_data']['file_name'],
                'keterangan' => $this->input->post("keterangan"),
                'url' => $this->input->post("url"),
                'user_id' => $this->session->userdata('id_user'),
                'created_at' => $now,
                'updated_at' => $now
            );
            $query = $this->db->insert("zona_integritas", $data2);
            $response = array(
                'status' => 'success',
                'message' => 'Slider updated successfully',
            );
        }
        echo json_encode($response);
    }

    public function edit_show()
    {
        date_default_timezone_set("Asia/Jakarta");
        $now = date("Y-m-d H:i:s");
        $id = $this->input->post('id');
        $this->db->select('*');
        $this->db->from('zona_integritas');
        $this->db->where('id', $id);
        $row = $this->db->get()->row();
        $data = array(
            'id' => $id,
            'file_img' => $row->file_img,
            'url' => $row->url,
            'keterangan' => $row->keterangan,
        );
        echo json_encode($data);
    }

    public function update()
    {
        date_default_timezone_set("Asia/Jakarta");
        $now = date("Y-m-d H:i:s");
        $url = $this->input->post('url_update');
        $keterangan = $this->input->post('keterangan_update');
        $id = $this->input->post("id_update");
        $this->db->select('*');
        $this->db->from('zona_integritas');
        $this->db->where('id', $id);
        $row = $this->db->get()->row();
        $files = $_FILES["file_img_update"];
        $new_name = time() . "-" . date('Ymd');
        if (empty($files)) {
            $data2 = array(
                'url' => $url,
                'keterangan' => $keterangan,
                'user_id' => $this->session->userdata('id_user'),
                'updated_at' => $now,
            );
            $this->db->where('id', $id);
            $query = $this->db->update("zona_integritas", $data2);
            $response = array(
                'status' => 'success',
                'message' => 'Updated successfully'
            );
        } else {
            $path = './assets/upload/zona/' . $row->file_img;
            unlink($path);
            $config['upload_path']          = './assets/upload/zona/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']            = 2048;
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('file_img_update')) {
                // $error = array('error' => $this->upload->display_errors());
                $response = array(
                    'status' => 'img_error',
                    'message' => $this->upload->display_errors() . " Upload failed",
                );
            } else {
                $data = array('upload_data' => $this->upload->data());
            }
            $data2 = array(
                'file_img' => $data['upload_data']['file_name'],
                'url' => $url,
                'keterangan' => $keterangan,
                'user_id' => $this->session->userdata('id_user'),
                'updated_at' => $now,
            );
            $this->db->where('id', $id);
            $query = $this->db->update("zona_integritas", $data2);
            $response = array(
                'status' => 'success',
                'message' => 'Updated successfully'
            );
        }
        echo json_encode($response);
    }

    public function delete()
    {
        $id = $this->input->post("id");
        $this->db->select('*');
        $this->db->from('zona_integritas');
        $this->db->where('id', $id);
        $row = $this->db->get()->row();
        $path = './assets/upload/zona/' . $row->file_img;
        unlink($path);
        $query = $this->db->delete('zona_integritas', array('id' => $id));
        if ($query) {
            $response = array(
                'status' => 'success',
                'message' => 'Deleted successfully'
            );
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'error deleting'
            );
        }
        echo json_encode($response);
    }
}
