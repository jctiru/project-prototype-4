<?php 
	class Pages extends Controller {
		public function __construct(){
			$this->bookModel = $this->model('Book');
		}

		public function index(){
			// Get random books 
			$books= $this->bookModel->getRandomBooks();
			foreach ($books as $book) {
				$bookGenres = $this->bookModel->getBookGenresById($book->id);
				$book->category = [];
				foreach ($bookGenres as $bookGenre) {
					$book->category[$bookGenre->genre_id] = $bookGenre->genre;
				}
			}
			$data = [
				'books' => $books
			];
			$this->view('pages/index', $data);
		}

		public function about(){
			$data = [
				// 'title'=> 'About US'
			];
			$this->view('pages/about', $data);
		}
	}
 ?>