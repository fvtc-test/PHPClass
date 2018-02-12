<?php
session_start();
$key = sprintf('%04X%04X%04X%04X%04X%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));

//Database connection stuff
include '../inc/dbConn.php';


if (isset($_POST["txtFname"])) {
    if (isset($_POST["txtLname"])) {
        if (isset($_POST["txtAddress"])) {
            if (isset($_POST["txtCity"])) {
                if (isset($_POST["txtState"])) {
                    if (isset($_POST["txtZipcode"])) {
                        if (isset($_POST["txtPhone"])) {
                            if (isset($_POST["txtEmail"])) {
                                if (isset($_POST["txtPassword"])) {

                                    $fname = $_POST["txtFname"];
                                    $lname = $_POST["txtLname"];
                                    $address = $_POST["txtAddress"];
                                    $city = $_POST["txtCity"];
                                    $state = $_POST["txtState"];
                                    $zipcode = $_POST["txtZipcode"];
                                    $phone = $_POST["txtPhone"];
                                    $email = $_POST["txtEmail"];
                                    $passw = $_POST["txtPassword"];
                                    $id = $_POST["txtID"];


                                    //Database stuff
                                    try {
                                        $db = new PDO($dsn, $username, $password, $options);
                                        $sql = $db->prepare("update customerList set firstname=:firstname, lastname=:lastname, address=:address, city=:city, state=:state, zipcode=:zipcode, phone=:phone, password=:password, email=:email, custKey=:key where custID=:id");
                                        $sql->bindValue(":id", $id);
                                        $sql->bindValue(":firstname", $fname);
                                        $sql->bindValue(":lastname", $lname);
                                        $sql->bindValue(":address", $address);
                                        $sql->bindValue(":city", $city);
                                        $sql->bindValue(":state", $state);
                                        $sql->bindValue(":zipcode", $zipcode);
                                        $sql->bindValue(":phone", $phone);
                                        $sql->bindValue(":password",md5($passw . $key));
                                        $sql->bindValue(":email", $email);
                                        $sql->bindValue(":key",$key);
                                        $sql->execute();

                                        header("Location:customerlist.php");

                                    } catch (PDOException $e) {
                                        $error = $e->getMessage();
                                        echo "Error: $error";
                                    }


                                }


                                }
                            }
                        }
                    }
                }
            }
        }
}
if (isset($_GET["id"])) {
    $id = $_GET["id"];
//echo $id
//exit();
    try {
        $db = new PDO($dsn, $username, $password, $options);
        $sql = $db->prepare("select * from customerList where custID = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        $row = $sql->fetch();
        $firstname = $row["firstname"];
        $lastname = $row["lastname"];
        $address = $row["address"];
        $city = $row["city"];
        $state = $row["state"];
        $zipcode = $row["zipcode"];
        $phone = $row["phone"];
        $passw = $row["password"];
        $email = $row["email"];

    } catch (PDOException $e) {
        $error = $e->getMessage();
        echo "Error: $error";
    }
}
else{
    header("Location:customerlist.php");

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Customer</title>
    <link rel="stylesheet" type="text/css" href="../css/mystyles.css"/>
    <link rel="stylesheet" type="text/css" href="../css/forms.css"/>
    <link rel="stylesheet" type="text/css" href="../css/buttons.css"/>

    <script type="text/javascript">
        function deleteCustomer(name, id){
            if (confirm("Are you sure you want to delete "+ (name) + "?  This action cannot be undone! ")) {
              //alert('Delete' + id);
                document.location.href ="customerdelete.php?id=" + id;
            }
        }

    </script>
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
        <section class="main-content" role="main">
            <h2 class="title">Update Customer</h2>
            <div class="form">
                <form method="post">
                    <label for="Fname">First Name</label>
                    <input type="text" id="txtFname" name="txtFname" placeholder="First Name.." value="<?=$firstname?>" required>

                    <label for="Lname">Last Name</label>
                    <input type="text" id="txtLname" name="txtLname" placeholder="Last Name.." value="<?=$lastname?>" required>

                    <label for="Address">Address</label>
                    <input type="text" id="txtAddress" name="txtAddress" placeholder="Address.." value="<?=$address?>" required>

                    <label for="City">City</label>
                    <input type="text" id="txtCity" name="txtCity" placeholder="City.." value="<?=$city?>" required>

                    <label for="State">State</label>
                    <input type="text" id="txtState" name="txtState" placeholder="State.." value="<?=$state?>" required>

                    <label for="Zipcode">Zip Code</label>
                    <input type="text" id="txtZipcode" name="txtZipcode" placeholder="Zip Code.." value="<?=$zipcode?>" required>

                    <label for="Phone">Phone</label>
                    <input type="tel" id="txtPhone" name="txtPhone" placeholder="Phone.." value="<?=$phone?>" required>

                    <label for="Email">Email</label>
                    <input type="email" id="txtEmail" name="txtEmail" placeholder="Email.." value="<?=$email?>" required>

                    <label for="Password">Password</label>
                    <input type="password" id="txtPassword" name="txtPassword" required placeholder="Password.." value="<?=$passw?>" required>

                    <input type="submit" value="Save Updates">
                    <input type="button" value="Delete Customers" onclick="deleteCustomer('<?=$firstname?>' + ' <?=$lastname?>',<?=$id?>)" >

                    <a class="button-wide" href="#0" onclick="history.go(-1); return(false)">Cancel</a>
                    <input type="hidden" id="txtID" name="txtID" value="<?=$id?>" >


                </form>
            </div>
        </section>

        <aside class="main-sidebar" role="complementary">
            Sidebar
        </aside>
    </div>

    <footer>
        <?php include '../inc/footer.php' ?>
    </footer>
</div>

</body>

</html>