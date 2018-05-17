<?php
$dsn = "mysql:host=localhost;dbname=blog";
$user = "root";
$pass = "123456";
$conn = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

$sql = "insert into label(name, status, created_at, updated_at) VALUES (:name, :status, :created_at, :updated_at)";

$updateSql = "update label set name = 'AUTO' WHERE id = :id";

$getSql = "select * from label where status = 0";

$stmt = $conn->prepare($getSql);
$stmt->execute();
//$stmt->execute([':id'=>7]);
//$stmt->execute([
//    ':name' => 'Hello',
//    ':status' => 0,
//    ':created_at' => date('Y-m-d H:i:s'),
//    ':updated_at' => date('Y-m-d H:i:s'),
//]);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$res = $stmt->fetchAll();
var_dump($res);
