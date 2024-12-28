<?php
  include_once '../partials/header.php';
?>
  <h1 class="my-3">
    <a
      class="btn btn-outline-secondary"
      href="<?= $base_url ?>/registration/index.php">
      &larr;
    </a>
    Edit Registration
  </h1>
  <?php
    if (isset($_GET['id'])) {
      $id = $_GET['id'];

      $sql = "SELECT * FROM student_classes WHERE id=$id";
      $result = $conn->query($sql);
      $main_row = $result->fetch_assoc();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $student_id = $_POST['student_id'];
      $class_id = $_POST['class_id'];
      $enrollment_date = $_POST['enrollment_date'];
      
      $sql = "UPDATE student_classes SET student_id='$student_id', class_id='$class_id', enrollment_date='$enrollment_date' WHERE id=$id";
      
      if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
  ?>

  <form method="post">
    <select name="student_id" class="form-select">
      <option value="">Select Student</option>
      <?php
        $sql = "SELECT * FROM students";
        $result = $conn->query($sql);
        foreach ($result as $row) {
          echo "<option value='".$row['id']."'" . ($row['id'] == $main_row['student_id'] ? 'selected' : '') . ">".$row['first_name'].' '.$row['last_name']."</option>";
        }
      ?>
      
    </select>
    <br/>
    <select name="class_id" class="form-select">
      <option value="">Select Class</option>
      <?php
        $sql = "SELECT * FROM classes";
        $result = $conn->query($sql);
        foreach ($result as $row) {
          echo "<option value='".$row['id']."'" . ($row['id'] == $main_row['class_id'] ? 'selected' : '') . ">".$row['name']."</option>";
        }
      ?>
    </select>
    <br/>
    <input type="date" name="enrollment_date" class="form-control" placeholder="Enrollment Date..." value="<?= $main_row['enrollment_date'] ?>" />
    <br/>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
<?php
  include_once '../partials/footer.php';
?>
