<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Seo extends CI_Controller {
	
	public function __construct(){
		parent::__construct();

		$this->load->model('Seo_model', 'ObjSeo');

		if (!$this->session->userdata("logged_in")) {
			redirect(base_url("app/Auth/logout"));
		}	
	}

	public function index($id = 1){
		
		//Define os dados do header HTML.
		$dados_header = array(
			'titulo' => 'Painel Administrativo',
			'descricao' => 'Painel Administrativo',
			'palavras_chave' => 'Painel Administrativo '	
		);
		if ($id != 1) {
			$id = 1;
		}
		$dados['row']	 = $this->ObjSeo->getId($id);
      	$this->load->view("app/header_html", $dados_header);
		$this->load->view("app/view_menu");
		$this->load->view("app/seo/view_form_seo",$dados);
		$this->load->view("app/footer_html");
	}

	public function editar($id){
		
		//Define os dados do header HTML.
		$dados_header = array(
			'titulo' => 'Painel Administrativo',
			'descricao' => 'Painel Administrativo',
			'palavras_chave' => 'Painel Administrativo '	
		);
		$dados['row']	 = $this->ObjSeo->getId($id);
      	$this->load->view("app/header_html", $dados_header);
		$this->load->view("app/view_menu");
		$this->load->view("app/config/view_config",$dados);
		$this->load->view("app/footer_html");
	}

	public function alterar(){
		$codigo		 	= $this->input->post('codigo');
		$title		 	= $this->input->post('title');
		$description	= $this->input->post('description');
		$keywords		= $this->input->post('keywords');
		$verification	= $this->input->post('verification');
		$tagmanager		= $this->input->post('tagmanager');
		$tagbody	 	= $this->input->post('tagbody');
				
			
		if($this->ObjSeo->update($codigo,$title,$description,$keywords,$verification,$tagmanager,$tagbody)){
			$this->session->set_flashdata("info", "Alterado com sucesso ");
			redirect("app/seo");			
		}
		else{
			$this->session->set_flashdata("error", "Erro ao alterar");
		}
	}
}