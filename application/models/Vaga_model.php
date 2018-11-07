<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vaga_model extends CI_Model {

	private $table = "vaga_garagem";
	private $_data = array();

	var $CODVAGA;
	var $NMVAGA;	
	var $NVAGA;//Numero de vagas
	var $SLUGVAGA;
	var $STATUSVAGA;

	public function listar(){    	
        return $this->db->get($this->table)->result();
    } 

    public function add($nome,$numero,$slug,$status){
		$this->db->set('NMVAGA', $nome);
		$this->db->set('NVAGA', $numero);
		$this->db->set('SLUGVAGA', $slug);
		$this->db->set('STATUSVAGA', $status);
		return $this->db->insert($this->table);
	}

	public function update($codigo,$nome,$numero,$slug,$status){		
		
		$this->db->set('NMVAGA', $nome);
		$this->db->set('NVAGA', $numero);
		$this->db->set('SLUGVAGA', $slug);
		$this->db->set('STATUSVAGA', $status);
		$this->db->where('CODVAGA',$codigo);
		return $this->db->update($this->table);
	}

	public function getId($id){
		$this->db->where('CODVAGA',$id);
		$result = $this->db->get($this->table)->result();
		if(count($result)==1){
			foreach($result as $row){
				$this->CODVAGA 		= $row->CODVAGA;
				$this->NMVAGA 		= $row->NMVAGA;				
				$this->NVAGA 		= $row->NVAGA;
				$this->SLUGVAGA 		= $row->SLUGVAGA;
				$this->STATUSVAGA 	= $row->STATUSVAGA;
								
			}
			return $this;
		}
	}

}