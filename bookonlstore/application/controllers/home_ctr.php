<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_ctr extends CI_Controller {
	public function __construct(){
	     parent::__construct();
	     $this->load->model('Home_md');
	}

	public function index()
	{
		//truyen bookList;
		$this->load->model('home_md');
		$data['bookList'] = $this->home_md->getBookList();
		$data['num_row'] = $this->home_md->getNumRow();
		$this->load->view('home_v', $data);


	}

	public function phanTrang(){
		$this->load->library('pagination');
		$this->load->library('table');

		$config['base_url'] = 'http://localhost/bookonlstore/index.php/home_ctr/phanTrang';
		$config['total_rows'] = '$this->home_md->getNumRow()';
		$config['per_page'] = 12;
		$config['uri_segment'] = 2;
		$config['num_links'] = 3;
		$config['full_tag_open'] = '<p>';
		$config['full_tag_close'] = '</p>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<div>';
		$config['first_tag_close'] = '</div>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<div>';
		$config['last_tag_close'] = '</div>';
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<div>';
		$config['next_tag_close'] = '</div>';
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<div>';
		$config['prev_tag_close'] = '</div>';
		$config['cur_tag_open'] = '<b>';
		$config['cur_tag_close'] = '</b>';

		$this->pagination->initialize($config);

		echo $this->pagination->create_links();
		$data['records'] = $this->Home_md->getBookList( $config['per_page'] , $this->uri->segment(2));

		$this->load->view('home_v', $data);
	}
}

/* End of file home_ctr.php */
/* Location: ./application/controllers/home_ctr.php */