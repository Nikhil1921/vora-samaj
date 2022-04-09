<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends Admin_controller  {

    public function __construct()
	{
		parent::__construct();
		$this->path = $this->config->item('members');
	}

	private $table = 'members';
	protected $redirect = 'members';
	protected $title = 'Member logins';
	protected $name = 'members';
	
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
        $this->load->model('Member_model', 'data');
        $fetch_data = $this->data->make_datatables();
        $sr = $this->input->get('start') + 1;
        $data = [];
        
        foreach($fetch_data as $row)
        {
            $sub_array = [];
            $sub_array[] = $sr;
            $sub_array[] = $row->name;
            $sub_array[] = $row->father ? $row->father : 'NA';
            $sub_array[] = $row->mobile;
            $sub_array[] = '<div class="media">
                                <div class="icon-state switch-outline">
                                    <label class="switch">
                                        <input onclick="makeLive('.e_id($row->id).', '.($row->is_live ? 0 : 1).')" type="checkbox" name="is_live" '.($row->is_live ? 'checked' : '').' />
                                        <span class="switch-state bg-danger"></span>
                                    </label>
                                </div>
                            </div>';
            
            $action = '<div class="btn-group" role="group"><button class="btn btn-success dropdown-toggle" id="btnGroupVerticalDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="icon-settings"></span></button><div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1" x-placement="bottom-start">';
            
            $action .= anchor($this->redirect."/tree/".e_id($row->id), '<i class="fa fa-tree"></i> Tree</a>', 'class="dropdown-item"');
            
            $action .= form_open($this->redirect.'/delete', 'id="'.e_id($row->id).'"', ['id' => e_id($row->id)]).
                        '<a class="dropdown-item" onclick="script.delete('.e_id($row->id).'); return false;" href=""><i class="fa fa-trash"></i> Delete</a>'.
                        form_close();

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
        return $this->template->load('template', "$this->redirect/treeNew", $data);
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

	/* public function tree($id)
	{
		$data['title'] = $this->title;
        $data['name'] = $this->name;
        $data['url'] = $this->redirect;
        $data['operation'] = "Tree";
        $data['tree'] = d_id($id);
        $id = d_id($id);
        $main = $this->main->get($this->table, 'id, name, parent_id', ['id' => $id]);
        if($main)
        {
            $parent = $this->main->get($this->table, 'id, name', ['id' => $main['parent_id']]);
            if($parent)
                $self = $this->main->getAll($this->table, 'id, name', ['parent_id' => $main['parent_id']]);
            else
                $self = $this->main->getAll($this->table, 'id, name', ['id' => $id]);
            $child = $this->main->getAll($this->table, 'id, name', ['parent_id' => $id]);
            $parent = $parent ? $parent : ['name' => 'NA'];
            $data['parent'] = $parent;
            $data['child'] = $child;
            $data['self'] = $self;
            
            return $this->template->load('template', "$this->redirect/tree", $data);
        }else{
            return $this->error_404();
        }
	} */

	/* public function delete()
    {
        $this->form_validation->set_rules('id', 'id', 'required|numeric');
        
        if ($this->form_validation->run() == FALSE)
            $response = [
                        'message' => "Some required fields are missing.",
                        'status' => false
                    ];
        else
            if ($this->main->delete($this->table, ['id' => d_id($this->input->post('id'))]))
                $response = [
                    'message' => "$this->title deleted.",
                    'status' => true
                ];
            else
                $response = [
                    'message' => "$this->title not deleted.",
                    'status' => false
                ];
                
        flashMsg($response['status'], $response['message'], $response['message'], $this->redirect);
    } */
}