<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Flowers extends CI_Controller 
{

	function __construct() 
	{
		parent::__construct();
 
 		$this->load->helper(array('html','url','form'));
 		$this->load->library(array('form_validation','table','pagination','email'));
		$this->load->model('flowers_model','model');
		$this->form_validation->set_error_delimiters('<div class="alert alert-error">','</div>');
		 
	 	// set template title and navigation 
 
	 	$this->template->set('title','Flowers');
 		$this->template->set('nav','Flowers');

 		// uses ion_auth to login to system 
 
		//if (!$this->ion_auth->logged_in()) { redirect('auth/login'); }

	}
	
	function index($year = null, $month = null) {
		
		if (!$year) {
			$year = date('Y');
		}
		if (!$month) {
			$month = date('m');
		}
		
		if ($day = $this->input->post('day')) {
			$this->model->add_flowers_data(
				"$year-$month-$day",
				$this->input->post('data')
			);
		}
		
		$data['flowers'] = $this->model->generate($year, $month);
		
		$this->load->view('flowers_index', $data);
		
	}
	
	
	function schedule()
	{
	$data['query'] = $this->model->display_all();
	$this->load->view('flowers_view', $data);
	}
	
	function name()
	{
	$data['query'] = $this->model->details($this->uri->segment(3));
	$this->load->view('flowers_details', $data);
	}
	
}

/* end of calendar.php */
