<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Public_controller {

	protected $visitors;
	
	public function index()
	{
		$data['title'] = 'Home';
        $data['name'] = 'home';
        $data['banners'] = $this->main->getBanners();
        $data['heads'] = $this->main->getHeads();
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
		$data['title'] = 'committee_members';
        $data['name'] = 'committee_members';
		
		return $this->template->load('template', 'committee_members', $data);
	}

	public function events()
	{
		$data['title'] = 'events';
        $data['name'] = 'events';
		
		return $this->template->load('template', 'events', $data);
	}

	public function about_us()
	{
		$data['title'] = 'about_us';
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
		$data['title'] = 'contact_us';
        $data['name'] = 'contact_us';
		
		return $this->template->load('template', 'contact_us', $data);
	}

	public function news()
	{
		$data['title'] = 'news';
        $data['name'] = 'news';
		
		return $this->template->load('template', 'news', $data);
	}

	public function news_details()
	{
		$data['title'] = 'news_details';
        $data['name'] = 'news_details';
		
		return $this->template->load('template', 'news_details', $data);
	}

	public function boys_girls()
	{
		$data['title'] = 'boys_girls';
        $data['name'] = 'boys_girls';
		
		return $this->template->load('template', 'boys_girls', $data);
	}
}