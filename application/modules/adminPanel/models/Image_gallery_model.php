<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Image_gallery_model extends MY_Model
{
	public $table = "image_gallery g";
	public $select_column = ['g.id', 'g.name', 'g.image'];
	public $search_column = ['g.id', 'g.name'];
    public $order_column = [null, 'g.name', null];
	public $order = ['g.id' => 'DESC'];

	public function make_query()
	{  
		$this->db->select($this->select_column)
            	 ->from($this->table)
				 ->where('g.is_deleted', 0);
		
		if ($this->input->get('kacheri')) 
			$this->db->where('g.k_id', d_id($this->input->get('kacheri')));

        $this->datatable();
	}

	public function count()
	{
		$this->db->select('g.id')
		         ->from($this->table)
				 ->where('g.is_deleted', 0);
		
		if ($this->input->get('kacheri'))
			$this->db->where('g.k_id', d_id($this->input->get('kacheri')));
		            	
		return $this->db->get()->num_rows();
	}
}