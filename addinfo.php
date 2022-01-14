<?php
session_start();
require_once('functions.php');
require ('headers.php');

if(isset($_SESSION["user"])){
    //addinfo(createDbConnection(), "qwe", "tie","654321","oulu","90120");
    exit;
}
echo "Log In";
?>