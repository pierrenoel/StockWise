<?php

function index()
{
    $page = template("index.php");

    echo template('layouts/app.php', [
        'title'   => 'Accueil',
        'content' => $page
    ]);
}