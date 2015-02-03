<?php

class Notes_model extends CI_Model {

 function __construct()
 {
 parent::__construct();	
  $this->load->database();
 }

 function get_entries($num,$offset)
 {
  if (!$this->ion_auth->logged_in()): $this->db->where('status', 'public'); endif;
  $this->db->order_by('published desc, id desc');
  $query = $this->db->get('notes',$num,$offset);
  return $query->result();  
 }
 
 function get_tag_entries($tag,$num,$offset)
 {
  if (!$this->ion_auth->logged_in()): $this->db->where('status', 'public'); endif; 
  $this->db->where('tag', $tag);
  $this->db->order_by('published desc, id desc');
  $query = $this->db->get('notes',$num,$offset);
  return $query->result();
 } 
 
 function get_entry()
 {
  if (!$this->ion_auth->logged_in()): $this->db->where('status', 'public'); endif;
  $this->db->where('id', $this->uri->segment(3));	
  $query = $this->db->get('notes');
  return $query->result();
 }

 function get_tags()
 {
  $this->db->order_by('id');  	
  $tagquery = $this->db->get('tags');
  return $tagquery->result();
 }
 
 function get_dropdown_tags()
 {  
  $this->db->order_by('id','asc');
  $tags = $this->db->get('tags');
  $dropdowns = $tags->result();
  foreach ($dropdowns as $dropdown)
  {
   $dropdownlist[$dropdown->id] = $dropdown->tag;
  }
  $finaldropdown = $dropdownlist;
  return $finaldropdown;
 }
 
 function edit_tag()
 {
  $this->db->where('id', $this->uri->segment(3));
  $tagquery = $this->db->get('tags');
  return $tagquery->result();
 }
 
 function add_tag()
 {
  $data = array(
    'tag' => $this->input->post('tag', true)
  );
  $this->db->insert('tags', $data);
 }
 
 function delete_tag()
 {
  // cant delete tag 1
  if ($this->uri->segment(3) == 1)
  {
   redirect('notes/newtag');
  } else {
   // reassign to tag 1
   $data = array(
     'tag' => '1' 
   );
   $this->db->where('tag',$this->uri->segment(3));
   $this->db->update('notes', $data);
   // delete tag
   $this->db->where('id', $this->uri->segment(3));
   $this->db->delete('tags');
  }
 }
 
 function save_tag()
 {
  $data = array(
    'tag' => $this->input->post('tag', true)
  );
  $this->db->where('id', $this->uri->segment(3));
  $this->db->update('tags', $data);
 }
 

 
 function display_comments()
 {
  $this->db->where('notesid', $this->uri->segment(3));
  $this->db->select('count(id) as numbers');  
  $numbers = $this->db->get('comments');
  return $numbers->result();
 }
 
 function get_comment()
 {
  $this->db->where('id', $this->uri->segment(5));
  $comments = $this->db->get('comments');
  return $comments->result();
 }
 
 function get_comments()
 {
  $this->db->where('notesid', $this->uri->segment(3));
  $this->db->order_by('id', 'asc');
  $comments = $this->db->get('comments');
  return $comments->result();
 }
 
 function get_num_of_comments($id)
 {
  $this->db->where('notesid', $id);
  $this->db->from('comments');
  $num_of_comments = $this->db->count_all_results();
  return $num_of_comments->result();
 }
 
 function add_comment()
 {
  $timestamp = now();
  $comment = strip_tags($this->input->post('comment', true));
  $data = array(
    'notesid' => $this->input->post('notesid', true),
    'name' => $this->input->post('name', true),
    'comment' => $comment,
    'timestamp' => $timestamp,
    'replyid' => $this->input->post('notesid', true)
  );
  $this->db->insert('comments', $data);  
  $this->db->set('comments', 'comments+1', FALSE);
  $this->db->where('id', $this->input->post('notesid', true)); 
  $this->db->update('notes');
 }
 
 function del_comment()
 {
  $this->db->where('id', $this->uri->segment(5));
  $this->db->delete('comments');
  $this->db->set('comments', 'comments-1', FALSE);
  $this->db->where('id', $this->uri->segment(3));
  $this->db->update('notes');  
 }
 
 function save_comment()
 {
  $timestamp = now();
  $data = array(
    'name' => $this->input->post('name', true),
    'comment' => $this->input->post('comment', true)
  );
  $this->db->where('id', $this->uri->segment(5));
  $this->db->update('comments', $data);
 } 
 
 function edit_entry()
 {
  $this->db->where('id', $this->uri->segment(3));	
  $query = $this->db->get('notes');
  return $query->result();
 }

 function add_entry()
 {
  $timestamp = now();
  $data = array(
    'filename' => $this->input->post('filename',true),
    'content' => $this->input->post('content',true),
    'tag' => $this->input->post('tag',true), 
	'timestamp' => $timestamp,
    'published' => $timestamp,
    'status' => $this->input->post('status',true)
  );
  $this->db->insert('notes', $data);
 }

 function delete_entry()
 {
  $this->db->where('id', $this->uri->segment(3));
  $this->db->delete('notes');
 }

 function save_entry()
 {
  $timestamp = now();
  $data = array(
    'filename' => $this->input->post('filename',true),
    'content' => $this->input->post('content',true),
    'tag' => $this->input->post('tag',true),
	'timestamp' => $timestamp,
    'status' => $this->input->post('status',true)	
  );
  $this->db->where('id', $this->uri->segment(3));	
  $this->db->update('notes', $data);
  
  if ($this->input->post('status',true) == 'draft') :
   $data = array(
   	 'published' => $timestamp
   );
   $this->db->where('id', $this->uri->segment(3));
   $this->db->update('notes', $data);
  endif; 
 }
 
 function get_search()
 {  
  $match = $this->input->post('search',true);  
  if (!$this->ion_auth->logged_in()) : $this->db->where('status', 'public'); endif;
  $this->db->where("(filename LIKE '%$match%' || content LIKE '%$match%')");  
  $query = $this->db->get('notes');  
  return $query->result();
 }

 function get_search_count()
 {
  $match = $this->input->post('search',true);
  $this->db->select('count(id) as searchcount');
  if (!$this->ion_auth->logged_in()) : $this->db->where('status', 'public'); endif;
  $this->db->where("(filename LIKE '%$match%' || content LIKE '%$match%')");  
  $searchcount = $this->db->get('notes');  
  return $searchcount->result();
 } 

}

/* End of file notes_model.php */
/* Location: ./application/models/notes_model.php */