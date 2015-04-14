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
        if ($_POST["kind"] == "TRUE") {
            mysql_query("INSERT INTO CUSTOMERS (customer_name, street, city, state, zip_code, kind, marriage, gender, age, income, b_category, b_company_GAI, store_id) VALUES ('" . $_POST["customer_name"] . "', '" . $_POST["street"] . "', '" . $_POST["city"] . "', '" . $_POST["state"] . "', '" . $_POST["zip_code"] . "', '" . $_POST["kind"] . "', '" . $_POST["marriage"] . "', '" . $_POST["gender"] . "', '" . $_POST["age"] . "', '" . $_POST["income"] . "', null, null, '" . $_POST["store_id"] . "')");
        } else {
            mysql_query("INSERT INTO CUSTOMERS (customer_name, street, city, state, zip_code, kind, marriage, gender, age, income, b_category, b_company_GAI, store_id) VALUES ('" . $_POST["customer_name"] . "', '" . $_POST["street"] . "', '" . $_POST["city"] . "', '" . $_POST["state"] . "', '" . $_POST["zip_code"] . "', '" . $_POST["kind"] . "',null, null, null, null, '" . $_POST["b_category"] . "', '" . $_POST["b_company_GAI"] . "', '" . $_POST["store_id"] . "')");
        }
        echo "<meta http-equiv=\"Refresh\" content=\"0;Customer.php\">";
        mysql_close($con);
        ?>
    </body>
</html>
