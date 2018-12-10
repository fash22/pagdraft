<?php
include ('../../core/main.class.php');

$user = $db->QueryOne(" SELECT * FROM users WHERE username = ? ",[$_GET['username']]);

if (!empty($user)){
	if (!password_verify($_GET['password'],$user['password'])){
		print json_encode(['error' => true, 'message' => 'Wrong Username or Password!']);
		die();
	}

	$_SESSION['id'] = $user['id'];
	$_SESSION['username'] = $user['username'];
	$_SESSION['first_name'] = $user['first_name'];
	$_SESSION['middle_name'] = $user['middle_name'];
	$_SESSION['last_name'] = $user['last_name'];
	$_SESSION['gender'] = $user['gender'];
	$_SESSION['age'] = $user['age'];
	$_SESSION['account_type'] = $user['account_type'];
}

print json_encode(['error' => false]);