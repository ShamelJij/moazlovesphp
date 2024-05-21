<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("INSERT INTO items (name, description) VALUES (:name, :description)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->execute();

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Item</title>
</head>
<body>
    <h2>Create Item</h2>
    <form method="POST" action="create.php">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="description">Description:</label>
        <textarea name="description" id="description" required></textarea>
        <br>
        <input type="submit" value="Create">
    </form>
</body>
</html>
