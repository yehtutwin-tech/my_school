<?php
  include_once '../config/db.php';

  if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM students WHERE id=$id";
    $conn->query($sql);
  }

header('Location: index.php');
