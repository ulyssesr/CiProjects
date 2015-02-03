<?php

class Books extends CI_Controller {

 function __construct() 
 {
  parent::__construct();
  $this->load->helper('html');
  $this->load->helper('url');
  $this->load->helper('form');
  $this->load->library('table');
  $this->load->library('form_validation');
  $this->load->library('pagination');
  $this->load->model('books_model','model');
  $this->template->set('nav', 'books');		
  $this->template->set('title','Books');
  $this->form_validation->set_error_delimiters('<div class="alert alert-error">','</div>');
 }

 function index()
 {
  if (!$this->ion_auth->logged_in()) { redirect('auth/login'); } 
  $config['base_url'] = base_url('books/id/');
  $config['total_rows'] = $this->db->count_all('books');
  $config['per_page'] = '12';
  $config['full_tag_open'] = '<p>';
  $config['full_tag_close'] = '</p>';
  $this->pagination->initialize($config);
  $data['query'] = $this->model->get_entries($config['per_page'],$this->uri->segment(3));
  $this->template->load('template', 'books_index', $data);
 }

 function view()
 {
  if (!$this->ion_auth->logged_in()) { redirect('auth/login'); } 
  $data['query'] = $this->model->get_entry();		
  $this->template->load('template', 'books_view', $data);
 }

 function id()
 {
  if (!$this->ion_auth->logged_in()) { redirect('auth/login'); } 
  $config['base_url'] = base_url('books/id/');
  $config['total_rows'] = $this->db->count_all('books');
  $config['per_page'] = '12';
  $config['full_tag_open'] = '<p>';
  $config['full_tag_close'] = '</p>';
  $this->pagination->initialize($config);
  $data['query'] = $this->model->get_ids($config['per_page'],$this->uri->segment(3));
  $this->template->load('template', 'books_index', $data);
 }

 function author()
 {
  if (!$this->ion_auth->logged_in()) { redirect('auth/login'); } 
  $config['base_url'] = base_url('books/author/');
  $config['total_rows'] = $this->db->count_all('books');
  $config['per_page'] = '12';
  $config['full_tag_open'] = '<p>';
  $config['full_tag_close'] = '</p>';
  $this->pagination->initialize($config);
  $data['query'] = $this->model->get_authors($config['per_page'],$this->uri->segment(3));
  $this->template->load('template', 'books_index', $data);
 }

 function date()
 {
  if (!$this->ion_auth->logged_in()) { redirect('auth/login'); } 
  $config['base_url'] = base_url('books/date/');
  $config['total_rows'] = $this->db->count_all('books');
  $config['per_page'] = '12';
  $config['full_tag_open'] = '<p>';
  $config['full_tag_close'] = '</p>';
  $this->pagination->initialize($config);
  $data['query'] = $this->model->get_date($config['per_page'],$this->uri->segment(3));
  $this->template->load('template', 'books_index', $data);
 }

 function bibliography()
 {
  if (!$this->ion_auth->logged_in()) { redirect('auth/login'); } 
  $data['query'] = $this->model->get_bibliography();		
  $this->template->load('template', 'books_index', $data);
 }


 function stats()
 {
  if (!$this->ion_auth->logged_in()) { redirect('auth/login'); } 
  $data['bookcount'] = $this->model->get_total_books();
  $data['total'] = $this->model->get_total_price();
  $config['base_url'] = base_url('books/stats/');
  $authorscount = $this->db->query('select distinct author from books where 1');
  $config['total_rows'] = $authorscount->num_rows();
  $config['per_page'] = '12';
  $config['full_tag_open'] = '<p>';
  $config['full_tag_close'] = '</p>';
  $this->pagination->initialize($config);
  $data['query'] = $this->model->get_authors_list($config['per_page'],$this->uri->segment(3));
  $this->template->load('template', 'books_stats', $data);
 }

 function search()
 {
  if (!$this->ion_auth->logged_in()) { redirect('auth/login'); } 
  $data['query'] = $this->model->get_search();
  $data['searchcount'] = $this->model->get_search_count();
  $this->template->load('template', 'books_index', $data);
 }

 function add()
 {
  if (!$this->ion_auth->logged_in()) { redirect('auth/login'); }
  $this->template->load('template2', 'books_new');
 }

 function edit()
 {
  if (!$this->ion_auth->logged_in()) { redirect('auth/login'); }
  $data['query'] = $this->model->edit_entry();		
  $this->template->load('template2', 'books_edit', $data);
 }

 function insert()
 {
  if (!$this->ion_auth->logged_in()) { redirect('auth/login'); }
  $this->form_validation->set_rules('bookname','Book Name','required');
  $this->form_validation->set_rules('author','Author','required');
  $this->form_validation->set_rules('datepublished','Date Published','required');
  if ($this->form_validation->run()==FALSE)
  {
   $data['query'] = $this->model->get_entry();
   $this->template->load('template2', 'books_new', $data);   
  } else {
   $this->model->add_entry();
   redirect('/books/index');
  }
 }

 function delete()
 {
  if (!$this->ion_auth->logged_in()) { redirect('auth/login'); }
  $data['query'] = $this->model->delete_entry();
  redirect('/books/index');
 }

 function save()
 {
  if (!$this->ion_auth->logged_in()) { redirect('auth/login'); }
  $this->form_validation->set_rules('bookname','Book Name','required');
  $this->form_validation->set_rules('author','Author','required');
  $this->form_validation->set_rules('datepublished','Date Published','required');
  if ($this->form_validation->run()==FALSE)
  {
   $data['query'] = $this->model->get_entry();
   $this->template->load('template2', 'books_view', $data);   
  } else {
   $data['query'] = $this->model->save_entry();
   $data['query'] = $this->model->get_entry();
   $this->template->load('template', 'books_view', $data);
  }
 }

}
/* End of file books.php */
/* Location: ./application/controllers/books.php */
