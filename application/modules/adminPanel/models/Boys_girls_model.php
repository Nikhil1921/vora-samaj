<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Boys_girls_model extends MY_Model
{
	public $table = "boys_girls bg";
	public $select_column = ['bg.id', 'bg.name', 'bg.dob', 'bg.education', 'bg.image'];
	public $search_column = ['bg.id', 'bg.name', 'bg.dob', 'bg.education'];
    public $order_column = [null, 'bg.name', 'bg.dob', 'bg.education', null];
	public $order = ['bg.id' => 'DESC'];

	public function make_query()
	{  
		$this->db->select($this->select_column)
            	 ->from($this->table)
				 ->where('bg.is_deleted', 0);

        $this->datatable();
	}

	public function count()
	{
		$this->db->select('bg.id')
		         ->from($this->table)
				 ->where('bg.is_deleted', 0);
		            	
		return $this->db->get()->num_rows();
	}
}