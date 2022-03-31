<?php defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Home extends Admin_controller  {

	private $table = 'logins';
	protected $redirect = 'dashboard';
	
	public function index()
	{
		$data['title'] = 'dashboard';
        $data['name'] = 'dashboard';
        $data['url'] = $this->redirect;
        
        return $this->template->load('template', 'home', $data);
	}

	public function profile()
    {
        $this->form_validation->set_rules($this->profile);

        if ($this->form_validation->run() == FALSE)
        {
            $data['title'] = 'profile';
            $data['name'] = 'dashboard';
            $data['operation'] = 'update';
            $data['url'] = $this->redirect;

            return $this->template->load('template', 'profile', $data);
        }
        else
        {
            $post = [
    			'mobile'   	 => $this->input->post('mobile'),
    			'email'   	 => $this->input->post('email'),
    			'name'   	 => $this->input->post('name')
    		];

            if ($this->input->post('password'))
                $post['password'] = my_crypt($this->input->post('password'));

            $id = $this->main->update(['id' => $this->session->auth], $post, $this->table);

            flashMsg($id, "Profile updated.", "Profile not updated. Try again.", admin("profile"));
        }
    }

	public function logout()
    {
        $this->session->sess_destroy();
        return redirect(admin('login'));
    }

	public function backup()
    {
        // Load the DB utility class
        $this->load->dbutil();
        
        // Backup your entire database and assign it to a variable
        $backup = $this->dbutil->backup();

        // Load the download helper and send the file to your desktop
        $this->load->helper('download');
        force_download(APP_NAME.'.zip', $backup);
        return redirect(admin());
    }

    public function mobile_check($str)
    {   
        $where = ['mobile' => $str, 'id != ' => $this->session->auth];
        
        if ($this->main->check($this->table, $where, 'id'))
        {
            $this->form_validation->set_message('mobile_check', 'The %s is already in use');
            return FALSE;
        } else
            return TRUE;
    }

    public function email_check($str)
    {   
        $where = ['email' => $str, 'id != ' => $this->session->auth];
        
        if ($this->main->check($this->table, $where, 'id'))
        {
            $this->form_validation->set_message('email_check', 'The %s is already in use');
            return FALSE;
        } else
            return TRUE;
    }

    protected $profile = [
        [
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'required|max_length[255]',
            'errors' => [
                'required' => "%s is required",
                'max_length' => "Max 255 chars allowed"
            ],
        ],
        [
            'field' => 'mobile',
            'label' => 'Mobile',
            'rules' => 'required|numeric|exact_length[10]|callback_mobile_check',
            'errors' => [
                'required' => "%s is required",
                'numeric' => "%s is invalid",
                'exact_length' => "%s is invalid",
            ],
        ],
        [
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|max_length[255]|callback_email_check',
            'errors' => [
                'required' => "%s is required",
                'numeric' => "%s is invalid",
                'max_length' => "Max 255 chars allowed"
            ],
        ],
        [
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'max_length[255]',
            'errors' => [
                'max_length' => "Max 255 chars allowed"
            ],
        ]
    ];

    public function import()
    {
        if(!empty($_FILES["banner"]["name"]))
        {
            set_time_limit(0);
            $this->load->helper('string');
            $path = $_FILES["banner"]["tmp_name"];
            $object = \PhpOffice\PhpSpreadsheet\IOFactory::load($path);
            foreach($object->getWorksheetIterator() as $worksheet)
            {
                $highestRow = $worksheet->getHighestRow();
                // $highestColumn = $worksheet->getHighestColumn();

                for($row=2; $row <= $highestRow; $row++)
                {
                    $parent = 0;
                    for ($i=1; $i <= 15; $i++) {
                        $name = $worksheet->getCellByColumnAndRow($i, $row)->getValue();
                        if ($i > 1) {
                            $parent = $this->db->select('id')->from('members')->where(['id' => $parent])->order_by('id', 'DESC')->get()->row();
                            $pedhi_id = $this->db->select('id')->from('pedhi')->order_by('id', 'DESC')->get()->row()->id;
                            $parent = $parent ? $parent->id : 0;
                        }
                        else{
                            if($name){
                                $pedhi = [
                                    'name' => $name
                                ];
                                
                                if(! $id = $this->main->check('pedhi', $pedhi, 'id')) 
                                    $pedhi_id = $this->main->add($pedhi, 'pedhi');
                                else
                                    $pedhi_id = $this->db->select('id')->from('pedhi')->order_by('id', 'DESC')->get()->row()->id;
                            }
                        }

                        if($name){
                            $add = [
                                'name'      => $name,
                                'parent_id' => $parent,
                                'pedhi'     => $pedhi_id,
                                'conter'     => $i
                            ];
                            
                            if(! $id = $this->main->check('members', $add, 'id'))
                            {
                                $add['mobile'] = '99740'.random_string('nozero', 5);
                                $parent = $this->main->add($add, 'members');
                            }
                            else
                                $parent = $id;
                        }
                    }
                }
            }
            
	        flashMsg(
	            $id, ucwords($this->title).' Imported Successfully.', ucwords($this->title).' Not Imported, Please Try Again.', $this->redirect
	                );
        }
    }
}