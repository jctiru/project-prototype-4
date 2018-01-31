<?php
class Orders extends Controller
{
    public function __construct()
    {
        $this->bookModel = $this->model('Book');
        $this->orderModel = $this->model('Order');
    }

    public function index(){
		// Get all orders of customer
		$orders = $this->orderModel->getOrdersById($_SESSION['user_id']);
		$data = [
			'orders' => $orders,
		];
		$this->view('orders/index', $data);
	}

	public function show($id){
		$order = $this->orderModel->getOrderById($id);
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
	}
}
