<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer List</title>
    <link rel="stylesheet" type="text/css" href="../css/mystyles.css"/>
    <link rel="stylesheet" type="text/css" href="../css/tables.css"/>
    <link rel="stylesheet" type="text/css" href="../css/buttons.css"/>

</head>

<body>
<div class="page-wrap">
    <header class="site-header">
        <?php include '../inc/header.php' ?>
    </header>

    <div class="flex-box">
        <nav class="main-nav" role="navigation">
            <?php include '../inc/menu.php' ?>
        </nav>
        <section class="main-content-wide">
            <h2 class="title">Customers</h2>
            <div class="btn"><a class="button" href="customeradd.php">add customer</a></div>
            <div>
                <table id="customertable">
                    <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Zip</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Edit/Del</th>
                    </tr>
                    </thead>
                <?php

                include '../inc/dbConn.php';

                try{
                $db = new PDO($dsn, $username, $password, $options);
                $sql = $db->prepare("select * from customerList");
                $sql->execute();
                $row = $sql->fetch();
                    while ($row != null) {
                        echo "<tbody>";
                        echo "<tr>";
                        echo "<td>" .$row["firstname"]. "</td>";
                        echo "<td>" .$row["lastname"]. "</td>";
                        echo "<td>" .$row["address"]. "</td>";
                        echo "<td>" .$row["city"]. "</td>";
                        echo "<td>" .$row["state"]. "</td>";
                        echo "<td>" .$row["zipcode"]. "</td>";
                        echo "<td>" .$row["phone"]. "</td>";
                        echo "<td>" .$row["email"]. "</td>";
                        echo "<td>" .$row["password"]. "</td>";
                        echo "<td><a href=customerupdate.php?id=" . $row["custID"] .">Edit/Del</a></td>";
                        echo "</tr>";
                        echo "</tbody>";
                        $row = $sql->fetch();
                    }
                }catch (PDOException $e){
                    $error = $e ->getMessage();
                    echo "Error: $error";
                }
                ?>
               </table>

            </div>
        </section>

       <!-- <aside class="main-sidebar" role="complementary">
            Sidebar
        </aside>-->
    </div>

    <footer>
        <?php include '../inc/footer.php' ?>
    </footer>
</div>

</body>

</html>