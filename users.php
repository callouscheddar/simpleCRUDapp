<?php

/*
 * The users.php file handles the CRUD operations of this
 * application.
 */

function allUsers()
{
    return json_decode(file_get_contents(__DIR__ . '/users.json'), true);
}

function findUser($id): array
{
    $users = allUsers();
    foreach ($users as $user) {
        if ($user['id'] == $id) {
            return $user;
        }
    }
    return [];
}

function createUser($data): void
{
    // validate data
    $data = validateData($data);

    $users = allUsers();

    $user_id_list = [];
    foreach ($users as $user) {
        $user_id_list[] = $user['id'];
    }

    // generate unique user id
    $new_user_id = 4;
    while (in_array($new_user_id, $user_id_list)) {
        $new_user_id = rand(1, 100000);
    }

    $data['id'] = $new_user_id;

    $users[] = $data;

    // replace existing json with new json file
    file_put_contents(__DIR__ . '/users.json', json_encode($users));
    header('Location: index.php');
    exit();
}

function updateUser($id, $data): mixed
{
    // validate data
    $data = validateData($data);

    $users = allUsers();

    // loop through users to find matching id
    // The & symbol ensures that we are not passing a reference
    // And the variable gets changed above.
    foreach ($users as &$user) {
        if ($user['id'] == $id) {
            echo 'Found a match, changing user data';
            $user['name'] = $data['name'];
            $user['username'] = $data['username'];
            $user['email'] = $data['email'];
            $user['phone'] = $data['phone'];
            $user['website'] = $data['website'];
        }
    }

    // replace existing json with new json file
    $result = file_put_contents(__DIR__ . '/users.json', json_encode($users));

    if ($result) {
        header("Location: index.php");
        exit();
    } else {
        return false;
    }

}

function deleteUser($id): mixed
{
    $users = allUsers();

    // loop through users to find matching id, then with the index of that array
    // that matches the id, unset that array. ex unset(array[0])
    foreach ($users as $index => $data) {
        if ($data['id'] == $id) {
            unset($users[$index]);
        }
    }

    // replace existing json with new json file
    $result = file_put_contents(__DIR__ . '/users.json', json_encode($users));

    // if successfull then return home, otherwise return false
    if ($result) {
        header("Location: index.php");
        exit();
    } else {
        return false;
    }
}

// This function will validate and sanitize the data
function validateData($data) {
    if (empty($data['name']) || empty($data['username']) || empty($data['email'])
        || empty($data['phone']) || empty($data['website'])) {
        return false;
    }

    return $data;
}