<?php
include 'db.php';

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM items WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$item = $stmt->fetch();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("UPDATE items SET name = :name, description = :description WHERE id = :id");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Item</title>
</head>
<body>
    <h2>Update Item</h2>
    <form method="POST" action="update.php?id=<?php echo $item['id']; ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $item['name']; ?>" required>
        <br>
        <label for="description">Description:</label>
        <textarea name="description" id="description" required><?php echo $item['description']; ?></textarea>
        <br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
