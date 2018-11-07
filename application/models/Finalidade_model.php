<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Finalidade_model extends CI_Model {

	private $table = "finalidade";
	private $_data = array();

	var $CODFINALIDADE;
	var $NMFINALIDADE;
	var $DSFINALIDADE;
	var $IMGFINALIDADE;
	var $SLUGFINALIDADE;
	var $STATUSFINALIDADE;

	public function listar(){    	
        return $this->db->get($this->table)->result();
    } 

    public function add($nome,$desc,$img,$slug,$status){			
		
		$this->db->set('NMFINALIDADE', $nome);			
		$this->db->set('DSFINALIDADE', $desc);
		$this->db->set('IMGFINALIDADE', $img);
		$this->db->set('SLUGFINALIDADE', $slug);
		$this->db->set('STATUSFINALIDADE', $status);
		return $this->db->insert($this->table);
	}

	public function update($codigo,$nome,$desc,$img,$slug,$status){		
		
		$this->db->set('NMFINALIDADE', $nome);			
		$this->db->set('DSFINALIDADE', $desc);
		$this->db->set('IMGFINALIDADE', $img);
		$this->db->set('SLUGFINALIDADE', $slug);
		$this->db->set('STATUSFINALIDADE', $status);
		$this->db->where('CODFINALIDADE',$codigo);
		return $this->db->update($this->table);
	}

	public function getId($id){
		$this->db->where('CODFINALIDADE',$id);
		$result = $this->db->get($this->table)->result();
		if(count($result)==1){
			foreach($result as $row){
				$this->CODFINALIDADE 		= $row->CODFINALIDADE;
				$this->NMFINALIDADE 		= $row->NMFINALIDADE;
				$this->DSFINALIDADE 		= $row->DSFINALIDADE;
				$this->IMGFINALIDADE 		= $row->IMGFINALIDADE;
				$this->SLUGFINALIDADE 		= $row->SLUGFINALIDADE;
				$this->STATUSFINALIDADE 	= $row->STATUSFINALIDADE;
								
			}
			return $this;
		}
	}

}