<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Vaga extends CI_Controller {
	
	protected $access = "Admin";

	public function __construct(){
		parent::__construct();

		$this->load->model('Vaga_model', 'ObjVaga');

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
		$dados['lista']	 = $this->ObjVaga->listar();
      	$this->load->view("app/header_html", $dados_header);
		$this->load->view("app/view_menu");
		$this->load->view("app/vaga/view_lista_vaga",$dados);
		$this->load->view("app/footer_html");
	}

	public function novo(){		
		//Define os dados do header HTML.
		$dados_header = array(
			'titulo' => 'Painel Administrativo',
			'descricao' => 'Painel Administrativo',
			'palavras_chave' => 'Painel Administrativo '	
		);
		$dados['lista']	 = $this->ObjVaga->listar();
      	$this->load->view("app/header_html", $dados_header);
		$this->load->view("app/view_menu");
		$this->load->view("app/vaga/view_form_vaga",$dados);
		$this->load->view("app/footer_html");
	}

	public function adiciona(){

		$this->load->library('form_validation');
		$this->form_validation->set_rules('nome', 'nome', 'required');

		$nome		 	= $this->input->post('nome');
		$numero		 	= $this->input->post('numero');
		$slug			= $this->slug($nome);	
		
		if ($this->form_validation->run() == TRUE)
		{
			if($this->ObjVaga->add($nome,$numero,$slug,'')){
				$this->session->set_flashdata("info", "Cadastrado com sucesso ");
				redirect("app/vaga");
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
		$dados['row']	 = $this->ObjVaga->getId($id);
      	$this->load->view("app/header_html", $dados_header);
		$this->load->view("app/view_menu");
		$this->load->view("app/vaga/view_edit_vaga",$dados);
		$this->load->view("app/footer_html");
	}

	public function alterar(){
		$codigo		 	= $this->input->post('codigo');
		$nome		 	= $this->input->post('nome');
		$numero		 	= $this->input->post('numero');
		$status		 	= $this->input->post('status');
		$slug			= $this->slug($nome);		
		
		if($this->ObjVaga->update($codigo,$nome,$numero,$slug,$status)){
			$this->session->set_flashdata("info", "Alterado com sucesso ");
			echo $this->db->last_query();
			redirect("app/vaga");			
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