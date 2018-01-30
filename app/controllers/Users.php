<?php
class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
        $this->bookModel = $this->model('Book');
    }

    public function register()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'name'                 => trim($_POST['name']),
                'email'                => trim($_POST['email']),
                'password'             => trim($_POST['password']),
                'confirm_password'     => trim($_POST['confirm_password']),
                'name_err'             => '',
                'email_err'            => '',
                'password_err'         => '',
                'confirm_password_err' => '',
            ];

            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            } else {
                // Check email
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'Email already taken';
                }
            }

            // Validate Name
            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter name';
            }

            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = "Password must be at least 6 characters";
            }

            // Validate Confirm Password
            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please confirm password';
            } else {
                if ($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = 'Passwords do not match';
                }
            }

            // Make sure errors are empty
            if (empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                // Validated

                // Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Register User
                if ($this->userModel->register($data)) {
                    // Notify before redirect
                    flash('register_success', 'You are registered and can log in');
                    redirect('users/login');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('users/register', $data);
            }
        } else {
            // Init data
            $data = [
                'name'                 => '',
                'email'                => '',
                'password'             => '',
                'confirm_password'     => '',
                'name_err'             => '',
                'email_err'            => '',
                'password_err'         => '',
                'confirm_password_err' => '',
            ];

            // Load view
            $this->view('users/register', $data);
        }
    }

    public function login()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'email'        => trim($_POST['email']),
                'password'     => trim($_POST['password']),
                'email_err'    => '',
                'password_err' => '',
            ];

            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }

            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }

            // Check for user/email
            if ($this->userModel->findUserByEmail($data['email'])) {
                // User found
            } else {
                // User not found
                $data['email_err'] = 'No user found';
            }

            // Make sure errors are empty
            if (empty($data['email_err']) && empty($data['password_err'])) {
                // Validated
                // Check and set logged in user
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);
                if ($loggedInUser) {
                    // Create Session
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['password_err'] = 'Password incorrect';
                    $this->view('users/login', $data);
                }
            } else {
                // Load view with errors
                $this->view('users/login', $data);
            }
        } else {
            // Init data
            $data = [
                'email'        => '',
                'password'     => '',
                'email_err'    => '',
                'password_err' => '',
            ];

            // Load view
            $this->view('users/login', $data);
        }
    }

    // Ajax add to cart on shop page
    public function ajaxaddcart()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $index = $_POST['index'];
            if (isset($_SESSION['cart'][$index])) {
                $_SESSION['cart'][$index] += 1;
            } else {
                $_SESSION['cart'][$index] = 1;
            }
            echo array_sum($_SESSION['cart']);
        } else {
            redirect('');
        }
    }

    // Ajax update cart
    public function ajaxupdatecart()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $bookIdArray = [];
            $totalPrice = 0;

            // Update quantities and collect ids
            foreach ($_POST as $key => $value) {
                // Get specific quantity elements from $_POST
                if (strpos($key, 'bookQuantityId_') !== false) {
                    // Strip off id from $_POST['bookQuantityId_X']
                    $id = str_replace('bookQuantityId_', '', $key);
                    // Set new quantities to session
                    $_SESSION['cart'][$id] = $value;
                    // Collect all ids
                    array_push($bookIdArray, intval($id));
                }
            }

            $books = $this->bookModel->getMultipleBooksById($bookIdArray);  
            $books = $this->initializeCartBooks($books);
            $totalPrice = $this->computeTotalPriceCartBooks($books);

            $data = [
                'books'      => $books,
                'totalPrice' => $totalPrice,
                'totalItems' => array_sum($_SESSION['cart']),
            ];

            echo json_encode($data);
        } else {
            redirect('');
        }
    }

    // Ajax delete from cart
    public function ajaxdeletecart()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $bookIdArray = [];
            // Get book ids
            foreach ($_POST as $key => $value) {
                // Get id elements from $_POST
                if (strpos($key, 'bookQuantityId_') !== false) {
                    // Strip off id from $_POST['bookQuantityId_X']
                    $id = str_replace('bookQuantityId_', '', $key);
                    // Collect all ids
                    array_push($bookIdArray, intval($id));
                }
            }

            // Remove item from Session
            unset($_SESSION['cart'][$_POST['bookRowId']]);
            // Remove item from book id array
            $index = array_search($_POST['bookRowId'], $bookIdArray);
            if ($index !== false) {
                unset($bookIdArray[$index]);
                // Re-index array to be used when passed on model
                $bookIdArray = array_values($bookIdArray);
            }

            // Check if there is still items
            if (empty($bookIdArray)) {
                // Remove cart from SESSION
                unset($_SESSION['cart']);
                $data = [
                    'cartEmpty' => true
                ];

            } else {
                $books = $this->bookModel->getMultipleBooksById($bookIdArray);  
                $books = $this->initializeCartBooks($books);
                $totalPrice = $this->computeTotalPriceCartBooks($books);

                $data = [
                    'cartEmpty' => false,
                    'totalPrice' => $totalPrice,
                    'totalItems' => array_sum($_SESSION['cart']),
                ];
            }
            echo json_encode($data);
        } else {
            redirect('');
        }
    }

    // Cart page
    public function cart()
    {
        // Check if there is user logged in
        if (isset($_SESSION['user_id'])) {
            // Check if it is a customer
            if (!isset($_SESSION['admin_mode'])) {
                // Check if there is items in cart
                if (isset($_SESSION['cart'])) {
                    $bookIdArray = [];
                    
                    foreach ($_SESSION['cart'] as $key => $value) {
                        array_push($bookIdArray, $key);
                    }

                    $books = $this->bookModel->getMultipleBooksById($bookIdArray);  
                    $books = $this->initializeCartBooks($books);
                    $totalPrice = $this->computeTotalPriceCartBooks($books);

                    $data = [
                        'books'      => $books,
                        'totalPrice' => $totalPrice,
                    ];

                    // Load view
                    $this->view('users/cart', $data);
                } else {
                    // Empty cart
                    $data = [];
                    // Load empty view
                    $this->view('users/cart', $data);
                }
            } else {
                redirect('books');
            }
        } else {
            redirect('books');
        }
    }

    // Set contents of books to be used on cart page
    private function initializeCartBooks($books){
        $books = $books;
        foreach ($books as $book) {
            // Set line price
            $book->linePrice = intval($book->price) * intval($_SESSION['cart'][$book->id]);
            // Set categories
            $bookGenres = $this->bookModel->getBookGenresById($book->id);
            $book->category = [];
            foreach ($bookGenres as $bookGenre) {
                $book->category[$bookGenre->genre_id] = $bookGenre->genre;
            }
        }
        return $books;
    }

    // Compute for total price on cart page
    private function computeTotalPriceCartBooks($books){
        $totalPrice = 0;
        foreach ($books as $book) {
            // Add all line price
            $totalPrice += $book->linePrice;
        }
        return $totalPrice;
    }

    // Create Session
    public function createUserSession($user)
    {
        $_SESSION['user_id']    = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name']  = $user->name;
        if ($user->is_admin) {
            $_SESSION['admin_mode'] = true;
        }
        redirect('');
    }

    // Log out
    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        unset($_SESSION['admin_mode']);
        session_destroy();
        redirect("");
    }
}
