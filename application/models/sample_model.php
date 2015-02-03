<?php

class Sample_model extends CI_Model {
	
 function __construct()
 {
 parent::__construct();
 $this->load->database();
 }

 // queries

 function get_entry()
 {
 $this->db->where('id', $this->uri->segment(3));
 $query = $this->db->get('sample');
 return $query->result();
 }

 function get_entries()
 {
 $this->db->order_by('name','asc');
 $query = $this->db->get('sample');
 return $query->result();
 }
	
 function get_count()
 {
 $query = $this->db->count_all();
 }

 // database functions

 function insert_entry()
 {
 $data = array(
  'name' => $this->input->post('name',true),
  'telephone' => $this->input->post('telephone',true),
  'email' => $this->input->post('email',true),
  'notes' => $this->input->post('notes',true));
 $this->db->insert('sample', $data);	
 }

 function delete_entry()
 {
 $this->db->where('id', $this->uri->segment(3));
 $this->db->delete('sample');	
 }

 function update_entry()
 {
 $data = array(
  'name' => $this->input->post('name',true),
  'telephone' => $this->input->post('telephone',true),
  'email' => $this->input->post('email',true),
  'notes' => $this->input->post('notes',true));
 $this->db->where('id', $this->uri->segment(3));
 $this->db->update('sample', $data);
 }

}

/* End of file sample_model.php */
/* Location: ./application/models/sample_model.php */
