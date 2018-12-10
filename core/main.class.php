<?php
if (!isset($_SESSION)){
	session_start();
}

class application{
	function getPage($page = null){
		switch ($page) {
			case 'register':
				include('views/users/add-user.php');
				break;
			case 'users':
				include('views/users/user-list.php');
				break;
			break;
			default:
				if (isset($_SESSION['id'])){
					include('views/home/home.php');
				}else{
					include('views/login/login.php');
				}
				break;
		}
	}

	function getTitle($page = null){
		switch ($page) {
			case 'register':
				$title = 'Add User';
				break;
			case 'users':
				$title = 'User Management';
				break;
			break;
			default:
				if (isset($_SESSION['id'])){
					$title = 'Home';
				}else{
					$title = 'Paglaum Login';
				}
				break;
		}

		print $title;
	}
}

include('database.php');

$db = new database();
$app = new application();