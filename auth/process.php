<?php

// $name = $_POST['name'];
// $email = $_POST['email'];
// $password = $_POST['password'];
// $confirm_password = $_POST['confirm_password'];

// echo $name;

$action = $_GET['action'];

switch ($action) {
  case 'register':
    echo 'register';
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
