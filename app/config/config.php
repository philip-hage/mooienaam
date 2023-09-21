<?php
// Database constanten
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'phones');

// Het pad naar de app map
define('APPROOT', dirname(dirname(__FILE__)));

// De URL van de site
define('URLROOT', 'http://localhost/project/');


$var['pool'] = array('_','_','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v', 'w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V','W', 'X', 'Y', 'Z','0', '1', '2','3','4','5','6','7','8','9');
$var['rand'] = $var['pool'][rand(2,63)].$var['pool'][rand(2,63)].$var['pool'][rand(2,63)].$var['pool'][rand(2,63)];

$var['timestamp'] = time();

?>