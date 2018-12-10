<?php
include ('../../core/main.class.php');

$db->Query(" INSERT INTO users (username,password,first_name,middle_name,last_name,gender,age,account_type) VALUES (?,?,?,?,?,?,?,?) ",[
	$_POST['username'],
	password_hash($_POST['password'], PASSWORD_DEFAULT),
	$_POST['fname'],
	$_POST['mname'],
	$_POST['lname'],
	$_POST['gender'],
	$_POST['age'],
	$_POST['account']
]);

print json_encode(['error' => false]);