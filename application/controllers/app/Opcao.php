<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Opcao extends CI_Controller {
	
	protected $access = "Admin";

	public function __construct(){
		parent::__construct();

		$this->load->model('Opcao_model', 'ObjOpcao');

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
		$dados['lista']	 = $this->ObjOpcao->listar();
      	$this->load->view("app/header_html", $dados_header);
		$this->load->view("app/view_menu");
		$this->load->view("app/opcao/view_lista_opcao",$dados);
		$this->load->view("app/footer_html");
	}

	public function novo(){		
		//Define os dados do header HTML.
		$dados_header = array(
			'titulo' => 'Painel Administrativo',
			'descricao' => 'Painel Administrativo',
			'palavras_chave' => 'Painel Administrativo '	
		);
		$dados['lista']	 = $this->ObjOpcao->listar();
      	$this->load->view("app/header_html", $dados_header);
		$this->load->view("app/view_menu");
		$this->load->view("app/opcao/view_form_opcao",$dados);
		$this->load->view("app/footer_html");
	}

	public function adiciona(){
		$this->load->library('form_validation');				
		$this->form_validation->set_rules('nome', 'nome', 'required');

		$nome		 	= $this->input->post('nome');	
		$slug			= $this->slug($nome);				
		
		if ($this->form_validation->run() == TRUE)
		{
			if($this->ObjOpcao->add($nome,'','',$slug,'')){
				$this->session->set_flashdata("info", "Cadastrado com sucesso ");
				redirect("app/opcao");
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
		$dados['row']	 = $this->ObjOpcao->getId($id);
      	$this->load->view("app/header_html", $dados_header);
		$this->load->view("app/view_menu");
		$this->load->view("app/opcao/view_edit_opcao",$dados);
		$this->load->view("app/footer_html");
	}

	public function alterar(){
		$codigo		 	= $this->input->post('codigo');
		$nome		 	= $this->input->post('nome');
		$status		 	= $this->input->post('status');
		$slug			= $this->slug($nome);		
		
		if($this->ObjOpcao->update($codigo,$nome,'',$slug,$status)){
			$this->session->set_flashdata("info", "Alterado com sucesso ");
			echo $this->db->last_query();
			redirect("app/opcao");			
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