<?php  
 $host = 'localhost';
 $username = 'junnoyu';
 $password = 'Junno0253';
 $em = $_GET['getemail'];
 $pass = $_GET['getpassword'];
try 
{
 $conn = new PDO("mysql:host=$host", $username, $password);
 echo "Connected to $host successfully.";
 authenticateUser($em,$pass);
} 
catch (PDOException $pe) 
{
 die("Could not connect to $host :" . $pe->getMessage());
}


function authenticateUser($email, $password)
{
 $sql = "SELECT *
 FROM user
 WHERE email = :email";
 
 $pdo = new pdo('mysql:host=localhost;dbname=registrationDatabase', 
 'junnoyu', 'Junno0253');
 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
 
 $stmt = $pdo->prepare($sql);
 $stmt->execute([
 'email' => $email
 ]);
 $stmt->setFetchMode(PDO::FETCH_ASSOC);
 $row = $stmt->fetch();
 if (password_verify($password, $row['password']))
 echo("<br>" . $row['forename'] . " " . $row['surname']);
 else
 echo("incorrect email or password");
}







?>
