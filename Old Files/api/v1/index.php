<?php
require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();

/* put=update
 * Post = Insert
 * Get = Select
 * Delete = Delete
 */

$app = new \Slim\Slim();
//$app->get('/getHello', 'getHello'); //Called ULR Rewriting
$app->get('/get_races', 'get_races'); //Called ULR Rewriting
//$app->get('/showMember/:MemberName', 'showMember');
$app->get('/get_runners/:raceID', 'get_runners');
//$app->post('/addMember/:MemberName', 'addMember');
$app->post('/addRunner', 'addRunner');
$app->delete('/delRunner', 'delRunner');


$app->run();

function get_races()
{

    include '../../inc/dbConn.php';

    try {
        $db = new PDO($dsn, $username, $password, $options);
        $sql = $db->prepare("select * from race");
        $sql->execute();
        $rsults = $sql->fetchAll();
        //echo var_dump($rsults);
        echo '{"Races":' . json_encode($rsults) . '}';
        $rsults = null;
        $db = null;
    } catch (PDOException $e) {
        $error = $e->getMessage();
        echo json_encode($error);
    }

}

function get_runners($raceID){
    include '../../inc/dbConn.php';
    try{
        $db = new PDO($dsn, $username, $password, $options);
        $sql = $db->prepare("SELECT DISTINCT login.username, login.userEmail FROM login INNER JOIN member_race ON login.userID = member_race.userID WHERE member_race.raceID = :raceID");
        $sql->bindValue(":raceID",$raceID);
        $sql->execute();
        $rsults = $sql->fetchAll();
        //echo var_dump($rsults);
        echo '{"Runners":' . json_encode($rsults) . '}';
        $rsults = null;
        $db = null;
    } catch (PDOException $e){
        $error = $e ->getMessage();
        echo json_encode($error);
    }
    //echo "Runner: $raceID";
}

function addRunner(){
    $request = \Slim\Slim::getInstance()->request();
    $post_json= json_decode($request->getBody(),TRUE);

    $userID = $post_json["userID"];
    $raceID = $post_json["raceID"];
    $userKey = $post_json["userKey"];

    include '../../inc/dbConn.php';
    try{
        $db = new PDO($dsn, $username, $password, $options);
        $sql = $db->prepare("SELECT member_race.raceID FROM member_race INNER JOIN login ON member_race.userID = login.userID WHERE member_race.raceID = 5 AND login.userKey = :APIKey");
        $sql->bindValue(":APIKey",$userKey);
        $sql->execute();
        $rsults = $sql->fetch();
        if($rsults==null){
            echo "Bad API Key";
        }else{
            $sql = $db->prepare("Insert into member_race(userID,raceID,roleID) VALUES(:userID,:raceID,3)");
            $sql->bindValue(":userID",$userID);
            $sql->bindValue(":raceID",$raceID);
            $sql->execute();

        }
        $rsults = null;
        $db = null;
    } catch (PDOException $e){
        $error = $e ->getMessage();
        echo json_encode($error);
    }
}

function delRunner(){
    $request = \Slim\Slim::getInstance()->request();
    $post_json= json_decode($request->getBody(),TRUE);
    $userID = $post_json["userID"];
    $raceID = $post_json["raceID"];
    $userKey = $post_json["userKey"];

    include '../../inc/dbConn.php';
    try{
        $db = new PDO($dsn, $username, $password, $options);

            $sql = $db->prepare("delete from login where userID = 11 AND login.userKey = :APIKey");
        $sql->bindValue(":APIKey",$userKey);
            $sql->execute();
        } catch (PDOException $e){
        $error = $e ->getMessage();
        echo json_encode($error);
    }
}

?>