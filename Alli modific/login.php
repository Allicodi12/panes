<?php
session_start();


if(isset($_SESSION['username'])) {
  header("Location: principal.php"); 
  exit();
}


if(isset($_POST['username']) && isset($_POST['password'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

 
  if($username === "usuario" && $password === "contraseña") {
    $_SESSION['username'] = $username; 
    header("Location: principal.php"); 
    exit();
  } else {
    header("Location: principal.php?error=Credenciales incorrectas"); 
    exit();
  }
}
?>
