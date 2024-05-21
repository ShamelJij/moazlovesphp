<?php
include 'db.php';

$stmt = $conn->prepare("SELECT * FROM items");
$stmt->execute();
$items = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Items</title>
</head>
<body>
    <h2>Items</h2>
    <a href="create.php">Create New Item</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($items as $item): ?>
            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['name']; ?></td>
                <td><?php echo $item['description']; ?></td>
                <td>
                    <a href="update.php?id=<?php echo $item['id']; ?>">Update</a>
                    <a href="delete.php?id=<?php echo $item['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
