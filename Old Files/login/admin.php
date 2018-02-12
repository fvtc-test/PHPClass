<?php
 session_start();
$errmsg="";
$key = sprintf('%04X%04X%04X%04X%04X%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));


     if (!isset($_SESSION["UID"])){
      header("Location: index.php");
     }

        if(isset($_POST["submit"])){

            if(empty($_POST["txtName"])){
                $errmsg = "Name is required";
            }else{
                $Name = $_POST["txtName"];
            }

            if(empty($_POST["txtEmail"])){
                $errmsg = "Email is required";
            }else{
                $Email = $_POST["txtEmail"];
            }

            if(empty($_POST["Role"])){
                $errmsg = "Role must be selected";
            }else{
                $Role = $_POST["Role"];
            }

            if(empty($_POST["txtPassword"])){
                $errmsg = "Password is required";
            }else{
                $Password = $_POST["txtPassword"];
            }

            if($Password != $_POST["txtPassword2"] ){
                $errmsg = "Passwords do not match";

            }

            if ($errmsg==""){

                //Database connection stuff
                include '../inc/dbConn.php';

                try{
                    $db = new PDO($dsn, $username, $password, $options);
                    $sql = $db->prepare("insert into login (username,userEmail,userPassword,roleID,userKey) VALUE(:Name,:Email,:Password,:roleID, :Key)");
                    $sql->bindValue(":Name",$Name);
                    $sql->bindValue(":Email",$Email);
                    $sql->bindValue(":Password",md5($Password . $key));
                    $sql->bindValue(":roleID",$Role);
                    $sql->bindValue(":Key",$key);
                    $sql->execute();
                }catch (PDOException $e){
                    $error = $e ->getMessage();
                    echo "Error: $error";
                }

                //echo $Password . " | " . $key . " | " . md5($Password . $key);
                //exit();
                $Name = "";
                $Email="";
                $Password="";
                $Role="";
                $errmsg = "User Successfully Added";

            }



        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
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
            <h2 class="title">Admin: Add Users</h2>
            <div class="form" style="width:500px;">
                <h4 class="error"><?=$errmsg?></h4>
                <form method="post">
                    <label for="Name">First & Last Name</label>
                    <input type="text" id="txtName" name="txtName" VALUE="<?=$Name?>" placeholder="First & Last Name..">

                    <label for="Email">Email</label>
                    <input type="text" id="txtEmail" name="txtEmail" VALUE="<?=$Email?>"  placeholder="Email..">

                    <label for="Role">User Role</label>
                    <select id="Role" name="Role">
                        <option>Select One</option>
                        <?php

                        include '../inc/dbConn.php';

                        try{
                            $db = new PDO($dsn, $username, $password, $options);
                            $sql = $db->prepare("select * from role");
                            $sql->execute();
                            $row = $sql->fetch();
                            while ($row != null) {
                                echo "<option selected value='".$row['RoleID']."' >" .$row["roleValue"]. "</option>";
                                $row = $sql->fetch();
                            }
                        }catch (PDOException $e){
                            $error = $e ->getMessage();
                            echo "Error: $error";
                        }
                        ?>
                    </select>

                    <label for="Password">Password</label>
                    <input type="password" id="txtPassword" name="txtPassword" placeholder="Password.." >

                    <label for="Password2">Confirm Password</label>
                    <input type="password" id="txtPassword2" name="txtPassword2"   placeholder="Confirm Password..">

                    <input type="submit" name="submit" value="Add User">
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