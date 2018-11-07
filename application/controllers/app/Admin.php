<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This controller can be accessed 
 * for Admin group only
 */
class Admin extends MY_Controller {

	protected $access = "Admin";
	
	public function index()
	{
		$this->load->view("app/header");
		$this->load->view("app/navbar");
		$this->load->view("app/admin");
		$this->load->view("app/footer");
	}

}