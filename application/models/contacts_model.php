<?php

class Contacts_model extends CI_Model {
	
	function __construct()
	{
	parent::__construct();
	$this->load->database();
	}
	
	function get_count()
	{
	$query = $this->db->count_all();
	}

	function get_entries($num,$offset)
	{
	$this->db->order_by('name', 'asc');
	$query = $this->db->get('contacts',$num,$offset);
	return $query->result();
	}
	
	function get_entry()
	{
	$this->db->where('id', $this->uri->segment(3));
	$query = $this->db->get('contacts');
	return $query->result();
	}

	function insert_entry()
	{
	$data = array(
	'name' => $this->input->post('name',true),
	'telephone' => $this->input->post('telephone',true),
	'email' => $this->input->post('email',true),
	'notes' => $this->input->post('notes',true));
	$this->db->insert('contacts', $data);	
	}

	function delete_entry()
	{
	$this->db->where('id', $this->uri->segment(3));
	$this->db->delete('contacts');	
	}

	function update_entry()
	{
	$data = array(
	'name' => $this->input->post('name',true),
	'telephone' => $this->input->post('telephone',true),
	'email' => $this->input->post('email',true),
	'notes' => $this->input->post('notes',true));    
	$this->db->where('id', $this->uri->segment(3));
	$this->db->update('contacts', $data);
	}

}

/* End of file contacts_model.php */
/* Location: ./application/models/contacts_model.php */
