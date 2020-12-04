<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'USERS';
$country = $_GET['country'];
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM title");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>
<hr>
<table class = 'table'>
  <tr>
    <th>Title</th>
    <th>Type</th>
    <th>Status</th>
    <th>Assigned To</th>
    <th>Created</th>
</tr>
<?php foreach ($results as $row): ?>
  <tr>
    <td><?=$row['id'] . $row['title'];?></td>
    <td><?=$row['type'];?></td>
    <td><?=$row['assigned_to'];?></td>
    <td><?=$row['created'];?></td>
</tr>
<?php endforeach;?>


