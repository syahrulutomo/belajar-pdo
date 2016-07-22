<?php

    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $db_name = 'pdo_tuts';
    
    try 
    {    
        $conn = new PDO("mysql:host=$server;dbname=$db_name", $user, $pass);
    } 
    catch (PDOException $exc) 
    {
        echo $exc->getMessage();
    }
    
    $result = $conn->query("SELECT * FROM users");
    
    while($row = $result->fetch())
    {
        echo $row['username'] . '<br>';
    }
	
?>
