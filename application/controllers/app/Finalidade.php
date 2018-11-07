<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Finalidade extends CI_Controller {
	
	protected $access = "Admin";

	public function __construct(){
		parent::__construct();

		$this->load->model('Finalidade_model', 'ObjFinalidade');

		if (!$this->session->userdata("logged_in")) {
			redirect(base_url("app/auth/logout"));
		}	
	}

	public function index(){
		
		//Define os dados do header HTML.
		$dados_header = array(
			'titulo' => 'Painel Administrativo',
			'descricao' => 'Painel Administrativo',
			'palavras_chave' => 'Painel Administrativo '	
		);
		$dados['finalidades']	 = $this->ObjFinalidade->listar();
      	$this->load->view("app/header_html", $dados_header);
		$this->load->view("app/view_menu");
		$this->load->view("app/finalidade/view_lista_finalidade",$dados);
		$this->load->view("app/footer_html");
	}

	public function novo(){		
		//Define os dados do header HTML.
		$dados_header = array(
			'titulo' => 'Painel Administrativo',
			'descricao' => 'Painel Administrativo',
			'palavras_chave' => 'Painel Administrativo '	
		);
		$dados['lista']	 = $this->ObjFinalidade->listar();
      	$this->load->view("app/header_html", $dados_header);
		$this->load->view("app/view_menu");
		$this->load->view("app/finalidade/view_form_finalidade",$dados);
		$this->load->view("app/footer_html");
	}

	public function adiciona(){
		$this->load->library('form_validation');				
		$this->form_validation->set_rules('nome', 'nome', 'required');

		$nome		 	= $this->input->post('nome');	
		$slug			= $this->slug($nome);				
		
		if ($this->form_validation->run() == TRUE)
		{
			if($this->ObjFinalidade->add($nome,'','',$slug,'')){
				$this->session->set_flashdata("info", "Cadastrado com sucesso ");
				redirect("app/finalidade");
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
		$dados['row']	 = $this->ObjFinalidade->getId($id);
      	$this->load->view("app/header_html", $dados_header);
		$this->load->view("app/view_menu");
		$this->load->view("app/finalidade/view_edit_finalidade",$dados);
		$this->load->view("app/footer_html");
	}

	public function alterar(){
		$codigo		 	= $this->input->post('codigo');
		$nome		 	= $this->input->post('nome');
		$status		 	= $this->input->post('status');
		$slug			= $this->slug($nome);		
			
		if($this->ObjFinalidade->update($codigo,$nome,'','',$slug,$status)){
			$this->session->set_flashdata("info", "Alterado com sucesso ");
			redirect("app/finalidade");			
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