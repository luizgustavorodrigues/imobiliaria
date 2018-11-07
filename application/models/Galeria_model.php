<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Galeria_model extends CI_Model {

	private $table = "galeria";
	private $_data = array();

	var $CODGALERIA;
	var $CODIMOVEL;
	var $CODQUARTO;
	var $CODTIPOIMOVEL;		
	var $CODOPCAO;
	var $CODFINALIDADE;
	var $CODVAGA;
	var $CODUF;
	var $CODCIDADE;
	var $CODSETOR;
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

   
    public function add($idimovel,$img){
    	$this->db->set('CODIMOVEL', $idimovel);
		$this->db->set('IMGIMOVEL', $img);	
		
		return $this->db->insert($this->table);
	}

	public function all($id){
    	return $this->db->query('SELECT * FROM imovel I
    	INNER JOIN quarto Q on Q.CODQUARTO = I.CODQUARTO
    	INNER JOIN tipo_imovel TI on TI.CODTIPOIMOVEL = I.CODTIPOIMOVEL
    	INNER JOIN finalidade F on F.CODFINALIDADE = I.CODFINALIDADE
    	INNER JOIN vaga_garagem V on V.CODVAGA = I.CODVAGA
    	INNER JOIN cidade C ON C.CODCIDADE = I.CODCIDADE
    	INNER JOIN setor S ON S.CODSETOR = I.CODSETOR
    	INNER JOIN opcao O on O.CODOPCAO = I.CODOPCAO    	
    	WHERE I.CODIMOVEL = 
    	'.$id)->result();
    }

    public function lista_galeria_imovel($id){
    	return $this->db->query('SELECT * FROM galeria    	    	
    	WHERE CODIMOVEL = 
    	'.$id)->result();
    }

}