<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tipo_model extends CI_Model {

	private $table = "tipo_imovel";
	private $_data = array();
	
	var $CODTIPOIMOVEL;
	var $NMTIPOIMOVEL;
	var $DSTIPOIMOVEL;
	var $IMGTIPOIMOVEL;
	var $SLUGTIPOIMOVEL;
	var $STATUSTIPOIMOVEL;

	public function listar(){    	
        return $this->db->get($this->table)->result();
    } 

    public function add($nome,$desc,$img,$slug,$status){			
		
		$this->db->set('NMTIPOIMOVEL', $nome);			
		$this->db->set('DSTIPOIMOVEL', $desc);
		$this->db->set('IMGTIPOIMOVEL', $img);
		$this->db->set('SLUGTIPOIMOVEL', $slug);
		$this->db->set('STATUSTIPOIMOVEL', $status);
		return $this->db->insert($this->table);
	}

	public function update($codigo,$nome,$desc,$img,$slug,$status){		
		
		$this->db->set('NMTIPOIMOVEL', $nome);			
		$this->db->set('DSTIPOIMOVEL', $desc);
		$this->db->set('IMGTIPOIMOVEL', $img);
		$this->db->set('SLUGTIPOIMOVEL', $slug);
		$this->db->set('STATUSTIPOIMOVEL', $status);
		$this->db->where('CODTIPOIMOVEL',$codigo);
		return $this->db->update($this->table);
	}

	public function getId($id){
		$this->db->where('CODTIPOIMOVEL',$id);
		$result = $this->db->get($this->table)->result();
		if(count($result)==1){
			foreach($result as $row){
				$this->CODTIPOIMOVEL 		= $row->CODTIPOIMOVEL;
				$this->NMTIPOIMOVEL 		= $row->NMTIPOIMOVEL;
				$this->DSTIPOIMOVEL 		= $row->DSTIPOIMOVEL;
				$this->IMGTIPOIMOVEL 		= $row->IMGTIPOIMOVEL;
				$this->SLUGTIPOIMOVEL 		= $row->SLUGTIPOIMOVEL;
				$this->STATUSTIPOIMOVEL 	= $row->STATUSTIPOIMOVEL;
								
			}
			return $this;
		}
	}

}