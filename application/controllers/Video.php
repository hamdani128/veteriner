<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('video_model');
	}

	// Main page video
	public function index()	{
		$site 		= $this->konfigurasi_model->listing();

		// Video dan paginasi
		$this->load->library('pagination');
		$config['base_url'] 		= base_url().'video/index/';
		$config['total_rows'] 		= $this->video_model->total()->total;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] 		= 5;
		$config['uri_segment'] 		= 3;
		$config['per_page'] 		= 12;
		$config['first_url'] 		= base_url().'video/';
		$this->pagination->initialize($config); 
		$page 		= ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * $config['per_page'] : 0;
		$video 	= $this->video_model->video($config['per_page'], $page);
		// End paginasi

		// pengujian
		$pengujian = $this->db->select('*')->from('pengujian')->get()->result();
		$data = array(	'title'		=> 'Video - '.$site->namaweb,
						'deskripsi'	=> 'Video - '.$site->namaweb,
						'keywords'	=> 'Video - '.$site->namaweb,
						'pagin' 	=> $this->pagination->create_links(),
						'video'		=> $video,
						'pengujian'    => $pengujian,
						'isi'		=> 'video/list');
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// Read page video
	public function read($id_video)	{
		$site 		= $this->konfigurasi_model->listing();
		$video 		= $this->video_model->detail($id_video);

		$data = array(	'title'		=> $video->judul,
						'deskripsi'	=> $video->judul,
						'keywords'	=> $video->judul,
						'video'		=> $video,
						'isi'		=> 'video/read');
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function check()
	{
		$inp = $this->input;
		$no_epi = $inp->post("no_epidomologi");
		$data =  $this->db->get_where('epidomologi',array('epidomologi'=>$no_epi))->result();
		if (count($data) > 0){
		    foreach ($data as $row) {
				$temp_data = array();
				$temp_data['epidomologi'] = $row->epidomologi;
				$temp_data['status'] = $row->status;
				$temp_data['link'] = $row->link;		
			}
		}else{
			$temp_data = array();
            $temp_data['epidomologi'] = "";
            $temp_data['status'] = "";
            $temp_data['link'] = "";
		}
		echo json_encode($temp_data);
	}

	public function check_pengujian()
	{
		$inp = $this->input;
		$pengujian = $inp->post("pengujian");
		$jumlah = $inp->post("jumlah");
		$kategori = $inp->post("kategori");
		$data =  $this->db->get_where("pengujian", array("pengujian"=>$pengujian))->row_object();
		$harga = $data->harga;
		if($kategori == 'mahasiswa'){
			$hasil = ($harga * $jumlah) * 0.5;
		}else{
			$hasil = $harga * $jumlah;
		}
		$temp['hasil'] = $hasil;
		echo json_encode($temp);
	}

}

/* End of file Video.php */
/* Location: ./application/controllers/Video.php */