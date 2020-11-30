<?php

require_once 'dbConnection.php';

if(isset($_GET)){
    $usqy = $conn->query("SELECT * FROM Users");
    $result = $usqy->fetchAll(PDO::FETCH_ASSOC);

    $output = "<div id = \"sub\">
    <form action = \"scripts/submitissue.php\" method = \"POST\">
        <h1>Create Issue<h1>
        <div id = \"issue\">
            <label for = \"issue\">Title</label><br>
            <input type = \"text\" id = \"newissue\" name = \"title\"/><br>
        
        </div>
        <div id =\"des\">
            <label for = \"des\">Description</label><br>
        
</div>
}