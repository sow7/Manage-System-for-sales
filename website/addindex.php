<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $con = mysql_connect("localhost:3307", "root", "root");
        if (!$con) {
            die('Could not connect: ' . mysql_error());
        }
        mysql_select_db("test", $con);
        $price = mysql_query("select price, stock from products where product_id=" . $_POST["product_id"]);
        $row = mysql_fetch_array($price);
        //$total = $row['price'] * $_POST["quantity"];
        $newstock = $row['stock'] - $_POST["quantity"];
        if ($newstock < '0' && $row['stock'] > '0') {
            echo "<script>alert('The product only have " . $row['stock'] . ". Your order cannot be submitted.');</script>";
            echo "<meta http-equiv=\"Refresh\" content=\"0;index.php\">";
        } elseif ($newstock < '0' && $row['stock'] == '0') {
            echo "<script>alert('The product is out of stock');</script>";
            echo "<meta http-equiv=\"Refresh\" content=\"0;index.php\">";
        } else {
            echo "<meta http-equiv=\"Refresh\" content=\"0;index.php\">";
            mysql_query("update products set stock=" . $newstock . " where product_id=" . $_POST["product_id"]);
            //echo $total;
            mysql_query("INSERT INTO TRANSACTIONS (salesperson_id, product_id, customer_id, store_id, quantity, status) "
                    . "VALUES ('" . $_POST["salesperson_id"] . "', '" . $_POST["product_id"] . "', '" . $_POST["customer_id"] . "', '" . $_POST["store_id"] . "', '" . $_POST["quantity"] . "', 'submitted')");
            echo "<meta http-equiv=\"Refresh\" content=\"0;index.php\">";
        }
        mysql_close($con);
        ?>
    </body>
</html>