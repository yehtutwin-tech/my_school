<?php
  include_once '../config/app.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Course List</title>
</head>
<body>
  <a href="<?= $base_url ?>/course/create.php">New Course</a>
  <h1>Course List</h1>
  <table border="1">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Description</th>
        <th>Created At</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>1</td>
        <td>1</td>
        <td>1</td>
        <td>1</td>
      </tr>
    </tbody>
  </table>
</body>
</html>