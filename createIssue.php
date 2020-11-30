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
            <input type = \"text\" id = \"issueTitle\" name = \"title\"/><br>
        
        </div>
        <div id =\"des\">
            <label for = \"des\">Description</label><br>
            <textarea maxlength = \"300\" rows = \"5\" cols = \"50\" id = \"newissueDes\" name = \"des\"></textarea><br>

        </div>

        <div id = \"assign\">
            <label for = \"assign\"> Assigned To</label><br>
            select id = \"issueAssign\" name = \"assign\" placeholder = \"Marcia Brady\">";
            foreach($result as $row) {
                $name = $row['firstname'] . " " . $row['lastname'];
                $output .= "<option>" . $name . "</option>";
            }

$output .= "</select>

        </div>

        <div id = \"priority\">
            <label for = \"priority\">Priority</label><br>

            <select id = \"newissue-priority\" name = \"priority\" placeholder = \"Major\">
                <option value = \"Minor\">Minor</option>
                <option value = \"Major\">Major</option>
                <option value = \"Critical\">Critical</option>
            </select>
        </div>
        <div id = \"submission\">
            <p>
                <input type = \"button\" id = \"newissue-submit\" value=\"Submit\"/>
            </p>
    
         </div>

        </form>
    </div>";
   
    echo $output;


}
?>