<?php
session_start();
$key = sprintf('%04X%04X%04X%04X%04X%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
//echo $key;
//exit();


if (isset($_POST["submit"])) {

    if (empty($_POST["txtFname"])) {
        $errmsg = "First Name is required";
    } else {
        $fname = $_POST["txtFname"];
    }

    if (empty($_POST["txtLname"])) {
        $errmsg = "Last Name is required";
    } else {
        $lname = $_POST["txtLname"];
    }

    if (empty($_POST["txtAddress"])) {
        $errmsg = "Address is required";
    } else {
        $address = $_POST["txtAddress"];
    }

    if (empty($_POST["txtCity"])) {
        $errmsg = "City is required";
    } else {
        $city = $_POST["txtCity"];
    }
    if (empty($_POST["txtState"])) {
        $errmsg = "State is required";
    } else {
        $state = $_POST["txtState"];
    }

    if (empty($_POST["txtZipcode"])) {
        $errmsg = "Zipcode is required";
    } else {
        $zipcode = $_POST["txtZipcode"];
    }
    if (empty($_POST["txtPhone"])) {
        $errmsg = "Phone is required";
    } else {
        $phone = $_POST["txtPhone"];
    }
    if (empty($_POST["txtEmail"])) {
        $errmsg = "Email is required";
    } else {
        $email = $_POST["txtEmail"];
    }

    if (empty($_POST["txtPassword"])) {
        $errmsg = "Password is required";
    } else {
        $passw = $_POST["txtPassword"];
    }

    if ($passw != $_POST["txtPassword2"]) {
        $errmsg = "Passwords do not match";
    }
    if ($errmsg == "") {

        //Database connection stuff
        include '../inc/dbConn.php';

        try {
            $db = new PDO($dsn, $username, $password, $options);
            $sql = $db->prepare("insert into customerList (firstname,lastname,address,city,state,zipcode,phone,password,email,custKey) VALUE(:fname, :lname, :address, :city, :state, :zipcode, :phone, :password, :email, :key)");
            $sql->bindValue(":fname", $fname);
            $sql->bindValue(":lname", $lname);
            $sql->bindValue(":address", $address);
            $sql->bindValue(":city", $city);
            $sql->bindValue(":state", $state);
            $sql->bindValue(":zipcode", $zipcode);
            $sql->bindValue(":phone", $phone);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":password", md5($passw . $key));
            $sql->bindValue(":key", $key);
            $sql->execute();
        } catch (PDOException $e) {
            $error = $e->getMessage();
            echo "Error: $error";
        }

       // echo $passw . " | " . $key . " | " . md5($passw . $key);
       // exit();
        $fname = "";
        $lname="";
        $address="";
        $city="";
        $state = "";
        $zipcode="";
        $phone="";
        $email="";
        $errmsg = "User Successfully Added";

    }


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
            <h2 class="title">Add Customer</h2>
            <div class="form">
                <form method="post">
                    <h4 class="error"><?= $errmsg ?></h4>
                    <label for="Fname">First Name</label>
                    <input type="text" id="txtFname" name="txtFname" value="<?=$fname?>" placeholder="First Name.." >

                    <label for="Lname">Last Name</label>
                    <input type="text" id="txtLname" name="txtLname" value="<?=$lname?>" placeholder="Last Name.." >

                    <label for="Address">Address</label>
                    <input type="text" id="txtAddress" name="txtAddress" value="<?=$address?>" placeholder="Address.." >

                    <label for="City">City</label>
                    <input type="text" id="txtCity" name="txtCity" value="<?=$city?>" placeholder="City..">

                    <label for="State">State</label>
                    <input type="text" id="txtState" name="txtState" value="<?=$state?>" placeholder="State..">

                    <label for="Zipcode">Zip Code</label>
                    <input type="text" id="txtZipcode" name="txtZipcode" value="<?=$zipcode?>" placeholder="Zip Code..">

                    <label for="Phone">Phone</label>
                    <input type="tel" id="txtPhone" name="txtPhone" value="<?=$phone?>" placeholder="Phone..">

                    <label for="Email">Email</label>
                    <input type="email" id="txtEmail" name="txtEmail" value="<?=$email?>" placeholder="Email..">

                    <label for="Password">Password</label>
                    <input type="password" id="txtPassword" name="txtPassword" placeholder="Password..">

                    <label for="Password2">Confirm Password</label>
                    <input type="password" id="txtPassword2" name="txtPassword2" placeholder="Retype Password..">


                    <input type="submit" name="submit" value="Save">
                    <a class="button-wide" href="#0" onclick="history.go(-1); return(false)">Cancel</a>
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