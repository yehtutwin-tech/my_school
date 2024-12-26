<?php
include_once '../config/db.php';

function register($conn) {
  if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: register.php');
    exit();
  }

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];
  
  if ($password !== $confirm_password) {
    header('Location: register.php');
    exit();
  }

  $password = password_hash($password, PASSWORD_BCRYPT);
  
  $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

  $conn->query($sql);

  header('Location: login.php');
}

$action = $_GET['action'];

switch ($action) {
  case 'register':
    register($conn);
    break;
  case 'login':
    echo 'login';
    break;
  case 'logout':
    echo 'logout';
    break;
  default:
    echo 'default';
    break;
}
