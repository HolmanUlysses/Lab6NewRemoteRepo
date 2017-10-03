<?php
    require_once('database.php');

  
//Set search term or hard-code the parameter value
 $state = 'CA';

 $query = "SELECT firstName, lastName, city FROM customers WHERE 
 state = ? order by lastName";
 $stmt = $datab->prepare($query);
 $stmt->bind_param('s', $state);
 $stmt->execute();

 $stmt->store_result();
 //store result fields in variables
 $stmt->bind_result($firstName, $lastName, $city);
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
                    <th>City</th></th>
                </tr>
                <?php while ($stmt ->fetch()) { ?>
                <tr>
                    <td><?php echo $firstName; ?></td>
                    <td><?php echo $lastName; ?></td>
                    <td><?php echo $city; ?></td>
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