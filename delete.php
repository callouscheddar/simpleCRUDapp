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

// check for form submission, and delete that user
if (isset($_POST['submit'])) {
    $result = deleteUser($id);
}
?>

<div class="container border rounded-3 mt-5 p-0 col-md-4 bg-secondary bg-opacity-25">
    <h1 class="border-bottom rounded-top p-3 bg-danger bg-opacity-50 text-white">Delete User:</h1>
    <?php if (isset($result) && !$result): ?>
        <p class="text-center text-danger">There was an error with your submission.</p>
    <?php endif ?>
    <div class="p-2">
        <h3 >User Info:</h3>
        <p><strong>Name:</strong>  <?= $data['name'] ?></p>
        <p><strong>Username:</strong> <?= $data['username'] ?></p>
        <p><strong>Email:</strong> <?= $data['email'] ?></p>
        <p><strong>Phone:</strong> <?= $data['phone'] ?></p>
        <p><strong>Website:</strong> <?= $data['website'] ?></p>
    </div>
    <form class="p-3 m-0 d-flex flex-column gap-4" method="POST" action="delete.php">
        <input type="hidden" name="id" value="<?= htmlspecialchars($_GET['id'] ?? '') ?>">
        <div class="d-flex gap-2 justify-content-end">
            <input type="submit" name="submit" class="btn btn-danger" value="Delete">
            <a href="index.php" class="btn btn-success">Back</a>
        </div>
    </form>
</div>

<?php include 'includes/footer.php' ?>
