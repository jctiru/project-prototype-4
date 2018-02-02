<?php 
	if (session_status() == PHP_SESSION_NONE) {
            session_start();
    }
	// Flash message helper
	// Example - flash('register_success', 'You are now registered', 'alert alert-danger');
	// Display in View - echo flash('register_success');
	function flash($name = '', $message = '', $class ='alert alert-success alert-dismissible fade show'){
		if(!empty($name)){
			if(!empty($message) && empty($_SESSION[$name])){
				if(!empty($_SESSION[$name])){
					unset($_SESSION[$name]);
				}

				if(!empty($_SESSION[$name. '_class'])){
					unset($_SESSION[$name. '_class']);
				}

				$_SESSION[$name] = $message;
				$_SESSION[$name. '_class'] = $class;
			} elseif(empty($message) && !empty($_SESSION[$name])){
				$class = !empty($_SESSION[$name. '_class']) ? $_SESSION[$name. '_class'] : '';
				echo '<div class="'.$class.'" id="msg-flash"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>'.$_SESSION[$name]. '</strong></div>';
				unset($_SESSION[$name]);
				unset($_SESSION[$name . '_class']);
			}
		}
	}

	// Check if Logged in
	function isLoggedIn(){
		if(isset($_SESSION['user_id'])){
			return true;
		} else {
			return false;
		}
	}

 ?>