<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Goods</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <form action="vendor.php" method="get">
        <h2>Goods from vendor</h2>
        <label for="vendor">Vendor</label> <br>
        <select name="vendor" id="vendor">
            <?php
            include("connect.php");

            $SELECT = "SELECT v_name FROM vendors";
            try {
                $stmt = $dbh->prepare($SELECT);
                $stmt->execute();

                $res = $stmt->fetchAll();

                foreach ($res as $row) {
                    echo("<option value='$row[0]'>$row[0]</option>");
                }
            } catch (PDOException $ex) {
                echo $ex->GetMessage();
            }
            ?>
        </select>
        <input type="submit" value="Submit">
    </form>

    <form action="category.php" method="get">
        <h2>Goods in Category</h2>
        <label for="category">Category</label> <br>
        <select name="category" id="category">
            <?php
            $SELECT = "SELECT c_name FROM category";
            try {
                $stmt = $dbh->prepare($SELECT);
                $stmt->execute();

                $res = $stmt->fetchAll();

                foreach ($res as $row) {
                    echo("<option value='$row[0]'>$row[0]</option>");
                }
            } catch (PDOException $ex) {
                echo $ex->GetMessage();
            }
            ?>
        </select>
      <input type="submit" value="Submit">
    </form>

    <form action="price.php" method="get">
        <h2>Price range</h2>
        <?php
            $SELECT = "SELECT MIN(price), MAX(price) FROM items;";
            try {
                $stmt = $dbh->prepare($SELECT);
                $stmt->execute();

                $res = $stmt->fetchAll();

                $minPrice = $res[0][0];
                $maxPrice = $res[0][1];

                $dbh = null;
            } catch (PDOException $ex) {
                echo $ex->GetMessage();
            }
        ?>
        <p style="margin-bottom:0">Price range: <span id="priceValue"></p>
        <input placeholder="<?php echo($minPrice)?>" type="number" id="minPrice" name="minPrice" value="<?php echo $minPrice ?>" min="<?php echo $minPrice ?>" max="<?php echo $maxPrice ?>" step="5"/>
        <input placeholder="<?php echo($maxPrice)?>" type="number" id="maxPrice" name="maxPrice" value="<?php echo $maxPrice ?>" min="<?php echo $minPrice ?>" max="<?php echo $maxPrice ?>" step="5"/>
        <br>
        <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>