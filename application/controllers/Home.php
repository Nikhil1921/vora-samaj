<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Public_controller {
	
	public function index()
	{
		$data['title'] = 'Home';
        $data['name'] = 'home';
        $data['validate'] = true;
        $data['banners'] = $this->main->getBanners();
        $data['events'] = $this->main->getEvents();
        $data['news'] = $this->main->getNews();
        $data['birthdays'] = $this->main->getBirthdays();
		
		return $this->template->load('template', 'home', $data);
	}

	public function login()
	{
		check_ajax();

		$check = "login_approved = 1 AND (mobile = '".$this->input->post('mobile')."' OR email = '".$this->input->post('mobile')."') AND password = '".my_crypt($this->input->post('password'))."'";
		
		if($id = $this->main->get('families', 'id userId', $check))
		{
			$this->session->set_userdata($id);

			$response = [
					'status' => 'success',
					'message' => 'Login successfully.',
					'redirect' => base_url()
				];
		}else
			$response = [
					'status' => 'error',
					'message' => 'Invalid credentials or account is blocked. Contact admin for details.'
				];

		die(json_encode($response));
	}

	/* public function login()
	{
		check_ajax();

		$check = "login_approved = 1 AND (mobile = '".$this->input->post('mobile')."' OR email = '".$this->input->post('mobile')."') AND otp = '".$this->input->post('otp')."' AND expiry >= '".date('Y-m-d H:i:s')."'";
		
		if($id = $this->main->get('families', 'id userId', $check))
		{
			$this->session->set_userdata($id);
			$response = [
					'status' => 'success',
					'message' => 'OTP verified successfully.',
					'redirect' => base_url()
				];
		}else
			$response = [
					'status' => 'error',
					'message' => 'OTP not verified. Try again.'
				];

		die(json_encode($response));
	}
	
	public function send_sms()
	{
		check_ajax();

		if($id = $this->main->get('families', 'id', "login_approved = 1 AND (mobile = '".$this->input->post('mobile')."' OR email = '".$this->input->post('mobile')."')"))
		{
			$update = [
				'otp' => rand(1000, 9999),
				'otp' => 9999,
				'expiry' => date('Y-m-d H:i:s', strtotime('+5 minutes'))
			];

			if($this->main->update(['id' => $id['id']], $update, 'families')){
				// send sms and email here pending
				$response = [
					'status' => 'success',
					'message' => 'OTP send to your mobile & email.'
				];
			}
			else
				$response = [
					'status' => 'error',
					'message' => 'OTP not sent. Try again.'
				];
		}
		else
			$response = [
				'status' => 'error',
				'message' => 'Mobile not registered or blocked.'
			];

		die(json_encode($response));
	} */

	public function gallery()
	{
		$data['title'] = 'Gallery';
        $data['name'] = 'gallery';
		$data['gallery'] = $this->main->getGallery();
		
		return $this->template->load('template', 'gallery', $data);
	}

	public function events()
	{
		$this->load->library('pagination');
		$this->load->model(admin('events_model'));

		$config = [
			'base_url' => current_url(),
			'total_rows' => $this->events_model->count(),
			'per_page' => 10,
			'use_page_numbers' => TRUE,
			'page_query_string' => TRUE,
			'cur_tag_open' => '<a class="active" href="javascript:;">',
			'cur_tag_close' => '</a>',
		];
		
		$this->pagination->initialize($config);
		$start = $this->input->get('per_page') ? ($this->input->get('per_page') - 1) * $config['per_page'] : 0;
        $data['title'] = 'Events';
        $data['name'] = 'events';
        $data['events'] = $this->main->getEventList($start, $config['per_page']);
		
		return $this->template->load('template', 'events', $data);
	}

	public function information()
	{
		$this->load->library('pagination');
		$this->load->model(admin('information_model'));

		$config = [
			'base_url' => current_url(),
			'total_rows' => $this->information_model->count(),
			'per_page' => 10,
			'use_page_numbers' => TRUE,
			'page_query_string' => TRUE,
			'cur_tag_open' => '<a class="active" href="javascript:;">',
			'cur_tag_close' => '</a>',
		];
		
		$this->pagination->initialize($config);
		$start = $this->input->get('per_page') ? ($this->input->get('per_page') - 1) * $config['per_page'] : 0;
        $data['title'] = 'Informations';
        $data['name'] = 'information';
        $data['informations'] = $this->main->getInformationList($start, $config['per_page']);
		
		return $this->template->load('template', 'information', $data);
	}


	public function about_us()
	{
		$data['title'] = 'About us';
        $data['name'] = 'about_us';
		
		return $this->template->load('template', 'about_us', $data);
	}

	public function my_family()
	{
		$data['title'] = 'my_family';
        $data['name'] = 'my_family';
		
		return $this->template->load('template', 'my_family', $data);
	}

	public function contact_us()
	{
		$data['title'] = 'Contact us';
        $data['name'] = 'contact_us';

		for ($i = 1; $i <= 12; $i++)
        {
            $fields[] = ['name' => "contact_$i", 'value' => $this->main->check('app_configs', ['cong_name' => "contact_$i"], 'value')];
        }

		$data['fields'] = array_chunk($fields, 4);
		
		return $this->template->load('template', 'contact_us', $data);
	}

	public function news()
	{
		$this->load->library('pagination');
		$this->load->model(admin('news_model'));

		$config = [
			'base_url' => current_url(),
			'total_rows' => $this->news_model->count(),
			'per_page' => 3,
			'use_page_numbers' => TRUE,
			'page_query_string' => TRUE,
			'cur_tag_open' => '<a class="active" href="javascript:;">',
			'cur_tag_close' => '</a>',
		];
		
		$this->pagination->initialize($config);
		$start = $this->input->get('per_page') ? ($this->input->get('per_page') - 1) * $config['per_page'] : 0;
        $data['title'] = 'News';
        $data['name'] = 'news';
        $data['news'] = $this->main->getNewsList($start, $config['per_page']);
		
		return $this->template->load('template', 'news', $data);
	}

	public function news_details(int $id)
	{
		$data['title'] = 'News';
        $data['name'] = 'news';
		$path = $this->config->item('news');
        $data['news'] = $this->main->get('news', "id, title, description, CONCAT('".$path."', image) image", ['id' => d_id($id)]);
		
		return $data['news'] ? $this->template->load('template', 'news_details', $data) : $this->error_404();
	}

	public function information_details(string $id)
	{
		$data['title'] = 'Information';
        $data['name'] = 'information';
		$path = $this->config->item('information');
        $data['information'] = $this->main->get('information', "id, title, description, CONCAT('".$path."', image) image", ['id' => my_crypt($id, 'd')]);
		
		return $data['information'] ? $this->template->load('template', 'information_details', $data) : $this->error_404();
	}

	public function get_state()
    {
        $states = array_map(function($arr){
            return [
                'id'   => e_id($arr['id']),
                'name' => $arr['name']
            ];
        }, $this->main->getAll('state', 'id, name',['c_id' => d_id($this->input->get('id'))]));

        die(json_encode($states));
    }

	public function get_city()
    {
        $cities = array_map(function($arr){
            return [
                'id'   => e_id($arr['id']),
                'name' => $arr['name']
            ];
        }, $this->main->getAll('city', 'id, name',['c_id' => d_id($this->input->get('id'))]));

        die(json_encode($cities));
    }
}