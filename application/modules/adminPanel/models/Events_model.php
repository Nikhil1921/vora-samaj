<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Events_model extends MY_Model
{
	public $table = "events e";
	public $select_column = ['e.id', 'e.title', 'e.place', 'DATE_FORMAT(e.e_date, "%d-%m-%Y") e_date','DATE_FORMAT(e.e_time, "%h:%i %p") e_time', 'e.image'];
	public $search_column = ['e.id', 'e.title', 'e.place', 'e.e_date','e.e_time'];
    public $order_column = [null, 'e.title', 'e.place', 'e.e_date','e.e_time', null];
	public $order = ['e.id' => 'DESC'];

	public function make_query()
	{
		$this->db->select($this->select_column)
            	 ->from($this->table)
                 ->where('e.is_deleted', 0);

        $this->datatable();
	}

	public function count()
	{
		$this->db->select('e.id')
		         ->from($this->table)
                 ->where('e.is_deleted', 0);
		            	
		return $this->db->get()->num_rows();
	}
}