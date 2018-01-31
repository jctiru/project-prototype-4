<?php 
	class Order {
		private $db;

		public function __construct(){
			$this->db = new Database();	
		}

		public function getOrders(){
			$this->db->query("SELECT * FROM orders");
			$results = $this->db->resultSet();
			return $results;
		}

		public function getOrdersById($userId){
			$customerId = $this->getCustomerId($userId);
			$this->db->query("SELECT * FROM orders WHERE customer_id = :customer_id ORDER BY order_date DESC");
			$this->db->bind(":customer_id", $customerId);
			$results = $this->db->resultSet();
			return $results;
		}

		public function getOrdersByPagination($offset, $limiter){
			$this->db->query("SELECT * FROM orders ORDER BY order_date DESC LIMIT :offset, :limiter");
			// Bind values
			$this->db->bind(":offset", $offset);
			$this->db->bind(":limiter", $limiter);
			$results = $this->db->resultSet();
			return $results;
		}

		public function getOrdersByIdPagination($offset, $limiter, $userId){
			$customerId = $this->getCustomerId($userId);
			$this->db->query("SELECT * FROM orders WHERE customer_id = :customer_id ORDER BY order_date DESC LIMIT :offset, :limiter");
			// Bind values
			$this->db->bind(":offset", $offset);
			$this->db->bind(":limiter", $limiter);
			$this->db->bind(":customer_id", $customerId);
			$results = $this->db->resultSet();
			return $results;
		}

		public function getRowCount(){
			return $this->db->rowCount();
		}

		public function getOrderDetailsById($orderId){
			$this->db->query("SELECT order_details.order_id, items.id, order_details.quantity, items.name, items.description, items.price, items.image FROM orders JOIN order_details ON orders.id = order_details.order_id JOIN items ON order_details.item_id = items.id WHERE orders.id = :order_id");
			$this->db->bind(":order_id", $orderId);
			$results = $this->db->resultSet();
			return $results;
		}

		public function getOrderById($orderId){
			$this->db->query("SELECT * FROM orders WHERE id = :order_id");
			$this->db->bind(":order_id", $orderId);
			$result = $this->db->single();
			return $result;
		}

		public function addOrder($data){
			// $data[] = ['userId','books','totalPrice']
			$customerId = $this->getCustomerId($data['userId']);
			$this->db->query("INSERT INTO orders (customer_id, total_price) VALUES (:customer_id, :total_price)");
			$this->db->bind(":customer_id", $customerId);
			$this->db->bind(":total_price", $data['totalPrice']);
			// Execute
			if($this->db->execute()){
				// Insert order details
				$order_id = $this->db->getLastInsertId();
				$this->db->query("INSERT INTO order_details (order_id, item_id, quantity) VALUES (:order_id, :item_id, :quantity)");
				$this->db->bind(":order_id", $order_id);
				foreach ($data['books'] as $book) {
					$this->db->bind(":item_id", $book->id);
					$this->db->bind(":quantity", $book->quantity);
					$this->db->execute();
				}
				return true;
			} else {
				return false;
			}
		}

		public function getCustomerId($userId){
			$this->db->query("SELECT * FROM customers WHERE user_id = :user_id");
			$this->db->bind(":user_id", $userId);
			$result = $this->db->single();
			return $result->id;
		}
	}
 ?>