<?php
include("connect.php");

$category = $_GET["category"];

$SELECT = "SELECT category.c_name as category, items.name, items.price, items.quantity, items.quality FROM items
JOIN category ON category.ID_Category = items.FID_Category
WHERE category.c_name = :category";

try {
    $stmt = $dbh->prepare($SELECT);
    $stmt->bindValue(":category", $category);
    $stmt->execute();

    $res = $stmt->fetchAll();
} catch (PDOException $ex) {
    echo $ex->GetMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items by Category</title>
    <link rel="stylesheet" href="./response.css">
</head>
<body>

<h2>Items in Category <?php echo $category; ?></h2>

<table>
    <thead>
        <tr>
            <th>Category</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Quality</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($res as $row): ?>
            <tr>
                <td><?php echo $row['category']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['quantity']; ?></td>
                <td><?php echo $row['quality']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
