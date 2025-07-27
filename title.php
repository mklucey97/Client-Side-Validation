<?php

// Author: Mary Lucey
// Date: 7-25-25
// Assignment 5: Client Side Validation

require_once __DIR__ . '/vendor/autoload.php';

$mustache = new Mustache_Engine;


$header = file_get_contents('templates/header.html');
$body   = file_get_contents('templates/title.html');
$footer = file_get_contents('templates/footer.html');

$header_data = ["pagetitle" => "Title Generation Form"];
$body_data   = [];
?>