<?php
    require_once('database.php');
      // Get orders
    $customerID = 1;

    $query = "SELECT orderID, orderDate FROM orders WHERE $customerID =1";
    $stmt = $db ->prepare($query);
    $stmt ->execute();
    $stmt ->store_result();
    
    $stmt ->bind_result($orderID, $orderDate);
?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
    <div id="page">

    <div id="header">
        <h1>Orders</h1>
    </div>

    <div id="main">

        <h1>Order List</h1>

       <!-- this was the div ID sidebar, that we WILL need for Assignment 1, but not this lab -->

        <div id="content">
            <!-- display a table of customers -->
              <!-- display a list of orders -->
            
            <table>
                <tr>
                    <th>Order ID</th>
                    <th>Order Date</th>
                </tr>
                <?php while ($stmt ->fetch()) { ?>
                <tr>
                    <td><?php echo $orderID; ?></td>
                    <td><?php echo $orderDate; ?></td>
                </tr>
                <!-- result set is available -->
                
                <?php }
                
    $stmt ->free_result();
    $db ->close();?>
            </table>
            <br>
        </div>
    </div>

    <div id="footer">
        <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
    </div>

    </div><!-- end page -->
</body>
</html>