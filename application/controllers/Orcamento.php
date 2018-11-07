<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This controller can be accessed 
 * for (all) non logged in users
 */
class Orcamento extends MY_Controller {	
	public function __construct(){
		parent::__construct();
		$this->load->model('Imovel_model', 'ObjImovel');
		$this->load->model('Quarto_model', 'ObjQuarto');
		$this->load->model('Tipo_model', 'ObjTipo');
		$this->load->model('Opcao_model', 'ObjOpcao');
		$this->load->model('Finalidade_model', 'ObjFinalidade');
		$this->load->model('Vaga_model', 'ObjVaga');
		$this->load->model('Setor_model', 'ObjSetor');	
	}
	public function index()
	{	
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
		$dados['vendas']		= $this->ObjImovel->get_imovel_opcao(1,4,'DESC');//
		$dados['aluguel']		= $this->ObjImovel->get_imovel_opcao(2,4,'DESC');
		

		$this->load->view('view_header_html', $dados_header);
      	$this->load->view('view_menu_topo',$dados); 
      	$this->load->view('view_banner_home');
      	$this->load->view('view_conteudo'); 
      	$this->load->view('view_contato'); 
      	$this->load->view('view_rodape'); 
      	$this->load->view('view_footer_html');
	}

	public function enviar(){

		// create the data object
		$data = new stdClass();

		// set variables from the form
		$nome		= $this->input->post('nome');
		$email    	= $this->input->post('email');
		$telefone 	= $this->input->post('telefone');
		$estado 	= $this->input->post('estado');
		$cidade 	= $this->input->post('cidade');
		$produto 	= $this->input->post('nomeprod');
		$mensagem 	= $this->input->post('mensagem');
		
		$config = array(
				'protocol' 	=> 	'smtp', 
				'smtp_host'	=>	'mail.uebstudio.com.br',
				'smtp_port'	=> 	587,
				'smtp_user'	=>	'comercial@uebstudio.com.br',
				'smtp_pass'	=> 	'*(uebstudio)*',
				'mainpatch'=>	'/usr/bin/sendmail',
				'mailtype'	=>	'html'
			);
		
		$this->load->library('email');
		$this->email->initialize($config);		
		$this->email->set_newline("\r\n");
		$this->email->from('comercial@uebstudio.com.br');
		$this->email->to($email);			
		$this->email->subject('Uéb Studio Agencia Digital');
		$conteudo = $this->load->view('bemvindo.php',array("usuario"=>$nome),TRUE);			
		$this->email->message($conteudo);

		if($this->email->send()){
			$this->mensagem_model->orcamento($nome,$email,$telefone,$estado,$cidade,$mensagem,$produto);
			$this->receber($nome,$email,$telefone,$estado,$cidade,$produto,$mensagem);
			$this->sucesso();
		}else{
			echo $this->email->print_debugger();
		}	

	}

	public function receber($nome,$email,$telefone,$estado,$cidade,$produto,$mensagem){		
		
		$config = array(
			'protocol' 	=> 	'smtp', 
			'smtp_host'	=>	'mail.uebstudio.com.br',
			'smtp_port'	=> 	587,
			'smtp_user'	=>	'comercial@uebstudio.com.br',
			'smtp_pass'	=> 	'*(uebstudio)*',
			'mainpatch'=>	'/usr/bin/sendmail',
			'mailtype'	=>	'html'
		);
		
		$this->load->library('email');
		$this->email->initialize($config);		
		$this->email->set_newline("\r\n");
		$this->email->from('comercial@uebstudio.com.br');
		$this->email->to('contato@uebstudio.com.br');			
		$this->email->bcc('uebstudio@gmail.com');	
		$this->email->subject('Orçamento Rápido - Uéb Studio');
		$dados = array("nome"=>$nome,"email"=>$email,"telefone"=>$telefone,"estado"=>$estado,"cidade"=>$cidade,"mensagem"=>$mensagem );
		$conteudo = $this->load->view('template_orcamento_receber.php',array("nome"=>$nome,"email"=>$email,"telefone"=>$telefone,"estado"=>$estado,"cidade"=>$cidade,"mensagem"=>$mensagem,"produto"=>$produto ),TRUE);			
		$this->email->message($conteudo);
		$this->email->send();
	}	

	public function sucesso(){

		//Define os dados do header HTML.
		$dados_header = array(
			'titulo' => '$dados->TITULO',
			'descricao' => '$dados->DESCRICAO',
			'palavras_chave' =>' $dados->PALAVRACHAVE'	
		);

      	$this->load->view('view_html_header', $dados_header);
      	$this->load->view('view_menu');      
      	$this->load->view('contato_sucesso');      	     	
      	$this->load->view('view_rodape');
      	$this->load->view('view_html_footer');
      	$this->load->view('modal');
	}

}