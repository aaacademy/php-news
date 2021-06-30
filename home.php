<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/connection.php";
$connection = getCon();
$sql = "SELECT * FROM news";
$statement = $connection->prepare($sql);
$statement->execute();
$rows = $statement->fetchAll();
?>

<h1>Home</h1>

<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Title</th>
      <th scope="col">Body</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $no = 1;
    foreach ($rows as $row) { ?>
    <tr>
      <th scope="row"><?=$no; $no++; ?></th>
      <td><?php echo $row['title'] ?></td>
      <td><?= $row['body'] ?></td>
      <td>
        <a class="btn btn-danger" href="/?page=delete&id=<?= $row['id'] ?>">Hapus</a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>