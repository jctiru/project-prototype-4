<?php 
	// Simple page redirect
	function redirect($page){
		header('location: '. URLROOT . '/' . $page);
	}

	// DEFINE pagination query URL
	if(isset($_GET['novel-search'])){
		define('GETQRY', '?novel-search='.$_GET['novel-search'].'&novel-genre='.$_GET['novel-genre']);
	}
 ?>