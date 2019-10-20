<?php
include 'mad5.php';

$servername = 'localhost';
$username = 'root';
$pass = '';
$dbname = 'md5hash';

$login = $_POST['login'];
$password = $_POST['password'];
$tmp = MD($password);

$connect = new mysqli($servername, $username, $pass, $dbname)
or die("Error with connection: ".$connect->error());
$sql = "INSERT INTO person (login, password) VALUES ('$login','$tmp')";
$result = $connect->query($sql);

if($result === TRUE) {
    echo 'password: '. $password.'<br>';
    echo 'md5 pass: '. $tmp;
}
else {
  echo "<script>alert('Record is not created. Try again');
  window.location = 'index.html';</script>";
}

$connect->close();