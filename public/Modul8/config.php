<?php
/*
define('DBSERVER', 'localhost'); //database server
define('DBUSERNAME', 'root'); //database username
define('DBPASSWORD', ''); //database password
define('DBNAME', 'demo'); //database name
*/
define('MYSQL_VERT', 'db');
define('MYSQL_BRUKER', 'dbuser');
define('MYSQL_PASSORD', 'BACIT2020');
define('MYSQL_DB', 'ergotests');


/* connect to MySQL database */
//$db = mysqli_connect(DBSERVER, DBUSERNAME, DBPASSWORD, DBNAME);
$db = mysqli_connect(MYSQL_VERT, MYSQL_BRUKER, MYSQL_PASSORD, MYSQL_DB);
// check db connection
if($db === false){
    die("Error: connection error. " . mysqli_connection_error());
}
?>