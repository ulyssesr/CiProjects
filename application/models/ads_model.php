<?php

class Ads_model extends CI_Model {
	
 function __construct()
 {

 	parent::__construct();
 	$this->load->database();

 }

 // queries

 function get_entry()
 {

	// get single record based on id 
 
 	$this->db->where('id', $this->uri->segment(3));
 	$query = $this->db->get('ads');
 	return $query->result();

 }

 function get_index($num,$offset,$sort,$direction)
 {

	// get results sorted by id
	// pagination is via $num and $offset 

 	$this->db->order_by($sort,$direction);
  	$query = $this->db->get('ads',$num,$offset);
 	return $query->result();

 }
 
 function get_status($num,$offset,$sort,$direction,$status)
 {
 
	// get results where status equals expired
	// pagination is via $num and $offset 
	
 	$this->db->order_by($sort,$direction);
 	$this->db->where('status',$status); 
 	$query = $this->db->get('ads',$num,$offset);
 	return $query->result();
 	
 }
 
 function get_due($num,$offset,$status)
 {
 
	// get results based on date later than today
	// pagination is via $num and $offset 
 
 	$today = date("Y-m-d");
 	$this->db->order_by('enddate','asc');
 	$this->db->where('enddate >', $today);
 	$this->db->where('status', $status);
 	$query = $this->db->get('ads',$num,$offset);
 	return $query->result();
 	
 }
 
 function get_count()
 {
 
 	// get count
 	
 	$query = $this->db->count_all();
 	
 }

 // database functions

 function insert_entry()
 {
 
 	// insert post inputs
 	
	$data = array(
  	'link' => $this->input->post('link',true),
  	'type' => $this->input->post('type',true),
  	'startdate' => $this->input->post('startdate',true),
  	'enddate' => $this->input->post('enddate',true),
  	'duration' => $this->input->post('duration',true),
  	'name' => $this->input->post('name',true),
  	'email' => $this->input->post('email',true),  
  	'status' => $this->input->post('status',true));
 	$this->db->insert('ads', $data);
 		
 }

 function delete_entry()
 {
 
 	// delete entry based on id
 	
 	$this->db->where('id', $this->uri->segment(3));
 	$this->db->delete('ads');
 		
 }

 function update_entry()
 {
 
	// update entry 
 
 	$data = array(
  	'link' => $this->input->post('link',true),
  	'type' => $this->input->post('type',true),
  	'startdate' => $this->input->post('startdate',true),
  	'enddate' => $this->input->post('enddate',true),
  	'duration' => $this->input->post('duration',true),
  	'name' => $this->input->post('name',true),
  	'email' => $this->input->post('email',true),  
  	'status' => $this->input->post('status',true));
 	$this->db->where('id', $this->uri->segment(3));
 	$this->db->update('ads', $data);
 	
 }


}

/* End of file sample_model.php */
/* Location: ./application/models/sample_model.php */
