<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Mensagem_model class.
 * @extends CI_Model
 */
class Orcamento_model extends CI_Model {
	private $table_name = 'orcamento';
	private $CODMSG;	
    private $NOMEMSG;
    private $EMAILMSG;
    private $TELMSG;
    private $ESTADOMSG;
    private $CIDADEMSG;
    private $MENSAGEM;
    private $PRODUTOMSG;
    private $DATA;

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */

	public function __construct() {
		
		parent::__construct();
		$this->load->database();		
	}

	/**
	 * add function.
	 * 
	 * @access public
	 * @param mixed $nome
	 * @param mixed $email
	 * @param mixed $telefone
	 * @param mixed $estado
	 * @param mixed $cidade
	 * @param mixed $mensagem
	 * @param date $data;
	 * @return bool true on success, false on failure
	 */	

	public function add($nome, $email, $telefone, $estado, $cidade, $mensagem,$produto,$data) 
	{
		
		$data = array(
			'NOMEMSG'   => $nome,
			'EMAILMSG'	=> $email,
			'TELMSG'   	=> $telefone,
			'ESTADOMSG'	=> $estado,
			'CIDADEMSG' => $cidade,			
			'MENSAGEM' 	=> $mensagem,
			'PRODUTOMSG' => $produto,
			'DATA' 		=> date('Y-m-j H:i:s'),
		);
		
		return $this->db->insert('orcamento', $data);		
	}

	public function getOrcamento($id=null){  
        if($id === null){
            return $query = $this->db->get($this->table_name)->result();
        }

		$query = $this->db->get_where('orcamento',['CODMSG'=>$id]);
        return $query->first_row();       
    }
	
	public function get($id=null){  
        if($id === null){
            return $query = $this->db->get($this->table_name)->result();
        }

		$query = $this->db->get_where($this->table_name,['CODMSG'=>$id]);
        return $query->first_row();       
    }

    public function getDados($id){ 
		$result = $this->db->get_where($this->table_name,['CODMSG'=>$id]);
		$result->first_row();
		if(count($result)==1){
			foreach($result as $row){
				$this->CODMSG 		= $row->CODMSG;
				$this->NOMEMSG 		= $row->NOMEMSG;
				$this->EMAILMSG		= $row->EMAILMSG;
				$this->TELMSG		= $row->TELMSG;
				$this->ESTADOMSG	= $row->ESTADOMSG;
				$this->CIDADEMSG	= $row->CIDADEMSG;
				$this->MENSAGEM 	= $row->MENSAGEM;
				$this->PRODUTOMSG	= $row->PRODUTOMSG;
				$this->DATA 		= $row->DATA;
			}
		  return $this;
		}
    }
}