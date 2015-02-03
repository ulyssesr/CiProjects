<?php

class Todo_model extends CI_Model {
	
 function __construct()
 {
 parent::__construct();
 $this->load->database();
 }

 // queries

 function get_entry()
 {
 $this->db->where('id', $this->uri->segment(3));
 $query = $this->db->get('todo');
 return $query->result();
 }

 function get_entries($num,$offset)
 {
 $this->db->order_by('priority','asc');
 $query = $this->db->get('todo',$num,$offset);
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
  'tasks' => $this->input->post('tasks',true),
  'priority' => $this->input->post('priority',true));
 $this->db->insert('todo', $data);	
 }

 function delete_entry()
 {
 $this->db->where('id', $this->uri->segment(3));
 $this->db->delete('todo');	
 }

 function update_entry()
 {
 $data = array(
  'tasks' => $this->input->post('tasks',true),
  'priority' => $this->input->post('priority',true));
 $this->db->where('id', $this->uri->segment(3));
 $this->db->update('todo', $data);
 }

}

/* End of file todo_model.php */
/* Location: ./application/models/todo_model.php */
