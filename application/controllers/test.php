<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {

	/**
	 *  This is the Test Application
	 */
	 
	function __construct()
	{
		parent::__construct();
		$this->load->model('test_model', 'model');
	}

	function index()
	{
	    $data['record'] = $this->model->get_entries();
	    $data['group'] = $this->model->get_group_dropdown();
		$this->load->view('test_index', $data);
	}
	
	function view()
	{
		$data['record'] = $this->model->get_entry();
		$data['group'] = $this->model->get_group_dropdown();
		$this->load->view('test_view', $data);	
	}
	
}

/* End of file test.php */
/* Location: ./application/controllers/test.php */