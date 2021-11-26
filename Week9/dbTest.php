<?php
 $host = 'localhost';
 $username = 'junnoyu';
 $password = 'Junno0253';
try 
{
 $conn = new PDO("mysql:host=$host", $username, $password);
 echo "Connected to $host successfully.";
 createDatabase("mydb");
 createTables("mydb");
 addUser("Scott","Jonathan", "scottj@gmail.com","scott1234");
 addUser("Boris","Jonathan", "borisj@gmail.com","boris1234");
 getUser("1");
 getUser("2");
 //dropTable("user");
 authenticateUser("borisj@gmail.com","boris1234");
} 
catch (PDOException $pe) 
{
 die("Could not connect to $host :" . $pe->getMessage());
}


function showDatabases()
{
 $sql = "SHOW DATABASES";
 
 $pdo = new pdo('mysql:host=localhost;', 
 'junnoyu', 'Junno0253');
 $pdo->setAttribute(PDO::ATTR_ERRMODE, 
 PDO::ERRMODE_WARNING);
$stmt = $pdo->prepare($sql);
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
while ($row = $stmt->fetch())
{
print("<h3>" . $row['Database'] . "</h3>");
}
}

function createDatabase($databaseName)
{
 $sql = "CREATE DATABASE IF NOT EXISTS $databaseName";
 
 $pdo = new pdo('mysql:host=localhost;', 
 'junnoyu', 'Junno0253');
 $pdo->setAttribute(PDO::ATTR_ERRMODE, 
 PDO::ERRMODE_WARNING);
$pdo->query($sql);
showDatabases();
}


function createTables($dbName)
{
 $sql = "CREATE TABLE user (
 userId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 forename VARCHAR(30) NOT NULL,
 surname VARCHAR(30) NOT NULL,
 email VARCHAR(30) NOT NULL UNIQUE,
 password VARCHAR(128) NOT NULL)";
 
 $pdo = new pdo('mysql:host=localhost;dbname=' . $dbName . '', 
 'junnoyu', 'Junno0253');
 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
 $pdo->query($sql);
}


function addUser($forename, $surname, $email, $password)
{
 $sql = "INSERT INTO user (forename, surname, email, password)
 VALUES (:forename, :surname, :email, :password)"; //the table name is "user"
 
 $pdo = new pdo('mysql:host=localhost;dbname=mydb', 
 'junnoyu', 'Junno0253');
 $stmt = $pdo->prepare($sql);
 $password = password_hash($password, PASSWORD_DEFAULT);
 $stmt->execute([
 'forename' => $forename,
 'surname' => $surname,
 'email' => $email, 
'password' => $password
 ]);
}


function getUser($id)
{
 $sql = "SELECT forename, surname, email, password
 FROM user
 WHERE userId = :id";
 
 $pdo = new pdo('mysql:host=localhost;dbname=mydb', 
 'junnoyu', 'Junno0253');
 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
 
 $stmt = $pdo->prepare($sql);  //stmt means statement
 $stmt->execute([
 'id' => $id
 ]);
 $stmt->setFetchMode(PDO::FETCH_ASSOC);
 while ($row = $stmt->fetch())
 {
 echo("<br>" . $row['forename'] . " " . $row['surname'] . 
 " " .$row['email'] . " " . $row['password']); 
 } 
}

function dropTable($name)
{
 $sql = "DROP TABLE $name";
 
 $pdo = new pdo('mysql:host=localhost;dbname=mydb', 
 'junnoyu', 'Junno0253');
 
 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
 $pdo->query($sql); 
}

function authenticateUser($email, $password)
{
 $sql = "SELECT password
 FROM user
 WHERE email = :email";
 
 $pdo = new pdo('mysql:host=localhost;dbname=mydb', 
 'junnoyu', 'Junno0253');
 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
 
 $stmt = $pdo->prepare($sql);
 $stmt->execute([
 'email' => $email
 ]);
 $stmt->setFetchMode(PDO::FETCH_ASSOC);
 $row = $stmt->fetch();
 if (password_verify($password, $row['password']))
 echo("authentication successful");
 else
 echo("incorrect email or password");
}







?>
