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
	 
	  echo $mustache->render(file_get_contents('templates/error.html'), [
          'errorMessage' => "You cannot access this page directly. Please submit the form.",
          'imageSrc' => 'images/mickeymouse.jpg',
          'showTryAgain' => true
      ]);
	  
	  
    echo $mustache->render(file_get_contents('templates/footer.html'), [
        'year' => date("Y")
    ]);
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';
$mustache = new Mustache_Engine;

/****************************************
 * STEP 1: INPUT - Get form data safely
 ****************************************/
 $title = $_POST['title'] ?? "";
 $favdrink = $_POST['favdrink'] ?? "";
 $pname = $_POST['pname'] ?? "";
 $favfictionalplace = $_POST['favfictionalplace'] ?? "";
 $favrealplace = $_POST['favrealplace'] ?? "";
 $email = $_POST['email'] ?? "";

/*******************************************
 * STEP 2: VALIDATION - Clean the input
 *******************************************/
 $title = substr(trim(strip_tags($title)), 0, 64);
 $favdrink = substr(trim(strip_tags($favdrink)), 0, 64);
 $pname = substr(trim(strip_tags($pname)), 0, 64);
 $favfictionalplace = substr(trim(strip_tags($favfictionalplace)), 0, 64);




?>