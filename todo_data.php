<?php

// Load existing todos from a file
function load_todos() {
    $file = 'todos.json';
    if (file_exists($file)) {
        $json = file_get_contents($file);
        return json_decode($json, true);
    }
    return [];
}

// Save todos to a file
function save_todos($todos) {
    $file = 'todos.json';
    $json = json_encode($todos);
    file_put_contents($file, $json);
}

$all_todo = load_todos();

function add_todo($task)
{
    global $all_todo;
    $new_todo = [
        'id' => empty($all_todo) ? 1 : max(array_column($all_todo, 'id')) + 1,
        'task' => $task,
        'completed' => false,
    ];
    $all_todo[] = $new_todo;
    save_todos($all_todo);
    return $new_todo;
}

function remove_todo($id)
{
    global $all_todo;
    $all_todo = array_filter($all_todo, function ($todo) use ($id) {
        return $todo['id'] != $id;
    });
    save_todos($all_todo);
}

function update_todo_status(int $id, bool $status)
{
    global $all_todo;
    $all_todo = array_map(function ($todo) use ($id, $status) {
        if ($todo['id'] == $id) {
            $todo['completed'] = $status;
        }
        return $todo;
    }, $all_todo);
    save_todos($all_todo);
}

function get_all_todo()
{
    global $all_todo;
    reload_todo();
    return $all_todo;
}

function get_completed_todo()
{
    global $all_todo;
    reload_todo();
    return array_filter($all_todo, function ($todo) {
        return $todo['completed'] == true;
    });
}

function get_incomplete_todo(){
    global $all_todo;
    reload_todo();
    return array_filter($all_todo, function ($todo) {
        return $todo['completed'] == false;
    });
}

function reload_todo(){
    global $all_todo;
    $all_todo = load_todos();
}