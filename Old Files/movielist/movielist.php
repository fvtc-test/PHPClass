<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Movie List</title>
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
        <section class="main-content" role="main">
            <h2 class="title">Movie List 2017</h2>
            <div class="btn"><a class="button" href="movieadd.php">add new movie</a></div>
            <div>
                <table id="movietable">
                    <thead>
                    <tr>
                        <th>Number</th>
                        <th>Movie Title</th>
                        <th>Movie Rating</th>
                        <th>Edit/Del</th>

                    </tr>
                    </thead>
                <?php

                include '../inc/dbConn.php';

                try{
                $db = new PDO($dsn, $username, $password, $options);
                $sql = $db->prepare("select * from movieList");
                $sql->execute();
                $row = $sql->fetch();
                    while ($row != null) {
                        echo "<tbody>";
                        echo "<tr>";
                        echo "<td>" .$row["movieID"]. "</td>";
                        echo "<td>" .$row["movieTitle"]. "</td>";
                        echo "<td>" .$row["movieRating"]. "</td>";
                        echo "<td><a href=movieupdate.php?id=" . $row["movieID"] .">Edit/Del</a></td>";
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