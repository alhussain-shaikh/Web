<?php

class View
{

    function __construct()
    {
    }

    function render($name)
    {
        require VIEWS . '/' . $name . '/index.php';
    }
}
