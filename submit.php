<?php
session_start();

require_once 'connectdb.php';

if (isset($_POST)) {
    $issue = filter_var($_POST['issue'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $desc = filter_var($_POST['des'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $type = $_POST['type'];
    $prior = $_POST['priority'];
    $user_email = $_SESSION['user'];


    $usqy = $conn->query("SELECT * FROM Users WHERE email = '$user_email'");
    $result = $usqy->fetchALL(PDO::FETCH_ASSOC)

    foreach($result as $row){
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];


    }
?>
