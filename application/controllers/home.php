<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
                       
		$this->load->library('session');
	}
	
	// homepage
	public function index() {	
		//print_r($this->session->userdata);	
		$id=$this->session->userdata('objectId');		
		$email=$this->session->userdata('email');				
		$name=$this->session->userdata('user_fullname');
		$image=$this->session->userdata('user_profile_picture');		
		
		
		$data = array(
			'pagename'			=> 'homepage',
			'baseUrl'				=> $this->config->base_url(),
			'title'   					=> 'test',
			'meta'					=> array(
                'title' 					=> '',
				'key_words' 		=> '',
				'description' 		=> ''
			),
			'id'					=>$id,
			'email'					=>$email,
			'name'					=>$name,
			'image'					=>$image,
			'session_token'		=>$this->session->userdata('sessionToken')
		);
				
        $this->load->view('template/header', $data);
		$this->load->view('home', $data);
		$this->load->view('template/footer', $data);
	}
	

	
}