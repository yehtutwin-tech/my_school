<?php
session_start();
include_once '../config/db.php';

function logout() {
  session_destroy();
  header('Location: login.php');
}

function login($conn) {
  if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: register.php');
    exit();
  }

  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM users WHERE email = '$email'";

  $result = $conn->query($sql);

  $row = $result->fetch_assoc();

  if (!$row) {
    header('Location: login.php?error=Invalid email or password');
    exit();
  }

  if (!password_verify($password, $row['password'])) {
    header('Location: login.php?error=Invalid email or password');
    exit();
  }
  else {
    $_SESSION['isLoggedIn'] = true;
    header('Location: ../dashboard/index.php');
  }

}

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
    login($conn);
    break;
  case 'logout':
    logout();
    break;
  default:
    echo 'default';
    break;
}
