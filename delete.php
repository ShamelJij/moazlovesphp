<?php
include 'db.php';

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM items WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();

header("Location: index.php");
exit();
?>
