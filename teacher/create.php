<?php
  include_once '../partials/header.php';
?>
  <h1 class="my-3">
    <a
      class="btn btn-outline-secondary"
      href="<?= $base_url ?>/teacher/index.php">
      &larr;
    </a>
    Teacher Create
  </h1>
  <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $hire_date = $_POST['hire_date'];

      $sql = "INSERT INTO teachers (first_name, last_name, email, phone, hire_date)
              VALUES ('$first_name', '$last_name', '$email', '$phone', '$hire_date')";
      
      if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
  ?>

  <form method="post">
    <input type="text" name="first_name" class="form-control" placeholder="First Name..." />
    <br/>
    <input type="text" name="last_name" class="form-control" placeholder="Last Name..." />
    <br/>
    <input type="email" name="email" class="form-control" placeholder="Email..." />
    <br/>
    <input type="text" name="phone" class="form-control" placeholder="Phone..." />
    <br/>
    <input type="date" name="hire_date" class="form-control" placeholder="Hire Date..." />
    <br/>
    <button type="submit" class="btn btn-primary">Create</button>
  </form>
<?php
  include_once '../partials/footer.php';
?>
