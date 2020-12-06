<?php

function emptyInputSignUp($FirstName , $LastName , $emailAdd ,$pwd) {
$result = null;
if (empty($FirstName) || empty($LastName) || empty($emailAdd) || empty($pwd) ){
$result = true;
}
else  {
    $result = false;
}
return $result;
}

function invalidEmail($emailAdd) {
    $result = null;
    if (!filter_var($emailAdd , FILTER_VALIDATE_EMAIL)){
    $result = true;
    }
    else  {
        $result = false;
    }
    return $result;
    }

function emailExists($conn, $emailAdd) {
    $sql="SELECT * FROM Users WHERE email = ? ;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit(); 
    }
    mysqli_stmt_bind_param($stmt, "s", $emailAdd);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_results($stmt);

    if ($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else {
        $result = false;
        mysqli_stmt_close($stmt);
        return $result;
    }

       
      
}

function createUser($conn , $FirstName , $LastName , $emailAdd ,$pwd ) {
        $sql="INSERT  INTO Users (firstname,lastname,password,email) VALUES(?,?,?,?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)) {
            header("location: ../signup.php?error=stmtfailed");
            exit(); 
        }

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "ssss", $FirstName , $LastName , $emailAdd ,$hashedPwd );
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../signup.php?error=none");
        exit(); 


}

function emptyInputLogin($email , $pwd ) {
     $result = null;
     if (empty($email) || empty($pwd) ){
         $result = true;
     }
        else  {
            $result = false;
         }
            return $result;
}

function loginUser ($conn, $email , $pwd) {
    $emailExists = emailExists($conn, $email);

        if ($emailExists == false){
            header("location: ../login.php?error=wronglogin");
            exit(); 
        }
    $pwdHashed = $emailExists["password"];

    $checkpwd = password_verify( $pwd , $pwdHashed);

        if ($checkpwd == false) {
            header("location: ../login.php?error=wronglogin");
             exit(); 
        }
            else if ($checkpwd == true){
                session_start();
                $_SESSION["id"] = $emailExists["id"];
                header("location: ../issues.php");
                exit();
            }
}