<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Kacheries_model extends MY_Model
{
	public $table = "kacheries k";
	public $select_column = ['k.id', 'CONCAT(k.name, " કચેરી") name', 'k.mobile', 'k.email'];
	public $search_column = ['k.id', 'k.name', 'k.mobile', 'k.email'];
    public $order_column = [null, 'k.name', 'k.mobile', 'k.email', null];
	public $order = ['k.id' => 'ASC'];

	public function make_query()
	{
		$this->db->select($this->select_column)
            	 ->from($this->table)
                 ->where('k.is_deleted', 0);

        $this->datatable();
	}

	public function count()
	{
		$this->db->select('k.id')
		         ->from($this->table)
                 ->where('k.is_deleted', 0);

		return $this->db->get()->num_rows();
	}
}