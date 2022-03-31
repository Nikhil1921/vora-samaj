<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Member_model extends MY_Model
{
	public $table = "members m";
	public $select_column = ['m.id', 'm.name', 'f.name father', 'm.mobile', 'm.parent_id'];
	public $search_column = ['m.id', 'm.name', 'f.name', 'm.mobile'];
    public $order_column = [null, 'm.name', 'f.name', 'm.mobile', null];
	public $order = ['m.id' => 'ASC'];

	public function make_query()
	{  
		$this->db->select($this->select_column)
            	 ->from($this->table)
				 ->join("members f", "f.id = m.parent_id", 'left');

        $this->datatable();
	}

	public function count()
	{
		$this->db->select('m.id')
		         ->from($this->table);
		            	
		return $this->db->get()->num_rows();
	}

	public function getChilds($conter, $pedhi, $id)
	{
		$this->db->select('id, name, parent_id')
		         ->from($this->table)
				 ->where('conter', $conter)
				 ->where('pedhi', $pedhi)
				 ->where('id', $id);
		            	
		return $this->db->get()->result();
	}

	public function getLastCount($pedhi)
	{
		$pedhi = $this->db->select('conter')
						  ->from($this->table)
						  ->where('pedhi', $pedhi)
						  ->order_by('conter', 'DESC')
						  ->get()->row();
		            	
		return $pedhi ? $pedhi->conter : 0;
	}

    public function makeTree($c)
    {
        $child = $this->main->getAll($this->table, 'id, name', ['parent_id' => $c['id']]);
		
		if (! $child) {
			echo '<ul>
					<li data-jstree="{&quot;selected&quot;:true,&quot;type&quot;:&quot;file&quot;}">No Children</li>
				</ul>';
		}else{
			foreach ($child as $c) {
				echo '<ul>
						<li data-jstree="{&quot;opened&quot;:true}">'.$c['name'];
							$this->member->makeTree($c);
				echo '</li></ul>';
			}
		}
    }
}