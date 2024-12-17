<?php
  include_once '../config/app.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
</head>
<body>
  <a href="<?= $base_url ?>/course/index.php">Course</a>
  <a href="<?= $base_url ?>/teacher/index.php">Teacher</a>
  <a href="<?= $base_url ?>/student/index.php">Student</a>
  <a href="<?= $base_url ?>/class/index.php">Class</a>
</body>
</html>
