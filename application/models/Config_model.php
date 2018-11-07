<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Config_model extends CI_Model {

	private $table = "config";
	private $_data = array();

	var $CODCONFIG;
	var $NMEMPRESA;
	var $EMAIL;
	var $NMFANTASIA;
	var $TELFIXO;
	var $WHATSAPP;

	public function listar(){    	
        return $this->db->get($this->table)->result();
    } 

    public function add($nome,$email,$fantasia,$telefone,$wahtsapp,$titulomaps,$mapa,$smtp,$emailenvio,$senhaeemail,$porta,$bcc,$facebook,$instagram){			
		
		$this->db->set('NMEMPRESA', $nome);			
		$this->db->set('EMAIL', $email);
		$this->db->set('NMFANTASIA', $fantasia);
		$this->db->set('TELFIXO', $telefone);
		$this->db->set('WHATSAPP', $wahtsapp);
		$this->db->set('TITULOMAPS', $titulomaps);
		$this->db->set('MAPA', $mapa);
		$this->db->set('SMTP', $smtp);
		$this->db->set('EMAILENVIO', $emailenvio);
		$this->db->set('SENHAEMAIL', $senhaeemail);
		$this->db->set('PORTA', $porta);
		$this->db->set('BCC', $bcc);
		$this->db->set('FACEBOOK', $facebook);
		$this->db->set('INSTAGRAM', $instagram);

		return $this->db->insert($this->table);
	}

	public function update($codigo,$nome,$email,$fantasia,$telefone,$wahtsapp,$titulomaps,$mapa,$smtp,$emailenvio,$senhaeemail,$porta,$bcc,$facebook,$instagram){		
		
		$this->db->set('NMEMPRESA', $nome);			
		$this->db->set('EMAIL', $email);
		$this->db->set('NMFANTASIA', $fantasia);
		$this->db->set('TELFIXO', $telefone);
		$this->db->set('WHATSAPP', $wahtsapp);
		$this->db->set('TITULOMAPS', $titulomaps);
		$this->db->set('MAPA', $mapa);
		$this->db->set('SMTP', $smtp);
		$this->db->set('EMAILENVIO', $emailenvio);
		$this->db->set('SENHAEMAIL', $senhaeemail);
		$this->db->set('PORTA', $porta);
		$this->db->set('BCC', $bcc);
		$this->db->set('FACEBOOK', $facebook);
		$this->db->set('INSTAGRAM', $instagram);
		$this->db->where('CODCONFIG',$codigo);
		return $this->db->update($this->table);
	}

	public function getId($id){
		$this->db->where('CODCONFIG',$id);
		$result = $this->db->get($this->table)->result();
		if(count($result)==1){
			foreach($result as $row){
				$this->CODCONFIG 		= $row->CODCONFIG;
				$this->NMEMPRESA 		= $row->NMEMPRESA;
				$this->EMAIL 			= $row->EMAIL;
				$this->NMFANTASIA 		= $row->NMFANTASIA;
				$this->TELFIXO 			= $row->TELFIXO;
				$this->WHATSAPP 		= $row->WHATSAPP;
				$this->TITULOMAPS 		= $row->TITULOMAPS;
				$this->MAPA 			= $row->MAPA;
				$this->SMTP 			= $row->SMTP;
				$this->EMAILENVIO 		= $row->EMAILENVIO;
				$this->MAPA 			= $row->MAPA;
				$this->SMTP 			= $row->SMTP;
				$this->EMAILENVIO 		= $row->EMAILENVIO;
				$this->SENHAEMAIL 		= $row->SENHAEMAIL;
				$this->PORTA 			= $row->PORTA;
				$this->BCC 				= $row->BCC;
				$this->FACEBOOK 		= $row->FACEBOOK;
				$this->INSTAGRAM 		= $row->INSTAGRAM;								
			}
			return $this;
		}
	}

}