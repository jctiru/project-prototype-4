<?php 
	class Pages extends Controller {
		public function __construct(){

		}

		public function index(){
			// if(isLoggedIn()){
			// 	redirect('posts');
			// }
			$data = [
				'title'=> 'Welcome to LN Shop!'
			];
			$this->view('pages/index', $data);
		}

		public function about(){
			$data = ['title'=> 'About US'];
			$this->view('pages/about', $data);
		}
	}
 ?>