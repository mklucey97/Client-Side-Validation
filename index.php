<?php

// Author: Mary Lucey
// Date: 7-25-25
// Assignment 5: Client Side Validation

require_once __DIR__ . '/vendor/autoload.php';

$mustache = new Mustache_Engine;

$header = file_get_contents('templates/header.html');
$body   = file_get_contents('templates/home.html');
$footer = file_get_contents('templates/footer.html');

$header_data = ["pagetitle" => "Home Page"];
$body_data   = [];
$footer_data = ["year" => date("Y")];


echo $mustache->render($header, $header_data) . PHP_EOL;

?>