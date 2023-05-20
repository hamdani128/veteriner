<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('berita_model');
		$this->load->model('kategori_model');
		$this->load->model('download_model');
		$this->load->model('galeri_model');
		$this->log_user->add_log();
		// Tambahkan proteksi halaman
		$url_pengalihan = str_replace('index.php/', '', current_url());
		$pengalihan 	= $this->session->set_userdata('pengalihan', $url_pengalihan);
		// Ambil check login dari simple_login
		$this->simple_login->check_login($pengalihan);
	}

	// Halaman berita
	public function index()
	{
		// $berita = $this->berita_model->listing();
		$berita = $this->db->get("berita_new")->result();
		// $site 	= $this->konfigurasi_model->listing();

		$data = array(
			'title'			=> 'Berita/Profil (' . count($berita) . ')',
			'berita'		=> $berita,
			// 'site'			=> $site,
			'isi'			=> 'admin/berita/list2'
		);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Halaman download
	public function files()
	{
		$download = $this->download_model->listing();
		$data = array(
			'title'			=> 'Download',
			'download'		=> $download
		);
		$this->load->view('admin/berita/files', $data, FALSE);
	}

	// Halaman download
	public function gambar()
	{
		$galeri = $this->galeri_model->listing();
		$data = array(
			'title'			=> 'Galeri',
			'galeri'		=> $galeri
		);
		$this->load->view('admin/berita/gambar', $data, FALSE);
	}

	// Jenis berita
	public function jenis_berita($jenis_berita)
	{
		$berita = $this->berita_model->jenis_admin($jenis_berita);
		$data = array(
			'title'			=> 'Jenis berita: ' . $jenis_berita . ' (' . count($berita) . ')',
			'berita'		=> $berita,
			'isi'			=> 'admin/berita/list'
		);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Status berita
	public function status_berita($status_berita)
	{
		$berita = $this->berita_model->status_admin($status_berita);
		$data = array(
			'title'			=> 'Status berita: ' . $status_berita . ' (' . count($berita) . ')',
			'berita'		=> $berita,
			'isi'			=> 'admin/berita/list'
		);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Proses
	public function proses()
	{
		$site = $this->konfigurasi_model->listing();
		// PROSES HAPUS MULTIPLE
		if (isset($_POST['hapus'])) {
			$inp 				= $this->input;
			$id_beritanya		= $inp->post('id_berita');

			for ($i = 0; $i < sizeof($id_beritanya); $i++) {
				$berita 	= $this->berita_model->detail($id_beritanya[$i]);
				if ($berita->gambar != '') {
					unlink('./assets/upload/berita/' . $berita->gambar);
					unlink('./assets/upload/berita/thumbs/' . $berita->gambar);
				}
				$data = array('id_berita'	=> $id_beritanya[$i]);
				$this->berita_model->delete($data);
			}

			$this->session->set_flashdata('sukses', 'Data telah dihapus');
			redirect(base_url('admin/berita'), 'refresh');
			// PROSES SETTING DRAFT
		} elseif (isset($_POST['draft'])) {
			$inp 				= $this->input;
			$id_beritanya		= $inp->post('id_berita');

			for ($i = 0; $i < sizeof($id_beritanya); $i++) {
				$berita 	= $this->berita_model->detail($id_beritanya[$i]);
				$data = array(
					'id_berita'		=> $id_beritanya[$i],
					'status_berita'	=> 'Draft'
				);
				$this->berita_model->edit($data);
			}

			$this->session->set_flashdata('sukses', 'Data telah diset untuk tidak dipublikasikan');
			redirect(base_url('admin/berita'), 'refresh');
			// PROSES SETTING PUBLISH
		} elseif (isset($_POST['publish'])) {
			$inp 				= $this->input;
			$id_beritanya		= $inp->post('id_berita');

			for ($i = 0; $i < sizeof($id_beritanya); $i++) {
				$berita 	= $this->berita_model->detail($id_beritanya[$i]);
				$data = array(
					'id_berita'		=> $id_beritanya[$i],
					'status_berita'	=> 'Publish'
				);
				$this->berita_model->edit($data);
			}

			$this->session->set_flashdata('sukses', 'Data telah dipublikasikan');
			redirect(base_url('admin/berita'), 'refresh');
		}
	}

	// Kategori berita
	public function kategori($id_kategori)
	{
		$berita 	= $this->berita_model->kategori_admin($id_kategori);
		$kategori 	= $this->kategori_model->detail($id_kategori);

		$data = array(
			'title'			=> 'Kategori berita: ' . $kategori->nama_kategori . ' (' . count($berita) . ')',
			'berita'		=> $berita,
			'isi'			=> 'admin/berita/list'
		);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Author berita
	public function author($id_user)
	{
		$berita 	= $this->berita_model->author_admin($id_user);
		$user 		= $this->user_model->detail($id_user);

		$data = array(
			'title'			=> 'Penulis berita: ' . $user->nama . ' (' . count($berita) . ')',
			'berita'		=> $berita,
			'isi'			=> 'admin/berita/list'
		);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Tambah berita
	public function tambah()
	{
		// $this->session->set_userdata('upload_image_file_manager',true);
		$kategori = $this->kategori_model->listing();
		$this->session->set_userdata('upload_image_file_manager', true);

		// // Validasi
		// $valid = $this->form_validation;

		// $valid->set_rules(
		// 	'judul_berita',
		// 	'Judul',
		// 	'required',
		// 	array('required'	=> 'Judul harus diisi')
		// );

		// $valid->set_rules(
		// 	'isi',
		// 	'Isi',
		// 	'required',
		// 	array('required'	=> 'Isi berita harus diisi')
		// );

		// if ($valid->run()) {
		// 	if (!empty($_FILES['gambar']['name'])) {
		// 		$config['upload_path']   = './assets/upload/image/';
		// 		$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
		// 		$config['max_size']      = '12000'; // KB  
		// 		$this->load->library('upload', $config);
		// 		if (!$this->upload->do_upload('gambar')) {
		// 			// End validasi

		// 			$data = array(
		// 				'title'			=> 'Tambah Berita/Profil',
		// 				'kategori'		=> $kategori,
		// 				'error'    		=> $this->upload->display_errors(),
		// 				'isi'			=> 'admin/berita/tambah'
		// 			);
		// 			$this->load->view('admin/layout/wrapper', $data, FALSE);
		// 			// Masuk database
		// 		} else {
		// 			$upload_data        		= array('uploads' => $this->upload->data());
		// 			// Image Editor
		// 			$config['image_library']  	= 'gd2';
		// 			$config['source_image']   	= './assets/upload/image/' . $upload_data['uploads']['file_name'];
		// 			$config['new_image']     	= './assets/upload/image/thumbs/';
		// 			$config['create_thumb']   	= TRUE;
		// 			$config['quality']       	= "100%";
		// 			$config['maintain_ratio']   = TRUE;
		// 			$config['width']       		= 360; // Pixel
		// 			$config['height']       	= 360; // Pixel
		// 			$config['x_axis']       	= 0;
		// 			$config['y_axis']       	= 0;
		// 			$config['thumb_marker']   	= '';
		// 			$this->load->library('image_lib', $config);
		// 			$this->image_lib->resize();

		// 			$i 		= $this->input;
		// 			$slug 	= url_title($i->post('judul_berita'), 'dash', TRUE);

		// 			$data = array(
		// 				'id_kategori'	=> $i->post('id_kategori'),
		// 				'id_user'		=> $this->session->userdata('id_user'),
		// 				'slug_berita'	=> $slug,
		// 				'judul_berita'	=> $i->post('judul_berita'),
		// 				'isi'			=> $i->post('isi'),
		// 				'jenis_berita'	=> $i->post('jenis_berita'),
		// 				'status_berita'	=> $i->post('status_berita'),
		// 				'gambar'		=> $upload_data['uploads']['file_name'],
		// 				'icon'			=> $i->post('icon'),
		// 				'keywords'		=> $i->post('keywords'),
		// 				'tanggal_publish' => date('Y-m-d', strtotime($i->post('tanggal_publish'))) . ' ' . $i->post('jam_publish'),
		// 				// 'tanggal_mulai'		=> $i->post('tanggal_mulai'),
		// 				// 'tanggal_selesai'		=> $i->post('tanggal_selesai'),
		// 				'urutan'	=> $i->post('urutan'),
		// 				'tanggal_post'	=> date('Y-m-d H:i:s'),
		// 			);
		// 			$this->berita_model->tambah($data);
		// 			$this->session->set_flashdata('sukses', 'Data telah ditambah');
		// 			redirect(base_url('admin/berita/jenis_berita/' . $i->post('jenis_berita')), 'refresh');
		// 		}
		// 	} else {
		// 		$i 		= $this->input;
		// 		$slug 	= url_title($i->post('judul_berita'), 'dash', TRUE);

		// 		$data = array(
		// 			'id_kategori'	=> $i->post('id_kategori'),
		// 			'id_user'		=> $this->session->userdata('id_user'),
		// 			'slug_berita'	=> $slug,
		// 			'judul_berita'	=> $i->post('judul_berita'),
		// 			'isi'			=> $i->post('isi'),
		// 			'jenis_berita'	=> $i->post('jenis_berita'),
		// 			'status_berita'	=> $i->post('status_berita'),
		// 			'icon'			=> $i->post('icon'),
		// 			'keywords'		=> $i->post('keywords'),
		// 			'tanggal_publish' => date('Y-m-d', strtotime($i->post('tanggal_publish'))) . ' ' . $i->post('jam_publish'),
		// 			// 'tanggal_mulai'		=> $i->post('tanggal_mulai'),
		// 			// 'tanggal_selesai'		=> $i->post('tanggal_selesai'),
		// 			'urutan'	=> $i->post('urutan'),
		// 			'tanggal_post'	=> date('Y-m-d H:i:s'),
		// 		);
		// 		$this->berita_model->tambah($data);
		// 		$this->session->set_flashdata('sukses', 'Data telah ditambah');
		// 		redirect(base_url('admin/berita/jenis_berita/' . $i->post('jenis_berita')), 'refresh');
		// 	}
		// }
		// End masuk database
		$data = array(
			'title'			=> 'Tambah Berita/Profil',
			'kategori'		=> $kategori,
			'isi'			=> 'admin/berita/tambah_new'
		);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Edit berita
	public function edit($id_berita)
	{
		$this->session->set_userdata('upload_image_file_manager', true);
		$kategori 	= $this->kategori_model->listing();
		$berita 	= $this->berita_model->detail($id_berita);
		$this->session->set_userdata('upload_image_file_manager', true);

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules(
			'judul_berita',
			'Judul',
			'required',
			array('required'	=> 'Judul harus diisi')
		);

		$valid->set_rules(
			'isi',
			'Isi',
			'required',
			array('required'	=> 'Isi berita harus diisi')
		);

		if ($valid->run()) {

			if (!empty($_FILES['gambar']['name'])) {

				$config['upload_path']   = './assets/upload/image/';
				$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
				$config['max_size']      = '12000'; // KB  
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('gambar')) {
					// End validasi

					$data = array(
						'title'			=> 'Edit Berita/Profil',
						'kategori'		=> $kategori,
						'berita'		=> $berita,
						'error'    		=> $this->upload->display_errors(),
						'isi'			=> 'admin/berita/edit'
					);
					$this->load->view('admin/layout/wrapper', $data, FALSE);
					// Masuk database
				} else {
					$upload_data        		= array('uploads' => $this->upload->data());
					// Image Editor
					$config['image_library']  	= 'gd2';
					$config['source_image']   	= './assets/upload/image/' . $upload_data['uploads']['file_name'];
					$config['new_image']     	= './assets/upload/image/thumbs/';
					$config['create_thumb']   	= TRUE;
					$config['quality']       	= "100%";
					$config['maintain_ratio']   = TRUE;
					$config['width']       		= 360; // Pixel
					$config['height']       	= 360; // Pixel
					$config['x_axis']       	= 0;
					$config['y_axis']       	= 0;
					$config['thumb_marker']   	= '';
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					//Hapus gambar
					if ($berita->gambar != "") {
						unlink('./assets/upload/image/' . $berita->gambar);
						unlink('./assets/upload/image/thumbs/' . $berita->gambar);
					}
					// End hapus

					$i 		= $this->input;
					$slug 	= url_title($i->post('judul_berita'), 'dash', TRUE);

					$data = array(
						'id_berita'		=> $id_berita,
						'id_kategori'	=> $i->post('id_kategori'),
						'id_user'		=> $this->session->userdata('id_user'),
						'slug_berita'	=> $slug,
						'judul_berita'	=> $i->post('judul_berita'),
						'isi'			=> $i->post('isi'),
						'jenis_berita'	=> $i->post('jenis_berita'),
						'status_berita'	=> $i->post('status_berita'),
						'icon'			=> $i->post('icon'),
						'gambar'		=> $upload_data['uploads']['file_name'],
						'keywords'		=> $i->post('keywords'),
						'tanggal_publish' => date('Y-m-d', strtotime($i->post('tanggal_publish'))) . ' ' . $i->post('jam_publish'),
						// 'tanggal_mulai'		=> $i->post('tanggal_mulai'),
						// 'tanggal_selesai'		=> $i->post('tanggal_selesai'),
						'urutan'	=> $i->post('urutan'),
					);
					$this->berita_model->edit($data);
					$this->session->set_flashdata('sukses', 'Data telah diedit');
					redirect(base_url('admin/berita/jenis_berita/' . $i->post('jenis_berita')), 'refresh');
				}
			} else {
				$i 		= $this->input;
				$slug 	= url_title($i->post('judul_berita'), 'dash', TRUE);

				$data = array(
					'id_berita'		=> $id_berita,
					'id_kategori'	=> $i->post('id_kategori'),
					'id_user'		=> $this->session->userdata('id_user'),
					'slug_berita'	=> $slug,
					'judul_berita'	=> $i->post('judul_berita'),
					'isi'			=> $i->post('isi'),
					'jenis_berita'	=> $i->post('jenis_berita'),
					'status_berita'	=> $i->post('status_berita'),
					'icon'			=> $i->post('icon'),
					'keywords'		=> $i->post('keywords'),
					'tanggal_publish' => date('Y-m-d', strtotime($i->post('tanggal_publish'))) . ' ' . $i->post('jam_publish'),
					// 'tanggal_mulai'		=> $i->post('tanggal_mulai'),
					// 'tanggal_selesai'		=> $i->post('tanggal_selesai'),
					'urutan'	=> $i->post('urutan'),
				);
				$this->berita_model->edit($data);
				$this->session->set_flashdata('sukses', 'Data telah diedit');
				redirect(base_url('admin/berita/jenis_berita/' . $i->post('jenis_berita')), 'refresh');
			}
		}
		// End masuk database
		$data = array(
			'title'			=> 'Edit Berita/Profil',
			'kategori'		=> $kategori,
			'berita'		=> $berita,
			'isi'			=> 'admin/berita/edit'
		);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}


	// Delete
	public function delete()
	{
		$id_berita = $_POST['id'];
		// echo $id_berita;
		// Tambahkan proteksi halaman
		$url_pengalihan = str_replace('index.php/', '', current_url());
		$pengalihan 	= $this->session->set_userdata('pengalihan', $url_pengalihan);
		// Ambil check login dari simple_login
		$this->simple_login->check_login($pengalihan);


		$berita = $this->berita_model->detail($id_berita);
		// Proses hapus gambar
		if ($berita->gambar != "") {
			unlink('./assets/upload/image/' . $berita->gambar);
			unlink('./assets/upload/image/thumbs/' . $berita->gambar);
		}
		// End hapus gambar
		$data = array('id_berita'	=> $id_berita);
		$this->berita_model->delete($data);
		// $this->session->set_flashdata('sukses', 'Data telah dihapus');
		// redirect(base_url('admin/berita'), 'refresh');
		// if ($query) {
		$response = [
			'status' => 'success',
			'message' => 'Data Berhasil Dihapus !',
		];
		echo json_encode($response);
		// }
	}

	public function insert_berita_detail()
	{
		date_default_timezone_set('Asia/Jakarta');
		$now = date('Y-m-d H:i:s');
		$file_img = $_FILES['file_img'];
		$keterangan = $this->input->post("keterangan");
		$new_name = time() . "-" . date('Ymd');
		$config['upload_path']          = './assets/upload/berita/detail/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']            = 2048;
		$config['file_name'] = $new_name;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('file_img')) {
			$response = array(
				'status' => 'img_error',
				'message' => $this->upload->display_errors . " Upload failed",
			);
		} else {
			$data = array('upload_data' => $this->upload->data());
			$data2 = [
				'kode_berita' => $this->berita_model->code_berita(),
				'file_image' => $data['upload_data']['file_name'],
				'detail' => $keterangan,
				'user_id' => '1',
				'created_at' => $now,
				'updated_at' => $now,
			];
			$query = $this->db->insert("berita_new_detail", $data2);
		}
	}

	public function insert_berita_new()
	{
		date_default_timezone_set('Asia/Jakarta');
		$now = date('Y-m-d H:i:s');
		$kategori = $this->input->post("cmb_kategori");
		$judul_berita = $this->input->post("judul_berita");
		$detail = $this->input->post("summernote");
		$detail2 = $this->input->post("summernote2");
		$sumber = $this->input->post("sumber");
		$penulis = $this->input->post("penulis");
		$kode_berita = $this->berita_model->code_berita();
		$slug = url_title($judul_berita, 'dash', true);
		$file_images = $_FILES['file_img'];
		$new_name = time() . "-" . date('Ymd');

		$config['upload_path']          = './assets/upload/berita/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']            = 2048;
		$config['file_name'] = $new_name;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('file_img')) {
			$response = array(
				'status' => 'img_error',
				'message' => $this->upload->display_errors . " Upload failed",
			);
		} else {
			$data = array('upload_data' => $this->upload->data());
			$data2 = [
				'kode_berita' => $kode_berita,
				'kategori' => $kategori,
				'judul' => $judul_berita,
				'file_img' => $data['upload_data']['file_name'],
				'detail1' => $detail,
				'detail2' => $detail2,
				'sumber' => $sumber,
				'penulis' => $penulis,
				'slug' => $slug,
				'user_id' => '1',
				'created_at' => $now,
				'updated_at' => $now,
			];
			$query = $this->db->insert("berita_new", $data2);
			if ($query) {
				$response = array(
					'status' => 'success',
					'message' => 'Slider updated successfully',
				);
				echo json_encode($response);
			}
		}
	}

	public function delete_new()
	{
		$id = $this->input->post("id");
		$berita_value = $this->db->where("id", $id)->get("berita_new")->row();
		$kode_berita = $berita_value->kode_berita;
		$berita_detaiL_result = $this->db->where("kode_berita", $kode_berita)->get("berita_new_detail")->result();
		$folder_path = './assets/upload/berita/';
		$folder_path_detail = './assets/upload/berita/detail/';
		if (empty($berita_detaiL_result)) {
			unlink($folder_path . $berita_value->file_img);
			$query1 = $this->db->where("id", $id)->delete("berita_new");
			if ($query1) {
				$response = array(
					'status' => 'success',
					'message' => 'Deleted Successfully'
				);
				echo json_encode($response);
			}
		} else {
			unlink($folder_path . $berita_value->file_img);
			foreach ($berita_detaiL_result as $row) {
				unlink($folder_path_detail . $row->file_image);
			}
			$query1 = $this->db->where("id", $id)->delete("berita_new");
			$query2 = $this->db->where("kode_berita", $kode_berita)->delete("berita_new_detail");
			if ($query1 && $query2) {
				$response = array(
					'status' => 'success',
					'message' => 'Deleted Successfully'
				);
				echo json_encode($response);
			}
		}
	}
}

/* End of file Berita.php */
/* Location: ./application/controllers/admin/Berita.php */