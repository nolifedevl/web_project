<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class blog extends Module {

	public function index($id = 0)
	{
        if($id > 0) {
            $this->read($id);
            return;
        }
        $this->load->model("posts");
        $this->load->model('users');

        $posts = $this->posts->search();

        foreach($posts as &$post)
        {
            $user = $this->users->get_by_id($post->author);
            $post_array = (array)$post;
            $post = (object) array_merge( (array)$post_array, array( 'author' => $user ) );
        }
        $data['post'] = $posts;


		$this->load->view('blog_index', $data);
        return;
	}
    public function read($id)
    {
        $this->load->model("posts");
        $this->load->model("users");
        $post = $this->posts->get($id);



        $user = $this->users->get_by_id($post->author);
        $post_array = (array)$post;
        unset($post_array['author']);
        $obj = (object) array_merge( (array)$post_array, array( 'author' => $user ) );

        $data['post'] = $obj;
        $this->load->view('blog_entry', $data);
    }
    public function query($string){
        if(intval($string) != $string)
        {

        }else
            $this->read($string);

    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */