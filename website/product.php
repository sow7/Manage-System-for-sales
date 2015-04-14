<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8"></meta>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"></meta>
        <meta name="viewport" content="width=device-width, initial-scale=1"></meta>
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Sales system - Product</title>
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="css/system.css" rel="stylesheet" />
        <link href="css/dataTables.editor.min.css" rel="stylesheet" />
        <link href="css/bootstrap-table.min.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.css" type="text/css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/tabletools/2.2.3/css/dataTables.tableTools.css" type="text/css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.5/css/jquery.dataTables.css" type="text/css" rel="stylesheet" />
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-table.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/tabletools/2.2.3/js/dataTables.tableTools.min.js"></script>
        <script src="js/dataTables.editor.min.js"></script>
        <script>
            $(document).ready(
                    function () {
                        var table = $('#example').DataTable();
                    });
        </script>
    </head>

    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="index.php">Transaction</a>
                        </li>
                        <li class="active">
                            <a href="product.php">Product</a>
                        </li>
                        <li>
                            <a href="Customer.php">Customer</a>
                        </li>
                        <li>
                            <a href="analysis.php">Analysis</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle" aria-expanded="false" role="button" data-toggle="dropdown" href="#">Store
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="shopchoose.php">Region</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <!--header-->
            <div class="page-header">
                <h1>Products Stock Management</h1>
            </div>
            <blockquote>
                <em>As a shop assistent, you can use the buttons below to manage the product stock of your shop.<br /> Furthermore, you can search and choose any column you want to see by clicking the icon beside search bar.</em>
            </blockquote>

            <!--table-->
            <div class="table-responsive"style="margin-top: 0px;">
                <div class="DTTT_container" style="float:left;">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#NewTransaction">New</button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#EditTransaction">Edit</button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#DeleteTransaction">Delete</button>
                </div>
                <table id="example" class="DTTT_selectable dataTable table table-striped table-hover" data-sort-name="ID" data-sort-order="desc" data-search="true" data-toggle="true" data-show-columns="true" data-toolbar="#toolbar" role="grid">
                    <thead>
                        <tr>
                            <th data-field="product_id" data-sortable="true">Product ID</th>
                            <th data-field="product_name" data-sortable="true">Product</th>
                            <th data-field="size" data-sortable="true">Size</th>
                            <th data-field="price" data-sortable="true">Price</th>
                            <th data-field="stock" data-sortable="true">Stock</th>
                            <th data-field="store" data-sortable="true">Store</th>
                            <th data-field="region" data-sortable="true">Region</th>
                            <th data-field="region" data-sortable="true">Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $con = mysql_connect("localhost:3307", "root", "root");
                        if (!$con) {
                            die('Could not connect: ' . mysql_error());
                        }
                        mysql_select_db("test", $con);

                        $result = mysql_query("SELECT product_id, product_name, size, price, stock, p.store_id, p.category, region_name FROM PRODUCTS p, store s, region r  "
                                . "where p.store_id=s.store_id and s.region_id=r.region_id");

                        while ($row = mysql_fetch_array($result)) {
                            echo " <tr>";
                            echo "<td>" . $row['product_id'] . "</td>";
                            echo "<td>" . $row['product_name'] . "</td>";
                            echo "<td>" . $row['size'] . "</td>";
                            echo "<td>$" . $row['price'] . "</td>";
                            echo "<td>" . $row['stock'] . "</td>";
                            echo "<td>store" . $row['store_id'] . "</td>";
                            echo "<td>" . $row['region_name'] . "</td>";
                            echo "<td>" . $row['category'] . "</td>";
                            echo " </tr>";
                        }
                        mysql_close($con);
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="modal fade" id="NewTransaction" tabindex="-1" role="dialog" aria-labelledby="NewItem" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="NewItem">New Product</h4>
                        </div>
                        <form action="addproduct.php" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="product_name" class="control-label">Product name:</label>
                                    <input type="text" class="form-control" id="product_name" name="product_name"></input>
                                </div>
                                <div class="form-group">
                                    <label for="product_name" class="control-label">Product category:</label>
                                    <input type="text" class="form-control" id="product_category" name="product_category"></input>
                                </div>
                                <div class="form-group">
                                    <label for="size" class="control-label">Size:</label>
                                    <input type="number" class="form-control" id="size" name="size"></input>
                                </div>
                                <div class="form-group">
                                    <label for="price" class="control-label">Price:</label>
                                    <input type="number" class="form-control" id="price" name="price"></input>
                                </div>
                                <div class="form-group">
                                    <label for="stock" class="control-label">Stock:</label>
                                    <input type="number" class="form-control" id="stock" name="stock"></input>
                                </div>
                                <div class="form-group">
                                    <label for="stock" class="control-label">Store:</label>
                                    <input type="number" class="form-control" id="store" name="store"></input>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary" value="Add"></input>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="EditTransaction" tabindex="-1" role="dialog" aria-labelledby="NewItem2" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="NewItem2">Edit Product</h4>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="product_id" class="control-label">Product ID:</label>
                                    <input type="number" class="form-control" id="product_id">
                                </div>
                                <div class="form-group">
                                    <label for="product_name" class="control-label">Product name:</label>
                                    <input type="text" class="form-control" id="product_name">
                                </div>
                                <div class="form-group">
                                    <label for="size" class="control-label">Size:</label>
                                    <input type="number" class="form-control" id="size">
                                </div>
                                <div class="form-group">
                                    <label for="price" class="control-label">Price:</label>
                                    <input type="number" class="form-control" id="price">
                                </div>
                                <div class="form-group">
                                    <label for="stock" class="control-label">Stock:</label>
                                    <input type="number" class="form-control" id="stock">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
