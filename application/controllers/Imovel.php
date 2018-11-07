<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This controller can be accessed 
 * for (all) non logged in users
 */
class Imovel extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Imovel_model', 'ObjImovel');
		$this->load->model('Quarto_model', 'ObjQuarto');
		$this->load->model('Tipo_model', 'ObjTipo');
		$this->load->model('Opcao_model', 'ObjOpcao');
		$this->load->model('Finalidade_model', 'ObjFinalidade');
		$this->load->model('Vaga_model', 'ObjVaga');
		$this->load->model('Setor_model', 'ObjSetor');
		$this->load->model('Galeria_model', 'ObjGaleria');	
	}

	public function index(){	

		//Define os dados do header HTML.
		$dados_header = array(
			'titulo' => 'Imobiliaria',
			'descricao' => 'Imobiliaria',
			'palavras_chave' => 'Imobiliaria',	
		);	

		$opcao		 	= $this->input->post('opcao');
		$finalidade		= $this->input->post('finalidade');
		$tipo		 	= $this->input->post('tipo');
		$cidade		 	= $this->input->post('cidade');
		$quarto		 	= $this->input->post('quarto');

		$dados['opcoes']		= $this->ObjOpcao->listar();
		$dados['finalidade']	= $this->ObjFinalidade->listar();
		$dados['tipos']			= $this->ObjTipo->listar();
		$dados['cidades']		= $this->ObjImovel->cidade_imovel_distinct();
		$dados['quartos']		= $this->ObjQuarto->listar();
		$dados['imoveis']		= $this->ObjImovel->busca_home($opcao,$finalidade,$tipo,$cidade,$quarto);
		
		$this->load->view('view_header_html', $dados_header);
      	$this->load->view('view_menu_topo',$dados); 
      	$this->load->view('view_banner_home');
      	$this->load->view('view_busca_home'); 
      	$this->load->view('view_rodape'); 
      	$this->load->view('view_footer_html');
    }

	public function busca(){	
		//Define os dados do header HTML.
		$dados_header = array(
			'titulo' => 'Imobiliaria',
			'descricao' => 'Imobiliaria',
			'palavras_chave' => 'Imobiliaria',	
		);		

		$opcao		 	= $this->input->post('opcao');
		$finalidade		= $this->input->post('finalidade');
		$tipo		 	= $this->input->post('tipo');
		$cidade		 	= $this->input->post('cidade');
		$quarto		 	= $this->input->post('quarto');

		$dados['opcoes']		= $this->ObjOpcao->listar();
		$dados['finalidade']	= $this->ObjFinalidade->listar();
		$dados['tipos']			= $this->ObjTipo->listar();
		$dados['cidades']		= $this->ObjImovel->cidade_imovel_distinct();
		$dados['quartos']		= $this->ObjQuarto->listar();
		$dados['imoveis']		= $this->ObjImovel->busca_home($opcao,$finalidade,$tipo,$cidade,$quarto);
		
		//echo("<script>Alert('Mensg')</script>");// $this->db->last_query();
		 //echo '<script type=text/javascript>alert("'.$this->db->last_query().'");</script>';

		$this->load->view('view_header_html', $dados_header);
      	$this->load->view('view_menu_topo',$dados); 
      	$this->load->view('view_banner_busca');
      	$this->load->view('view_busca_home'); 
      	$this->load->view('view_rodape'); 
      	$this->load->view('view_footer_html');
	}

	public function detalhe($codigo){		

		//Define os dados do header HTML.
		$dados_header = array(
			'titulo' => 'Imobiliaria',
			'descricao' => 'Imobiliaria',
			'palavras_chave' => 'Imobiliaria',	
		);	
		$dados['opcoes']		= $this->ObjOpcao->listar();
		$dados['finalidade']	= $this->ObjFinalidade->listar();
		$dados['tipos']			= $this->ObjTipo->listar();
		$dados['cidades']		= $this->ObjImovel->cidade_imovel_distinct();
		$dados['quartos']		= $this->ObjQuarto->listar();
		$dados['imoveis']		= $this->ObjImovel->getImovel($codigo);
		$dados['galeria']		= $this->ObjGaleria->lista_galeria_imovel($codigo);
			

		$this->load->view('view_header_html', $dados_header);
      	$this->load->view('view_menu_topo',$dados); 
      	$this->load->view('view_banner_busca');
      	$this->load->view('view_detalhe_imovel'); 
      	$this->load->view('view_rodape'); 
      	$this->load->view('view_footer_html');
	}
}