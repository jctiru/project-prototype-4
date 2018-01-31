<?php
class Orders extends Controller
{
	// Old Index
	//    public function index(){
	// 	// Get all orders of customer
	// 	$orders = $this->orderModel->getOrdersById($_SESSION['user_id']);
	// 	$data = [
	// 		'orders' => $orders,
	// 	];
	// 	$this->view('orders/index', $data);
	// }

    public function __construct()
    {
        $this->bookModel = $this->model('Book');
        $this->orderModel = $this->model('Order');
    }

    public function index(){
		$this->page();
	}

	public function page($page=1){
		// Check if there is logged-in user
		if(isset($_SESSION['user_id'])){
			// Page number
			$page = $page;
			// Number of items per page 
			$limit = 5;
	  		// How may adjacent page links should be shown on each side of the current page link.
	  		$adjacents = 2;	
			// Get total rows
			// Check if admin
			if(isset($_SESSION['admin_mode'])){
				$this->orderModel->getOrders();
			} else {
				$this->orderModel->getOrdersById(intval($_SESSION['user_id']));
			}
			$totalRows = $this->orderModel->getRowCount();
	  		// Compute total pages rounded up
	  		$totalPages = ceil($totalRows / $limit);
	  		// Compute for the offset
	        $offset = $limit * ($page-1);

	        //Here we generates the range of the page numbers which will display.
	      	if($totalPages <= (1+($adjacents * 2))) {
	        	$start = 1;
	        	$end   = $totalPages;
	      	} else {
	        	if(($page - $adjacents) > 1) { 
	          		if(($page + $adjacents) < $totalPages) { 
	            		$start = ($page - $adjacents);            
	            		$end   = ($page + $adjacents);         
	          		} else {             
	            		$start = ($totalPages - (1+($adjacents*2)));  
	            		$end   = $totalPages;               
	         		}
	        	} else {               
	          		$start = 1;                                
	          		$end   = (1+($adjacents * 2));             
	        	}
	      	}
	      	//If you want to display all page links in the pagination then
	    	//uncomment the following two lines
		    //and comment out the whole if condition just above it.
		    // $start = 1;
		    // $end = $totalPages;

		    // Get orders of customer
		    // Check if admin
		    if(isset($_SESSION['admin_mode'])){
		    	$orders = $this->orderModel->getOrdersByPagination($offset, $limit);
		    } else {
		    	$orders = $this->orderModel->getOrdersByIdPagination($offset, $limit, $_SESSION['user_id']);
		    }
			$data = [
				'orders' => $orders,
				'page' => $page,
				'start' => $start,
				'end' => $end,
				'totalPages' => $totalPages
			];

			$this->view('orders/index', $data);
		} else {
			redirect('');
		}
	}

	public function show($id){
		// Check if there is logged-in user
		if(isset($_SESSION['user_id'])){
			$order = $this->orderModel->getOrderById($id);
			// Check if admin
			if(!isset($_SESSION['admin_mode'])){
				$customerId = $this->orderModel->getCustomerId($_SESSION['user_id']);
			}
			// Check if admin or correct customer
			if(isset($_SESSION['admin_mode']) || $customerId == $order->customer_id){
				$orderDetails = $this->orderModel->getOrderDetailsById($id);
				foreach ($orderDetails as $book) {
		            // Set line price
		            $book->linePrice = $book->price * $book->quantity;
		            // Set categories
		            $bookGenres = $this->bookModel->getBookGenresById($book->id);
		            $book->category = [];
		            foreach ($bookGenres as $bookGenre) {
		                $book->category[$bookGenre->genre_id] = $bookGenre->genre;
		            }
				}

				$data = [
					'totalPrice' => $order->total_price,
					'orderDate' => $order->order_date,
					'books' => $orderDetails
				];
				$this->view('orders/show', $data);
			} else {
				redirect('orders');
			}
		} else {
			redirect('');
		}
	}
}
