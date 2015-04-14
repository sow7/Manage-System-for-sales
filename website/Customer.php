<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8"></meta>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"></meta>
        <meta name="viewport" content="width=device-width, initial-scale=1"></meta>
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Sales system - Customers</title>
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
                        <li>
                            <a href="product.php">Product</a>
                        </li>
                        <li class="active">
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
                <h1>Customers Management</h1>
            </div>
            <blockquote>
                <em>As a shop assistent, you can use the buttons below to manage the customer system of your shop.<br /> Furthermore, you can search and choose any column you want to see by clicking the icon beside search bar.</em>
            </blockquote>

            <!--table-->
            <div class="table-responsive"style="margin-top: 0px;">
                <div class="DTTT_container" style="float:left;">
                    <!--<a id="new" class="DTTT_button DTTT_button_text" tabindex="0" aria-controls="example">
                    <span>New</span>
                </a>
                <a id="edit" class="DTTT_button DTTT_button_text" tabindex="0" aria-controls="example">
                    <span>Edit</span>
                </a>
                <a id="Delete" class="DTTT_button DTTT_button_text" tabindex="0" aria-controls="example">
                    <span>Delete</span>
                </a>-->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#NewTransaction">New</button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#EditTransaction">Edit</button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#DeleteTransaction">Delete</button>
                </div>
                <table id="example" class="DTTT_selectable dataTable table table-striped table-hover" data-sort-name="ID" data-sort-order="desc" data-search="true" data-toggle="true" data-show-columns="true" data-toolbar="#toolbar" role="grid">
                    <thead>
                        <tr role="row">
                            <th data-field="customer_id" data-sortable="true">Customer ID</th>
                            <th data-field="customer_name" data-sortable="true">Name</th>
                            <th data-field="street" data-sortable="true">Street</th>
                            <th data-field="city" data-sortable="true">City</th>
                            <th data-field="state" data-sortable="true">State</th>
                            <th data-field="zip_code" data-sortable="true">Zip Code</th>
                            <th data-field="kind" data-sortable="true">Kind</th>
                            <th data-field="marriage" data-sortable="true">Marriage</th>
                            <th data-field="gender" data-sortable="true">Gender</th>
                            <th data-field="age" data-sortable="true">Age</th>
                            <th data-field="income" data-sortable="true">Income</th>
                            <th data-field="b_category" data-sortable="true">Category</th>
                            <th data-field="b_company_GAI" data-sortable="true">Company GAI</th>
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

                        $result = mysql_query("SELECT c.customer_id,c.customer_name,c.street,c.city,c.state,c.zip_code,c.kind,c.marriage,c.gender,c.age,c.income,c.b_category,c.b_company_GAI,c.store_id, r.region_name "
                                . "FROM customers c, store s, region r "
                                . "where c.store_id=s.store_id "
                                . "and s.region_id=r.region_id");

                        while ($row = mysql_fetch_array($result)) {
                            if ($row['kind'] == "TRUE") {
                                echo "<tr>";
                                echo "<td>" . $row['customer_id'] . "</td>";
                                echo "<td>" . $row['customer_name'] . "</td>";
                                echo "<td>" . $row['street'] . "</td>";
                                echo "<td>" . $row['city'] . "</td>";
                                echo "<td>" . $row['state'] . "</td>";
                                echo "<td>" . $row['zip_code'] . "</td>";
                                echo "<td>Home</td>";
                                if ($row['marriage'] == "TRUE") {
                                    echo "<td>Yes</td>";
                                } else {
                                    echo "<td>No</td>";
                                }
                                echo "<td>" . $row['gender'] . "</td>";
                                echo "<td>" . $row['age'] . "</td>";
                                echo "<td>" . $row['income'] . "</td>";
                                echo "<td></td>";
                                echo "<td></td>";
                                echo "<td>store" . $row['store_id'] . "</td>";
                                echo "<td>" . $row['region_name'] . "</td>";
                                echo "</tr>";
                            } else {
                                echo "<tr>";
                                echo "<td>" . $row['customer_id'] . "</td>";
                                echo "<td>" . $row['customer_name'] . "</td>";
                                echo "<td>" . $row['street'] . "</td>";
                                echo "<td>" . $row['city'] . "</td>";
                                echo "<td>" . $row['state'] . "</td>";
                                echo "<td>" . $row['zip_code'] . "</td>";
                                echo "<td>Business</td>";
                                echo "<td></td>";
                                echo "<td></td>";
                                echo "<td></td>";
                                echo "<td></td>";
                                echo "<td>" . $row['b_category'] . "</td>";
                                echo "<td>" . $row['b_company_GAI'] . "</td>";
                                echo "<td>store" . $row['store_id'] . "</td>";
                                echo "<td>" . $row['region_name'] . "</td>";
                                echo "</tr>";
                            }
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
                        <h4 class="modal-title" id="NewItem">New Customer</h4>
                    </div>
                    <form action="addCustomer.php" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="customer_name" class="control-label">Name:</label>
                                <input type="text" class="form-control" id="customer_name" name="customer_name"></input>
                            </div>
                            <div class="form-group">
                                <label for="street" class="control-label">Street:</label>
                                <input type="text" class="form-control" id="street" name="street"></input>
                            </div>
                            <div class="form-group">
                                <label for="city" class="control-label">City:</label>
                                <input type="text" class="form-control" id="city" name="city"></input>
                            </div>
                            <div class="form-group">
                                <label for="state" class="control-label">State:</label>
                                <input type="text" class="form-control" id="state" name="state"></input>
                            </div>
                            <div class="form-group">
                                <label for="zip_code" class="control-label">Zip code:</label>
                                <input type="number" class="form-control" id="zip_code" name="zip_code"></input>
                            </div>
                            <div id="kind" class="form-group">
                                <p>Kind:</p>
                                <div class="box">
                                    <label for="home"><input type="radio" name="kind" id="kind" value="TRUE">Home</label>
                                    <label for="business"><input type="radio" name="kind" id="kind" value="FALSE">Business</label>
                                </div>
                            </div>
                            <div id="kind" class="form-group">
                                <p>Marriage:</p>
                                <div class="box">
                                    <label for="yes"><input type="radio" name="marriage" id="marriage" value="TRUE">Yes</label>
                                    <label for="no"><input type="radio" name="marriage" id="marriage" value="FALSE">No</label>
                                </div>
                            </div>
                            <div id="kind" class="form-group">
                                <p>Gender:</p>
                                <div class="box">
                                    <label for="male"><input type="radio" name="gender" id="gender" value="Male">Male</label>
                                    <label for="female"><input type="radio" name="gender" id="gender" value="Female">Female</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="age" class="control-label">Age:</label>
                                <input type="text" class="form-control" id="age" name="age"></input>
                            </div>
                            <div class="form-group">
                                <label for="income" class="control-label">Income:</label>
                                <input type="text" class="form-control" id="income" name="income"></input>
                            </div>
                            <div class="form-group">
                                <label for="b_category" class="control-label">(If business) Category:</label>
                                <input type="text" class="form-control" id="b_category" name="b_category"></input>
                            </div>
                            <div class="form-group">
                                <label for="b_company_GAI" class="control-label">(If business) Company GAI:</label>
                                <input type="text" class="form-control" id="b_company_GAI" name="b_company_GAI"></input>
                            </div>
                            <div class="form-group">
                                <label for="Store" class="control-label">Store:</label>
                                <input type="text" class="form-control" id="store_id" name="store_id"></input>
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
                        <h4 class="modal-title" id="NewItem2">Edit Customer</h4>
                    </div>
                    <form>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="customer_name" class="control-label">Name:</label>
                                <input type="text" class="form-control" id="customer_name" name="customer_name"></input>
                            </div>
                            <div class="form-group">
                                <label for="street" class="control-label">Street:</label>
                                <input type="text" class="form-control" id="street" name="street"></input>
                            </div>
                            <div class="form-group">
                                <label for="city" class="control-label">City:</label>
                                <input type="text" class="form-control" id="city" name="city"></input>
                            </div>
                            <div class="form-group">
                                <label for="state" class="control-label">State:</label>
                                <input type="text" class="form-control" id="state" name="state"></input>
                            </div>
                            <div class="form-group">
                                <label for="zip_code" class="control-label">Zip code:</label>
                                <input type="number" class="form-control" id="zip_code" name="zip_code"></input>
                            </div>
                            <div id="kind" class="form-group">
                                <p>Kind:</p>
                                <div class="box">
                                    <label for="home"><input type="radio" name="kind" id="kind" value="home">Home</label>
                                    <label for="business"><input type="radio" name="kind" id="kind" value="business">Business</label>
                                </div>
                            </div>
                            <div id="kind" class="form-group">
                                <p>Marriage:</p>
                                <div class="box">
                                    <label for="yes"><input type="radio" name="marriage" id="marriage" value="yes">Yes</label>
                                    <label for="no"><input type="radio" name="marriage" id="marriage" value="no">No</label>
                                </div>
                            </div>
                            <div id="kind" class="form-group">
                                <p>Gender:</p>
                                <div class="box">
                                    <label for="male"><input type="radio" name="gender" id="gender" value="male">Male</label>
                                    <label for="female"><input type="radio" name="gender" id="gender" value="female">Female</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="age" class="control-label">Age:</label>
                                <input type="text" class="form-control" id="age" name="age"></input>
                            </div>
                            <div class="form-group">
                                <label for="income" class="control-label">Income:</label>
                                <input type="text" class="form-control" id="income" name="income"></input>
                            </div>
                            <div class="form-group">
                                <label for="b_category" class="control-label">(If business) Category:</label>
                                <input type="text" class="form-control" id="b_category" name="b_category"></input>
                            </div>
                            <div class="form-group">
                                <label for="b_company_GAI" class="control-label">(If business) Company GAI:</label>
                                <input type="text" class="form-control" id="b_company_GAI" name="b_company_GAI"></input>
                            </div>
                            <div class="form-group">
                                <label for="Store" class="control-label">Store:</label>
                                <input type="text" class="form-control" id="store_id" name="store_id"></input>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="button" class="btn btn-primary" value="Add"></input>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

