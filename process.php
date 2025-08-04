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
$favrealplace = substr(trim(strip_tags($favrealplace)), 0, 64);
$email = substr(trim(strip_tags($email)), 0, 128);

/***************************************************************
 * STEP 3: SERVER-SIDE VALIDATION with error reporting
 ***************************************************************/
$errors = [];

if (empty($title)) {
    $errors[] = "Title name cannot be empty.";
}
if (empty($favdrink)) {
    $errors[] = "Favorite drink cannot be empty.";
}
if (empty($pname)) {
    $errors[] = "Pet name cannot be empty.";
}
if (empty($favfictionalplace)) {
    $errors[] = "Fictional place cannot be empty.";
}
if (empty($favrealplace)) {
    $errors[] = "Real place cannot be empty.";
}
if (empty($email)) {
    $errors[] = "Email address cannot be empty.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Email address is not valid.";
}
if (!empty($favfictionalplace) && !empty($favrealplace) && $favfictionalplace === $favrealplace) {
    $errors[] = "Real place and fictional place cannot be the same.";
}
if (!empty($title) && !empty($pname) && $title === $pname) {
    $errors[] = "Title name and pet name cannot be the same.";
}

/***************************************************************
 * STEP 4: PROCESS + OUTPUT via Mustache templates
 ***************************************************************/
if (empty($errors)) {
    $totalLength = strlen($title) + strlen($favdrink) + strlen($pname) + strlen($favfictionalplace) + strlen($favrealplace) + strlen($email);

    $templateVariables = [
        'title' => $title,
        'favdrink' => $favdrink,
        'pname' => $pname,
        'favfictionalplace' => $favfictionalplace,
        'favrealplace' => $favrealplace,
        'email' => $email,
        'titleLength' => strlen($title),
        'drinkLength' => strlen($favdrink),
        'pnameLength' => strlen($pname),
        'favfictionalplaceLength' => strlen($favfictionalplace),
        'favrealplaceLength' => strlen($favrealplace),
        'emailLength' => strlen($email),
        'long_title' => $totalLength > 30
    ];

    echo $mustache->render(file_get_contents('templates/header.html'), [
        'pagetitle' => 'Your Title Result'
    ]);
    echo $mustache->render(file_get_contents('templates/success.html'), $templateVariables);
    echo $mustache->render(file_get_contents('templates/footer.html'), [
        'year' => date("Y")
    ]);
} else {
    echo $mustache->render(file_get_contents('templates/header.html'), [
        'pagetitle' => 'Error'
    ]);
    echo $mustache->render(file_get_contents('templates/error.html'), [
        'errorMessage' => "❌ Error: " . implode("<br>", $errors),
        'imageSrc' => 'images/mickeymouse.jpg',
        'showTryAgain' => true
    ]);
    echo $mustache->render(file_get_contents('templates/footer.html'), [
        'year' => date("Y")
    ]);
}
?>