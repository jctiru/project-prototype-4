<?php 
	class Book {
		private $db;

		public function __construct(){
			$this->db = new Database();	
		}

		public function getBooks(){
			$this->db->query("SELECT * FROM items ORDER BY created_at DESC");
			$results = $this->db->resultSet();
			return $results;
		}

		public function getBookGenresById($id){
			$this->db->query("SELECT items.name, genre_id, genre FROM items JOIN items_genres ON items.id = items_genres.item_id JOIN genres ON items_genres.genre_id = genres.id WHERE items.id = :id");
			$this->db->bind(':id', $id);
			$results = $this->db->resultSet();
			return $results;
		}

		public function getGenresList(){
			$this->db->query("SELECT * FROM genres");
			$results = $this->db->resultSet();
			return $results;
		}

		public function addBook($data){
			$this->db->query("INSERT INTO items (name, description, price, image) VALUES (:name, :description, :price, :image)");
			// Bind values
			$this->db->bind(":name", $data['name']);
			$this->db->bind(":description", $data['description']);
			$this->db->bind(":price", $data['price']);
			$this->db->bind(":image", $data['image']);
			// Execute
			if($this->db->execute()){

				// Insert genres of items into items_genres table
				$id = $this->db->getLastInsertId();
				$this->db->query("INSERT INTO items_genres (item_id, genre_id) VALUES (:item_id, :genre_id)");
				$this->db->bind(":item_id", $id);
				foreach ($data['genresChecked'] as $genreKey => $genre) {
					if(!empty($genre)){
						$this->db->bind(":genre_id" , $genreKey);
						$this->db->execute();
					}
				}
				return true;
			} else {
				return false;
			}
		}

		// public function updatePost($data){
		// 	$this->db->query("UPDATE posts SET title = :title, body = :body WHERE id = :id");
		// 	// Bind values
		// 	$this->db->bind(":id", $data['id']);
		// 	$this->db->bind(":title", $data['title']);
		// 	$this->db->bind(":body", $data['body']);
		// 	// Execute
		// 	if($this->db->execute()){
		// 		return true;
		// 	} else {
		// 		return false;
		// 	}
		// }

		public function getBookById($id){
			$this->db->query("SELECT * FROM items WHERE id = :id");
			$this->db->bind(":id", $id);

			$row = $this->db->single();

			return $row;
		}

		// public function deletePost($id){
		// 	$this->db->query("DELETE FROM posts WHERE id = :id");
		// 	// Bind values
		// 	$this->db->bind(":id", $id);
		// 	// Execute
		// 	if($this->db->execute()){
		// 		return true;
		// 	} else {
		// 		return false;
		// 	}	
		// }
	}
 ?>