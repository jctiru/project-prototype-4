<?php
class Orders extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
        $this->bookModel = $this->model('Book');
        $this->orderModel = $this->model('Order');
    }
}
