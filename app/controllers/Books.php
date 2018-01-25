<?php 
	class Books extends Controller {
		public function __construct(){
			$this->bookModel = $this->model('Book');
			$this->userModel = $this->model('User');
		}

		public function index(){
			// Get books
			$books= $this->bookModel->getBooks();
			foreach ($books as $book) {
				$bookGenres = $this->bookModel->getBookGenresById($book->id);
				$book->category = [];
				foreach ($bookGenres as $bookGenre) {
					// array_push($book->category, $bookGenre->genre);
					$book->category[$bookGenre->genre_id] = $bookGenre->genre;
				}
			}
			$data = [
				'books' => $books 
			];
			$this->view('books/index', $data);
		}

		public function add(){
			// Check if admin
			if($_SESSION['user_is_admin'] == 1){
				$genresList = $this->bookModel->getGenresList();
				if($_SERVER['REQUEST_METHOD'] == 'POST'){
					// Sanitize POST array
					$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

					// Set checkboxes state
					$genresChecked = [];
					foreach ($genresList as $genre) {
						if(isset($_POST[$genre->id])){
							$genresChecked[$genre->id] = "checked";
						} else {
							$genresChecked[$genre->id] = "";
						}
					}				

					$data = [
						'image' => $_FILES['image']['name'],
						'image_dir' => $_FILES['image']['tmp_name'],
						'name' => trim($_POST['name']),
						'description' => trim($_POST['description']),
						'price' => $_POST['price'],
						'image_err' => '',
						'name_err' => '',
						'description_err' => '',
						'price_err' => '',
						'genres' => $genresList,
						'genresChecked' => $genresChecked
					];

					// Upload directory
					$upload_dir = PUBLICROOT . "/img/";
					// For checking if image already exists 
					$target_file = $upload_dir . basename($data['image']);
					// Get file extension
					$imgExt = strtolower(pathinfo($data['image'],PATHINFO_EXTENSION));
					// Valid extensions
					$valid_extensions = array('jpeg', 'jpg', 'png', 'gif');

					// Validate data
					if(empty($data['image'])){
						$data['image_err'] = "Please upload image";
					} elseif (!in_array($imgExt, $valid_extensions)) {
						$data['image_err'] = "Please upload valid image (jpeg, jpg, png, gif)";
					} elseif (file_exists($target_file)){
						$data['image_err'] = "Image already exists";
					}
					if(empty($data['name'])){
						$data['name_err'] = "Please enter name";
					}
					if(empty($data['description'])){
						$data['description_err'] = "Please enter description";
					}
					if(empty($data['price'])){
						$data['price_err'] = "Please enter price";
					}

					// Make sure no errors
					if(empty($data['image_err']) && empty($data['name_err']) && empty($data['name_err']) && empty($data['description_err']) && empty($data['price_err'])){
						// Validated

						// Add book to database
						if($this->bookModel->addBook($data)){
							// Copy upload file to system
							move_uploaded_file($data['image_dir'], $upload_dir . $data['image']);

							flash('book_message', 'Book Added');
							redirect('books');
						} else {
							die("Something went wrong");
						}
					} else {
						// Load view with error
						$this->view('books/add', $data);
					}
				} else {
					$genresChecked = [];
					foreach ($genresList as $genre) {
						$genresChecked[$genre->id] = "";
					}
					$data = [
						'name' => '',
						'description' => '',
						'price' => '' ,
						'genres' => $genresList,
						'genresChecked' => $genresChecked
					];
					$this->view('books/add', $data);	
				}
			} else {
				redirect('');
			}
		}

		// public function edit($id){
		// 	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		// 		// Sanitize POST array
		// 		$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		// 		$data = [
		// 			'id' => $id,
		// 			'title' => trim($_POST['title']),
		// 			'body' => trim($_POST['body']),
		// 			'user_id' => $_SESSION['user_id'],
		// 			'title_err' => '',
		// 			'body_err' => ''
		// 		];

		// 		// Validate data
		// 		if(empty($data['title'])){
		// 			$data['title_err'] = "Please enter title";
		// 		}
		// 		if(empty($data['body'])){
		// 			$data['body_err'] = "Please enter body text";
		// 		}

		// 		// Make sure no errors
		// 		if(empty($data['title_err']) && empty($data['body_err'])){
		// 			// Validated
		// 			if($this->postModel->updatePost($data)){
		// 				flash('post_message', 'Post Updated');
		// 				redirect('posts');
		// 			} else {
		// 				die("Something went wrong");
		// 			}
		// 		} else {
		// 			// Load view with error
		// 			$this->view('posts/edit', $data);
		// 		}
		// 	} else {
		// 		// Get existing post from model
		// 		$post = $this->postModel->getPostById($id);
		// 		// Check for owner
		// 		if($post->user_id != $_SESSION['user_id']){
		// 			redirect('posts');
		// 		}
		// 		$data = [
		// 			'id' => $id,
		// 			'title' => $post->title,
		// 			'body' => $post->body, 
		// 		];

		// 		$this->view('posts/edit', $data);	
		// 	}
		// }

		public function show($id){
			$book = $this->bookModel->getBookById($id);
			$bookGenres = $this->bookModel->getBookGenresById($book->id);
			$book->category = [];
			foreach ($bookGenres as $bookGenre) {
				// array_push($book->category, $bookGenre->genre);
				$book->category[$bookGenre->genre_id] = $bookGenre->genre;
			}
			$data = [
				'book' => $book,
			];
			$this->view('books/show', $data);
		}

		// public function delete($id){
		// 	if($_SERVER["REQUEST_METHOD"] == 'POST'){
		// 		// Get existing post from model
		// 		$post = $this->postModel->getPostById($id);

		// 		// Check for owner
		// 		if($post->user_id != $_SESSION['user_id']){
		// 			redirect('posts');
		// 		}
				
		// 		if($this->postModel->deletePost($id)){
		// 			flash('post_message', 'Post Removed');
		// 			redirect('posts');
		// 		} else {
		// 			die('Something went wrong');
		// 		}
		// 	} else {
		// 		redirect('posts');
		// 	}
		// }
	}
 ?>