<?php
include ('../../core/main.class.php');

$query = $db->QueryAll(" SELECT * FROM users ");

$data = [];
if (!empty($query)){
	foreach ($query as $key => $value) {
		$id = $value['id'];
		switch ($value['account_type']) {
			case 0:
				$type = 'Admin';
			break;
			case 1:
				$type = 'Nurse';
			break;
			case 2:
				$type = 'Patient';
			break;	
		}
		$username = $value['username'];
		$last = $value['last_name'];
		$first = $value['first_name'];
		$middle = $value['middle_name'];

		$data[] = [
			$id,
			$type,
			$username,
			$last,
			$first,
			$middle
		];
	}
}

print json_encode([
	'data' => $data
]);	