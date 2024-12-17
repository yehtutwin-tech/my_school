<?php
  include_once '../config/app.php';
  include_once '../config/db.php';
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
  <?php
    $sql = "SELECT * FROM courses";
    $result = $conn->query($sql);
  ?>
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
      <?php
        while($row = $result->fetch_assoc()) {
      ?>
        <tr>
          <td><?= $row["id"] ?></td>
          <td><?= $row["name"] ?></td>
          <td><?= $row["description"] ?></td>
          <td><?= $row["created_at"] ?></td>
          <td>
            <a href="<?= $base_url ?>/course/edit.php?id=<?= $row['id'] ?>">Edit</a>
            <a href="<?= $base_url ?>/course/delete.php?id=<?= $row['id'] ?>">Delete</a>
          </td>
        </tr>
      <?php
        }
      ?>
    </tbody>
  </table>
</body>
</html>