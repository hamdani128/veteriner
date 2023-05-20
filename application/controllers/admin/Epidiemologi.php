<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Epidiemologi extends CI_Controller
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
		// $data['news'] = $this->news_model->get_news();
		$data_epidomologi = $this->db->select('*')->from('epidomologi')->get()->result();
		$data	= array(
			'dataepidomologi' => $data_epidomologi,
			'title'	=> 'Manajemen Data Epidiemologi',
			'isi'	=> 'admin/epidiemologi/list'
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
					$no_epidomologi = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$status = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$link = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$temp_data = array(
						'epidomologi' => $no_epidomologi,
						'status' => $status,
						'link' => $link
					);
					$this->db->insert('epidomologi', $temp_data);
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


	public function show_edit()
	{
		$id = $this->input->post('id');
		$SQL = "SELECT * FROM epidomologi WHERE id = '" . $id . "'";
		$value = $this->db->query($SQL)->row();
		$data = array(
			'epidiemologi' => $value->epidomologi,
			'status' => $value->status,
			'link' => $value->link,
		);
		echo json_encode($data);
	}

	public function update_data()
	{
		$id = $this->input->post('id');
		$no_epidiemologi = $this->input->post('no_epidiemologi');
		$status = $this->input->post('status');
		$link = $this->input->post('link');

		$SQL = "UPDATE epidomologi SET epidomologi='" . $no_epidiemologi . "',status='" . $status . "',link='" . $link . "' WHERE id='" . $id . "'";
		$query = $this->db->query($SQL);
		if ($query) {
			$response = [
				'status' => 'success',
				'message' => 'Success Update',
			];
		} else {
			$response = [
				'status' => 'error',
				'message' => 'Error Update',
			];
		}
		echo json_encode($response);
	}


	public function delete()
	{
		$id = $this->input->post('id');
		$SQL = "DELETE FROM epidomologi WHERE id = '" . $id . "'";
		$query = $this->db->query($SQL);
		if ($query) {
			$response = [
				'status' => 'success',
				'message' => 'Success Delete',
			];
		} else {
			$response = [
				'status' => 'error',
				'message' => 'Error Delete',
			];
		}
		echo json_encode($response);
	}
}
