<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/connection.php";
$connection = getCon();

$hasSubmit = @$_POST['create'];

if ($hasSubmit) {
    $title = @$_POST['title'];
    $body = @$_POST['body'];
    $sql = <<<SQL
        INSERT into news(title, body)
        VALUES(?, ?);
    SQL;
    $statement = $connection->prepare($sql);
    $statement->execute([
        $title,
        $body
    ]);

    header('Location: /');
    setFlash("Success to add a news", $class = "alert alert-success");

}

?>
<h1>Create</h1>

<form method="post">
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title here">
    </div>
    <div class="mb-3">
        <label for="body" class="form-label">Body</label>
        <textarea class="form-control" name="body" id="body" rows="5" placeholder="Enter body here..."></textarea>
    </div>

    <input type="submit" class="btn btn-success" value="Save News" name="create">
</form>