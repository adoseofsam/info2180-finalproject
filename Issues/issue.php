<?php


$firstName = '';
$lastName = '';
$password = '';
$email = '';
$errors = '';
$regex = "^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$";

if(isset($_POST['submit'])){
$firstName = $_POST['Firstname'];
$lastName = $_POST['Lastname'];
$password = $_POST['Password'];
$email = $_POST['Email']
}

if(empty($firstName)){array_push($errors, "Please enter your First Name");}
if(empty($lastName)){array_push($errors, "Please enter your Last Name");}
if(empty($password)){array_push($errors, "Please enter a password");}
if(empty($email)){array_push($errors, "Please enter your email address");}

if(preg_match($regex, $password)==1{array_push($errors, "Please enter a valid password");
}else{
    return 0;
})

if(count($errors) == 0){
    password_hash($password, PASSWORD_BCRYPT);
}

?>