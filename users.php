<?php

function allUsers()
{
    $users = json_decode(file_get_contents(__DIR__ . '/users.json'), true);
    echo '<pre>';
    var_dump($users);
    echo '</pre>';
}

function findUser($id)
{

}

function createUser($data)
{

}

function updateUser($id, $data)
{

}

function deleteUser($id)
{

}