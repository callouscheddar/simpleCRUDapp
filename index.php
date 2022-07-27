<?php
include 'includes/header.php';
include __DIR__ . '/users.php';
?>

<div class="container border rounded-top mt-5 p-0 overflow-auto bg-secondary bg-opacity-25">
    <div class="border-bottom rounded-top p-3 bg-success bg-opacity-25 d-flex justify-content-between align-items-center">
        <h1 class="text-secondary">Users</h1>
        <a href="create.php" class="btn btn-success">Create User</a>
    </div>
    <table class="table pb-0 m-0 bg-light table-hover">
        <thead>
        <tr>
            <td>Name</td>
            <td>Username</td>
            <td>Email</td>
            <td>Phone</td>
            <td>Website</td>
            <td>Update</td>
            <td>Delete</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach (allUsers() as $user): ?>
            <tr>
                <td><?= $user['name'] ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['phone'] ?></td>
                <td><?= $user['website'] ?></td>
                <td><a class="btn btn-success p-1" href="update.php?id=<?= $user['id'] ?>">Update</a></td>
                <td><a class="btn btn-success p-1" href="delete.php?id=<?= $user['id'] ?>">Delete</a></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>

<?php include 'includes/footer.php' ?>