<?php
    require_once('database.php');

  
//Set search term or hard-code the parameter value
 

 $query = "SELECT  customers.firstName, customers.lastName, registrations.productCode, products.name FROM `customers`
INNER JOIN `registrations` ON registrations.customerID = customers.customerID 
LEFT OUTER JOIN `products` ON products.productCode = registrations.productCode
WHERE customers.customerID = 1004;";
 $stmt = $datab->prepare($query);
 $stmt->execute();

 $stmt->store_result();
 //store result fields in variables
 $stmt->bind_result($firstName, $lastName, $productCode,$name);
?>
<!DOCTYPE html>
<html>


<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>


<body>
    <div id="page">

    <div id="header">
        <h1>Customers</h1>
    </div>

    <div id="main">

        <h1>Customers</h1>

       

        <div id="content">

            
            <table>
                <tr>
                    <th>First Name</th>
                    <th>last Name</th>
                    <th>productCode</th>
                    <th>Name</th></th>
                </tr>
                <?php while ($stmt ->fetch()) { ?>
                <tr>
                    <td><?php echo $firstName; ?></td>
                    <td><?php echo $lastName; ?></td>
                    <td><?php echo $productCode; ?></td>
                    <td><?php echo $name; ?></td>
                </tr>
                <!-- result set is available -->
                
                <?php }
                
    $stmt ->free_result();
    $datab ->close();?>
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