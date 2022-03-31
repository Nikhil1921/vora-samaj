<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class State_model extends MY_Model
{
	public $table = "state s";
	public $select_column = ['s.id', 's.name', 'c.name country'];
	public $search_column = ['s.id', 's.name', 'c.name'];
    public $order_column = [null, 's.name', 'c.name', null];
	public $order = ['s.id' => 'DESC'];

	public function make_query()
	{  
		$this->db->select($this->select_column)
            	 ->from($this->table)
				 ->where(['s.is_deleted' => 0, 'c.is_deleted' => 0])
				 ->join('country c', 'c.id = s.c_id');

        $this->datatable();
	}

	public function count()
	{
		$this->db->select('s.id')
		         ->from($this->table)
				 ->where(['s.is_deleted' => 0, 'c.is_deleted' => 0])
				 ->join('country c', 'c.id = s.c_id');
		            	
		return $this->db->get()->num_rows();
	}
}