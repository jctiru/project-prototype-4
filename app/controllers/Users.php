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

    public function ajaxcart()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $index = $_POST['index'];
            if (isset($_SESSION['cart'][$index])) {
                $_SESSION['cart'][$index] += 1;
            } else {
                $_SESSION['cart'][$index] = 1;
            }
            echo array_sum($_SESSION['cart']);
        }
    }

    public function cart()
    {
        if (isset($_SESSION['cart'])) {
            $bookIdArray = [];
            foreach ($_SESSION['cart'] as $key => $value) {
                array_push($bookIdArray, $key);
            }
            $books = $this->bookModel->getMultipleBooksById($bookIdArray);

            // Set line price
            foreach ($books as $book) {
                $book->linePrice = intval($book->price) * intval($_SESSION['cart'][$book->id]);
            }

            // Set total price
            $totalPrice = 0;
            foreach ($books as $book) {
                // Add all line price
                $totalPrice += $book->linePrice;
            }

            $data  = [
                'books' => $books,
                'totalPrice' => $totalPrice
            ];
            // Load view
            $this->view('users/cart', $data);
        } else {
            $data = [];
            // Load empty view
            $this->view('users/cart', $data);
        }

        
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
