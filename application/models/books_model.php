<?php

class Books_model extends CI_Model {

 function __construct()
 {
 parent::__construct();	
  $this->load->database();
 }

 function get_entries($num,$offset)
 {
  $this->db->order_by('id','asc');
  $query = $this->db->get('books',$num,$offset);
  return $query->result();
 }
 
 function get_entry()
 {
  $this->db->where('id', $this->uri->segment(3));	
  $query = $this->db->get('books');
  return $query->result();
 }

 function get_ids($num,$offset)
 {
  $this->db->order_by('id','asc');
  $query = $this->db->get('books',$num,$offset);
  return $query->result();
 }

 function get_authors($num,$offset)
 {
  $this->db->order_by('author','asc');
  $query = $this->db->get('books',$num,$offset);
  return $query->result();
 }

 function get_date($num,$offset)
 {
  $this->db->order_by('datepublished','desc');
  $query = $this->db->get('books',$num,$offset);
  return $query->result();
 }

 function get_bibliography()
 {
  $this->db->where('id', $this->uri->segment(3));
  $bibquery = $this->db->get('books');
  $row = $bibquery->row();
  $this->db->where('author',$row->author);
  $query = $this->db->get('books');
  return $query->result();
 }

 function get_search()
 {
  $match = $this->input->post('search',true);
  $query = $this->db->query("select * from books where match (bookname,author,characters,synopsis) against ('.$match.')");
  return $query->result();
 }

 function get_search_count()
 {
  $match = $this->input->post('search',true);
  $searchcount = $this->db->query("select count(id) as searchcount from books where match (bookname,author,characters,synopsis) against ('.$match.')");
  return $searchcount->result();
 }

 function get_authors_list($num,$offset)
 {
  $this->db->select('id, author, COUNT(id) as numberofbooks');
  $this->db->group_by('author','asc');
  $this->db->order_by('numberofbooks','desc');
  $query = $this->db->get('books',$num,$offset);
  return $query->result();
 }

 function get_total_price()
 {
  $this->db->select_sum('price');
  $query = $this->db->get('books');
  return $query->result();
 }

 function get_total_books()
 {
  $this->db->select('COUNT(id) as booktotal' );
  $query = $this->db->get('books');
  return $query->result();
 }

 function edit_entry()
 {
  $this->db->where('id', $this->uri->segment(3));	
  $query = $this->db->get('books');
  return $query->result();
 }

 function add_entry()
 {
  $data = array(
    'bookname' => $this->input->post('bookname',true),
    'author' => $this->input->post('author',true),
    'datepublished' => $this->input->post('datepublished',true),
    'characters' => $this->input->post('characters',true),
    'synopsis' => $this->input->post('synopsis',true),
    'recommended' => $this->input->post('recommended',true),
    'synopsis' => $this->input->post('synopsis',true),
    'store' => $this->input->post('store',true),
    'price' => $this->input->post('price',true),
    'borrowersname' => $this->input->post('borrowersname',true),
    'borroweddate' => $this->input->post('borroweddate',true));  
  $this->db->insert('books', $data);
 }

 function delete_entry()
 {
  $this->db->where('id', $this->uri->segment(3));
  $this->db->delete('books');
 }

 function save_entry()
 {
  $data = array(
    'bookname' => $this->input->post('bookname',true),
    'author' => $this->input->post('author',true),
    'datepublished' => $this->input->post('datepublished',true),
    'characters' => $this->input->post('characters',true),
    'synopsis' => $this->input->post('synopsis',true),
    'recommended' => $this->input->post('recommended',true),
    'synopsis' => $this->input->post('synopsis',true),
    'store' => $this->input->post('store',true),
    'price' => $this->input->post('price',true),
    'borrowersname' => $this->input->post('borrowersname',true),
    'borroweddate' => $this->input->post('borroweddate',true));
  $this->db->where('id', $this->uri->segment(3));	
  $this->db->update('books', $data);
 }

}

/* End of file books_model.php */ 
/* Location: ./application/models/books_model.php */
