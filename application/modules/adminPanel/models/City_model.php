<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class City_model extends MY_Model
{
	public $table = "city ci";
	public $select_column = ['ci.id', 'ci.name', 's.name state', 'c.name country'];
	public $search_column = ['ci.id', 'ci.name', 's.name', 'c.name'];
    public $order_column = [null, 'ci.name', 's.name', 'c.name', null];
	public $order = ['ci.id' => 'DESC'];

	public function make_query()
	{  
		$this->db->select($this->select_column)
            	 ->from($this->table)
				 ->where(['ci.is_deleted' => 0, 's.is_deleted' => 0, 'c.is_deleted' => 0])
				 ->join('state s', 's.id = ci.s_id')
				 ->join('country c', 'c.id = s.c_id');

        $this->datatable();
	}

	public function count()
	{
		$this->db->select('s.id')
		         ->from($this->table)
				 ->where(['ci.is_deleted' => 0, 's.is_deleted' => 0, 'c.is_deleted' => 0])
				 ->join('state s', 's.id = ci.s_id')
				 ->join('country c', 'c.id = s.c_id');
		            	
		return $this->db->get()->num_rows();
	}
}