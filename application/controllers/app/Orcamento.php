<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class Orcamento extends CI_Controller {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();

		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('Orcamento_model','ObjOrcamento');

		$data = new stdClass();
		
		if (!$this->session->userdata("logged_in")) {
			redirect(base_url("app/Auth/logout"));
		}		
	}

	public function index() {
		//Define os dados do header HTML.
		$dados_header = array(
			'titulo' => 'Painel Administrativo',
			'descricao' => 'Painel Administrativo',
			'palavras_chave' => 'Painel Administrativo '	
		);

		$dados['orcamentos'] = $this->ObjOrcamento->get();

		$this->load->view("app/header_html", $dados_header);
		$this->load->view("app/view_menu");
		$this->load->view("app/orcamento/view_lista_orcamento",$dados);
		$this->load->view("app/footer_html");		
	}

	public function orcamento() {
		// create the data object
		$data = new stdClass();
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		$dados['mensagem'] = $this->ObjOrcamento->getOrcamento();
		// validation not ok, send validation errors to the view
		$this->load->view('app/header');
		$this->load->view('app/menu');
		$this->load->view('app/orcamento/lista_mensagem', $dados);
		$this->load->view('app/rodape');
		$this->load->view('app/footer');
	}

	public function edit($id) {
		// create the data object
		$data = new stdClass();
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');

		$dados['row'] = $this->ObjOrcamento->getDados($id);
		// validation not ok, send validation errors to the view

		$this->load->view('app/header');
		$this->load->view('app/menu');
		$this->load->view('app/mensagem/lista_mensagem', $dados);
		$this->load->view('app/rodape');
		$this->load->view('app/footer');
	}
}