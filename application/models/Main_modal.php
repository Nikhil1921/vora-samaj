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
		$this->staff = $this->config->item('members');
		$this->events = $this->config->item('events');
		$this->news = $this->config->item('news');
		$this->information = $this->config->item('information');
	}

	public function getBanners()
    {
        return $this->getAll('banners', "CONCAT('".$this->banners."', banner) banner", []);
    }

	public function getGallery()
    {
        return array_map(function($g){
            $g['images'] = $this->getAll('gallery_imgs', "CONCAT('".$this->gallery."', image) image", ['g_id' => $g['id']]);
            return $g;
        }, $this->getAll('gallery', "id, name", ['is_deleted' => 0]));
        return ;
    }

	public function getEvents()
    {
        return $this->getAll('events', "title", ['is_deleted' => 0], 'id DESC', 10);
    }

	public function getNews()
    {
        return $this->getAll('news', "id, title, CONCAT('".$this->news."', image) image", ['is_deleted' => 0], 'id DESC', 10);
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

    public function getInformationList($start, $limit)
    {
        return $this->db->select("id, title, description, CONCAT('".$this->information."', image) image")
                        ->from('information')
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
        return $this->db->select("d.dob, CONCAT(f.name, ' ', f.surname) AS name, CONCAT('".$this->staff."', d.image) image, d.education")
                        ->from('families f')
                        ->where(['f.is_live' => 1, 'f.is_deleted' => 0, 'd.gender' => $gender])
                        ->where(['d.marital_status' => 'Single'])
                        ->join('member_details d', 'd.id = f.id')
                        ->order_by('f.id DESC')
                        ->get()->result_array();
        /* return $this->db->select("dob, name, CONCAT('".$this->staff."', image) image, education")
                        ->from('boys_girls')
                        ->where(['is_deleted' => 0, 'gender' => $gender])
                        ->order_by('id DESC')
                        ->get()->result_array(); */
    }

    public function getBirthdays()
    {
        return $this->db->select("CONCAT(f.name, ' ', f.surname) AS name, CONCAT('".$this->staff."', d.image) image, c.name AS city")
                        ->from('families f')
                        ->where(['f.is_live' => 1, 'f.is_deleted' => 0])
                        ->like(['d.dob' => date('m-d')])
                        ->join('member_details d', 'd.id = f.id')
                        ->join('addresses a', 'a.id = d.current_address')
                        ->join('city c', 'c.id = a.city')
                        ->order_by('f.id DESC')
                        ->get()->result_array();
    }

    public function getFamily($id)
    {
        return $this->db->select("f.id, name, surname, relation")
                        ->from('families f')
                        ->where(['is_deleted' => 0, 'parent_id' => $id])
                        ->join('member_details d', 'd.id = f.id', 'left')
                        ->get()->result_array();
    }

    public function getCityStateCountry($city)
    {
        return $this->db->select("ci.name AS city, s.name AS state, c.name AS country")
                        ->from('city ci')
                        ->where(['ci.id' => $city])
                        ->join('state s', 's.id = ci.s_id', 'left')
                        ->join('country c', 'c.id = ci.c_id', 'left')
                        ->get()->row_array();
    }
}