<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This controller can be accessed 
 * for all logged in users
 */
class Dashboard extends MY_Controller {	
	public function __construct(){
		parent::__construct();

		if (!$this->session->userdata("logged_in")) {
			redirect(base_url("app/auth/logout"));
		}	
	}

	public function index()
	{
		
		$this->load->view("app/header_html");
		$this->load->view("app/view_menu");
		$this->load->view("app/dashboard");
		$this->load->view("app/footer_html");
	}

}