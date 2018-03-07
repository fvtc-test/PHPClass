<?php
//Database connection stuff
include '../inc/dbConn.php';

if (isset($_POST["txtTitle"])){
    if (isset($_POST["txtRating"])){
        $title = $_POST["txtTitle"];
        $rating = $_POST["txtRating"];
        $id = $_POST["txtID"];

        try{
            $db = new PDO($dsn, $username, $password, $options);
            $sql = $db->prepare("update movieList set movieTitle = :Title, movieRating  = :Rating where movieID = :ID");
            $sql->bindValue(":Title",$title);
            $sql->bindValue(":Rating",$rating);
            $sql->bindValue(":ID",$id);
            $sql->execute();
        }catch (PDOException $e){
            $error = $e ->getMessage();
            echo "Error: $error";
        }
       header("Location:movielist.php");
    }
}

if (isset($_GET["id"])) {
    $id=$_GET["id"];

    //echo $id;
    //exit();
    try{
        $db = new PDO($dsn, $username, $password, $options);
        $sql = $db->prepare("select * from movieList where movieID = :id");
        $sql->bindValue(":id",$id);
        $sql->execute();
        $row = $sql->fetch();
        $title = $row["movieTitle"];
        $rating = $row["movieRating"];
    }catch (PDOException $e){
        $error = $e ->getMessage();
        echo "Error: $error";
    }

}else{
    header("Location:movielist.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Movie</title>
    <link rel="stylesheet" type="text/css" href="../css/mystyles.css"/>
    <link rel="stylesheet" type="text/css" href="../css/forms.css"/>
    <link rel="stylesheet" type="text/css" href="../css/buttons.css"/>

    <script type="text/javascript">
        function DeleteMovie(title, id){

           if (confirm("Are you sure you want to delete the movie: " + title)) {

                //alert("moviedelete.php?id=" + id);
                document.location.href ="moviedelete.php?id=" + id;
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
            <h2 class="title">Update Movie</h2>
            <div class="form" style="width:500px;">
                <form method="post">
                    <label for="title">Movie Title</label>
                    <input type="text" id="txtTitle" name="txtTitle" value="<?=$title?>" placeholder="Movie title.." required>

                    <label for="title">Movie Rating</label>
                    <input type="text" id="txtRating" name="txtRating" value="<?=$rating?>" placeholder="Movie Rating.." required>
                    <input type="submit" value="Save Updates"><input  type="button" onclick="DeleteMovie('<?=$title?>',<?=$id?>);" value="Delete Movie">
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