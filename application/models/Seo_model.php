<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seo_model extends CI_Model {

	private $table = "seo";
	private $_data = array();

	var $CODSEO;
	var $TITLE;
	var $DESCRIPTION;
	var $KEYWORDS;
	var $GOOGLEVERIFICATION;
	var $TAGMANAGER;
	var $TAGMANAGERBODY;

	public function listar(){    	
        return $this->db->get($this->table)->result();
    } 

    public function add($title,$description,$keywords,$verification,$tagmanager,$tagbody){

		$this->db->set('TITLE', $title);			
		$this->db->set('DESCRIPTION', $description);
		$this->db->set('KEYWORDS', $keywords);
		$this->db->set('GOOGLEVERIFICATION', $verification);
		$this->db->set('TAGMANAGER', $tagmanager);
		$this->db->set('TAGMANAGERBODY', $tagbody);	

		return $this->db->insert($this->table);
	}

	public function update($codigo,$title,$description,$keywords,$verification,$tagmanager,$tagbody){		
		
		$this->db->set('TITLE', $title);			
		$this->db->set('DESCRIPTION', $description);
		$this->db->set('KEYWORDS', $keywords);
		$this->db->set('GOOGLEVERIFICATION', $verification);
		$this->db->set('TAGMANAGER', $tagmanager);
		$this->db->set('TAGMANAGERBODY', $tagbody);
		$this->db->where('CODSEO',$codigo);
		return $this->db->update($this->table);
	}

	public function getId($id){
		$this->db->where('CODSEO',$id);
		$result = $this->db->get($this->table)->result();
		if(count($result)==1){
			foreach($result as $row){
				$this->CODSEO 				= $row->CODSEO;
				$this->TITLE 				= $row->TITLE;
				$this->DESCRIPTION 			= $row->DESCRIPTION;
				$this->KEYWORDS 			= $row->KEYWORDS;
				$this->GOOGLEVERIFICATION 	= $row->GOOGLEVERIFICATION;
				$this->TAGMANAGER 			= $row->TAGMANAGER;
				$this->TAGMANAGERBODY 		= $row->TAGMANAGERBODY;										
			}
			return $this;
		}
	}

}