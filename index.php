<?php

    //atribut atribut yg diperlukan
    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $db_name = 'pdo_tuts';
    
    //koneksi ke DB
    try 
    {    
        $conn = new PDO("mysql:host=$server;dbname=$db_name", $user, $pass);
    } 
    catch (PDOException $exc) 
    {
        echo $exc->getMessage();
    }
    
    
    //menampilkan data
    $result = $conn->query("SELECT * FROM users");
    $total = $result->rowCount();
    
    
    while($row = $result->fetch(PDO::FETCH_OBJ))
    {
        echo $row->username .'  ' .$row->password . '<br>';
    }
    
    echo 'Total : ' .$total;
    
    
    //prepared statement
    $name = 'irullls';
    $password = '123463';
    
    $sql = "INSERT INTO users(username,password) VALUES(:name,:pass)";
    $query = $conn->prepare($sql);
    
    $params =array(
                    ':name'=>$name,
                    ':pass'=>$password,
                  );
    $params2 =array(
                    ':name'=>'sagejava',
                    ':pass'=>'007',
                  );
    
    $query->execute($params);
    $query->execute($params2); 
    
?>
