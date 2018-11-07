<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Imovel_model extends CI_Model {

	private $table = "imovel";
	private $_data = array();

	var $CODIMOVEL;
	var $CODQUARTO;
	var $CODTIPOIMOVEL;		
	var $CODOPCAO;
	var $CODFINALIDADE;
	var $CODVAGA;
	var $CODUF;
	var $CODCIDADE;
	var $CODSETOR;
	var $CODSUITE;
	var $IMGIMOVEL;
	var $REFERENCIA;
	var $DSIMOVEL;
	var $VALORIMOVEL;
	var $BANHEIROIMOVEL;
	var $AREAIMOVEL;
	var $ENDERECOIMOVEL;
	var $LOCALIZACAOIMOVEL;
	var $OUTROVALORES;
	var $STATUS;


	public function listar(){    	
        return $this->db->get($this->table)->result();
    } 

    public function all(){
    	return $this->db->query('SELECT * FROM imovel I
    	INNER JOIN quarto Q on Q.CODQUARTO = I.CODQUARTO
    	INNER JOIN tipo_imovel TI on TI.CODTIPOIMOVEL = I.CODTIPOIMOVEL
    	INNER JOIN finalidade F on F.CODFINALIDADE = I.CODFINALIDADE
    	INNER JOIN vaga_garagem V on V.CODVAGA = I.CODVAGA
    	INNER JOIN cidade C ON C.CODCIDADE = I.CODCIDADE
    	INNER JOIN setor S ON S.CODSETOR = I.CODSETOR
    	INNER JOIN opcao O on O.CODOPCAO = I.CODOPCAO
    	INNER JOIN suite SU on SU.CODSUITE = I.CODSUITE
    	WHERE I.STATUS = 0
    	')->result();
    }

    public function listaEstado(){
    	return $this->db->query('SELECT * FROM uf ORDER BY UF')->result();
    }

    public function imovel_cidade($id){
 		return $this->db->query('SELECT * FROM imovel I 
 		INNER JOIN cidade C on C.CODCIDADE = I.CODCIDADE
 		WHERE I.CODIMOVEL = '.$id)->result(); 		
    }

    public function imovel_setor($id){
 		return $this->db->query('SELECT * FROM imovel I 
 		INNER JOIN setor S on S.CODSETOR = I.CODSETOR
 		WHERE I.CODIMOVEL = '.$id)->result(); 		
    }

    //Seleciona apenas cidades que tem imovel cadastrados
    public function cidade_imovel_distinct(){
    	return $this->db->query('SELECT DISTINCT C.NMCIDADE,C.CODCIDADE FROM imovel I INNER JOIN cidade c ON C.CODCIDADE = I.CODCIDADE')->result(); 	
    }

    //Seleciona imoveis por id da tabela OPÇÃO + QUANTIDADE DE DADOS A SER APRESENTANDO + ORDENAÇÃO DESC OU ASC
    //ex: ID 1 = Venda 
    //ex: ID 2 = Alugar
    public function get_imovel_opcao($idopcao,$limite,$ordem){
    	$this->db->join('SETOR','SETOR.CODSETOR = IMOVEL.CODSETOR');  
    	$this->db->join('tipo_imovel','tipo_imovel.CODTIPOIMOVEL = imovel.CODTIPOIMOVEL') ;
    	$this->db->join('quarto','quarto.CODQUARTO = imovel.CODQUARTO') ;
    	$this->db->join('vaga_garagem','vaga_garagem.CODVAGA = imovel.CODVAGA') ;
    	$this->db->join('suite','suite.CODSUITE = imovel.CODSUITE') ;
    	$this->db->where('CODOPCAO',$idopcao);
    	$this->db->where('imovel.STATUS', 0);
    	$this->db->limit($limite);
    	$this->db->order_by("CODIMOVEL", $ordem); 
    	return $this->db->get($this->table)->result();
    }

    public function busca_home($opcao,$finalidade,$tipo,$cidade,$quarto){
    	$this->db->join('SETOR','SETOR.CODSETOR = IMOVEL.CODSETOR');  
    	$this->db->join('tipo_imovel','tipo_imovel.CODTIPOIMOVEL = imovel.CODTIPOIMOVEL') ;
    	$this->db->join('quarto','quarto.CODQUARTO = imovel.CODQUARTO') ;
    	$this->db->join('vaga_garagem','vaga_garagem.CODVAGA = imovel.CODVAGA') ;

    	$this->db->or_where('imovel.CODOPCAO',$opcao);    	
    	$this->db->where('imovel.CODFINALIDADE',$finalidade);
    	$this->db->where('tipo_imovel.CODTIPOIMOVEL',$tipo);
    	$this->db->where('imovel.CODCIDADE',$cidade);
    	$this->db->where('quarto.CODQUARTO',$quarto);
    	
    	$this->db->order_by("imovel.CODIMOVEL", 'DESC'); 
    	return $this->db->get($this->table)->result();
    }

    public function getCidade($estado){
     	return $this->db->query('SELECT * FROM cidade WHERE CODUF = '.$estado.' ORDER BY NMCIDADE')->result();
    }

    public function getSetor($cidade){
     	return $this->db->query('SELECT * FROM setor WHERE CODCIDADE = '.$cidade)->result();
    }

    public function add($quarto,$tipo,$opcao,$finalidade,$vaga,$uf,$cidade,$setor,$suite,$img,$referencia,$descricao,$valor,$banheiro,$area,$endereco,$localizacao,$outrosvalores,$status){
    	$this->db->set('CODQUARTO', $quarto);
		$this->db->set('CODTIPOIMOVEL', $tipo);		
		$this->db->set('CODOPCAO', $opcao);
		$this->db->set('CODFINALIDADE', $finalidade);
		$this->db->set('CODVAGA', $vaga);
		$this->db->set('CODUF', $uf);
		$this->db->set('CODCIDADE', $cidade);
		$this->db->set('CODSETOR', $setor);
		$this->db->set('CODSUITE', $suite);
		$this->db->set('IMGIMOVEL', $img);
		$this->db->set('REFERENCIA', $referencia);
		$this->db->set('DSIMOVEL', $descricao);
		$this->db->set('VALORIMOVEL', $valor);
		$this->db->set('BANHEIROIMOVEL', $banheiro);
		$this->db->set('AREAIMOVEL', $area);
		$this->db->set('ENDERECOIMOVEL', $endereco);
		$this->db->set('LOCALIZACAOIMOVEL', $localizacao);
		$this->db->set('OUTROVALORES', $outrosvalores);
		$this->db->set('STATUS', $status);
		return $this->db->insert($this->table);
	}

	public function update($codigo,$quarto,$tipo,$opcao,$finalidade,$vaga,$uf,$cidade,$setor,$suite,$img,$referencia,$descricao,$valor,$banheiro,$area,$endereco,$localizacao,$outrosvalores,$status){		
		$this->db->set('CODQUARTO', $quarto);
		$this->db->set('CODTIPOIMOVEL', $tipo);		
		$this->db->set('CODOPCAO', $opcao);
		$this->db->set('CODFINALIDADE', $finalidade);
		$this->db->set('CODVAGA', $vaga);
		$this->db->set('CODUF', $uf);
		$this->db->set('CODCIDADE', $cidade);
		$this->db->set('CODSETOR', $setor);
		$this->db->set('CODSUITE', $suite);
		$this->db->set('IMGIMOVEL', $img);
		$this->db->set('REFERENCIA', $referencia);
		$this->db->set('DSIMOVEL', $descricao);
		$this->db->set('VALORIMOVEL', $valor);
		$this->db->set('BANHEIROIMOVEL', $banheiro);
		$this->db->set('AREAIMOVEL', $area);
		$this->db->set('ENDERECOIMOVEL', $endereco);
		$this->db->set('LOCALIZACAOIMOVEL', $localizacao);
		$this->db->set('OUTROVALORES', $outrosvalores);
		$this->db->set('STATUS', $status);
		$this->db->where('CODIMOVEL',$codigo);
		return $this->db->update($this->table);
	}

	public function getId($id){
		$this->db->where('CODIMOVEL',$id);
		$result = $this->db->get($this->table)->result();
		if(count($result)==1){
			foreach($result as $row){
				$this->CODIMOVEL 			= $row->CODIMOVEL;
				$this->CODQUARTO			= $row->CODQUARTO;				
				$this->CODTIPOIMOVEL 		= $row->CODTIPOIMOVEL;
				$this->CODOPCAO 			= $row->CODOPCAO;
				$this->CODFINALIDADE 		= $row->CODFINALIDADE;
				$this->CODVAGA 				= $row->CODVAGA;
				$this->CODUF 				= $row->CODUF;
				$this->CODCIDADE 			= $row->CODCIDADE;
				$this->CODSETOR 			= $row->CODSETOR;
				$this->CODSUITE 			= $row->CODSUITE;
				$this->IMGIMOVEL 			= $row->IMGIMOVEL;
				$this->REFERENCIA 			= $row->REFERENCIA;
				$this->DSIMOVEL 			= $row->DSIMOVEL;
				$this->VALORIMOVEL 			= $row->VALORIMOVEL;
				$this->BANHEIROIMOVEL 		= $row->BANHEIROIMOVEL;
				$this->AREAIMOVEL 			= $row->AREAIMOVEL;
				$this->ENDERECOIMOVEL 		= $row->ENDERECOIMOVEL;
				$this->LOCALIZACAOIMOVEL 	= $row->LOCALIZACAOIMOVEL;
				$this->OUTROVALORES 		= $row->OUTROVALORES;
				$this->STATUS 				= $row->STATUS;								
			}
			return $this;
		}
	}

	//Pega imovel por id
	public function getImovel($id){
    	$result = $this->db->query('SELECT * FROM imovel I
    	INNER JOIN quarto Q on Q.CODQUARTO = I.CODQUARTO
    	INNER JOIN tipo_imovel TI on TI.CODTIPOIMOVEL = I.CODTIPOIMOVEL
    	INNER JOIN finalidade F on F.CODFINALIDADE = I.CODFINALIDADE
    	INNER JOIN vaga_garagem V on V.CODVAGA = I.CODVAGA
    	INNER JOIN cidade C ON C.CODCIDADE = I.CODCIDADE
    	INNER JOIN setor S ON S.CODSETOR = I.CODSETOR
    	INNER JOIN opcao O on O.CODOPCAO = I.CODOPCAO
    	INNER JOIN suite SU on SU.CODSUITE = I.CODSUITE
    	WHERE I.CODIMOVEL =
    	'.$id)->result();
    	if(count($result)==1){
    		return $result;
    	}
    }

}