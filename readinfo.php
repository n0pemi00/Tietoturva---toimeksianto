<?php
session_start();
require_once('functions.php');
require ('headers.php');

$html = "";

if(isset($_SESSION["user"])){

        $conn = createDbConnection();

        $sql = "SELECT * FROM `info`
        WHERE username LIKE '%" . $_SESSION["user"] . "%'";

        $prepare = $conn->prepare($sql);
        $prepare->execute();
        $rows = $prepare->fetchAll();
    
        $html .= '<ul>';
    
        foreach($rows as $row) {
    
            $html .= '<li>' . $row['username'] . '</li>';
            $html .= '<li>' . $row['address'] . '</li>';
            $html .= '<li>' . $row['phone'] . '</li>';
            $html .= '<li>' . $row['city'] . '</li>';
            $html .= '<li>' . $row['zip'] . '</li>';
        }
        $html .= '</ul>';
        echo $html;
    exit;
}
echo "Log In";
?>