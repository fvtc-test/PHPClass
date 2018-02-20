<?php
/* FIRST:
    * Add this code to an includes/config.php
    */
// Make Database Connection
//put in your IP address for host
$dsn = 'mysql:host=localhost;dbname=phpclass';
$username = 'dbuser';
$password = 'dbdev123';
$options = array(
    // google  mysql pdo throw exception - copy this from the page
    //if there were options we could comma separate it
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);

?>