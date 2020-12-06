<?php

if (isset($_POST["submit"])) {
    echo "It Works";
    $FirstName = $_POST["Firstname"];
    $LastName = $_POST["Lastname"];
    $emailAdd = $_POST["email"];
    $pwd = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignUp($FirstName , $LastName , $emailAdd ,$pwd) !== false ) {
        header("location: ../signup.php?error=emptyinput");
        exit(); 
    }
    if (invalidEmail($emailAdd) !== false ) {
        header("location: ../signup.php?error=invalidemail");
        exit(); 
    }
    if (emailExists($conn,$emailAdd ) !== false ) {
        header("location: ../signup.php?error=emailtaken");
        exit(); 
    }

    createUser($conn , $FirstName , $LastName , $emailAdd ,$pwd );
}
else {
    header("location: ../signup.php");
    exit(); 
}
