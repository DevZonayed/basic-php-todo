<?php


function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function isNavActive($url, $route)
{
    $currentPage = parse_url($_SERVER['REQUEST_URI'])['path'];
    $url = $url ?: $currentPage;
    return match ($route) {
        $url => 'bg-gray-900 text-white',
        default => 'text-gray-300 hover:bg-gray-700 hover:text-white',
    };
}
