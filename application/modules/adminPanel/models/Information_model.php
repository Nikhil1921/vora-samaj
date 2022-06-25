<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Information_model extends MY_Model
{
	public $table = "information i";
	public $select_column = ['i.id', 'i.title', 'i.image'];
	public $search_column = ['i.id', 'i.title'];
    public $order_column = [null, 'i.title', null];
	public $order = ['i.id' => 'DESC'];

	public function make_query()
	{  
		$this->db->select($this->select_column)
            	 ->from($this->table)
				 ->where('i.is_deleted', 0);

        $this->datatable();
	}

	public function count()
	{
		$this->db->select('i.id')
		         ->from($this->table)
				 ->where('i.is_deleted', 0);
		            	
		return $this->db->get()->num_rows();
	}
}