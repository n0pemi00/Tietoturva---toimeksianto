<?php

function createDbConnection(){

    try{
        $dbcon = new PDO('mysql:host=localhost;dbname=n0pemi00', 'root', '');
        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo '<br>'.$e->getMessage();
    }

    return $dbcon;
}

function createUser(PDO $dbcon, $username, $passwd){

    $username = filter_var($username, FILTER_SANITIZE_STRING);
    $passwd = filter_var($passwd, FILTER_SANITIZE_STRING);

    try{
        $hash_pw = password_hash($passwd, PASSWORD_DEFAULT);
        $sql = "INSERT IGNORE INTO account VALUES (?,?)";
        $prepare = $dbcon->prepare($sql);
        $prepare->execute(array($username, $hash_pw));

    }catch(PDOException $e){
        echo '<br>'.$e->getMessage();
    }
}

function checkUser(PDO $dbcon, $username, $password){


    $username = filter_var($username, FILTER_SANITIZE_STRING);
    $password = filter_var($password, FILTER_SANITIZE_STRING);

    try{
        $sql = "SELECT password FROM account WHERE username=?";
        $prepare = $dbcon->prepare($sql);
        $prepare->execute(array($username));

        $rows = $prepare->fetchAll();
 
        foreach($rows as $row){
            $pw = $row["password"];
            if( password_verify($password, $pw) ){
                return true;
            }
        }

        return false;

    }catch(PDOException $e){
        echo '<br>'.$e->getMessage();
    }
}

function addinfo(PDO $dbcon, $username, $address, $phone, $city, $zip){

    $username = filter_var($username, FILTER_SANITIZE_STRING);
    $address = filter_var($address, FILTER_SANITIZE_STRING);
    $phone = filter_var($phone, FILTER_SANITIZE_STRING);
    $city = filter_var($city, FILTER_SANITIZE_STRING);
    $zip = filter_var($zip, FILTER_SANITIZE_STRING);
    

    try{
        $sql = "INSERT IGNORE INTO info VALUES (?,?,?,?,?)";
        $prepare = $dbcon->prepare($sql);
        $prepare->execute(array($username,$address,$phone,$city,$zip));

    }catch(PDOException $e){
        echo '<br>'.$e->getMessage();
    }
}

?>
