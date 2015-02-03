<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {

	public function index()
	{
		$this->template->set('nav', 'about');		
		$this->template->set('title','About');
		$this->template->load('template', 'about_index');
	}
}

/* End of file about.php */
/* Location: ./application/controllers/about.php */