<?php
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


                                    //Database connection stuff
                                    include '../inc/dbConn.php';

                                    try {
                                        $db = new PDO($dsn, $username, $password, $options);
                                        $sql = $db->prepare("insert into customerList (firstname,lastname,address,city,state,zipcode,phone,password,email) VALUE(:fname, :lname, :address, :city, :state, :zipcode, :phone, :password, :email)");
                                        $sql->bindValue(":fname", $fname);
                                        $sql->bindValue(":lname", $lname);
                                        $sql->bindValue(":address", $address);
                                        $sql->bindValue(":city", $city);
                                        $sql->bindValue(":state", $state);
                                        $sql->bindValue(":zipcode", $zipcode);
                                        $sql->bindValue(":phone", $phone);
                                        $sql->bindValue(":email", $email);
                                        $sql->bindValue(":password", $passw);
                                        $sql->execute();
                                    } catch (PDOException $e) {
                                        $error = $e->getMessage();
                                        echo "Error: $error";
                                    }
                                    header("Location:customerlist.php");

                                }


                            }


                        }


                    }


                }


            }


        }


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
                    <label for="Fname">First Name</label>
                    <input type="text" id="txtFname" name="txtFname" placeholder="First Name.." required>

                    <label for="Lname">Last Name</label>
                    <input type="text" id="txtLname" name="txtLname" placeholder="Last Name.." required>

                    <label for="Address">Address</label>
                    <input type="text" id="txtAddress" name="txtAddress" placeholder="Address.." required>

                    <label for="City">City</label>
                    <input type="text" id="txtCity" name="txtCity" placeholder="City.." required>

                    <label for="State">State</label>
                    <input type="text" id="txtState" name="txtState" placeholder="State.." required>

                    <label for="Zipcode">Zip Code</label>
                    <input type="text" id="txtZipcode" name="txtZipcode" placeholder="Zip Code.." required>

                    <label for="Phone">Phone</label>
                    <input type="tel" id="txtPhone" name="txtPhone" placeholder="Phone.." required>

                    <label for="Email">Email</label>
                    <input type="email" id="txtEmail" name="txtEmail" placeholder="Email.." required>

                    <label for="Password">Password</label>
                    <input type="password" id="txtPassword" name="txtPassword" required placeholder="Password.." required>

                    <input type="submit" value="Save">
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