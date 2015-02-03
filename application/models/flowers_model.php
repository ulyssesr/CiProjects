<?php
class Flowers_model extends CI_Model {
	
	var $conf;
	
	function __construct () 
	{
	parent::__construct();
	$this->load->database();
		
	$this->conf = array(
			'start_day' => 'sunday',
			'day_type' => 'long',
			'show_next_prev' => true,
			'next_prev_url' => base_url('flowers/index')
	);
		
	$this->conf['template'] = '
			{table_open}<table border="0" cellpadding="0" cellspacing="0" class="calendar">{/table_open}
			
			{heading_row_start}<tr>{/heading_row_start}
			
			{heading_previous_cell}<th colspan="2" class="arrows"><a href="{previous_url}">&lt;&lt; Last Month</a></th>{/heading_previous_cell}
			{heading_title_cell}<th colspan="3" class="title"><span>{heading}</span></th>{/heading_title_cell}
			{heading_next_cell}<th colspan="2" class="arrows"><a href="{next_url}">Next month &gt;&gt;</a></th>{/heading_next_cell}

			{heading_row_end}</tr>{/heading_row_end}
			
			{week_row_start}<tr>{/week_row_start}
			{week_day_cell}<td>{week_day}</td>{/week_day_cell}
			{week_row_end}</tr>{/week_row_end}
			
			{cal_row_start}<tr class="days">{/cal_row_start}
			{cal_cell_start}<td class="day">{/cal_cell_start}

			{cal_cell_content}
				<div class="day_num">{day}</div>
				<div class="content">{content}</div>
			{/cal_cell_content}
			{cal_cell_content_today}
				<div class="day_num highlight">{day}</div>
				<div class="content">{content}</div>
			{/cal_cell_content_today}
			
			{cal_cell_no_content}<div class="day_num">{day}</div>{/cal_cell_no_content}
			{cal_cell_no_content_today}<div class="day_num highlight">{day}</div>{/cal_cell_no_content_today}
			
			{cal_cell_blank}&nbsp;{/cal_cell_blank}
			
			{cal_cell_end}</td>{/cal_cell_end}
			{cal_row_end}</tr>{/cal_row_end}

			{table_close}</table>{/table_close}
	';
		
	}
	
	function get_flowers_data($year, $month) {
		
		$query = $this->db->select('date, data')->from('flowers')
			->like('date', "$year-$month", 'after')->get();
			
		$cal_data = array();
		
		foreach ($query->result() as $row) {
			$cal_data[substr($row->date,8,2)+0] = $row->data;
		}
		
		return $cal_data;
		
	}
	
	function add_flowers_data($date, $data) {
		
		if ($this->db->select('date')->from('flowers')
				->where('date', $date)->count_all_results()) {
				
			if ($data != '') { 
			
				$this->db->where('date', $date)
					->update('flowers', array(
					'date' => $date,
					'data' => $data		
				));
			
			} else {
			
				//$this->db->where('date', $date) 
				//->delete('flowers');
			}
			
		} else {
		
			$this->db->insert('flowers', array(
				'date' => $date,
				'data' => $data			
			));
		}
		
	}
	
	function generate ($year, $month) {
		
		$this->load->library('calendar', $this->conf);
		
		$cal_data = $this->get_flowers_data($year, $month);
		
		return $this->calendar->generate($year, $month, $cal_data);
		
	}
	
	function display_all()
	{
		$today = date('Y-m-d');
		$year = date('Y');
		$this->db->order_by('date','asc');
		$this->db->where('date >=', $today );
		$query = $this->db->get('flowers');
		return $query->result();
	}
	
	function details($name)
	{
		$today = date('Y-m-d');
		$this->db->order_by('date','asc');
		$this->db->where('date >=', $today );
		$this->db->like('data', str_replace('-', ' ', $name) );		
		$query = $this->db->get('flowers');
		return $query->result();
	}
	
}

/* end of calendar_model.php */
