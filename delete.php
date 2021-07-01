<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/helpers.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/connection.php";
$connection = getCon();

$id = @$_GET['id'];

if (!$id) {
    setFlash("Fail to delete news", $class = "alert alert-danger");
    header('Location: /');
} else {
    $sql = "DELETE FROM news WHERE id = ?";
    $statement = $connection->prepare($sql);
    $statement->execute([
        $id
    ]);
    setFlash("Success to delete news with id = $id", $class = "alert alert-success");
    header('Location: /');
}