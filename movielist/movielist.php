<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Movie List</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css"/>

</head>

<body>
<div class="page-wrap">
    <header class="site-header">
        <?php include '../includes/header.php'?>
    </header>

    <div class="flex-box">
        <nav class="main-nav">
            <?php include '../includes/menu.php' ?>
        </nav>
        <section class="main-content">

            <h2 class="title">Movie List</h2>
            <div class="content">
                <p>
                    <?php

                    include '../includes/dbConn.php';

                    //change dbh to db
                    try{
                        $db = new PDO($dsn, $username, $password, $options);

                        //sql statement preparing what needs to be executed
                        $sql = $db->prepare("select * from movielist");
                        //execute
                        $sql->execute();
                        //get a record
                        $row = $sql->fetch();
                        //print one field
                        echo $row["movieTitle"]; // b sure these are brackets

                    // this code will catch if they used the wrong password
                    }catch (PDOException $e){
                        $error = $e ->getMessage();
                        echo "Error: $error";
                    }



                    ?>
                </p>



            </div>
        </section>

        <aside class="right-sidebar">
            Sidebar
        </aside>
    </div>

    <footer>
        <?php include '../includes/footer.php'?>
    </footer>
</div>

</body>

</html>