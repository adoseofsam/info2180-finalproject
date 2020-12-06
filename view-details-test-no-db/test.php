<?php
//I need a database with issues in the table to retrieve the info and fill out the necessary HTML sections.

$id = htmlspecialchars($_GET["id"]);
$context = htmlspecialchars($_GET["context"]);


?>

<?php if ($context == "view-details"): ?>
    <h2>Issue Title</h2>
    <h3>Issue #<?= $id ?></h3>
    <p>Issue Description</p>
    <ul>
        <li>Assigned To: </li>
        <li>Type: </li>
        <li>Priority: </li>
        <li>Status: </li>
    </ul>
    <div>
        <button class="closed" id="<?= $id ?>" onClick="getIssueID(this.id)">Mark as Closed</button>
    </div>
    <div>
        <button class="in-progress" id="<?= $id ?>" onClick="getIssueID(this.id)">Mark In Progress</button>
    </div>
    <p>Issue Created on _date_ by _name_ </p>
    <p>Last Update on _date_</p>
    <p>CONTEXT: <?= $context ?></p>
<?php elseif ($context == "closed"): ?>
    <h2>Issue Title</h2>
    <h3>Issue #<?= $id ?></h3>
    <p>Issue Description</p>
    <ul>
        <li>Assigned To: </li>
        <li>Type: </li>
        <li>Priority: </li>
        <li>Status: <?= $context ?></li>
    </ul>
    <div>
        <button class="closed" id="<?= $id ?>" onClick="getIssueID(this.id)">Mark as Closed</button>
    </div>
    <div>
        <button class="in-progress" id="<?= $id ?>" onClick="getIssueID(this.id)">Mark In Progress</button>
    </div>
    <p>Issue Created on _date_ by _name_ </p>
    <p>Last Update on _date_</p>
    <p>CONTEXT: <?= $context ?></p>
<?php elseif ($context == "in-progress"): ?>
    <h2>Issue Title</h2>
    <h3>Issue #<?= $id ?></h3>
    <p>Issue Description</p>
    <ul>
        <li>Assigned To: </li>
        <li>Type: </li>
        <li>Priority: </li>
        <li>Status: <?= $context ?></li>
    </ul>
    <div>
        <button class="closed" id="<?= $id ?>" onClick="getIssueID(this.id)">Mark as Closed</button>
    </div>
    <div>
        <button class="in-progress" id="<?= $id ?>" onClick="getIssueID(this.id)">Mark In Progress</button>
    </div>
    <p>Issue Created on _date_ by _name_ </p>
    <p>Last Update on _date_</p>
    <p>CONTEXT: <?= $context ?></p>
<?php endif ?>