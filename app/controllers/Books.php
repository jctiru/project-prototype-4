<?php 
	class Books extends Controller {
		public function __construct(){
			$this->bookModel = $this->model('Book');
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

		public function edit($id){
			// Check if admin
			if($_SESSION['user_is_admin'] == 1){
				// Get existing book from model
				$book = $this->bookModel->getBookById($id);
				$bookGenres = $this->bookModel->getBookGenresById($book->id);
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

					$data = [];
					// Upload directory
					$upload_dir = PUBLICROOT . "/img/";

					// Check if there is uploaded file
					$isThereUploadedFile;
					if(is_uploaded_file($_FILES['image']['tmp_name'])){
						$isThereUploadedFile = true;
					} else {
						$isThereUploadedFile = false;
					}
					if($isThereUploadedFile){
						$data = [
							'id' => $id,
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

						// For checking if image already exists 
						$target_file = $upload_dir . basename($data['image']);
						// Get file extension
						$imgExt = strtolower(pathinfo($data['image'],PATHINFO_EXTENSION));
						// Valid extensions
						$valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
						// Check image uploaded
						if (!in_array($imgExt, $valid_extensions)) {
							$data['image_err'] = "Please upload valid image (jpeg, jpg, png, gif)";
						} elseif (file_exists($target_file)){
							$data['image_err'] = "Image already exists";
						}
					} else {
						$data = [
							'id' => $id,
							'image' => $book->image,					
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
					}	

					// Validate data
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
						// Update book in database
						if($this->bookModel->updateBook($data)){
							// Copy upload file to system

							// Check if there is uploaded file
							if($isThereUploadedFile){
								// Delete old image
								unlink($upload_dir . $book->image);
								// Copy new image
								move_uploaded_file($data['image_dir'], $upload_dir . $data['image']);
							}

							flash('book_message', 'Book Updated');
							redirect('books');
						} else {
							die("Something went wrong");
						}
					} else {
						// Load view with error
						$this->view('books/edit', $data);
					}
				} else {
					// Set checkboxes state
					$genresChecked = [];
					foreach($bookGenres as $genre){
						$genresChecked[$genre->genre_id] = "checked";
					}
					foreach ($genresList as $genre) {
						if(!isset($genresChecked[$genre->id])){
							$genresChecked[$genre->id] = "";
						}
					}

					$data = [
						'id' => $id,
						'image' => $book->image,
						'name' => $book->name,
						'description' => $book->description,
						'price' => $book->price ,
						'genres' => $genresList,
						'genresChecked' => $genresChecked
					];
					$this->view('books/edit', $data);	
				}
			} else {
				redirect('');
			}
		}

		public function show($id){
			$book = $this->bookModel->getBookById($id);
			$bookGenres = $this->bookModel->getBookGenresById($book->id);
			$book->category = [];
			foreach ($bookGenres as $bookGenre) {
				$book->category[$bookGenre->genre_id] = $bookGenre->genre;
			}
			$data = [
				'book' => $book,
			];
			$this->view('books/show', $data);
		}

		public function delete($id){
			// Check if admin
			if($_SESSION['user_is_admin'] == 1){
				if($_SERVER["REQUEST_METHOD"] == 'POST'){
					// Get existing book from model
					$book = $this->bookModel->getBookById($id);
					if($this->bookModel->deleteBook($id)){
						// Delete local image
						unlink(PUBLICROOT . "/img/" . $book->image);
						flash('book_message', 'Book Removed');
						redirect('books');
					} else {
						die('Something went wrong');
					}
				} else {
					redirect('books');
				}
			} else {
				redirect('');
			}
		}

	}
 ?>