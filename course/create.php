<?php
  include_once '../config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Course Create</title>
</head>
<body>
  <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $name = $_POST['name'];
      $description = $_POST['description'];

      $sql = "INSERT INTO courses (name, description)
      VALUES ('$name', '$description')";
      
      if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
  ?>

  <form method="post">
    <input type="text" name="name" />
    <br/>
    <textarea name="description"></textarea>
    <br/>
    <button type="submit">Create</button>
  </form>
</body>
</html>
