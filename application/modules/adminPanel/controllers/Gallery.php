<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends Admin_controller  {

    public function __construct()
	{
		parent::__construct();
		$this->path = $this->config->item('gallery');
	}

	private $table = 'gallery';
	protected $redirect = 'gallery';
	protected $title = 'Gallery';
	protected $name = 'gallery';
	
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
        $this->load->model('Gallery_model', 'data');
        $fetch_data = $this->data->make_datatables();
        $sr = $this->input->get('start') + 1;
        $data = [];
        foreach($fetch_data as $row)
        {  
            $sub_array = [];
            $sub_array[] = $sr;
            $sub_array[] = $row->name;
            
            $action = '<div class="btn-group" role="group"><button class="btn btn-success dropdown-toggle" id="btnGroupVerticalDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="icon-settings"></span></button><div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1" x-placement="bottom-start">';
            
            $action .= anchor($this->redirect."/update/".e_id($row->id), '<i class="fa fa-edit"></i> Edit</a>', 'class="dropdown-item"');
            $action .= anchor($this->redirect."/upload/".e_id($row->id), '<i class="fa fa-image"></i> Upload Images</a>', 'class="dropdown-item"');
        
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
            
            return $this->template->load('template', "$this->redirect/form", $data);
        }else{
            $post = [
                'name'    => $this->input->post('name')
            ];

            $id = $this->main->add($post, $this->table);

            flashMsg($id, "$this->title added.", "$this->title not added. Try again.", $this->redirect);
            
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
            $data['data'] = $this->main->get($this->table, 'name', ['id' => d_id($id)]);
            
            return $this->template->load('template', "$this->redirect/form", $data);
        }else{
            $post = [
                    'name'    => $this->input->post('name')
                ];
            
            $id = $this->main->update(['id' => d_id($id)], $post, $this->table);

            flashMsg($id, "$this->title updated.", "$this->title not updated. Try again.", $this->redirect);
        }
	}

	public function upload($id)
    {
        if ($this->input->server('REQUEST_METHOD') === "GET")
        {
            $data['title'] = $this->title;
            $data['id'] = $id;
            $data['name'] = $this->name;
            $data['operation'] = "Upload Images";
            $data['url'] = $this->redirect;
            $data['data'] = $this->main->get($this->table, 'name', ['id' => d_id($id)]);
            $data['gallery'] = $this->main->getAll("gallery_imgs", 'id, image', ['g_id' => d_id($id)]);
            
            return $this->template->load('template', "$this->redirect/upload", $data);
        }else{
            $dataInfo = array();
            $files = $_FILES;
            $cpt = count($_FILES['image']['name']);
            $u_id = 0;

            for($i=0; $i < $cpt; $i++)
            {
                $_FILES['image']['name']= $files['image']['name'][$i];
                $_FILES['image']['type']= $files['image']['type'][$i];
                $_FILES['image']['tmp_name']= $files['image']['tmp_name'][$i];
                $_FILES['image']['error']= $files['image']['error'][$i];
                $_FILES['image']['size']= $files['image']['size'][$i];

                $img = $this->uploadImage('image', "jpg|jpeg|png|JPG|JPEG|PNG", [], time()+$i+1);

                if(!$img['error'])
                {
                    $u_id = $this->main->add(['g_id' => d_id($id), 'image' => $img['message']], "gallery_imgs");
                }
            }

            flashMsg($u_id, "$this->title updated.", "$this->title not updated. Try again.", "$this->redirect/upload/$id");
        }
    }

	public function delete_image($id)
    {
        $this->form_validation->set_rules('id', 'id', 'required|numeric');
        $this->form_validation->set_rules('image', 'image', 'required');
        
        if ($this->form_validation->run() == FALSE)
            flashMsg(0, "", "Some required fields are missing.", $this->redirect);
        else{
            $d_id = $this->main->delete("gallery_imgs", ['id' => d_id($this->input->post('id'))]);

            if($d_id && is_file($this->input->post('image'))) unlink($this->input->post('image'));

            flashMsg($id, "Image deleted.", "Image not deleted.", "$this->redirect/upload/$id");
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
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'required|max_length[255]',
            'errors' => [
                'required' => "%s is required",
                'max_length' => "Max 255 chars allowed.",
            ],
        ]
    ];
}