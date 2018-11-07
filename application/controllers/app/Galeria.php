<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Galeria extends CI_Controller {
	
	protected $access = "Admin";

	public function __construct(){
		parent::__construct();

		$this->load->model('Imovel_model', 'ObjImovel');
		$this->load->model('Galeria_model', 'ObjGaleria');		

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
		$dados['lista']	 	= $this->ObjImovel->all();
		

      	$this->load->view("app/header_html", $dados_header);
		$this->load->view("app/view_menu");
		$this->load->view("app/galeria/view_lista_imovel",$dados);
		$this->load->view("app/footer_html");
	}

	public function novo($id){		
		//Define os dados do header HTML.
		$dados_header = array(
			'titulo' => 'Painel Administrativo',
			'descricao' => 'Painel Administrativo',
			'palavras_chave' => 'Painel Administrativo '	
		);

		$dados['row']					= $this->ObjImovel->getId($id);	
		$dados['lista']	 				= $this->ObjImovel->listar();	
		$dados['lista_imovel']	 		= $this->ObjGaleria->all($id);
		$dados['lista_galeria']	 		= $this->ObjGaleria->lista_galeria_imovel($id);//lista gelria de fotos por ID do imovel
		
      	$this->load->view("app/header_html", $dados_header);
		$this->load->view("app/view_menu");
		$this->load->view("app/galeria/view_form_galeria",$dados);
		$this->load->view("app/footer_html");
	}

	public function retornoCidades($idestado = 0){
		 $dados['cidades'] = $this->ObjSetor->getCidade($idestado);
		 $this->db->last_query();
		 $this->load->view("app/setor/cidades",$dados);
	}

	public function do_upload(){
            $config['upload_path']          = base_url().'public/site/assets/img/imoveis';;
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 1100;
            $config['max_width']            = 1024;
            $config['max_height']           = 1024;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('userfile'))
            {
                    $error = array('error' => $this->upload->display_errors());
                    print_r($error);
                    exit();
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());

                    $this->load->view('upload_success', $data);
            }
    }

	public function upload_foto(){
		$config['upload_path'] = './public/site/assets/img/imoveis';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '5000';
		$config['max_width']  = '1750';
		$config['max_height']  = '1450';
		$config['encrypt_name'] = true;
		$config['remove_spaces'] = true;		
		$this->load->library('upload', $config);
		$this->upload->initialize($config);		
		
		if ( ! $this->upload->do_upload()){
			$erro = $this->upload->display_errors('<br><div class="alert alert-danger" align="center">Imagem pode ter ultrapassado o limite maximo. 600 de Altura por 400 Largura<br><br><a href="javascript:history.go(-1)">Voltar</a><br><br></div>');
			print_r($erro);
			exit();
		}	
		else{
			$data = array('upload_data' => $this->upload->data());
			return $data['upload_data']['file_name'];
		}
	}

	public function upload_img(){
		if ( ! empty($_FILES)) 
		{
			$config['upload_path'] = './public/site/assets/img/galeria';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '5000';
			$config['max_width']  = '1750';
			$config['max_height']  = '1450';
			$config['encrypt_name'] = true;
			$config['remove_spaces'] = true;		
			$this->load->library('upload', $config);
			$this->upload->initialize($config);	

			if ( ! $this->upload->do_upload("file")) {
				$erro = $this->upload->display_errors('<br><div class="alert alert-danger" align="center">Imagem pode ter ultrapassado o limite maximo. 650 de Altura por 450 Largura<br><br><a href="javascript:history.go(-1)">Voltar</a><br><br></div>');	
				print_r($erro);			
			}else{
				
				$img 		= $this->upload->file_name;
				$imovel		= $this->input->post('imovel');
				$thumb 		= $this->createCrop($img);				
				if($this->ObjGaleria->add($imovel,$img)){				
					$sucesso =  "<script>alert('Mensagem');</script>";
					print_r($sucesso);
				}
			}
		}
	}

	//Função para cortar noticia
	function createCrop($filename){ 
       	$image_config['image_library'] = 'gd2';
		$image_config['source_image'] = "./public/site/assets/img/galeria/" .$filename;
		$image_config['new_image'] = "./public/site/assets/img/galeria_thumb/".$filename;
		$image_config['quality'] = "100%";
		$image_config['width'] = 650;
		$image_config['maintain_ratio'] = FALSE;
		$image_config['create_thumb'] = FALSE;
		$image_config['height'] = 450;
		$image_config['x_axis'] = '0';
		$image_config['y_axis'] = '0';
		 $this->load->library('image_lib',$image_config);
		$this->image_lib->clear();
		$this->image_lib->initialize($image_config); 
		 
		if (!$this->image_lib->crop()){
				echo $this->image_lib->display_errors();
		}else{
			 	 	
			return $filename;
		}
    }

	public function editar($id,$idestado=0,$idcidade=0){
		
		//Define os dados do header HTML.
		$dados_header = array(
			'titulo' => 'Painel Administrativo',
			'descricao' => 'Painel Administrativo',
			'palavras_chave' => 'Painel Administrativo '	
		);

		$dados['row']		 	= $this->ObjImovel->getId($id);	
		echo $this->db->last_query();	
		$dados['lista']	 		= $this->ObjImovel->listar();
		$dados['quartos']		= $this->ObjQuarto->listar();
		$dados['tipos']			= $this->ObjTipo->listar();
		$dados['opcoes']		= $this->ObjOpcao->listar();
		$dados['finalidades']	= $this->ObjFinalidade->listar();
		$dados['vagas']			= $this->ObjVaga->listar();
		$dados['estados']	 	= $this->ObjSetor->listaEstado();		
		$dados['cidades']	 	= $this->ObjSetor->getCidade($idestado);
		$dados['bairros']	 	= $this->ObjSetor->getSetores($idcidade);
		$dados['cidade']	 	= $this->ObjImovel->imovel_cidade($id);
		$dados['setores']	 	= $this->ObjImovel->imovel_setor($id);
		//$dados['setores']	 	= $this->ObjSetor->listar();
		//echo($idestado);
      	$this->load->view("app/header_html", $dados_header);
		$this->load->view("app/view_menu");
		$this->load->view("app/imovel/view_edit_imovel",$dados);
		$this->load->view("app/footer_html");
	}

	public function alterar(){
		$codigo		 	= $this->input->post('codigo');
		$quarto		 	= $this->input->post('quarto');
		$tipo		 	= $this->input->post('tipo');
		$opcao		 	= $this->input->post('opcao');
		$finalidade		= $this->input->post('finalidade');
		$vaga		 	= $this->input->post('vaga');
		$uf		 		= $this->input->post('uf');
		$cidade		 	= $this->input->post('cidade');
		$setor		 	= $this->input->post('setor');		
		$referencia		= $this->input->post('referencia');
		$descricao		= $this->input->post('descricao');
		$valor		 	= $this->input->post('valor');
		$banheiro		= $this->input->post('banheiro');
		$area		 	= $this->input->post('area');
		$endereco		= $this->input->post('endereco');
		$localizacao	= $this->input->post('localizacao');
		$outrosvalores	= $this->input->post('outrosvalores');
		$status		 	= $this->input->post('status');

		if($_FILES['userfile']['error']==0){
			$imagem 		= $this->upload_foto();	
			@unlink("./public/site/assets/img/imoveis/".$this->input->post('imagem'));				
		}
		else{
			$imagem 	=  $this->input->post('imagem');		
		}		
		
		if($this->ObjImovel->update($codigo,$quarto,$tipo,$opcao,$finalidade,$vaga,$uf,
				$cidade,$setor,$imagem,$referencia,$descricao,$valor,$banheiro,$area,$endereco,
				$localizacao,$outrosvalores,$status)){
			$this->session->set_flashdata("info", "Alterado com sucesso ");
			echo $this->db->last_query();
			redirect("app/imovel");			
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