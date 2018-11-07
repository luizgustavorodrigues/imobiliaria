<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Config extends CI_Controller {
	
	protected $access = "Admin";

	public function __construct(){
		parent::__construct();

		$this->load->model('Config_model', 'ObjConfig');

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
		$dados['row']	 = $this->ObjConfig->getId($id);
      	$this->load->view("app/header_html", $dados_header);
		$this->load->view("app/view_menu");
		$this->load->view("app/config/view_config",$dados);
		$this->load->view("app/footer_html");
	}
	
	public function editar($id){
		
		//Define os dados do header HTML.
		$dados_header = array(
			'titulo' => 'Painel Administrativo',
			'descricao' => 'Painel Administrativo',
			'palavras_chave' => 'Painel Administrativo '	
		);
		$dados['row']	 = $this->ObjConfig->getId($id);
      	$this->load->view("app/header_html", $dados_header);
		$this->load->view("app/view_menu");
		$this->load->view("app/config/view_config",$dados);
		$this->load->view("app/footer_html");
	}

	public function alterar(){
		$codigo		 	= $this->input->post('codigo');
		$nome		 	= $this->input->post('nome');
		$fantasia		 	= $this->input->post('fantasia');
		$email		 	= $this->input->post('email');
		$telefone		= $this->input->post('telefone');
		$whatsapp	 	= $this->input->post('whatsapp');
		$titulomapa		= $this->input->post('titulomapa');
		$mapa		 	= $this->input->post('mapa');
		$smtp		 	= $this->input->post('smtp');
		$emailenvio		= $this->input->post('emailenvio');
		$senhaemail		= $this->input->post('senhaemail');
		$porta		 	= $this->input->post('porta');
		$bcc		 	= $this->input->post('bcc');
		$facebook		= $this->input->post('facebook');
		$instagram		= $this->input->post('instagram');
		
			
		if($this->ObjConfig->update($codigo,$nome,$email,$fantasia,$telefone,$whatsapp,$titulomapa,$mapa,$smtp,$emailenvio,$senhaemail,$porta,$bcc,$facebook,$instagram)){
			$this->session->set_flashdata("info", "Alterado com sucesso ");
			redirect("app/tipo");			
		}
		else{
			$this->session->set_flashdata("error", "Erro ao alterar");
		}
	}
}