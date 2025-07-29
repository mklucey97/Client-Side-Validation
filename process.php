<?php

// Author: Mary Lucey
// Date: 7-28-25
// Assignment 5: Client Side Validation 

// STEP 0: Prevent direct GET access
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    require_once __DIR__ . '/vendor/autoload.php';
    $mustache = new Mustache_Engine;
	
	 echo $mustache->render(file_get_contents('templates/header.html'), [
         'pagetitle' => 'Error'
     ]);








?>