<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Book_model extends CI_Model {
		function __construct(){
			$this->load->database();
		}
		//lay du lieu theo tung phan
		public function list_all($number, $offset){
			$query = $this->db->get('book_list',$number, $offset);
			return $query->result_array();
		}
		//dem tong so record trong table book_list
		public function count_all(){
			return $this->db->count_all('book_list');
		}
	}


/* End of file book_model.php */
/* Location: ./application/models/book_model.php */