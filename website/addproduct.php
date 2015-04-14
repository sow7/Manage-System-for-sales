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
        $check = mysql_query("select * from products where product_name='" . $_POST["product_name"] . "' and size='" . $_POST["size"] . "' and store_id='" . $_POST["store"] . "' and price='" . $_POST["price"] . "' and category='" . $_POST["product_category"] . "'");
        if ($check['product_id'] != null) {
            $row = mysql_fetch_array($check);
            $newstock = $row['stock'] + $_POST["stock"];
            echo $newstock;
            mysql_query("update products set stock='" . $newstock . "' where product_name='" . $_POST["product_name"] . "' and size='" . $_POST["size"] . "' and store_id='" . $_POST["store"] . "' and price='" . $_POST["price"] . "' and category='" . $_POST["product_category"] . "'");
        } else {
            echo 'sucess';
            mysql_query("INSERT INTO PRODUCTS (product_name, size, price, stock, category, store_id) VALUES ('" . $_POST["product_name"] . "', '" . $_POST["size"] . "', '" . $_POST["price"] . "', '" . $_POST["stock"] . "', '" . $_POST["product_category"] . "', '" . $_POST["store"] . "')");
        }
        echo "<meta http-equiv=\"Refresh\" content=\"0; product.php\">";
        mysql_close($con);
        ?>
    </body>
</html>
