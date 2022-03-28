<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Image_gallery extends Admin_controller  {

    public function __construct()
	{
		parent::__construct();
		$this->path = $this->config->item('gallery');
	}

	private $table = 'image_gallery';
	protected $redirect = 'image_gallery';
	protected $title = 'Image gallery';
	protected $name = 'image_gallery';
	
	public function index()
	{
		$data['title'] = $this->title;
        $data['name'] = $this->name;
        $data['url'] = $this->redirect;
        $data['operation'] = "List";
        $data['datatable'] = "$this->redirect/get";
        $data['kacheries'] = $this->main->getAll('kacheries', 'id, CONCAT(name, " કચેરી") name', ['is_deleted' => 0]);
		
		return $this->template->load('template', "$this->redirect/home", $data);
	}

	public function get()
    {
        check_ajax();
        $this->load->model('image_gallery_model', 'data');
        $fetch_data = $this->data->make_datatables();
        $sr = $this->input->get('start') + 1;
        $data = [];
        foreach($fetch_data as $row)
        {  
            $sub_array = [];
            $sub_array[] = $sr;
            $sub_array[] = $row->name;
            $sub_array[] = img(['src' => $this->path.$row->image, 'width' => '100%', 'height' => '50']);
            
            $action = '<div class="btn-group" role="group"><button class="btn btn-success dropdown-toggle" id="btnGroupVerticalDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="icon-settings"></span></button><div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1" x-placement="bottom-start">';
            
            $action .= anchor($this->redirect."/update/".e_id($row->id), '<i class="fa fa-edit"></i> Edit</a>', 'class="dropdown-item"');
        
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

	public function add()
	{
        $this->form_validation->set_rules($this->validate);

        if ($this->form_validation->run() == FALSE)
        {
            $data['title'] = $this->title;
            $data['name'] = $this->name;
            $data['operation'] = "Add";
            $data['url'] = $this->redirect;
            $data['kacheries'] = $this->main->getAll('kacheries', 'id, CONCAT(name, " કચેરી") name', ['is_deleted' => 0]);
            
            return $this->template->load('template', "$this->redirect/form", $data);
        }else{
            $image = $this->uploadImage('image');
            if ($image['error'] == TRUE)
			    flashMsg(0, "", $image["message"], "$this->redirect/add");
            else{
                $post = [
                    'k_id'    => d_id($this->input->post('k_id')),
                    'name'    => $this->input->post('name'),
                    'image'   => $image['message']
                ];

                $id = $this->main->add($post, $this->table);

                flashMsg($id, "$this->title added.", "$this->title not added. Try again.", $this->redirect);
            }
        }
	}

	public function update($id)
	{
        $this->form_validation->set_rules($this->validate);

        if ($this->form_validation->run() == FALSE)
        {
            $data['title'] = $this->title;
            $data['name'] = $this->name;
            $data['operation'] = "Update";
            $data['url'] = $this->redirect;
            $data['kacheries'] = $this->main->getAll('kacheries', 'id, CONCAT(name, " કચેરી") name', ['is_deleted' => 0]);
            $data['data'] = $this->main->get($this->table, 'k_id, name, image', ['id' => d_id($id)]);
            
            return $this->template->load('template', "$this->redirect/form", $data);
        }else{
            $post = [
                    'k_id'    => d_id($this->input->post('k_id')),
                    'name'    => $this->input->post('name'),
                ];

            if (!empty($_FILES['image']['name'])) {
                $image = $this->uploadImage('image');
                if ($image['error'] == TRUE)
                    flashMsg(0, "", $image["message"], "$this->redirect/update/$id");
                else{
                    if (is_file($this->path.$this->input->post('image')))
                        unlink($this->path.$this->input->post('image'));
                    $post['image'] = $image['message'];
                }
            }
            
            $id = $this->main->update(['id' => d_id($id)], $post, $this->table);

            flashMsg($id, "$this->title updated.", "$this->title not updated. Try again.", $this->redirect);
        }
	}

	public function delete()
    {
        $this->form_validation->set_rules('id', 'id', 'required|numeric');
        
        if ($this->form_validation->run() == FALSE)
            flashMsg(0, "", "Some required fields are missing.", $this->redirect);
        else{
            $id = $this->main->update(['id' => d_id($this->input->post('id'))], ['is_deleted' => 1], $this->table);
            flashMsg($id, "$this->title deleted.", "$this->title not deleted.", $this->redirect);
        }
    }

    protected $validate = [
        [
            'field' => 'k_id',
            'label' => 'Kacheri',
            'rules' => 'required|numeric',
            'errors' => [
                'required' => "%s is required",
                'numeric' => "%s is invalid.",
            ],
        ],
        [
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'required|max_length[50]',
            'errors' => [
                'required' => "%s is required",
                'max_length' => "Max 50 chars allowed.",
            ],
        ]
    ];
}