<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Main_modal extends MY_Model
{
    public function __construct()
	{
		parent::__construct();
		$this->banners = $this->config->item('banners');
		$this->heads = $this->config->item('heads');
		$this->gallery = $this->config->item('gallery');
		$this->staff = $this->config->item('staff');
		$this->events = $this->config->item('events');
		$this->news = $this->config->item('news');
	}

	public function getBanners()
    {
        return $this->getAll('banners', "CONCAT('".$this->banners."', banner) banner", []);
    }

	public function getCommittee()
    {
        return $this->getAll('committee', "name, CONCAT('".$this->staff."', image) image", []);
    }

	public function getEvents()
    {
        return $this->getAll('events', "title", ['is_deleted' => 0], 'id DESC', 10);
    }

	public function getNews()
    {
        return $this->getAll('news', "id, title", ['is_deleted' => 0], 'id DESC', 10);
    }

	public function getImageGallery()
    {
        return $this->getAll('image_gallery', "CONCAT('".$this->gallery."', image) image", ['is_deleted' => 0], 'id DESC', 8);
    }

	public function getVideoGallery()
    {
        return $this->getAll('video_gallery', "name, v_url", ['is_deleted' => 0], 'id DESC', 8);
    }

	public function getVisitors()
    {
		if (!$this->main->get('app_configs', 'value', ['cong_name' => 'visitors']))
			$this->main->add(['cong_name' => 'visitors', 'value' => 0], 'app_configs');
			
		$visitors = $this->main->check('app_configs', ['cong_name' => 'visitors'], 'value');
		$this->main->update(['cong_name' => 'visitors'], ['value' => ($visitors + 1)], 'app_configs');
		return $visitors;
    }

    public function getEventList($start, $limit)
    {
        return $this->db->select("title, description, CONCAT('".$this->events."', image) image, DATE_FORMAT(CONCAT(e_date, ' ', e_time), '%d-%m-%Y %h:%i %p') date, place")
                        ->from('events')
                        ->where(['is_deleted' => 0])
                        ->order_by('id DESC')
                        ->limit($limit, $start)
                        ->get()->result_array();
    }

    public function getNewsList($start, $limit)
    {
        return $this->db->select("id, title, CONCAT('".$this->news."', image) image")
                        ->from('news')
                        ->where(['is_deleted' => 0])
                        ->order_by('id DESC')
                        ->limit($limit, $start)
                        ->get()->result_array();
    }

    public function getBoysGirlsList($gender)
    {
        return $this->db->select("dob, name, CONCAT('".$this->staff."', image) image, education")
                        ->from('boys_girls')
                        ->where(['is_deleted' => 0, 'gender' => $gender])
                        ->order_by('id DESC')
                        ->get()->result_array();
    }

    public function getFamily($id)
    {
        return $this->db->select("name, CONCAT('".$this->staff."', image) image, education")
                        ->from('family')
                        ->where(['is_deleted' => 0])
                        ->get()->result_array();
    }
}