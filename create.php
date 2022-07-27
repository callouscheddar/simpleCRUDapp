<?php
include 'includes/header.php';
include __DIR__ . '/users.php';

if (isset($_POST['submit'])) {
    $data['name'] = $_POST['name'];
    $data['username'] = $_POST['username'];
    $data['email'] = $_POST['email'];
    $data['phone'] = $_POST['phone'];
    $data['website'] = $_POST['website'];

    createUser($data);
}
?>
<div class="container border rounded-3 mt-5 p-0 col-md-4 bg-secondary bg-opacity-25">
    <h1 class="border-bottom rounded-top p-3 bg-success bg-opacity-50 text-white">Update User:</h1>
    <form class="p-3 m-0 d-flex flex-column gap-4" method="POST" action="create.php">
        <input class="form-control" type="text" name="name" placeholder="Name">
        <input class="form-control" type="text" name="username" placeholder="Username">
        <input class="form-control" type="text" name="email" placeholder="Email">
        <input class="form-control" type="text" name="phone" placeholder="Phone Number">
        <input class="form-control" type="text" name="website" placeholder="Website">
        <div class="d-flex gap-2 justify-content-end">
            <input type="submit" name="submit" class="btn btn-success" value="Submit">
            <a href="index.php" class="btn btn-success">Back</a>
        </div>
    </form>
</div>
<?php include 'includes/footer.php' ?>
