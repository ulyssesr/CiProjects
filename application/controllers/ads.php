<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ads extends CI_Controller {

 function __construct()
 {
 	parent::__construct();

 	// load libraries and helpers
 
 	$this->load->helper(array('html','url','form'));
 	$this->load->library(array('form_validation','table','pagination','email'));
 	$this->form_validation->set_error_delimiters('<div class="alert alert-error">','</div>');

 	// load shorter name for model
 
	$this->load->model('ads_model','model');
 
 	// set template title and navigation 
 
 	$this->template->set('title','Ads');
 	$this->template->set('nav','ads');

 	// uses ion_auth to login to system 
 
 	if (!$this->ion_auth->logged_in()) { redirect('auth/login'); }

 }

 // views

 function index()
 {

	// pagination settings 
 
 	$config['base_url'] = base_url('/ads/index/');
 	$config['total_rows'] = $this->db->count_all('ads');
 	$config['per_page'] = 12;
 	$config['num_links'] = 10;
 	$config['full_tag_open'] = '<p>';
 	$config['full_tag_close'] = '</p>';
 	
 	// initialize pagination
 	
	$this->pagination->initialize($config);
	
	// set sort and direction
	
	$sort = 'id';
	$direction = 'desc';
	
	// fetches data from get_index function in model
	// passes 2 variables for $num and $offset
	
	$data['query'] = $this->model->get_index($config['per_page'],$this->uri->segment(3),$sort,$direction);
	
	// displays data by using template in views
	
 	$this->template->load('template','ads_index',$data);
 	
 }

 function startdate()
 {
 
 	// pagination settings
 
 	$config['base_url'] = base_url('/ads/startdate/');
 	$config['total_rows'] = $this->db->count_all('ads');
 	$config['per_page'] = 12;
 	$config['num_links'] = 10;
 	$config['full_tag_open'] = '<p>';
 	$config['full_tag_close'] = '</p>';

	// initialize pagination
	
 	$this->pagination->initialize($config);

	// set sort and direction
 	
 	$sort = 'startdate';
 	$direction = 'asc';
 	 	
	// fetches data from get_startdate function in model
	// passes 2 variables for $num and $offset 	
 	
 	$data['query'] = $this->model->get_index($config['per_page'],$this->uri->segment(3),$sort,$direction);
 	 	
 	// displays data by using template in views
 	
 	$this->template->load('template','ads_index',$data);
 	
 }

 function enddate()
 {
 
 	// pagination settings
 	
 	$config['base_url'] = base_url('/ads/enddate/');
 	$config['total_rows'] = $this->db->count_all('ads');
 	$config['per_page'] = 12;
 	$config['num_links'] = 10;
 	$config['full_tag_open'] = '<p>';
 	$config['full_tag_close'] = '</p>';
 	
 	// initialize pagination
 	
 	$this->pagination->initialize($config);
 	
	// set sort and direction 	
 	
 	$sort = 'enddate';
 	$direction = 'desc';
 	
	// fetches data from get_enddate function in model
	// passes 2 variables for $num and $offset 	
 	
 	$data['query'] = $this->model->get_index($config['per_page'],$this->uri->segment(3),$sort,$direction);
 	
 	// displays data by using template in views
 	
	$this->template->load('template','ads_index',$data);
	
 }
 
 function expired()
 {

	// pagination settings 
 
 	$config['base_url'] = base_url('/ads/expired/');

	// adding where condition (status == expired) to get a different count
	// using count_all_results with the where condition
	
 	$this->db->where('status', 'expired');
 	$config['total_rows'] = $this->db->count_all_results('ads');
 	
 	$config['per_page'] = 12;
 	$config['num_links'] = 10;
 	$config['full_tag_open'] = '<p>';
 	$config['full_tag_close'] = '</p>';
 	
 	// initialize pagination
 	 	
 	$this->pagination->initialize($config);
 	
	// set sort, direction and status
	
	$sort = 'enddate';
	$direction = 'desc';
	$status = 'expired';
	 	
 	// fetches data from get_expired function in models
 	
 	$data['query'] = $this->model->get_status($config['per_page'],$this->uri->segment(3),$sort,$direction,$status);
 	 	
 	// displays data by using template in views
 	
 	$this->template->load('template','ads_index',$data);
 	
 }
 
 function active()
 {
 
 	// pagination settings
 	
 	$config['base_url'] = base_url('/ads/active/');
 	
	// adding where condition (status == active) to get a different count
	// using count_all_results with the where condition 	
 	
 	$this->db->where('status', 'Active');
 	$config['total_rows'] = $this->db->count_all_results('ads');
 	
	$config['per_page'] = 12;
 	$config['num_links'] = 10;
 	$config['full_tag_open'] = '<p>';
 	$config['full_tag_close'] = '</p>';

	// initialize pagination
	
 	$this->pagination->initialize($config);

	// set sort, direction and status
	
	$sort = 'enddate';
	$direction = 'asc';
	$status = 'Active';
	
	// fetches data from get_active function in models 	
 	
 	$data['query'] = $this->model->get_status($config['per_page'],$this->uri->segment(3),$sort,$direction,$status);
 	
	// displays data by using template from views 	
 	
	$this->template->load('template','ads_index',$data);
	
 }
 
 function due()
 {
 
 	// get todays date
 	
	$today = date("Y-m-d");
	
	// pagination settings
	 
 	$config['base_url'] = base_url('/ads/due/');
 	
 	// adding where condition (enddate > today) to get a different count
	// using count_all_results with the where condition
 	
 	$this->db->where('status', 'Active');
 	$this->db->where('enddate >', $today);
 	$config['total_rows'] = $this->db->count_all_results('ads');
 	
 	$config['per_page'] = 12;
 	$config['num_links'] = 10;
 	$config['full_tag_open'] = '<p>';
 	$config['full_tag_close'] = '</p>';

	// initialize pagination
	
 	$this->pagination->initialize($config);

	// set status

	$status = 'Active';

	// fetches data from get_due function in models 	
 	
 	$data['query'] = $this->model->get_due($config['per_page'],$this->uri->segment(3),$status);
 	
	// displays data by using template from views
 	
 	$this->template->load('template','ads_index',$data);
 	
 }
 
 function view()
 {

	// views detail of each record
	// uses get_entry function in models
	
 	$data['query'] = $this->model->get_entry();
 	
 	// displays data using template in views
 	
	$this->template->load('template','ads_view',$data);
	
 }
	
 function add()
 {
 
 	// fetches data after new entry
 	
	$data['query'] = $this->model->get_entry();
	
	// displays data using template in views
		
	$this->template->load('template','ads_add',$data);
	
 }

 function edit()
 {

	// fetches data after edit
	 
 	$data['query'] = $this->model->get_entry();
 	
 	// displays data using template in views
 	 	
	$this->template->load('template','ads_edit',$data);
	
 }

 function activate()
 {
 
 	// sends email to client after link activation

	// fetches data from database
	 	 	
 	$data['query'] = $this->model->get_entry();
 	
 	// get array values from database
 	 	 	
 	foreach ($data['query'] as $row) {
 	
 		// assign results to variables
 		
 		$client = $row->email;
 		$client_name = $row->name;
 		$client_link = $row->link;
 		$client_duration = $row->duration;
	
		// change date format to January 01, 2012		
 		
 		$client_startdate = date("F d, Y", strtotime($row->startdate));
 		$client_enddate = date("F d, Y", strtotime($row->enddate));

		// set to my own email 		
 		
 		$me = "ulyssesr@yahoo.com";
 		 
	}
	 
	// email settings
	 
	$this->email->from('uylssesr@yahoo.com','ulyssesonline.com');  

	// set email->to to clients email	
	 	
 	$this->email->to($client);
 	
 	// blind copy to me
 	
 	$this->email->bcc($me);

	// subject 	
 	
 	$this->email->subject('Your ad link is now activated');
 	
	// body of message 	
 	  
 	$this->email->message(

'Hi '.$client_name.',

Thank you for purchasing an ad link at ulyssesonline.com. Your link '.$client_link.' will be active for a period of '.strtolower($client_duration).' starting from '.$client_startdate.' until '.$client_enddate.'. I will send out a reminder prior to your link expiring in '.strtolower($client_duration).'. Once again, thank you so much for your purchase.
 
Best regards,
Ulysses'

	);
 
	// finally send the message
	   
 	$this->email->send();
 	
 	// redirect after send
 	
	redirect('ads/view/'.$this->uri->segment(3));
	 
 }

 function reminder()
 {
 
 	// sends out reminder email message

	// fetch data from database
	 	
 	$data['query'] = $this->model->get_entry();
 	
	// get array data 	
 	
 	foreach ($data['query'] as $row) 
 	{
	
		// set array data to variables  	

 		$client = $row->email;
 		$client_name = $row->name;
 		$client_link = $row->link;
 		$client_duration = $row->duration;

		// change date format to January 01, 2012
		
 		$client_startdate = date("F d, Y", strtotime($row->startdate));
 		$client_enddate = date("F d, Y", strtotime($row->enddate));
 		
 		// set my own email
 		
 		$me = "ulyssesr@yahoo.com";
 		 
 	}
 	
	//	email settings
 		
 	$this->email->from('uylssesr@yahoo.com','ulyssesonline.com');
 		
	// set to clients email 		
 		  
 	$this->email->to($client);
 		
 	// blind copy me
 	
 	$this->email->bcc($me);
 		
 	// subject
 		
	$this->email->subject('Your ad link is expiring');
		
	// body 
   
 	$this->email->message(
 		
'Hi '.$client_name.',
 
Just a friendly reminder from ulyssesonline.com to let you know that your link '.$client_link.' is expiring on '.$client_enddate.'. To renew, please visit http://ulyssesonline.com/advertising.
 
Best regards,
Ulysses'

	);
	
	// finally send message
	  
	$this->email->send();
	
	// redirect to view after message is sent
	
	redirect('ads/view/'.$this->uri->segment(3));
	
 }

 function expiring()
 {
 
 	// sends out expire email message

	// fetch data from database
	 	
 	$data['query'] = $this->model->get_entry();
 	
	// get array data 	
 	
 	foreach ($data['query'] as $row) 
 	{
	
		// set array data to variables  	

 		$client = $row->email;
 		$client_name = $row->name;
 		$client_link = $row->link;
 		$client_duration = $row->duration;

		// change date format to January 01, 2012
		
 		$client_startdate = date("F d, Y", strtotime($row->startdate));
 		$client_enddate = date("F d, Y", strtotime($row->enddate));
 		
 		// set my own email
 		
 		$me = "ulyssesr@yahoo.com";
 		 
 	}
 	
	//	email settings
 		
 	$this->email->from('uylssesr@yahoo.com','ulyssesonline.com');
 		
	// set to clients email 		
 		  
 	$this->email->to($client);
 		
 	// blind copy me
 	
 	$this->email->bcc($me);
 		
 	// subject
 		
	$this->email->subject('Your ad link is expired');
		
	// body 
   
 	$this->email->message(
 		
'Hi '.$client_name.',
 
This is just to inform you know that your ad link '.$client_link.' at ulyssesonline.com expired on '.$client_enddate.'. If you want to renew, please visit http://ulyssesonline.com/advertising.
 
Best regards,
Ulysses'

	);
	
	// finally send message
	  
	$this->email->send();
	
	// redirect to view after message is sent
	
	redirect('ads/view/'.$this->uri->segment(3));
	
 }

 // the database operations

 function insert()
 {
 
 	// validation rules
 	// required fields
 	
	$this->form_validation->set_rules('link','link','required');
 	$this->form_validation->set_rules('type','type','required');
 	$this->form_validation->set_rules('startdate','startdate','required');
 	$this->form_validation->set_rules('enddate','enddate','required');
 	$this->form_validation->set_rules('duration','duration','required');
 	$this->form_validation->set_rules('name','name','required');
 	$this->form_validation->set_rules('email','email','required');
 	
 	// validation check
 	
	if ($this->form_validation->run()==FALSE)
  	{
	
		// validation failed
				  	
  		$data['query'] = $this->model->get_entry();
  		
  		// display data using template in views
  		
  		$this->template->load('template','ads_add',$data);
  		
  	} else {

		// validation passed. insert new record  	
  		
  		$this->model->insert_entry();
  		
  		// redirect after insert
  		
  		redirect('ads/index');
  		
  	}
  	
 }
	
 function delete()
 {

	// deletes entry 
 
 	$this->model->delete_entry();
 	
 	// redirect after entry
 	
	redirect('ads/index');
	
 }
	
 function save()
 {
 
 	// validation rules
	// fields are required 	
 	
 	$this->form_validation->set_rules('link','link','required');
 	$this->form_validation->set_rules('type','type','required');
 	$this->form_validation->set_rules('startdate','startdate','required');
 	$this->form_validation->set_rules('enddate','enddate','required');
 	$this->form_validation->set_rules('duration','duration','required');
 	$this->form_validation->set_rules('name','name','required');
 	$this->form_validation->set_rules('email','email','required');
 	
 	// check validation
 	
 	if ($this->form_validation->run()==FALSE)
  	{

		// validation failed
		// fetch data
		
  		$this->db->where('id', $this->uri->segment(3));
  		
		// fetch data from database
  		
  		$data['query'] = $this->model->get_entry();

		// display data using template from views  		
  		
  		$this->template->load('template','ads_edit',$data);
  		
  	} else {
  	
  		// validation passes
		// update entry  		
  		
  		$data['query'] = $this->model->update_entry();
  		
		// redirect after entry  		
  		
  		redirect('ads/index');
  		
  	}
  			
 }


}

/* End of file sample.php */
/* Location: ./application/controller/sample.php */
