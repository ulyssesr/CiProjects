<?php

class Contacts extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('table');
		$this->load->library('pagination');
		$this->load->model('contacts_model','model');
		$this->template->set('title','Contacts');
		$this->template->set('nav', 'contacts');
		$this->form_validation->set_error_delimiters('<div class="alert alert-error">','</div>');
		if (!$this->ion_auth->logged_in()) { redirect('auth/login'); }		
	}

	function index()
	{
		$config['base_url'] = base_url().'contacts/index/';
		$config['total_rows'] = $this->db->count_all('contacts');
		$config['per_page'] = '20';
		$config['full_tag_open'] = '<p>';
		$config['full_tag_close'] = '</p>';
		$this->pagination->initialize($config);
		$data['query'] = $this->model->get_entries($config['per_page'],$this->uri->segment(3));
		$this->template->load('template','contacts_index',$data);
	}

	function view()
	{
		$data['query'] = $this->model->get_entry();
		$this->template->load('template','contacts_view',$data);
	}
	
	function add()
	{
		$data['query'] = $this->model->get_entry();
		$this->template->load('template','contacts_add',$data);
	}

	function edit()
	{
		$data['query'] = $this->model->get_entry();
		$this->template->load('template','contacts_edit',$data);
	}

	function insert()
	{
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('telephone','Telephone','required');
		if ($this->form_validation->run()==FALSE)
		{
			$data['query'] = $this->model->get_entry();
			$this->template->load('template','contacts_add',$data);
		} else {
			$this->model->insert_entry();
			redirect('contacts');
		}
	}
	
	function delete()
	{
		$this->model->delete_entry();
		redirect('contacts');
	}
	
	function save()
	{
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('telephone','Telephone','required');
		if ($this->form_validation->run()==FALSE)
		{
			$this->db->where('id', $this->uri->segment(3));
			$data['query'] = $this->model->get_entry();
			$this->template->load('template','contacts_edit',$data);
		} else {
			$data['query'] = $this->model->update_entry();
			redirect('contacts');
		}		
	}

}

/* End of file contacts.php */
/* Location: ./application/controller/contacts.php */
