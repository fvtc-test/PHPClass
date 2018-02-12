<?php

//echo "here";
//exit();

if (isset($_GET["id"])) {
    $id=$_GET["id"];

    //echo $id;
    //exit();
    try{
        //Database connection stuff
        include '../inc/dbConn.php';
        $db = new PDO($dsn, $username, $password, $options);
        $sql = $db->prepare("delete from customerList where custID = :id");
        $sql->bindValue(":id",$id);
        $sql->execute();
    }catch (PDOException $e){
        $error = $e ->getMessage();
        echo "Error: $error";
    }

}
header("Location:customerlist.php");
?>