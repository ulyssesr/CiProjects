<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Todo extends CI_Controller {

 function __construct()
 {
 parent::__construct();
 $this->load->helper(array('html','url','form'));
 $this->load->library(array('form_validation','table','pagination'));
 $this->load->model('todo_model','model');
 $this->template->set('title','Todo');
 $this->template->set('nav','todo');
 $this->form_validation->set_error_delimiters('<div class="alert alert-error">','</div>');
 if (!$this->ion_auth->logged_in()) { redirect('auth/login'); }
 }

 // views

 function index()
 {
 $config['base_url'] = base_url().'todo/index/';
 $config['total_rows'] = $this->db->count_all('todo');
 $config['per_page'] = '12';
 $config['full_tag_open'] = '<p>';
 $config['full_tag_close'] = '</p>';
 $this->pagination->initialize($config); 
 $data['query'] = $this->model->get_entries($config['per_page'],$this->uri->segment(3));
 $this->template->load('template','todo_index',$data);
 }

 function add()
 {
 $data['query'] = $this->model->get_entry();
 $this->template->load('template','todo_add',$data);
 }

 function edit()
 {
 $data['query'] = $this->model->get_entry();
 $this->template->load('template','todo_edit',$data);
 }

 // database operations

 function insert()
 {
 $this->form_validation->set_rules('tasks','tasks','required');
 $this->form_validation->set_rules('priority','priority','required');
 if ($this->form_validation->run()==FALSE)
  {
  $data['query'] = $this->model->get_entry();
  $this->template->load('template','todo_add',$data);
  } else {
  $this->model->insert_entry();
  redirect('todo/index');
  }
 }
	
 function delete()
 {
 $this->model->delete_entry();
 redirect('todo/index');
 }
	
 function save()
 {
 $this->form_validation->set_rules('tasks','tasks','required');
 $this->form_validation->set_rules('priority','priority','required');
 if ($this->form_validation->run()==FALSE)
  {
  $this->db->where('id', $this->uri->segment(3));
  $data['query'] = $this->model->get_entry();
  $this->template->load('template','todo_edit',$data);
  } else {
  $data['query'] = $this->model->update_entry();
  redirect('todo/index');
  }		
 }

}

/* End of file todo.php */
/* Location: ./application/controller/todo.php */