<?php

$pageHeading = 'Home';

require 'views/partials/head.php';
require 'views/partials/nav.php';
require 'views/partials/banner.php';
require 'views/home.view.php';
require 'views/partials/foot.php';


// Server logics
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $key = $_POST['key'];
    $task = $_POST['task'];
    $id = $_POST['id'];
    $status = $_POST['status'];

    if($key == 'add_todo') {
        $new_todo = add_todo($task);
        reload_todo();
        header('Location: /');
        exit();
    }

    if($key == 'remove_todo') {
        remove_todo($id);
        reload_todo();
        header('Location: /');
        exit();
    }

    if($key == 'update_todo_status') {
        echo $status;
        update_todo_status($id, $status);
        reload_todo();
        header('Location: /');
        exit();
    }
}