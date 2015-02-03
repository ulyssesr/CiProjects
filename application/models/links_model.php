<?php

class Links_model extends CI_Model {

 function __construct()
 {
 parent::__construct();	
  $this->load->database();
 }

 function get_entries()
 {
  $this->db->order_by('anchor','asc');
  $query = $this->db->get('links');
  return $query->result();
  
  $result = $query->result_array();
  foreach($result as $key => $row)
   {
    $this->db->group_by('tag');  	
    $tagquery = $this->db->get('links');
    return $tagquery->result();
   }
   
 }
 
 function get_entry()
 {
  $this->db->where('id', $this->uri->segment(3));	
  $query = $this->db->get('links');
  return $query->result();
 }

 function get_tags()
 {
  $this->db->group_by('tag');  	
  $tagquery = $this->db->get('links');
  return $tagquery->result();
 }
  
 function get_dropdown_tags()
 {
  $tags = $this->db->query('select distinct tag from links');
  $dropdowns = $tags->result();
  foreach ($dropdowns as $dropdown)
  	{
  		$dropdownlist[$dropdown->tag] = $dropdown->tag;
  	}
	$finaldropdown = $dropdownlist;
	return $finaldropdown;
 }
 
 function show_tags()
 {
  $this->db->where('tag', $this->uri->segment(3));
  $this->db->order_by('anchor','asc');  	
  $query = $this->db->get('links');
  return $query->result();
 }

 function edit_entry()
 {
  $this->db->where('tag', $this->uri->segment(3));
  $this->db->order_by('anchor','asc');  	
  $query = $this->db->get('links');
  return $query->result();
 }

 function add_entry()
 {
  $data = array(
  'url' => $this->input->post('url',true),
  'anchor' => $this->input->post('anchor',true),
  'tag' => $this->input->post('tag',true));
  $this->db->insert('links', $data);
 }

 function delete_entry()
 {
  $this->db->where('id', $this->uri->segment(3));
  $this->db->delete('links');
 }

 function save_entry()
 {
  $data = array(
  'url' => $this->input->post('url',true),
  'anchor' => $this->input->post('anchor',true),
  'tag' => $this->input->post('tag',true));
  $this->db->where('id', $this->uri->segment(3));	
  $this->db->update('links', $data);
 }

}
?>
