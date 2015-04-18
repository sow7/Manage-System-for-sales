<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta charset="utf-8"></meta>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"></meta>
        <meta name="viewport" content="width=device-width, initial-scale=1"></meta>
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Sales system - Transaction</title>
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
                        <li class="active">
                            <a href="index.php">Transaction</a>
                        </li>
                        <li>
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
                <h1>Transaction Management</h1>
            </div>
            <blockquote>
                <em>As a shop assistent, you can use the buttons below to manage the transactions of your shop.<br /> Furthermore, you can search and choose any column you want to see by clicking the icon beside search bar.</em>
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
                        <tr role="row">
                            <th data-field="transaction_id" data-sortable="true">Transaction Number</th>
                            <th data-field="date" data-sortable="true">Date</th>
                            <th data-field="salesperson_name" data-sortable="true">Salesperson</th>
                            <th data-field="product_name" data-sortable="true">Product</th>
                            <th data-field="price" data-sortable="true">Price</th>
                            <th data-field="quantity" data-sortable="true">Quantity</th>
                            <th data-field="total" data-sortable="true">Total</th>
                            <th data-field="customer_name" data-sortable="true">Customer</th>
                            <th data-field="status" data-sortable="true">Status</th>
                            <th data-field="store" data-sortable="true">Store</th>
                            <th data-field="region" data-sortable="true">Region</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $con = mysql_connect("localhost:3307", "root", "root");
                        if (!$con) {
                            die('Could not connect: ' . mysql_error());
                        }
                        mysql_select_db("test", $con);

                        $result = mysql_query("SELECT t.transaction_id, t.date, s.salesperson_name, p.product_name, p.price, t.quantity, c.customer_name, t.status, t.store_id, r.region_name "
                                . "FROM PRODUCTS p, transactions t, customers c, salespersons s, store s1, region r "
                                . "where t.salesperson_id=s.salesperson_id "
                                . "and t.customer_id=c.customer_id "
                                . "and t.product_id=p.product_id "
                                . "and t.store_id=s1.store_id "
                                . "and s1.region_id=r.region_id");
                        while ($row = mysql_fetch_array($result)) {
                            echo " <tr>";
                            echo "<td>" . $row['transaction_id'] . "</td>";
                            echo "<td>" . $row['date'] . "</td>";
                            echo "<td>" . $row['salesperson_name'] . "</td>";
                            echo "<td>" . $row['product_name'] . "</td>";
                            echo "<td>$" . $row['price'] . "</td>";
                            echo "<td>" . $row['quantity'] . "</td>";
                            echo "<td>$" . $row['price'] * $row['quantity'] . "</td>";
                            echo "<td>" . $row['customer_name'] . "</td>";
                            echo "<td>" . $row['status'] . "</td>";
                            echo "<td>store" . $row['store_id'] . "</td>";
                            echo "<td>" . $row['region_name'] . "</td>";
                            echo " </tr>";
                        }
                        mysql_close($con);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="modal fade" id="NewTransaction" tabindex="-1" role="dialog" aria-labelledby="NewItem" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="NewItem">New Transaction</h4>
                    </div>
                    <form action="addindex.php" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="product_id" class="control-label">Product ID:</label>
                                <input type="number" class="form-control" id="product_id" name="product_id"></input>
                            </div>
                            <div class="form-group">
                                <label for="quantity" class="control-label">Quantity:</label>
                                <input type="number" class="form-control" id="quantity" name="quantity"></input>
                            </div>
                            <div class="form-group">
                                <label for="customer_id" class="control-label">Customer ID:</label>
                                <input type="number" class="form-control" id="customer_id" name="customer_id"></input>
                            </div>
                            <div class="form-group">
                                <label for="salesperson_name" class="control-label">Salesperson:</label>
                                <input type="text" class="form-control" id="salesperson_id" name="salesperson_id"></input>
                            </div>
                            <div class="form-group">
                                <label for="Store" class="control-label">Store:</label>
                                <input type="text" class="form-control" id="store_id" name="store_id"></input>
                            </div>

                            <div id="kind" class="form-group">
                                <p>Status:</p>
                                <div class="box">
                                    <label for="success"><input type="radio" name="status" id="status" value="submitted">Success</label>
                                    <label for="return"><input type="radio" name="status" id="status" value="return">Returned</label>
                                </div>
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
        </div>
        <div class="modal fade" id="EditTransaction" tabindex="-1" role="dialog" aria-labelledby="NewItem2" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="NewItem2">Edit Transaction</h4>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="product_id" class="control-label">Product ID:</label>
                                <input type="number" class="form-control" id="product_id">
                            </div>
                            <div class="form-group">
                                <label for="quantity" class="control-label">Quantity:</label>
                                <input type="number" class="form-control" id="quantity">
                            </div>
                            <div class="form-group">
                                <label for="customer_id" class="control-label">Customer ID:</label>
                                <input type="number" class="form-control" id="customer_id">
                            </div>
                            <div class="form-group">
                                <label for="salesperson_name" class="control-label">Salesperson:</label>
                                <input type="text" class="form-control" id="salesperson_name">
                            </div>
                            <div class="form-group">
                                <label for="status" class="control-label">Status:</label>
                                <input type="text" class="form-control" id="status">
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
    </body>
</html>
