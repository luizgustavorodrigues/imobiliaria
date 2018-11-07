<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Setor extends CI_Controller {
	
	protected $access = "Admin";

	public function __construct(){
		parent::__construct();

		$this->load->model('Setor_model', 'ObjSetor');

		if (!$this->session->userdata("logged_in")) {
			redirect(base_url("app/auth/logout"));
		}	
	}

	public function index($idestado = 0){
		
		//Define os dados do header HTML.
		$dados_header = array(
			'titulo' => 'Painel Administrativo',
			'descricao' => 'Painel Administrativo',
			'palavras_chave' => 'Painel Administrativo '	
		);
		$dados['lista']	 		= $this->ObjSetor->setor_cidade();
		$dados['estados']	 	= $this->ObjSetor->listaEstado();		
		$dados['cidades']	 	= $this->ObjSetor->getCidade($idestado);
		
      	$this->load->view("app/header_html", $dados_header);
		$this->load->view("app/view_menu");
		$this->load->view("app/setor/view_lista_setor",$dados);
		$this->load->view("app/footer_html");
	}

	public function novo($idestado = 0){
		
		//Define os dados do header HTML.
		$dados_header = array(
			'titulo' => 'Painel Administrativo',
			'descricao' => 'Painel Administrativo',
			'palavras_chave' => 'Painel Administrativo '	
		);
		$dados['lista']	 		= $this->ObjSetor->listar();
		$dados['estados']	 	= $this->ObjSetor->listaEstado();		
		$dados['cidades']	 	= $this->ObjSetor->getCidade($idestado);
		
      	$this->load->view("app/header_html", $dados_header);
		$this->load->view("app/view_menu");
		$this->load->view("app/setor/view_form_setor",$dados);
		$this->load->view("app/footer_html");
	}

	public function retornoCidades($idestado = 0){
		 $dados['cidades'] = $this->ObjSetor->getCidade($idestado);
		 $this->db->last_query();
		 $this->load->view("app/setor/cidades",$dados);
	}

	/*public function retornoSetores($idestado = 0){
		 $dados['cidades'] = $this->ObjSetor->getCidade($idestado);
		 $this->db->last_query();
		 $this->load->view("app/setor/setores",$dados);
	}*/

	public function retornoSetores($idestado = 0){
		 $dados['bairros'] = $this->ObjSetor->getSetores($idestado);
		 $this->db->last_query();
		 $this->load->view("app/setor/setores",$dados);
	}

	public function adiciona(){

		$this->load->library('form_validation');
		$this->form_validation->set_rules('nome', 'nome', 'required');

		$nome		 	= $this->input->post('nome');
		$cidade		 	= $this->input->post('cidade');
		$slug			= $this->slug($nome);	
		
		if ($this->form_validation->run() == TRUE)
		{
			if($this->ObjSetor->add($nome,$cidade,$slug,'')){
				$this->session->set_flashdata("info", "Cadastrado com sucesso ");
				redirect("app/setor");
			}else{
				$this->session->set_flashdata("error", "Erro ao cadastrar");
			}
		}		
	}

	public function editar($id,$idestado = 0){
		
		//Define os dados do header HTML.
		$dados_header = array(
			'titulo' => 'Painel Administrativo',
			'descricao' => 'Painel Administrativo',
			'palavras_chave' => 'Painel Administrativo '	
		);
		$dados['lista']	 		= $this->ObjSetor->listar();
		$dados['estados']	 	= $this->ObjSetor->listaEstado();		
		$dados['cidades']	 	= $this->ObjSetor->getCidade($idestado);
		$dados['row']	 		= $this->ObjSetor->getId($id);
      	$this->load->view("app/header_html", $dados_header);
		$this->load->view("app/view_menu");
		$this->load->view("app/setor/view_edit_setor",$dados);
		$this->load->view("app/footer_html");
	}

	public function alterar(){
		$codigo		 	= $this->input->post('codigo');
		$nome		 	= $this->input->post('nome');
		$cidade		 	= $this->input->post('cidade');
		$status		 	= $this->input->post('status');
		$slug			= $this->slug($nome);		
		
		if($this->ObjSetor->update($codigo,$nome,$cidade,$slug,$status)){
			$this->session->set_flashdata("info", "Alterado com sucesso ");
			echo $this->db->last_query();
			redirect("app/setor");			
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