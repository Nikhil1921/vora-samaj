<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Staff_model extends MY_Model
{
	public $table = "staff s";
	public $select_column = ['s.id', 's.name', 's.hoddo', 's.mobile', 's.image'];
	public $search_column = ['s.id', 's.name', 's.hoddo', 's.mobile'];
    public $order_column = [null, 's.name', 's.hoddo', 's.mobile', null];
	public $order = ['s.id' => 'DESC'];

	public function make_query()
	{  
		$this->db->select($this->select_column)
            	 ->from($this->table)
				 ->where('s.is_deleted', 0);
		
		if ($this->input->get('kacheri')) 
			$this->db->where('s.k_id', d_id($this->input->get('kacheri')));

        $this->datatable();
	}

	public function count()
	{
		$this->db->select('s.id')
		         ->from($this->table)
				 ->where('s.is_deleted', 0);
		
		if ($this->input->get('kacheri'))
			$this->db->where('s.k_id', d_id($this->input->get('kacheri')));
		            	
		return $this->db->get()->num_rows();
	}
}