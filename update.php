<?php
include 'includes/header.php';
include __DIR__ . '/users.php';

// sess to store the id
session_start();

// get id from get, or the sess
// (create and assign id to sess, so we don't lost it on form submission)
if (isset($_GET['id'])) {
    $_SESSION['id'] = $_GET['id'];
    $id = $_GET['id'];
} else {
    $id = $_SESSION['id'];
}

// get data from that user to display on page
$data = findUser($id);

if (isset($_POST['submit'])) {
    $data['name'] = $_POST['name'];
    $data['username'] = $_POST['username'];
    $data['email'] = $_POST['email'];
    $data['phone'] = $_POST['phone'];
    $data['website'] = $_POST['website'];

    $result = updateUser($id, $data);
}
?>

<div class="container border rounded-3 mt-5 p-0 col-md-4 bg-secondary bg-opacity-25">
    <h1 class="border-bottom rounded-top p-3 bg-primary bg-opacity-50 text-white">Edit User:</h1>
    <?php if (isset($result) && !$result): ?>
        <p class="text-center text-danger">There was an error with your submission.</p>
    <?php endif ?>
    <form class="p-3 m-0 d-flex flex-column gap-4" method="POST" action="update.php">
        <input type="hidden" name="id" value="<?= htmlspecialchars($_GET['id'] ?? '') ?>">
        <input class="form-control" type="text" name="name" placeholder="Name" value="<?= htmlspecialchars($data['name']) ?>">
        <input class="form-control" type="text" name="username" placeholder="Username" value="<?= htmlspecialchars($data['username']) ?>">
        <input class="form-control" type="text" name="email" placeholder="Email" value="<?= htmlspecialchars($data['email']) ?>">
        <input class="form-control" type="text" name="phone" placeholder="Phone Number" value="<?= htmlspecialchars($data['phone']) ?>">
        <input class="form-control" type="text" name="website" placeholder="Website" value="<?= htmlspecialchars($data['website']) ?>">
        <div class="d-flex gap-2 justify-content-end">
            <input type="submit" name="submit" class="btn btn-success" value="Submit">
            <a href="index.php" class="btn btn-success">Back</a>
        </div>
    </form>
</div>

<?php include 'includes/footer.php' ?>
