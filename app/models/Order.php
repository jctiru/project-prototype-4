<?php 
	class Order {
		private $db;

		public function __construct(){
			$this->db = new Database();	
		}

		public function addOrder($data){
			// $data[] = ['userId','books','totalPrice']
			$customerId = $this->getCustomerId($data['userId']);
			$this->db->query("INSERT INTO orders (customer_id, total) VALUES (:customer_id, :total)");
			$this->db->bind(":customer_id", $customerId);
			$this->db->bind(":total", $data['totalPrice']);
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

		private function getCustomerId($userId){
			$this->db->query("SELECT * FROM customers WHERE user_id = :user_id");
			$this->db->bind(":user_id", $userId);
			$result = $this->db->single();
			return $result->id;
		}
	}
 ?>