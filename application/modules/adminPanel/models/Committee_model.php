<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Committee_model extends MY_Model
{
	public $table = "committee c";
	public $select_column = ['c.id', 'c.name', 'c.image'];
	public $search_column = ['c.id', 'c.name'];
    public $order_column = [null, 'c.name', null];
	public $order = ['c.id' => 'DESC'];

	public function make_query()
	{  
		$this->db->select($this->select_column)
            	 ->from($this->table)
				 ->where('c.is_deleted', 0);

        $this->datatable();
	}

	public function count()
	{
		$this->db->select('c.id')
		         ->from($this->table)
				 ->where('c.is_deleted', 0);
		            	
		return $this->db->get()->num_rows();
	}
}