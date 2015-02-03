<?php

class Bookmarks_model extends CI_Model {

 function __construct()
 {
 parent::__construct();	
  $this->load->database();
 }

 function get_entries($num,$offset)
 {
  $this->db->order_by('id','desc');
  $query = $this->db->get('bookmarks',$num,$offset);
  return $query->result();
 }
 
 function get_entry()
 {
  $this->db->where('id', $this->uri->segment(3));	
  $query = $this->db->get('bookmarks');
  return $query->result();
 }

 function edit_entry()
 {
  $this->db->where('tag', $this->uri->segment(3));
  $this->db->order_by('anchor','asc');  	
  $query = $this->db->get('bookmarks');
  return $query->result();
 }

 function add_entry()
 {
  $data = array(
  'url' => $this->input->post('url',true),
  'anchor' => $this->input->post('anchor',true));
  $this->db->insert('bookmarks', $data);
 }

 function delete_entry()
 {
  $this->db->where('id', $this->uri->segment(3));
  $this->db->delete('bookmarks');
 }

 function save_entry()
 {
  $data = array(
  'url' => $this->input->post('url',true),
  'anchor' => $this->input->post('anchor',true));
  $this->db->where('id', $this->uri->segment(3));	
  $this->db->update('bookmarks', $data);
 }

}
?>
