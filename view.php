<?php
$dbh = new PDO("mysql:host=localhost;dbname=capstonethesis_database", "root", "");
$id = isset($_GET['id']) ? $_GET['id'] : "";
$stat = $dbh->prepare("select * from pdfinformation where id=?");
$stat->bindParam(1, $id);
$stat->execute();
$row = $stat->fetch();
header('Content-Type:' . $row['mime']);
echo $row['data'];
