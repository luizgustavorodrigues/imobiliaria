<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Suite_model extends CI_Model {

	private $table = "suite";
	private $_data = array();

	var $CODSUITE;
	var $NMSUITE;	
	var $NSUITE;//Numero de Suites	
	var $STATUS;

	public function listar(){    	
        return $this->db->get($this->table)->result();
    } 

    public function add($nome,$numero,$status){
		$this->db->set('NMSUITE', $nome);
		$this->db->set('NSUITE', $numero);		
		$this->db->set('STATUS', $status);
		return $this->db->insert($this->table);
	}

	public function update($codigo,$nome,$numero,$status){		
		
		$this->db->set('NMSUITE', $nome);
		$this->db->set('NSUITE', $numero);		
		$this->db->set('STATUS', $status);
		$this->db->where('CODSUITE',$codigo);
		return $this->db->update($this->table);
	}

	public function getId($id){
		$this->db->where('CODSUITE',$id);
		$result = $this->db->get($this->table)->result();
		if(count($result)==1){
			foreach($result as $row){
				$this->CODSUITE 		= $row->CODSUITE;
				$this->NMSUITE 		= $row->NMSUITE;				
				$this->NSUITE 		= $row->NSUITE;
				$this->STATUS 	= $row->STATUS;
								
			}
			return $this;
		}
	}

}