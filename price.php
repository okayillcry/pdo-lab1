<?php
include("connect.php");

$minPrice = $_GET["minPrice"];
$maxPrice = $_GET["maxPrice"];

$SELECT = "SELECT items.name, items.price, items.quantity, items.quality FROM items
WHERE items.price BETWEEN :minPrice AND :maxPrice";

try {
    $stmt = $dbh->prepare($SELECT);
    $stmt->bindValue(":minPrice", $minPrice);
    $stmt->bindValue(":maxPrice", $maxPrice);
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
    <title>Items by Price Range</title>
    <link rel="stylesheet" href="./response.css">
</head>
<body>

<h2>Items in Price Range <?php echo $minPrice; ?> - <?php echo $maxPrice; ?></h2>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Quality</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($res as $row): ?>
            <tr>
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
