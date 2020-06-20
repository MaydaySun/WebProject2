<?php
define('DBHOST', 'localhost');
define('DBNAME', 'travels');
define('DBUSER', 'root');
define('DBPASS', '.20010727bth.');
define('DBCONNSTRING', 'mysql:host=localhost;dbname=travels');

//加盐后用md5散列
function do_hash($pwd) {
    $salt = '1rha2Md4g3te';
    return md5($pwd.$salt);
}

?>