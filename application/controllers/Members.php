<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends Public_controller {
	
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userId) flashMsg(0, "", "Login to access members area.", '');
	}

	private $table = 'families';

	public function index()
	{
		$data['title'] = 'My Family';
        $data['name'] = 'members';
        $data['family'] = $this->main->getFamily($this->session->userId);
        $data['user'] = $this->main->get('families', 'name, surname, parent_id', ['id' => $this->session->userId]);
        $data['user']['parent'] = $this->main->get('families', 'name', ['id' => $data['user']['parent_id']]);
		
		return $this->template->load('template', 'members/home', $data);
	}

	public function icard($id=0)
	{
        $id = $id === 0 ? $this->session->userId : d_id($id);

        $this->load->model(admin('Family_model'), 'family');
		$data['title'] = 'My Family';
        $data['name'] = 'icard';
        $data['data'] = $this->family->getProfile($id);
		
		return $this->template->load('template', 'members/icard', $data);
	}

	public function getParent()
    {
        $id = $this->input->get('parent_id');
        $data = $this->main->get($this->table, 'name, parent_id', ['id' => d_id($id)]);
        if($data) $data['parent_id'] = e_id($data['parent_id']);
        die(json_encode($data));
    }

	public function tree()
	{
		$data['title'] = 'Family tree';
        $data['name'] = 'tree';
		$data['main'] = $this->main->get($this->table, 'id, name, parent_id', ['id' => $this->session->userId]);
		$this->load->model(admin('Family_model'), 'member');
        
        /* $fathers = [];
        $parent_id = $data['main']['parent_id'];
        for ($i=$this->session->generation-1; $i > 0; $i--) { 
            $fathers[$i] = $this->main->get($this->table, 'id, name, parent_id', ['id' => $parent_id]);
            if($fathers[$i])
                $parent_id = $fathers[$i]['parent_id'];
        }
        ksort($fathers);
        $data['fathers'] = $fathers; */
		// return $this->load->view('members/treeNew', $data);
		return $this->template->load('template', 'members/tree', $data);
	}

	public function update_member($id)
    {
        $this->load->model(admin('Family_model'), 'family');
        $this->path = $this->config->item('members');
        if ($this->form_validation->run('member_details') == FALSE)
        {
            $data['title'] = 'Update member';
        	$data['name'] = 'add-member';
        	$data['validate'] = true;
            $data['data'] = $this->family->getProfile(d_id($id));
            $data['countries'] = $this->main->getAll('country', 'id, name', ['is_deleted' => 0]);
            
            return $this->template->load('template', 'members/profile', $data);
        }else{
            $reditect = "members/update-member/$id";
            $u_id = $this->updateProfile(d_id($id), $reditect);

            flashMsg($u_id, "Member added.", "Member not added. Try again.", $reditect);
        }
    }

	public function add_member()
	{
        $this->load->model(admin('Family_model'), 'family');
        $this->path = $this->config->item('members');
        if ($this->form_validation->run('member_details') == FALSE)
        {
            $data['title'] = 'Add member';
        	$data['name'] = 'add-member';
        	$data['validate'] = true;
            $data['countries'] = $this->main->getAll('country', 'id, name', ['is_deleted' => 0]);
            
            return $this->template->load('template', 'members/profile', $data);
        }else{
            $post = [
                'name'	    => strtoupper($this->input->post('name')),
                'surname'	=> strtoupper($this->input->post('surname')),
                'mobile'	=> $this->input->post('mobile'),
                'email'     => $this->input->post('email'),
                'parent_id'	=> $this->session->userId
            ];
            
            if($id = $this->main->add($post, 'families'))
            {
                $id = e_id($id);
                $reditect = "members/update-member/$id";
                $u_id = $this->updateProfile(d_id($id), $reditect);
                flashMsg($u_id, "Member added.", "Member not added. Try again.", $reditect);
            }else{
                return $this->add_member();
            }
        }
	}

	public function profile()
	{
		$this->load->model(admin('Family_model'), 'family');
        $this->path = $this->config->item('members');
        if ($this->form_validation->run('member_details') == FALSE)
        {
            $data['title'] = 'My profile';
        	$data['name'] = 'profile';
        	$data['validate'] = true;
            $data['data'] = $this->family->getProfile($this->session->userId);
            $data['countries'] = $this->main->getAll('country', 'id, name', ['is_deleted' => 0]);
            
            return $this->template->load('template', 'members/profile', $data);
        }else{
            $reditect = "members/profile";
            $u_id = $this->updateProfile($this->session->userId, $reditect);
            flashMsg($u_id, "Profile updated.", "Profile not updated. Try again.", $reditect);
        }
	}

	private function updateProfile($id, $reditect)
	{
		$u_id = $this->family->updateProfile($id, $this->input->post());
        
        if(!empty($_FILES['visiting_card']['name'])){
            $visiting_card = $this->uploadImage('visiting_card');
            if(!$visiting_card["error"]){
                if(!$this->main->update(['id' => $id], ['visiting_card' => $visiting_card["message"]], 'member_details'))
                    unlink($this->path.$visiting_card["message"]);
                else
                    if(is_file($this->path.$this->input->post('visiting_card'))) unlink($this->path.$this->input->post('visiting_card'));
            }else
                flashMsg(0, "", $visiting_card["message"], $reditect);
        }

        if(!empty($_FILES['image']['name'])){
            $image = $this->uploadImage('image');
            if(!$image["error"]){
                if(!$this->main->update(['id' => $id], ['image' => $image["message"]], 'member_details'))
                    unlink($this->path.$image["message"]);
                else
                    if(is_file($this->path.$this->input->post('image'))) unlink($this->path.$this->input->post('image'));
            }else
                flashMsg(0, "", $image["message"], $reditect);
        }

        return $u_id;
	}

	public function logout()
	{
		$this->session->sess_destroy();
        return redirect();
	}
}