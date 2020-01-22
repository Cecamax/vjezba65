<?php
try{
$servername = "localhost";
$username = "root";
$password = "";

$connection = new PDO ("mysql:host=$servername;dbname=users;port=3307",
$username, $password);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
/*
$sql = "INSERT INTO users (id, name, lastname, nickname) VALUES (NULL, 'Ceca','Max', 'Maki')";
$connection->beginTransaction();
$connection->exec($sql);
$connection->commit();
*/

$name = "Ceca";
$lastname = "Max";
$nickname = "Maki";
$sql = $connection->prepare("INSERT INTO users ( name, lastname, nickname) 
VALUES (:name, :lastname, :nickname)");
$sql->execute([":name" => $name, ":lastname" => $lastname, ":nickname" => $nickname]);


echo "Izvrsen";

}catch(PDOException $e){
    #$connection->rollback();
    echo $e->getMessage();
}

?>