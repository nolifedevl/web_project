<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Book extends CI_Controller {
		function __construct(){
		parent::__construct();
		$this->load->model('Book_model');
	}

		public function index(){

			//load function can thiet
			$this->load->library('pagination');
			$this->load->helper('url');

			//cau hinh phan trang
			$config['base_url'] = base_url('index.php/book'); 		//xac dinh trang phan trang
			$config['total_rows'] = $this->Book_model->count_all();	//xac dih tong so trang
			$config['per_page'] = 12;								//xac dinh so record /page
			$config['uri_segment'] = 2;								//xac dinh segment se chua page number
			$this->pagination->initialize($config);

			$data['data']= $this->Book_model->list_all($config['per_page'], $this->uri->segment(2));
			$this->load->view('book/index', $data);
		}

}

/* End of file book.php */
/* Location: ./application/controllers/book.php */