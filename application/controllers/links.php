<?php

class Links extends CI_Controller {

 function __construct() 
 {
  parent::__construct();
  $this->load->helper('html');
  $this->load->helper('url');
  $this->load->helper('form');
  $this->load->library('table');
  $this->load->library('form_validation');
  $this->load->model('links_model','model');
  $this->template->set('nav', 'links');  
  $this->template->set('title','Links');
  $this->form_validation->set_error_delimiters('<div class="alert alert-error">','</div>');
 }

 function index()
 {
  $data['query'] = $this->model->get_entries();
  $data['tagquery'] = $this->model->get_tags();
  $data['tags'] = $this->model->get_dropdown_tags();
  $data['count'] = $this->db->count_all('links');
  $this->template->load('template', 'links_index', $data);
 }

 function tag()
 {
  $data['query'] = $this->model->show_tags();
  $data['tagquery'] = $this->model->get_tags();
  $data['tags'] = $this->model->get_dropdown_tags();
  $this->template->load('template', 'links_index', $data);
 }
 
 function edit()
 {
  if (!$this->ion_auth->logged_in()) { redirect('auth/login'); }
  $data['query'] = $this->model->show_tags();
  $data['tagquery'] = $this->model->get_tags();
  $data['tags'] = $this->model->get_dropdown_tags();
  $this->template->load('template','links_edit', $data);	
 }

 function delete()
 {		
  if (!$this->ion_auth->logged_in()) { redirect('auth/login'); }
  $data['query'] = $this->model->show_tags();
  $data['tagquery'] = $this->model->get_tags();
  $data['tags'] = $this->model->get_dropdown_tags();
  $this->template->load('template', 'links_delete', $data);
 }

 function update()
 {
  if (!$this->ion_auth->logged_in()) { redirect('auth/login'); }
  $data['query'] = $this->model->get_entry();
  $data['tagquery'] = $this->model->get_tags();
  $data['tags'] = $this->model->get_dropdown_tags();  		
  $this->template->load('template', 'links_update', $data);
 }

 function add()
 {
  if (!$this->ion_auth->logged_in()) { redirect('auth/login'); }	
  $this->form_validation->set_rules('url','URL','required|callback_valid_url');
  $this->form_validation->set_rules('anchor','Anchor','required');
  if ($this->form_validation->run()==FALSE)
  {
   $data['query'] = $this->model->get_entries();
   $data['tagquery'] = $this->model->get_tags();
   $data['tags'] = $this->model->get_dropdown_tags();   
   $this->template->load('template', 'links_index', $data);
  } else {
   $this->model->add_entry();
   $data['query'] = $this->model->get_entries();
   $data['tagquery'] = $this->model->get_tags();
   $data['tags'] = $this->model->get_dropdown_tags();
   $this->template->load('template', 'links_index', $data);
  }
 }

 function del()
 {
  if (!$this->ion_auth->logged_in()) { redirect('auth/login'); }
  $data['query'] = $this->model->delete_entry();
  $data['query'] = $this->model->get_entries();
  $data['tagquery'] = $this->model->get_tags();
  $data['tags'] = $this->model->get_dropdown_tags();
  $this->template->load('template','links_index',$data);
 }

 function save()
 {
  if (!$this->ion_auth->logged_in()) { redirect('auth/login'); } 	
  $this->form_validation->set_rules('url','URL','required|callback_valid_url');
  $this->form_validation->set_rules('anchor','Anchor','required');
  if ($this->form_validation->run()==FALSE)
  {
   $data['query'] = $this->model->get_entry();
   $data['tagquery'] = $this->model->get_tags();
   $data['tags'] = $this->model->get_dropdown_tags();
   $this->template->load('template', 'links_edit', $data);
  } else {
   $data['query'] = $this->model->save_entry();
   $data['query'] = $this->model->get_entries();
   $data['tagquery'] = $this->model->get_tags();
   $data['tags'] = $this->model->get_dropdown_tags();
   $this->template->load('template', 'links_edit', $data);
  }
 }

 function valid_url($str) 
 {
  $regex = "/^(?:ftp|https?):\/\/(?:(?:[\w\.\-\+%!$&'\(\)*\+,;=]+:)*[\w\.\-\+%!$&'\(\)*\+,;=]+@)?(?:[a-z0-9\-\.%]+)(?::[0-9]+)?(?:[\/|\?][\w#!:\.\?\+=&%@!$'~*,;\/\(\)\[\]\-]*)?$/xi";
  if(!preg_match($regex, $str)) 
  {
   $this->form_validation->set_message('valid_url', 'Please enter a valid URL.');
   return FALSE;
  } else {
   return TRUE;
  }
 }

}

/* End of file links.php */
/* Location: ./application/controllers/links.php */