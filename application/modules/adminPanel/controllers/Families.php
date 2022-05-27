<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Families extends Admin_controller  {

    public function __construct()
    {
        parent::__construct();
        $this->path = $this->config->item('members');
    }

	private $table = 'families';
	protected $redirect = 'families';
	protected $title = 'Family';
	protected $name = 'family';
	
	public function index()
	{
		$data['title'] = $this->title;
        $data['name'] = $this->name;
        $data['url'] = $this->redirect;
        $data['operation'] = "List";
        $data['datatable'] = "$this->redirect/get";

        return $this->template->load('template', "$this->redirect/home", $data);
	}

	public function get()
    {
        check_ajax();
        $this->load->model('Family_model', 'data');
        $fetch_data = $this->data->make_datatables();
        $sr = $this->input->get('start') + 1;
        $data = [];
        
        foreach($fetch_data as $row)
        {  
            $sub_array = [];
            $sub_array[] = $sr;
            $sub_array[] = $row->surname;
            $sub_array[] = $row->name;
            $sub_array[] = $row->father ? $row->father : 'NA';
            $sub_array[] = $row->mobile;
            $sub_array[] = $row->email;
            $sub_array[] = '<div class="media">
                                <div class="icon-state switch-outline">
                                    <label class="switch">
                                        <input onclick="makeLive('.e_id($row->id).', '.($row->is_live ? 0 : 1).')" type="checkbox" name="is_live" '.($row->is_live ? 'checked' : '').' />
                                        <span class="switch-state bg-danger"></span>
                                    </label>
                                </div>
                            </div>';

            $sub_array[] = '<div class="media">
                                <div class="icon-state switch-outline">
                                    <label class="switch">
                                        <input onclick="approveLogin('.e_id($row->id).', '.($row->login_approved ? 0 : 1).')" type="checkbox" name="login_approved" '.($row->login_approved ? 'checked' : '').' />
                                        <span class="switch-state bg-danger"></span>
                                    </label>
                                </div>
                            </div>';
            
            $action = '<div class="btn-group" role="group"><button class="btn btn-success dropdown-toggle" id="btnGroupVerticalDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="icon-settings"></span></button><div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1" x-placement="bottom-start">';
            
            $action .= anchor($this->redirect."/tree/".e_id($row->id), '<i class="fa fa-tree"></i> Tree</a>', 'class="dropdown-item"');
            $action .= anchor($this->redirect."/update/".e_id($row->id), '<i class="fa fa-edit"></i> Update details</a>', 'class="dropdown-item"');
            $action .= anchor($this->redirect."/add/".e_id($row->id), '<i class="fa fa-user"></i> Add member</a>', 'class="dropdown-item"');
            
            $action .= '</div></div>';
            $sub_array[] = $action;

            $data[] = $sub_array;
            $sr++;
        }

        $output = [
            "draw"              => intval($this->input->get('draw')),
            "recordsTotal"      => $this->data->count(),
            "recordsFiltered"   => $this->data->get_filtered_data(),
            "data"              => $data
        ];
        
        die(json_encode($output));
    }

    public function tree($id)
    {
        $data['title'] = $this->title;
        $data['name'] = $this->name;
        $data['url'] = $this->redirect;
        $data['operation'] = "Tree";
        $data['tree'] = d_id($id);
        $data['main'] = $this->main->get($this->table, 'id, name', ['id' => d_id($id)]);
        $this->load->model('Family_model', 'member');
        return $this->template->load('template', "$this->redirect/tree", $data);
    }

    public function make_live()
    {
        if($this->main->update(['id' => d_id($this->input->post('id'))], ['is_live' => $this->input->post('is_live')], $this->table))
            $response = [
                'error' => false,
                'message' => "$this->title updated."
            ];
        else
            $response = [
                'error' => true,
                'message' => "$this->title not updated."
            ];
        die(json_encode($response));
    }

    public function login_approved()
    {
        if($this->main->update(['id' => d_id($this->input->post('id'))], ['login_approved' => $this->input->post('login_approved')], $this->table))
            $response = [
                'error' => false,
                'message' => "$this->title updated."
            ];
        else
            $response = [
                'error' => true,
                'message' => "$this->title not updated."
            ];
            
        die(json_encode($response));
    }

    public function update($id)
    {
        $this->load->model('Family_model', 'family');
        
        if ($this->form_validation->run('member_details') == FALSE)
        {
            $data['title'] = $this->title;
            $data['name'] = $this->name;
            $data['operation'] = "Update";
            $data['url'] = $this->redirect;
            $data['data'] = $this->family->getProfile(d_id($id));
            $data['id'] = d_id($id);
            $data['countries'] = $this->main->getAll('country', 'id, name', ['is_deleted' => 0]);
            
            return $this->template->load('template', "$this->redirect/form", $data);
        }else{
            $u_id = $this->updateProfile($id, $this->input->post());
            
            flashMsg($u_id, "Profile updated.", "Profile not updated. Try again.", "$this->redirect/update/$id");
        }
    }

    public function add($parent)
    {
        $this->load->model('Family_model', 'family');
        
        if ($this->form_validation->run('member_details') == FALSE)
        {
            $data['title'] = $this->title;
            $data['name'] = $this->name;
            $data['operation'] = "Add";
            $data['url'] = $this->redirect;
            $data['countries'] = $this->main->getAll('country', 'id, name', ['is_deleted' => 0]);
            
            return $this->template->load('template', "$this->redirect/form", $data);
        }else{
            $post = [
                'name'	    => strtoupper($this->input->post('name')),
                'surname'	=> strtoupper($this->input->post('surname')),
                'mobile'	=> $this->input->post('mobile'),
                'email'     => $this->input->post('email'),
                'parent_id'	=> d_id($parent)
            ];

            if($id = $this->main->add($post, 'families'))
            {
                $id = e_id($id);
                $u_id = $this->updateProfile($id, $this->input->post());
                
                flashMsg($u_id, "Member added.", "Member not added. Try again.", "$this->redirect/update/$id");
            }else
                flashMsg($id, "Member added.", "Member not added. Try again.", "$this->redirect/add");
        }
    }

    private function updateProfile($id, $reditect)
    {
        $u_id = $this->family->updateProfile(d_id($id), $this->input->post());
            
        if(!empty($_FILES['visiting_card']['name'])){
            $visiting_card = $this->uploadImage('visiting_card');
            if(!$visiting_card["error"]){
                if(!$this->main->update(['id' => d_id($id)], ['visiting_card' => $visiting_card["message"]], 'member_details'))
                    unlink($this->path.$visiting_card["message"]);
                else
                    if(is_file($this->path.$this->input->post('visiting_card'))) unlink($this->path.$this->input->post('visiting_card'));
            }else
                flashMsg(0, "", $visiting_card["message"], $reditect);
        }

        if(!empty($_FILES['image']['name'])){
            $image = $this->uploadImage('image');
            if(!$image["error"]){
                if(!$this->main->update(['id' => d_id($id)], ['image' => $image["message"]], 'member_details'))
                    unlink($this->path.$image["message"]);
                else
                    if(is_file($this->path.$this->input->post('image'))) unlink($this->path.$this->input->post('image'));
            }else
                flashMsg(0, "", $image["message"], $reditect);
        }

        return $u_id;
    }
}