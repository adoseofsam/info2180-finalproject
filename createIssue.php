<?php

require_once 'dbConnection.php';

if(isset($_GET)){
    $usqy = $conn->query("SELECT * FROM Users");
    $result = $usqy->fetchAll(PDO::FETCH_ASSOC);

    $output = "<div id = \"sub\">
    <form action = \"scripts/submitissue.php\" method = \"POST\">
        <h1>Create Issue<h1>
        <div id = \"Issue\">
            <label for = \"title\">Title</label><br>
            <input type = \"text\" id = \"newissue-title\" name = \"title\"/><br>
        
        </div>
}