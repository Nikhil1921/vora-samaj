<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Family_model extends MY_Model
{
	public $table = "families m";
	public $select_column = ['m.id', 'm.surname', 'm.name', 'f.name father', 'm.mobile', 'm.email', 'm.is_live', 'm.login_approved'];
	public $search_column = ['m.id', 'm.surname', 'm.name', 'f.name'];
    public $order_column = [null, 'm.surname', 'm.name', 'f.name', 'm.mobile', 'm.email', null];
	public $order = ['m.id' => 'ASC'];

	public function make_query()
	{  
		$this->db->select($this->select_column)
            	 ->from($this->table)
				 ->where(['m.in_list' => 1])
				 ->join("families f", "f.id = m.parent_id", 'left');

        $this->datatable();
	}

	public function count()
	{
		$this->db->select('m.id')
		          ->from($this->table)
				  ->where(['m.in_list' => 1])
				 ->join("families f", "f.id = m.parent_id", 'left');
		            	
		return $this->db->get()->num_rows();
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

    public function memberTree($c)
    {
		$child = $this->main->getAll($this->table, 'id, name', ['parent_id' => $c['id']]);
		
		if($child) {
			echo '<ul>';
			foreach ($child as $c) {
				echo '<li><a href="javascript:;;">'.$c['name'].'</a>';
							$this->member->memberTree($c);
				echo '</li>';
			}
			echo '</ul>';
		}
    }

    public function getProfile($id)
    {
		$this->db->select('m.id, m.parent_id, m.name, m.surname, m.mobile, m.email, gender	relation, d.marital_status, d.blood_group, d.dob, d.education, d.occupation_type, d.occupation, d.visiting_card, d.permanent_address, d.current_address, d.image, d.job_location, res.area AS res_area, res.address1 AS res_address1, res.address2 AS res_address2, res.house_no AS res_house_no, res.building_name AS res_building_name, res.country AS res_country, res.state AS res_state, res.city AS res_city, cur.area AS cur_area, cur.address1 AS cur_address1, cur.address2 AS cur_address2, cur.house_no AS cur_house_no, cur.building_name AS cur_building_name, cur.country AS cur_country, cur.state AS cur_state, cur.city AS cur_city, d.relation, d.mediclaim')
            	 ->from($this->table)
				 ->where(['m.id' => $id])
				 ->join("member_details d", "d.id = m.id", 'left')
				 ->join("addresses res", "res.id = d.permanent_address", 'left')
				 ->join("addresses cur", "cur.id = d.current_address", 'left');
		
		return $this->db->get()->row_array();
    }

    public function updateProfile($id, $post)
    {
		$res_add = [
			'area'          => $post['res_area'],
			'address1'      => $post['res_address1'],
			'address2'      => $post['res_address2'],
			'house_no'      => $post['res_house_no'],
			'building_name' => $post['res_building_name'],
			'country' 		=> d_id($post['res_country']),
			'state' 		=> d_id($post['res_state']),
			'city' 			=> d_id($post['res_city']),
		];

		$cur_add = [
			'area'          => $post['cur_area'],
			'address1'      => $post['cur_address1'],
			'address2'      => $post['cur_address2'],
			'house_no'      => $post['cur_house_no'],
			'building_name' => $post['cur_building_name'],
			'country' 		=> d_id($post['cur_country']),
			'state' 		=> d_id($post['cur_state']),
			'city' 			=> d_id($post['cur_city']),
		];
		
		$this->db->trans_start();

		if(!$post['permanent_address'])
		{
			$this->db->insert('addresses', $res_add);
			$post['permanent_address'] = $this->db->insert_id();
		}else
			$this->db->update('addresses', $res_add, ['id' => $post['permanent_address']]);

		if(!$post['current_address'])
		{
			$this->db->insert('addresses', $cur_add);
			$post['current_address'] = $this->db->insert_id();
		}else
			$this->db->update('addresses', $cur_add, ['id' => $post['current_address']]);
		
		$details = [
			'id'					=> $id,
			'marital_status'		=> $post['marital_status'],
			'blood_group'			=> $post['blood_group'],
			'dob'					=> $post['dob'],
			'mediclaim'				=> $post['mediclaim'],
			'relation'				=> isset($post['relation']) ? $post['relation'] : 'SELF',
			'gender'				=> isset($post['relation']) && in_array($post['relation'], ['Wife', 'Daughter']) ? 'Female' : 'Male',
			'education'				=> $post['education'],
			'occupation_type'		=> $post['occupation_type'],
			'occupation'			=> $post['occupation'],
			'permanent_address'		=> $post['permanent_address'],
			'current_address'		=> $post['current_address'],
			'job_location'			=> $post['job_location'],
		];
		
		if($this->db->select('id')->from('member_details')->where(['id' => $id])->get()->row())
			$this->db->update('member_details', $details, ['id' => $id]);
		else
			$this->db->insert('member_details', $details);
		
		$member = [
			'name'	    => strtoupper($this->input->post('name')),
			'surname'	=> strtoupper($this->input->post('surname')),
			'mobile'	=> $this->input->post('mobile'),
			'in_list'	=> isset($post['relation']) && in_array($post['relation'], ['Wife', 'Daughter']) ? 0 : 1,
			'email'     => $this->input->post('email')
		];
		
		$this->db->update('families', $member, ['id' => $id]);

		$this->db->trans_complete();
		
		return $this->db->trans_status();
    }
}