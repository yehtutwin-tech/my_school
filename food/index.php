<?php
  include_once '../partials/header.php';
?>
  <h1 class="my-3">
    Food List
    <a
      class="btn btn-primary float-end"
      href="<?= $base_url ?>/food/create.php">
      + New Food
    </a>
  </h1>
  <?php
    $sql = "SELECT * FROM foods";
    $result = $conn->query($sql);
  ?>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Image</th>
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
          <td>
            <img src="../assets/foods/<?= $row["image"] ?>" width="100" />
          </td>
          <td><?= $row["name"] ?></td>
          <td><?= $row["description"] ?></td>
          <td><?= $row["created_at"] ?></td>
          <td>
            <a
              class="btn btn-warning"
              href="<?= $base_url ?>/food/edit.php?id=<?= $row['id'] ?>">Edit</a>

            <a
              class="btn btn-danger"
              href="<?= $base_url ?>/food/delete.php?id=<?= $row['id'] ?>">Delete</a>
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
