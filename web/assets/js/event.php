<?php 
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

echo file_get_contents('https://sunnahtreasury.onewoorks-solutions.com/event.php');
