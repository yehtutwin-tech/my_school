<?php
  include_once '../partials/header.php';
?>
  <h1 class="my-3">
    Course List
    <a
      class="btn btn-primary float-end"
      href="<?= $base_url ?>/course/create.php">
      + New Course
    </a>
  </h1>
  <?php
    $sql = "SELECT * FROM courses";
    $result = $conn->query($sql);
  ?>
  <table class="table table-bordered table-striped">
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
          <td><?= date('M d, h:i A', strtotime($row["created_at"])) ?></td>
          <td>
            <a
              class="btn btn-warning"
              href="<?= $base_url ?>/course/edit.php?id=<?= $row['id'] ?>">
              <i class="fa-solid fa-pen-to-square"></i>
              Edit
            </a>

            <a
              class="btn btn-danger"
              href="<?= $base_url ?>/course/delete.php?id=<?= $row['id'] ?>">
              <i class="fa-solid fa-trash"></i>
              Delete
            </a>
          </td>
        </tr>
      <?php
        }
      ?>
    </tbody>
  </table>
<?php
  include_once '../partials/footer.php';
?>
