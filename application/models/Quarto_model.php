<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quarto_model extends CI_Model {

	private $table = "quarto";
	private $_data = array();

	var $CODQUARTO;
	var $NMQUARTO;	
	var $NQUARTO;//Numero de QUARTOs
	var $SLUGQUARTO;
	var $STATUSQUARTO;

	public function listar(){    	
        return $this->db->get($this->table)->result();
    } 

    public function add($nome,$numero,$slug,$status){
		$this->db->set('NMQUARTO', $nome);
		$this->db->set('NQUARTO', $numero);
		$this->db->set('SLUGQUARTO', $slug);
		$this->db->set('STATUSQUARTO', $status);
		return $this->db->insert($this->table);
	}

	public function update($codigo,$nome,$numero,$slug,$status){		
		
		$this->db->set('NMQUARTO', $nome);
		$this->db->set('NQUARTO', $numero);
		$this->db->set('SLUGQUARTO', $slug);
		$this->db->set('STATUSQUARTO', $status);
		$this->db->where('CODQUARTO',$codigo);
		return $this->db->update($this->table);
	}

	public function getId($id){
		$this->db->where('CODQUARTO',$id);
		$result = $this->db->get($this->table)->result();
		if(count($result)==1){
			foreach($result as $row){
				$this->CODQUARTO 		= $row->CODQUARTO;
				$this->NMQUARTO 		= $row->NMQUARTO;				
				$this->NQUARTO 		= $row->NQUARTO;
				$this->SLUGQUARTO 		= $row->SLUGQUARTO;
				$this->STATUSQUARTO 	= $row->STATUSQUARTO;
								
			}
			return $this;
		}
	}

}