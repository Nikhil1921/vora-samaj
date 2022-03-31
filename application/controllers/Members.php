<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends Public_controller {
	
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userId) flashMsg(0, "", "Login to access members area.", '');
	}

	private $table = 'members';

	public function index()
	{
		$data['title'] = 'My Family';
        $data['name'] = 'members';
        $data['family'] = $this->main->getFamily($this->session->userId);
		re($data);
		
		return $this->template->load('template', 'members/home', $data);
	}

	public function tree()
	{
		$data['title'] = 'Family tree';
        $data['name'] = 'tree';
		$data['main'] = $this->main->get($this->table, 'id, name', ['id' => $this->session->userId]);
		$this->load->model(admin('Member_model'), 'member');
		
		return $this->template->load('template', 'members/tree', $data);
	}

	public function add_member()
	{
		$data['title'] = 'Add member';
        $data['name'] = 'add-member';

		return $this->template->load('template', 'members/add_member', $data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
        return redirect();
	}
}