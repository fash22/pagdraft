<?php
include ('../../core/main.class.php');

session_destroy();

print json_encode(['error' => false]);