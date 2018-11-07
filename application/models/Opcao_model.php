<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Opcao_model extends CI_Model {

	private $table = "opcao";
	private $_data = array();

	var $CODOPCAO;
	var $NMOPCAO;	
	var $IMGOPCAO;
	var $SLUGOPCAO;
	var $STATUSOPCAO;

	public function listar(){    	
        return $this->db->get($this->table)->result();
    } 

    public function add($nome,$img,$slug,$status){			
		
		$this->db->set('NMOPCAO', $nome);
		$this->db->set('IMGOPCAO', $img);
		$this->db->set('SLUGOPCAO', $slug);
		$this->db->set('STATUSOPCAO', $status);
		return $this->db->insert($this->table);
	}

	public function update($codigo,$nome,$img,$slug,$status){		
		
		$this->db->set('NMOPCAO', $nome);
		$this->db->set('IMGOPCAO', $img);
		$this->db->set('SLUGOPCAO', $slug);
		$this->db->set('STATUSOPCAO', $status);
		$this->db->where('CODOPCAO',$codigo);
		return $this->db->update($this->table);
	}

	public function getId($id){
		$this->db->where('CODOPCAO',$id);
		$result = $this->db->get($this->table)->result();
		if(count($result)==1){
			foreach($result as $row){
				$this->CODOPCAO 		= $row->CODOPCAO;
				$this->NMOPCAO 		= $row->NMOPCAO;				
				$this->IMGOPCAO 		= $row->IMGOPCAO;
				$this->SLUGOPCAO 		= $row->SLUGOPCAO;
				$this->STATUSOPCAO 	= $row->STATUSOPCAO;
								
			}
			return $this;
		}
	}

}