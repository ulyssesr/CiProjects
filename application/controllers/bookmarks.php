<?php

class Bookmarks extends CI_Controller {

 function __construct() 
 {
  parent::__construct();
  $this->load->helper(array('html', 'url', 'form'));
  $this->load->library(array('table', 'form_validation', 'pagination'));
  $this->load->model('bookmarks_model','model');
  $this->template->set('nav', 'bookmarks');  
  $this->template->set('title','Bookmarks');
  $this->form_validation->set_error_delimiters('<div class="alert alert-error">','</div>');
  if (!$this->ion_auth->logged_in()) { redirect('auth/login'); }  
 }

 function index()
 {
  $config['base_url'] = base_url().'bookmarks/index/';
  $config['total_rows'] = $this->db->count_all('bookmarks');
  $config['per_page'] = '10';
  $config['num_links'] = '10';
  $config['full_tag_open'] = '<p>';
  $config['full_tag_close'] = '</p>';  
  $this->pagination->initialize($config);  
  $data['query'] = $this->model->get_entries($config['per_page'],$this->uri->segment(3));
  $this->template->load('template', 'bookmarks_index', $data);
 }

 function edit()
 {
  $config['base_url'] = base_url().'bookmarks/edit/';
  $config['total_rows'] = $this->db->count_all('bookmarks');
  $config['per_page'] = '10';
  $config['num_links'] = '10';
  $config['full_tag_open'] = '<p>';
  $config['full_tag_close'] = '</p>';
  $this->pagination->initialize($config);  
  $data['query'] = $this->model->get_entries($config['per_page'],$this->uri->segment(3));
  $this->template->load('template','bookmarks_edit', $data);	
 }

 function delete()
 {		   
  $config['base_url'] = base_url().'bookmarks/delete/';
  $config['total_rows'] = $this->db->count_all('bookmarks');
  $config['per_page'] = '10';
  $config['num_links'] = '10';
  $config['full_tag_open'] = '<p>';
  $config['full_tag_close'] = '</p>';  
  $this->pagination->initialize($config);  
  $data['query'] = $this->model->get_entries($config['per_page'],$this->uri->segment(3));
  $this->template->load('template', 'bookmarks_delete', $data);
 }

 function update()
 {
  $data['query'] = $this->model->get_entry();
  $this->template->load('template', 'bookmarks_update', $data);
 }

 function add()
 {
  $this->form_validation->set_rules('url','URL','required|callback_valid_url');
  $this->form_validation->set_rules('anchor','Anchor','required');
  if ($this->form_validation->run()==FALSE)
  {
   $config['base_url'] = base_url().'bookmarks/delete/';
   $config['total_rows'] = $this->db->count_all('bookmarks');
   $config['per_page'] = '10';
   $config['num_links'] = '10';
   $config['full_tag_open'] = '<p>';
   $config['full_tag_close'] = '</p>';  
   $this->pagination->initialize($config);
   $data['query'] = $this->model->get_entries($config['per_page'],$this->uri->segment(3));  
   $this->template->load('template', 'bookmarks_index', $data);
  } else {
   $this->model->add_entry();
   redirect('bookmarks/index');
  }
 }

 function del()
 {
  $data['query'] = $this->model->delete_entry();
  redirect('bookmarks/delete');
 }

 function save()
 {
  $this->form_validation->set_rules('url','URL','required|callback_valid_url');
  $this->form_validation->set_rules('anchor','Anchor','required');
  if ($this->form_validation->run()==FALSE)
  {
   $data['query'] = $this->model->get_entry();
   $this->template->load('template', 'bookmarks_edit', $data);
  } else {
   $data['query'] = $this->model->save_entry();
   redirect('bookmarks/edit');
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

/* End of file bookmarks.php */
/* Location: ./application/controllers/bookmarks.php */