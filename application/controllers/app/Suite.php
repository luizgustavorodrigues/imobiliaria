<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Suite extends CI_Controller {
	
	protected $access = "Admin";

	public function __construct(){
		parent::__construct();

		$this->load->model('Suite_model', 'ObjSuite');

		if (!$this->session->userdata("logged_in")) {
			redirect(base_url("app/Auth/logout"));
		}	
	}

	public function index(){
		
		//Define os dados do header HTML.
		$dados_header = array(
			'titulo' => 'Painel Administrativo',
			'descricao' => 'Painel Administrativo',
			'palavras_chave' => 'Painel Administrativo '	
		);
		$dados['suites']	 = $this->ObjSuite->listar();
      	$this->load->view("app/header_html", $dados_header);
		$this->load->view("app/view_menu");
		$this->load->view("app/suite/view_lista_suite",$dados);
		$this->load->view("app/footer_html");
	}

	public function novo(){		
		//Define os dados do header HTML.
		$dados_header = array(
			'titulo' => 'Painel Administrativo',
			'descricao' => 'Painel Administrativo',
			'palavras_chave' => 'Painel Administrativo '	
		);
		$dados['suites']	 = $this->ObjSuite->listar();
      	$this->load->view("app/header_html", $dados_header);
		$this->load->view("app/view_menu");
		$this->load->view("app/suite/view_form_suite",$dados);
		$this->load->view("app/footer_html");
	}

	public function adiciona(){
		$this->load->library('form_validation');				
		$this->form_validation->set_rules('nome', 'nome', 'required');

		$nome		 	= $this->input->post('nome');	
		$numero		 	= $this->input->post('numero');	
		$status		 	= $this->input->post('status');				
		
		if ($this->form_validation->run() == TRUE)
		{
			if($this->ObjSuite->add($nome,$numero,$status)){
				$this->session->set_flashdata("info", "Cadastrado com sucesso ");
				redirect("app/suite");
			}else{
				$this->session->set_flashdata("error", "Erro ao cadastrar");
			}
		}		
	}

	public function editar($id){
		
		//Define os dados do header HTML.
		$dados_header = array(
			'titulo' => 'Painel Administrativo',
			'descricao' => 'Painel Administrativo',
			'palavras_chave' => 'Painel Administrativo '	
		);
		$dados['row']	 = $this->ObjSuite->getId($id);
      	$this->load->view("app/header_html", $dados_header);
		$this->load->view("app/view_menu");
		$this->load->view("app/suite/view_edit_suite",$dados);
		$this->load->view("app/footer_html");
	}

	public function alterar(){
		$codigo		 	= $this->input->post('codigo');
		$nome		 	= $this->input->post('nome');
		$numero		 	= $this->input->post('numero');
		$status		 	= $this->input->post('status');		
			
		if($this->ObjSuite->update($codigo,$nome,$numero,$status)){
			$this->session->set_flashdata("info", "Alterado com sucesso ");
			redirect("app/suite");			
		}
		else{
			$this->session->set_flashdata("error", "Erro ao alterar");
		}
	}

	public function slug($noticia){
		//substitui espaço por traço -
		return strtolower( preg_replace("/[^a-zA-Z0-9-]/", "-", strtr(utf8_decode(trim($noticia)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),"aaaaeeiooouuncAAAAEEIOOOUUNC-")) );
	}
}