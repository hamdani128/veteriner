<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Pengujian extends CI_Controller
{

	// Load database
	public function __construct()
	{
		parent::__construct();
		// $this->load->model('agenda_model');
		$this->log_user->add_log();
		// Tambahkan proteksi halaman
		$url_pengalihan = str_replace('index.php/', '', current_url());
		$pengalihan 	= $this->session->set_userdata('pengalihan', $url_pengalihan);
		// Ambil check login dari simple_login
		$this->simple_login->check_login($pengalihan);
		// $this->load->library('excel');
	}

	// For homepage
	public function index()
	{
		$pengujian = $this->db->select('*')->from('pengujian')->get()->result();
		$data	= array(
			// 'dataepidomologi' => $data_epidomologi,
			'title'	=> 'Manajemen Data Pengujian',
			'pengujian' => $pengujian,
			'isi'	=> 'admin/pengujian/list'
		);
		$this->load->view('admin/layout/wrapper', $data);
	}

	public function import_file()
	{
		$this->load->library('excel');
		if (isset($_FILES['fileExcel']['name'])) {
			$path = $_FILES['fileExcel']['tmp_name'];
			$object = PHPExcel_IOFactory::load($path);
			foreach ($object->getWorksheetIterator() as $worksheet) {
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for ($row = 2; $row <= $highestRow; $row++) {
					$pengujian = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$harga = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$temp_data = array(
						'pengujian' => $pengujian,
						'harga' => $harga,
					);
					$this->db->insert('pengujian', $temp_data);
				}
			}
			$response = [
				'status' => 'success',
				'message' => 'Data Epidiomologi berhasil disimpan',
			];
			echo json_encode($response);
		} else {
			$response = [
				'status' => 'success',
				'message' => 'Data Epidiomologi berhasil disimpan',
			];
			echo json_encode($response);
		}
	}

	public function tambah()
	{
		$jenis_pengujian = $_POST['pengujian'];
		$harga = $_POST['harga'];
		$temp_data = array(
			'pengujian' => $jenis_pengujian,
			'harga' => $harga,
		);
		$query = $this->db->insert('pengujian', $temp_data);
		if ($query) {
			$response = [
				'status' => 'success',
				'message' => 'Data Epidiomologi berhasil disimpan',
			];
		} else {
			$response = [
				'status' => 'gagal',
				'message' => 'Data Epidiomologi Gagal disimpan',
			];
		}
		echo json_encode($response);
	}

	public function edit_show()
	{
		$id = $_POST['id'];
		$SQL = "SELECT * FROM pengujian WHERE id = '" . $id . "'";
		$value = $this->db->query($SQL)->row();
		$data = [
			'pengujian' => $value->pengujian,
			'harga' => $value->harga,
		];
		echo json_encode($data);
	}

	public function update()
	{
		$jenis_pengujian = $_POST['pengujian'];
		$harga = $_POST['harga'];
		$id = $_POST['id'];
		$SQL = "UPDATE pengujian SET pengujian='" . $jenis_pengujian . "',harga='" . $harga . "' WHERE id='" . $id . "'";
		$query = $this->db->query($SQL);
		if ($query) {
			$response = [
				'status' => 'success',
				'message' => 'Data Pengujian berhasil Diubah ',
			];
		} else {
			$response = [
				'status' => 'gagal',
				'message' => 'Data Pengujian Gagal Diubah ',
			];
		}
		echo json_encode($response);
	}

	public function delete()
	{
		$id = $_POST['id'];
		$SQL = "DELETE FROM pengujian WHERE id='" . $id . "'";
		$query = $this->db->query($SQL);
		if ($query) {
			$response = [
				'status' => 'success',
				'message' => 'Data Pengujian berhasil Dihapus ',
			];
		} else {
			$response = [
				'status' => 'gagal',
				'message' => 'Data Pengujian Gagal Dihapus ',
			];
		}
		echo json_encode($response);
	}
}