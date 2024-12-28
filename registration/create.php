<?php
  include_once '../partials/header.php';
?>
  <h1 class="my-3">
    <a
      class="btn btn-outline-secondary"
      href="<?= $base_url ?>/registration/index.php">
      &larr;
    </a>
    New Registration
  </h1>
  <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $student_id = $_POST['student_id'];
      $class_id = $_POST['class_id'];
      $enrollment_date = $_POST['enrollment_date'];
      
      $sql = "INSERT INTO student_classes (student_id, class_id, enrollment_date) VALUES ('$student_id', '$class_id', '$enrollment_date')";
      
      if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
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
          echo "<option value='".$row['id']."'>".$row['first_name'].' '.$row['last_name']."</option>";
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
          echo "<option value='".$row['id']."'>".$row['name']."</option>";
        }
      ?>
    </select>
    <br/>
    <input type="date" name="enrollment_date" class="form-control" placeholder="Enrollment Date..." />
    <br/>
    <button type="submit" class="btn btn-primary">Create</button>
  </form>
<?php
  include_once '../partials/footer.php';
?>
