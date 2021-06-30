<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/connection.php";
$connection = getCon();

$id = @$_GET['id'];

if (!$id) {
    header('Location: /');
} else {
    $sql = "DELETE FROM news WHERE id = ?";
    $statement = $connection->prepare($sql);
    $statement->execute([
        $id
    ]);
    header('Location: /');
}