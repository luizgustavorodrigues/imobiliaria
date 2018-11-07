<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This controller can be accessed 
 * for Author group only
 */
class Author extends MY_Controller {	

	protected $access = "Author";

	public function index()
	{
		$this->load->view("app/header");
		$this->load->view("app/navbar");
		$this->load->view("app/author");
		$this->load->view("app/footer");
	}

}