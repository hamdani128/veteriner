<?php

// use chriskacerguis\RestServer\RestController;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/JWT.php';
require APPPATH . '/libraries/ExpiredException.php';
require APPPATH . '/libraries/BeforeValidException.php';
require APPPATH . '/libraries/SignatureInvalidException.php';
require APPPATH . '/libraries/JWK.php';

require APPPATH . '/libraries/REST_Controller.php';
// require APPPATH . 'libraries/Format.php';


class Api extends REST_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('berita_model');
    }
    
    // function configToken(){
    //     $cnf['exp'] = 10; //detik
    //     $cnf['secretkey'] = '2212336221';
    //     return $cnf;		
    // }

    public function berita_get(){// testing response
        $response['status']=200;
        $response['error']=false;
        // $response['message']='Hai from response';// tampilkan response
        // $this->response($response);
        $response = $this->berita_model->listing();
        $this->response($response);
    }

    // public function index()
    // {
    //     $response = $this->berita_model->all_kategori();
    //     $this->response($response);
    // }

    // public function auth()
    // {
    //     echo "jalankan";
    // }
    
}