<?php
    require_once('database.php');
    // Get customers
    $query = "SELECT firstName, lastName FROM customers order by lastName;";
    // result set
    $customers = $db->query($query);

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
        <h1>customer Manager</h1>
    </div>

    <div id="main">

        <h1>customer List</h1>

       <!-- this was the div ID sidebar, that we WILL need for Assignment 1, but not this lab -->

        <div id="content">
            <!-- display a table of customers -->
            
            <table>
                
                 <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                </tr>
                
                <?php foreach ($customers as $customer) : ?>
                <tr>
                    <td><?php echo $customer['firstName']; ?></td>
                    <td><?php echo $customer['lastName']; ?></td>
                    
                    
                </tr>
                <?php endforeach; ?>  <!-- This foreach line iterated through an array -->
            </table>
            <!--we deleted an old add customer line here -->
        </div>
    </div>

    <div id="footer">
        <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
    </div>

    </div><!-- end page -->
</body>
</html>