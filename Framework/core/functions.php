<?php

function dd($variable)
{
    var_dump($variable);
    die();
}

function view($name, $data = [])
{
    extract($data);

    return require "app/views/$name.view.php";
}


function redirect($path)
{
    header("Location: $path");

    return 0;
}
