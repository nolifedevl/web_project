<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_md extends CI_Model {

	function getBookList()
	{
		$query = $this->db->get('book_list');

		foreach ($query->result() as $row)
		{
		    $data[] = $row;
		}
		return $data;
	}
	function getNumRow(){
		$numRow = $this->db->get('book_list')->num_rows();
		return $numRow;
	}
}

/* End of file home_md.php */
/* Location: ./application/models/home_md.php */