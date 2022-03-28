<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Video_gallery_model extends MY_Model
{
	public $table = "video_gallery g";
	public $select_column = ['g.id', 'g.name', 'g.v_url'];
	public $search_column = ['g.id', 'g.name', 'g.v_url'];
    public $order_column = [null, 'g.name', 'g.v_url', null];
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