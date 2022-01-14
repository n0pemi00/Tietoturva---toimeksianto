<?php
session_start();
require ('functions.php');
require ('headers.php');
if ( isset($_SERVER['PHP_AUTH_USER'])){
    if(checkUser(createDbConnection(),$_SERVER['PHP_AUTH_USER'],$_SERVER['PHP_AUTH_PW'])){
        $_SESSION["user"] = $_SERVER['PHP_AUTH_USER'];
        echo "Welcome";
        exit;
    }
}
header('WWW-Authenticate: Basic');
echo "Cannot Log In";
header('Content-Type: application/json');
header('HTTP/1.1 401');
exit;
// createUser(createDbConnection(), "qwe", "456");
// createUser(createDbConnection(), "asd", "123");
// createUser(createDbConnection(), "mattimeikalainen", "salasana");
// createUser(createDbConnection(), "lyhyt", "toimiiko");

?>