<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Admin_controller extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->auth) 
			return redirect(admin('login'));

        $this->user = (object) $this->main->get("logins", 'name, mobile, email', ['id' => $this->session->auth]);
		$this->redirect = admin($this->redirect);
		$this->app_table = $this->config->item('app_table');
	}

	protected function uploadImage($upload, $exts='jpg|jpeg|png')
    {
        $this->load->library('upload');
        $config = [
                'upload_path'      => $this->path,
                'allowed_types'    => $exts,
                'file_name'        => time(),
                'file_ext_tolower' => TRUE
            ];
        
        $this->upload->initialize($config);
        
        if ($this->upload->do_upload($upload))
            return ['error' => false, 'message' => $this->upload->data("file_name")];
        else
            return ['error' => true, 'message' => $this->upload->display_errors()];
    }
}