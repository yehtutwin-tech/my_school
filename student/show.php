<?php
  include_once '../partials/header.php';
?>
  <h1 class="my-3">
    <a
      class="btn btn-outline-secondary"
      href="<?= $base_url ?>/student/index.php">
      &larr;
    </a>
    Student Detail
  </h1>
  <?php
    if (isset($_GET['id'])) {
      $id = $_GET['id'];

      $sql = "SELECT * FROM students WHERE id=$id";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
    }
  ?>
  
  <div class="d-flex flex-column flex-wrap gap-2 pb-5 mb-5 border-bottom">
    <div>
      <strong>First Name:</strong>
      <span><?= $row['first_name'] ?></span>
    </div>
    <div>
      <strong>Last Name:</strong>
      <span><?= $row['last_name'] ?></span>
    </div>
    <div>
      <strong>Email:</strong>
      <span><?= $row['email'] ?></span>
    </div>
    <div>
      <strong>Phone:</strong>
      <span><?= $row['phone'] ?></span>
    </div>
    <div>
      <strong>Registration Date:</strong>
      <span><?= date('M d, h:i A', strtotime($row['registration_date'])) ?></span>
    </div>
  </div>
  <div>
    <h2>Attended Classes</h2>
    <?php
      $sql = "SELECT
        student_classes.id,
        student_classes.enrollment_date,
        classes.name AS class_name,
        courses.name AS course_name,
        CONCAT(teachers.first_name, ' ', teachers.last_name) AS teacher_name
        FROM student_classes
        INNER JOIN classes ON student_classes.class_id=classes.id
        INNER JOIN courses ON classes.course_id=courses.id
        INNER JOIN teachers ON classes.teacher_id=teachers.id
        WHERE student_id=$id";
      $result = $conn->query($sql);
    ?>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Class Name</th>
          <th>Course Name</th>
          <th>Teacher Name</th>
          <th>Enrollment Date</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($result as $row): ?>
          <tr>
            <td><?= $row["class_name"] ?></td>
            <td><?= $row["course_name"] ?></td>
            <td><?= $row["teacher_name"] ?></td>
            <td><?= date('M d, h:i A', strtotime($row["enrollment_date"])) ?></td>
            <td>
              <a
                class="btn btn-warning"
                href="<?= $base_url ?>/registration/edit.php?id=<?= $row['id'] ?>">
                <i class="fa-solid fa-pen-to-square"></i>
                Edit
              </a>
              <a
                class="btn btn-danger"
                href="<?= $base_url ?>/registration/delete.php?id=<?= $row['id'] ?>">
                <i class="fa-solid fa-trash"></i>
                Delete
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
    </table>
  </div>

<?php
  include_once '../partials/footer.php';
?>
