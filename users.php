<?php

function allUsers()
{
    return json_decode(file_get_contents(__DIR__ . '/users.json'), true);
}

function findUser($id)
{
    $users = allUsers();
    foreach ($users as $user) {
        if ($user['id'] == $id) {
            return $user;
        }
    }
    return '';
}

function createUser($data)
{
    // Validate $data
    if (empty($data['id']) || empty($data['name'])
    || empty($data['username']) || empty($data['email'])
    || empty($data['phone']) || empty($data['website'])) {
        echo 'Not valid';
        return;
    }
    // Add data to users, then replace json file with new data
    $users = allUsers();
    $users[] = $data;
    file_put_contents(__DIR__ . '/users.json', json_encode($users));
}

function updateUser($id, $data)
{

}

function deleteUser($id)
{

}