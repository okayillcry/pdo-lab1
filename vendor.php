<?php
    include("connect.php");

    $vendor = $_GET["vendor"];

    $SELECT = "SELECT items.name, items.price, items.quantity, items.quality, vendors.v_name as vendor FROM items
    JOIN vendors ON vendors.ID_Vendors = items.FID_Vendor
    WHERE vendors.v_name = :vendor";

    try {
        $stmt = $dbh->prepare($SELECT);
        $stmt->bindValue(":vendor", $vendor);
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
    <title>Items from Vendor</title>
    <link rel="stylesheet" href="./response.css">
</head>
<body>

<h2>Items from vendor</h2>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Quality</th>
            <th>Vendor</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($res as $row): ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td><?php echo $row['quality']; ?></td>
            <td><?php echo $row['vendor']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
