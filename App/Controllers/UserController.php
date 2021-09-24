<?php

namespace Apps\Square\Controllers;

use Apps\Square\Core\BaseController;
use Apps\Square\Models\User;
use GUMP;

class UserController extends BaseController
{
    public function index()
    {
        $user = new User;
        $title = 'All Users';
        $users = $user->getAllUsers();
        $this->view('users/home', ['title' => $title, 'users' => $users]);
    }
    public function createUser()
    {
        $title = 'Add User';
        $this->view('users/addUser', ['title' => $title]);
    }
    public function store()
    {
        $gump = new GUMP();

        // set validation rules
        $gump->validation_rules([
            'name'    => 'required',
            'password'    => 'required|max_len,100|min_len,6',
            'email'       => 'required|valid_email',
        ]);
        // set filter rules
        $gump->filter_rules([
            'name' => 'trim|sanitize_string',
            'email'    => 'trim|sanitize_email',
        ]);

        // on success: returns array with same input structure, but after filters have run
        // on error: returns false
        $valid_data = $gump->run($_POST);

        if ($gump->errors()) {
            echo '<pre>';
            print_r($gump->get_readable_errors()); // ['Field <span class="gump-field">Somefield</span> is required.'] 
        } else {
            $user = new User;
            $user->addUser($valid_data['name'], $valid_data['email'], md5($valid_data['password']));
            echo '<pre>';
            print_r($valid_data);
        }
    }
    public function editUserById()
    {
        $user = new User;
        $user->editUser('Abdelaziz', 'abdelaziz@afmin.com', md5('123456'), 9);
    }
    public function deleteUserById()
    {
        $user = new User;
        $user->deleteUser(10);
    }
    public function deleteAllUsers()
    {
        $user = new User;
        $user->deleteAllUsers();
    }
}
