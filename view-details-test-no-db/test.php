<?php

/*
$host = 'localhost';
$username = 'admin';
$password = 'password123';
$dbname = 'BugMe';
*/
$id = htmlspecialchars($_GET["id"]);
$context = htmlspecialchars($_GET["context"]);

/* 
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
*/

/* 
if ($context == "view-details") {
    $stmt = $conn->query("SELECT issues.title, issues.id, issues.description, issues.type, issues.priority, issues.status, issues.created, users.firstname, users.lastname, issues.updated FROM issues JOIN users ON issues.created_by=users.id WHERE issues.id LIKE '%$id%'");
    $row1 = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt = $conn->query("SELECT users.firstname, users.lastname FROM issues JOIN users ON issues.assigned_to=users.id WHERE issues.id LIKE '%$id%'");
    $row2 = $stmt->fetch(PDO::FETCH_ASSOC);
}
elseif ($context == "closed") {
    $sql = "UPDATE issues SET status='Closed' WHERE id={$id}";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt = $conn->query("SELECT issues.title, issues.id, issues.description, issues.type, issues.priority, issues.status, issues.created, users.firstname, users.lastname, issues.updated FROM issues JOIN users ON issues.created_by=users.id WHERE issues.id LIKE '%$id%'");
    $row1 = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt = $conn->query("SELECT users.firstname, users.lastname FROM issues JOIN users ON issues.assigned_to=users.id WHERE issues.id LIKE '%$id%'");
    $row2 = $stmt->fetch(PDO::FETCH_ASSOC);
}
elseif ($context == "in-progress") {
    $sql = "UPDATE issues SET status='In Progress' WHERE id={$id}";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt = $conn->query("SELECT issues.title, issues.id, issues.description, issues.type, issues.priority, issues.status, issues.created, users.firstname, users.lastname, issues.updated FROM issues JOIN users ON issues.created_by=users.id WHERE issues.id LIKE '%$id%'");
    $row1 = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt = $conn->query("SELECT users.firstname, users.lastname FROM issues JOIN users ON issues.assigned_to=users.id WHERE issues.id LIKE '%$id%'");
    $row2 = $stmt->fetch(PDO::FETCH_ASSOC);
}
 */

?>

<?php if ($context == "view-details"): ?>
    <h2>Issue Title_($row1['title'])</h2>
    <h3>Issue #_($row1['id'])<?= $id ?></h3>
    <p>Issue Description_($row1['description'])</p>
    <ul>
        <li>Assigned To:_($row2['firstname'] $row2['lastname']) </li>
        <li>Type:_($row1['type']) </li>
        <li>Priority:_($row1['priority']) </li>
        <li>Status:_($row1['status']) </li>
    </ul>
    <div>
        <button class="closed" id="<?= $id ?>" onClick="getIssueID(this.id)">Mark as Closed</button>
    </div>
    <div>
        <button class="in-progress" id="<?= $id ?>" onClick="getIssueID(this.id)">Mark In Progress</button>
    </div>
    <p>Issue Created on _date__($row1['created']) by _name__($row1['firstname']) _($row1['lastname']) </p>
    <p>Last Update on _date__($row1['updated'])</p>
    <p>CONTEXT: <?= $context ?></p>
<?php elseif ($context == "closed"): ?>
    <h2>Issue Title_($row1['title'])</h2>
    <h3>Issue #_($row1['id'])<?= $id ?></h3>
    <p>Issue Description_($row1['description'])</p>
    <ul>
        <li>Assigned To:_($row2['firstname'] $row2['lastname']) </li>
        <li>Type:_($row1['type']) </li>
        <li>Priority:_($row1['priority']) </li>
        <li>Status: closed_($row1['status']) </li>
    </ul>
    <div>
        <button class="closed" id="<?= $id ?>" onClick="getIssueID(this.id)">Mark as Closed</button>
    </div>
    <div>
        <button class="in-progress" id="<?= $id ?>" onClick="getIssueID(this.id)">Mark In Progress</button>
    </div>
    <p>Issue Created on _date__($row1['created']) by _name__($row1['firstname']) _($row1['lastname']) </p>
    <p>Last Update on _date__($row1['updated'])</p>
    <p>CONTEXT: <?= $context ?></p>
<?php elseif ($context == "in-progress"): ?>
    <h2>Issue Title_($row1['title'])</h2>
    <h3>Issue #_($row1['id'])<?= $id ?></h3>
    <p>Issue Description_($row1['description'])</p>
    <ul>
        <li>Assigned To:_($row2['firstname'] $row2['lastname']) </li>
        <li>Type:_($row1['type']) </li>
        <li>Priority:_($row1['priority']) </li>
        <li>Status: in-progress_($row1['status']) </li>
    </ul>
    <div>
        <button class="closed" id="<?= $id ?>" onClick="getIssueID(this.id)">Mark as Closed</button>
    </div>
    <div>
        <button class="in-progress" id="<?= $id ?>" onClick="getIssueID(this.id)">Mark In Progress</button>
    </div>
    <p>Issue Created on _date__($row1['created']) by _name__($row1['firstname']) _($row1['lastname']) </p>
    <p>Last Update on _date__($row1['updated'])</p>
    <p>CONTEXT: <?= $context ?></p>
<?php endif ?>