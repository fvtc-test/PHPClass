<?php
session_start();

if (isset($_POST["txtEmail"])){
    if (isset($_POST["txtPassword"])){
        $email = $_POST["txtEmail"];
        $Password = $_POST["txtPassword"];
        $errmsg = "";

        include '../inc/dbConn.php';

        try{
            $db = new PDO($dsn, $username, $password, $options);
            $sql = $db->prepare("select userID, userPassword, userKey, roleID from login where userEmail = :Email");
            $sql->bindValue(":Email",$email);
            $sql->execute();
            $row = $sql->fetch();
            if($row!=null){

            $hashedPassword = md5($Password . $row["userKey"]);

//echo $hashedPassword . " | " . $row["userPassword"];
//exit();
            if($hashedPassword == $row["userPassword"]){
                //echo $row["userPassword"];
                //exit();
                $_SESSION["UID"] = $row["userID"];
                $_SESSION["Role"] = $row["roleID"];
                if($row["roleID"]==1){
                    header("Location:admin.php");

                }else{
                    header("Location:user-profile.php");
                }
            }else{
                $errmsg = "Please enter a valid password";

            }
        }else{
                $errmsg = "Please enter a valid username";
            }

        } catch (PDOException $e){
            $error = $e ->getMessage();
            echo "Error: $error";
        }

        }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
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
            <h2 class="title">User Login</h2>
            <div class="form" style="width:500px;">
                <h4 class="error"><?=$errmsg?></h4>
                <form method="post">
                    <label for="Email">Email</label>
                    <input type="text" id="txtEmail" name="txtEmail"  placeholder="Email.."  value="<?=$email?>" required>

                    <label for="password">Password</label>
                    <input type="password" id="txtPassword" name="txtPassword" placeholder="Password.." required>
                    <input type="submit" value="Login">
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