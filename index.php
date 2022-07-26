<?php
include __DIR__ . '/users.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Basic Crud App</title>
</head>
<body>
<h1>Users</h1>
<table class="table">
    <thead>
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td>Username</td>
            <td>Email</td>
            <td>Phone</td>
            <td>Website</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach(allUsers() as $user): ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['name'] ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['phone'] ?></td>
                <td><?= $user['website'] ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
</body>
</html>