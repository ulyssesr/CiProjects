<?php

class Notes extends CI_Controller {

 function __construct() 
 {
  parent::__construct();

  $this->load->helper(array('html', 'url', 'form'));
  $this->load->library(array('table', 'form_validation', 'pagination'));
  $this->load->model('notes_model','model');
  $this->template->set('nav', 'notes');		
  $this->template->set('title','Notes');
  $this->form_validation->set_error_delimiters('<div class="alert alert-error">','</div>');
  //$this->output->cache(5);
 }

 function index()
 {
  $config['base_url'] = base_url().'notes/index/';
  if (!$this->ion_auth->logged_in()):
   $this->db->where('status', 'public');
  endif;
  $config['total_rows'] = $this->db->count_all_results('notes');
  $config['per_page'] = '10';
  $config['num_links'] = '10';
  $config['full_tag_open'] = '<p>';
  $config['full_tag_close'] = '</p>';
  $this->pagination->initialize($config);
  $data['query'] = $this->model->get_entries($config['per_page'],$this->uri->segment(3));
  $data['tagquery'] = $this->model->get_tags();  
  $data['tags'] = $this->model->get_dropdown_tags();
  $this->template->load('template', 'notes_index', $data);
 }
 
 function tag()
 {
  $config['base_url'] = base_url().'notes/tag/'.$this->uri->segment(3);
  if (!$this->ion_auth->logged_in()): 
   $this->db->where('status', 'public');
  endif; 
  $this->db->where('tag', $this->uri->segment(3));
  $config['total_rows'] = $this->db->count_all_results('notes');
  $config ['uri_segment'] = '4';
  $config['per_page'] = '10';
  $config['num_links'] = '10';
  $config['full_tag_open'] = '<p>';
  $config['full_tag_close'] = '</p>';
  $this->pagination->initialize($config);
  $data['query'] = $this->model->get_tag_entries($this->uri->segment(3),$config['per_page'],$this->uri->segment(4));
  $data['tagquery'] = $this->model->get_tags();  
  $data['tags'] = $this->model->get_dropdown_tags();  		  
  $this->template->load('template', 'notes_index', $data);
 }

 function login()
 {
  $data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message'); 
  $data['identity'] = array('name' => 'identity',
	'id' => 'identity',
	'type' => 'text',
	'value' => $this->form_validation->set_value('identity'),
	);
  $data['password'] = array('name' => 'password',
	'id' => 'password',
	'type' => 'password',
	); 
 
  $this->template->set('nav', 'notes'); 
  $data['tagquery'] = $this->model->get_tags();  
  $this->template->load('template', 'notes_login', $data);
 }

 function view()
 {
  $data['query'] = $this->model->get_entry();
  $data['tagquery'] = $this->model->get_tags();  
  $data['comments'] = $this->model->get_comments();
  $data['numbers'] = $this->model->display_comments();  		
  $this->template->load('template', 'notes_view', $data);
 }

 function edit()
 {
  if (!$this->ion_auth->logged_in()) { redirect('auth/login'); }
  $data['query'] = $this->model->edit_entry();
  $data['tagquery'] = $this->model->get_tags();  
  $data['tags'] = $this->model->get_dropdown_tags();  		
  $this->template->load('template', 'notes_edit', $data);
 }

 function create()
 {
  if (!$this->ion_auth->logged_in()) { redirect('auth/login'); } 
  $data['tagquery'] = $this->model->get_tags();  
  $data['tags'] = $this->model->get_dropdown_tags();  
  $this->template->load('template', 'notes_new', $data);
 }
 
 function newtag()
 {
  if (!$this->ion_auth->logged_in()) { redirect('auth/login'); } 
  $data['tagquery'] = $this->model->get_tags();
  $this->template->load('template', 'notes_newtag', $data);
 }
 
 function edittag()
 {
  if (!$this->ion_auth->logged_in()) { redirect('auth/login'); }
  $data['tagquery'] = $this->model->edit_tag();
  $this->template->load('template', 'notes_edittag', $data);
 }
 
 function addtag()
 {
  if (!$this->ion_auth->logged_in()) { redirect('auth/login'); } 
  $this->form_validation->set_rules('tag','Tag','required');
  if ($this->form_validation->run()==FALSE)
  {
   $data['tagquery'] = $this->model->get_tags();
   $this->template->load('template', 'notes_newtag', $data);
  } else {
   $this->model->add_tag();
   redirect('notes/newtag');
  }
 } 
 
 function savetag()
 {
  if (!$this->ion_auth->logged_in()) { redirect('auth/login'); } 
  $this->model->save_tag();
  redirect('notes/newtag'); 
 }
 
 function deletetag()
 {
  if (!$this->ion_auth->logged_in()) { redirect('auth/login'); } 
  $this->model->delete_tag();
  redirect('notes/newtag');  
 }

 
 function addcomment()
 {
  $this->form_validation->set_rules('name','Name','required');
  $this->form_validation->set_rules('comment','Comment','required');
  if ($this->form_validation->run()==FALSE)
  {
   $data['query'] = $this->model->get_entry();
   $data['tagquery'] = $this->model->get_tags();  
   $data['comments'] = $this->model->get_comments();
   $data['numbers'] = $this->model->display_comments();  		
   $this->template->load('template', 'notes_view', $data);
  } else {
   $this->model->add_comment();
   redirect('notes/view/'.$this->uri->segment(3).'/'.$this->uri->segment(4)); 
  }
 }
 
 function delcomment()
 {
  if (!$this->ion_auth->logged_in()) { redirect('auth/login'); }
  $this->model->del_comment();
  $data['query'] = $this->model->get_entry();
  $data['comments'] = $this->model->get_comments();  
  redirect('notes/view/'.$this->uri->segment(3).'/'.$this->uri->segment(4)); 
 }
 
 function editcomment()
 {
  if (!$this->ion_auth->logged_in()) { redirect('auth/login'); }
  $data['query'] = $this->model->get_entry();  
  $data['comments'] = $this->model->get_comment();
  $this->template->load('template', 'notes_edit_comment', $data);
 }
 
 function savecomment()
 {
  if (!$this->ion_auth->logged_in()) { redirect('auth/login'); }
  $this->model->save_comment();
  redirect('notes/view/'.$this->uri->segment(3).'/'.$this->uri->segment(4)); 
 }

  
 function search()
 {
  $data['tagquery'] = $this->model->get_tags();    
  $this->template->load('template', 'notes_search', $data);
 }

 function results()
 {
  $this->form_validation->set_rules('search', 'Search', 'required');
  if ($this->form_validation->run()==FALSE)
  {
   redirect('notes/index'); 
  } else {   
   $data['searchcount'] = $this->model->get_search_count();
   $data['query'] = $this->model->get_search();
   $data['tagquery'] = $this->model->get_tags();  
   $this->template->load('template', 'notes_result', $data);
  }
 }

 function add()
 {
  if (!$this->ion_auth->logged_in()) { redirect('auth/login'); } 
  $this->form_validation->set_rules('filename', 'Filename', 'required');
  $this->form_validation->set_rules('content', 'Content', 'required');
  if ($this->form_validation->run()==FALSE)
  {
  $data['tagquery'] = $this->model->get_tags();  
  $data['tags'] = $this->model->get_dropdown_tags();
  $this->template->load('template', 'notes_new', $data);
  } else {
   $this->model->add_entry();
   redirect('notes/index');  
  }
 }

 function delete()
 {
  if (!$this->ion_auth->logged_in()) { redirect('auth/login'); } 
  $data['query'] = $this->model->delete_entry();
  redirect('notes/index');
 }

 function save()
 {
  if (!$this->ion_auth->logged_in()) { redirect('auth/login'); } 
  $data['query'] = $this->model->save_entry();
  redirect('notes/index');
 }

}

/* End of file notes.php */
/* Location: ./application/controllers/notes.php */