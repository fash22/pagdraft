<?php
$login = [
	['','Login','/pagdraft'],
	['register','Register','?page=register'],
	['about','About','?page=about']
];

$admin = [
	['','Home','/pagdraft'],
	['users','Manage Users','?page=users'],
];
$nurse = [
	['','Home','/pagdraft'],
];
$patient = [
	['','Home','/pagdraft'],
];

$prefix = '';

$nav = $login;
if (isset($_SESSION['id'])){
	switch ($_SESSION['account_type']) {
		case 0:
			$nav = $admin;
		break;
		case 1:
			$nav = $nurse;
		break;
		case 2:
			$nav = $patient;
		break;
	}
	
}

print '<ul>';
foreach ($nav as $key => $value) {
	if ($_GET['page'] == $value[0]){
		print '<li><a href="'.$prefix.$value[2].'" class="active">'.$value[1].'</a></li>';
	}else{
		print '<li><a href="'.$prefix.$value[2].'">'.$value[1].'</a></li>';
	}
}
print '</ul>';

if (isset($_SESSION['id'])){
	print '<ul><li><a href="#" id="logout">Logout</a></li></ul>';
}
?>