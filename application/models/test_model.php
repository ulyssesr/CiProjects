<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function get_entries() 
	{
		$query = $this->db->get('address');
		return $query->result();
	}
	
	function get_entry()
	{
		$this->db->where('id', $this->uri->segment(3)); 
		$query = $this->db->get('address');
		return $query->result();
	}
	
	function get_group_dropdown()
	{
		$query = $this->db->query('select distinct dept.id, dept.groupname from address, dept where address.group=dept.id;');
		$dropdowns = $query->result();
		foreach ($dropdowns as $dropdown)
		{
			$dropdownlist[$dropdown->id] = $dropdown->groupname;
		}
		return $dropdownlist;
	}

}

/* End of file test_model.php */
/* Location: ./application/models/test_model.php */