<?php
$hostname='localhost';
$username='user';
$password='password';

try {
    $pdo = new PDO("mysql:host=$hostname;dbname=database_name",$username,$password);

    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
   
}catch(PDOException $e)
{
    echo $e->getMessage();
}


?> 