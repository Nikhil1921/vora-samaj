<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Public_controller {

	protected $visitors;
	
	public function index()
	{
		$data['title'] = 'Home';
        $data['name'] = 'home';
        $data['banners'] = $this->main->getBanners();
        $data['events'] = $this->main->getEvents();
        $data['news'] = $this->main->getNews();
        $data['image_gallery'] = $this->main->getImageGallery();
        $data['video_gallery'] = $this->main->getVideoGallery();
		
		return $this->template->load('template', 'home', $data);
	}

	public function members()
	{
		$data['title'] = 'members';
        $data['name'] = 'members';
		
		return $this->template->load('template', 'members', $data);
	}

	public function login()
	{
		$data['title'] = 'login';
        $data['name'] = 'login';
		
		return $this->template->load('template', 'login', $data);
	}

	public function committee_members()
	{
		$data['title'] = 'Committee Members';
        $data['name'] = 'committee_members';
		$data['commitee'] = $this->main->getCommittee();
		
		return $this->template->load('template', 'committee_members', $data);
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
		
		return $this->template->load('template', 'news_details', $data);
	}

	public function boys_girls()
	{
        $data['title'] = 'Boys Girls';
        $data['name'] = 'boys_girls';
        $data['boys'] = $this->main->getBoysGirlsList('Boy');
        $data['girls'] = $this->main->getBoysGirlsList('Girl');
		
		return $this->template->load('template', 'boys_girls', $data);
	}
}