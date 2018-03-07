<?php
//Database connection stuff
include '../includes/dbConn.php';

//Check to see if user submitted the form
if (isset($_POST["txtTitle"])){
    if (isset($_POST["txtRating"])){
        $title = $_POST["txtTitle"];
        $rating = $_POST["txtRating"];
        $id = $_POST["txtID"];

        try{
            $db = new PDO($dsn, $username, $password, $options);
            $sql = $db->prepare("update movielist set movieTitle = :Title, movieRating  = :Rating where movieID = :ID");
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

// Copy this if statement for Delete
// Check to see if ID is Set
if (isset($_GET["id"])){
    $id = $_GET["id"];
    try{
        $db = new PDO($dsn, $username, $password, $options);
        $sql = $db->prepare("select * from movielist WHERE movieID = :id");
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
    <link rel="stylesheet" type="text/css" href="../css/styles.css"/>
    <link rel="stylesheet" type="text/css" href="../css/forms.css"/>
    <link rel="stylesheet" type="text/css" href="../css/buttons.css"/>
<script type="text/javascript">
   function DeleteMovie(title, id){
      if (confirm ("Do you want to delete " + title + "?")){
          //alert ("Delete " + id);
          document.location.href ="moviedelete.php?id=" + id;
      }
   }
</script>

</head>

<body>
<div class="page-wrap">
    <header class="site-header">
        <?php include '../includes/header.php' ?>
    </header>

    <div class="flex-box">
        <nav class="main-nav" role="navigation">
            <?php include '../includes/menu.php' ?>
        </nav>
        <section class="main-content" role="main">
            <h2 class="title">Update Movie</h2>
            <div class="form">
                <form method="post" style="width:500px;
                    <label for="title">Movie Title</label>
                    <input type="text" id="txtTitle" name="txtTitle" value="<?=$title?>" required>
                    <label for="title">Movie Rating</label>
                    <input type="text" id="txtRating" name="txtRating" value="<?=$rating?>" required>
                    <input type="submit" value="Update Movie"> <input type="button" onclick="DeleteMovie('<?=$title?>',<?=$id?>)" value="Delete Movie">

                    <a  href="#0" onclick="history.go(-1); return(false)">Cancel</a>

                <input type="hidden" id="txtID" name="txtID" value="<?=$id?>">
              
                </form>

            </div>
        </section>


        <aside class="right-sidebar">
            Sidebar
        </aside>
    </div>

    <footer>
        <?php include '../includes/footer.php' ?>
    </footer>
</div>

</body>

</html>