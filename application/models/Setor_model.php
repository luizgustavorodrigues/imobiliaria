<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setor_model extends CI_Model {

	private $table = "setor";
	private $_data = array();

	var $CODSETOR;
	var $CODCIDADE;
	var $NMSETOR;		
	var $SLUGSETOR;
	var $STATUSSETOR;

	public function listar(){    	
        return $this->db->get($this->table)->result();
    } 

    public function listaEstado(){
    	return $this->db->query('SELECT * FROM uf ORDER BY UF')->result();
    }

    public function listaCidades(){
    	return $this->db->query('SELECT * FROM cidade ORDER BY NMCIDADE')->result();
    }

    public function getCidade($estado){
     	return $this->db->query('SELECT * FROM cidade WHERE CODUF = '.$estado.' ORDER BY NMCIDADE')->result();
    }

    public function getSetores($cidade){
     	return $this->db->query('SELECT * FROM setor WHERE CODCIDADE = '.$cidade.' ORDER BY NMSETOR')->result();
    }

     public function setor_cidade(){
     	return $this->db->query('SELECT * FROM setor P INNER JOIN cidade C ON C.CODCIDADE = P.CODCIDADE')->result();
    }

    public function add($nome,$cidade,$slug,$status){
    	$this->db->set('CODCIDADE', $cidade);
		$this->db->set('NMSETOR', $nome);		
		$this->db->set('SLUGSETOR', $slug);
		$this->db->set('STATUSSETOR', $status);
		return $this->db->insert($this->table);
	}

	public function update($codigo,$nome,$cidade,$slug,$status){		
		$this->db->set('CODCIDADE', $cidade);
		$this->db->set('NMSETOR', $nome);$		
		$this->db->set('SLUGSETOR', $slug);
		$this->db->set('STATUSSETOR', $status);
		$this->db->where('CODSETOR',$codigo);
		return $this->db->update($this->table);
	}

	public function getId($id){
		$this->db->where('CODSETOR',$id);
		$result = $this->db->get($this->table)->result();
		if(count($result)==1){
			foreach($result as $row){
				$this->CODSETOR 		= $row->CODSETOR;
				$this->NMSETOR 			= $row->NMSETOR;				
				$this->CODCIDADE 		= $row->CODCIDADE;
				$this->SLUGSETOR 		= $row->SLUGSETOR;
				$this->STATUSSETOR 		= $row->STATUSSETOR;
								
			}
			return $this;
		}
	}

}