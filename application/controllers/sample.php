<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sample extends CI_Controller {

 function __construct()
 {
 parent::__construct();
 $this->load->helper(array('html','url','form'));
 $this->load->library(array('form_validation','table','pagination'));
 $this->load->model('sample_model','model');
 $this->template->set('title','Sample');
 $this->template->set('nav','Sample');
 $this->form_validation->set_error_delimiters('<div class="alert alert-error">','</div>');
 if (!$this->ion_auth->logged_in()) { redirect('auth/login'); }
 }

 // views

 function index()
 {
 $data['query'] = $this->model->get_entries();
 $this->template->load('template','sample_index',$data);
 }

 function view()
 {
 $data['query'] = $this->model->get_entry();
 $this->template->load('template','sample_view',$data);
 }
	
 function add()
 {
 $data['query'] = $this->model->get_entry();
 $this->template->load('template','sample_add',$data);
 }

 function edit()
 {
 $data['query'] = $this->model->get_entry();
 $this->template->load('template','sample_edit',$data);
 }

 // database operations

 function insert()
 {
 $this->form_validation->set_rules('name','telephone','required');
 $this->form_validation->set_rules('telephone','telephone','required');
 $this->form_validation->set_rules('email','email','required'); 
 if ($this->form_validation->run()==FALSE)
  {
  $data['query'] = $this->model->get_entry();
  $this->template->load('template','sample_add',$data);
  } else {
  $this->model->insert_entry();
  redirect('sample/index');
  }
 }
	
 function delete()
 {
 $this->model->delete_entry();
 redirect('sample/index');
 }
	
 function save()
 {
 $this->form_validation->set_rules('name','Name','required');
 $this->form_validation->set_rules('telephone','Telephone','required');
 $this->form_validation->set_rules('email','Email','required');
 if ($this->form_validation->run()==FALSE)
  {
  $this->db->where('id', $this->uri->segment(3));
  $data['query'] = $this->model->get_entry();
  $this->template->load('template','sample_edit',$data);
  } else {
  $data['query'] = $this->model->update_entry();
  redirect('sample/index');
  }		
 }

}

/* End of file sample.php */
/* Location: ./application/controller/sample.php */
