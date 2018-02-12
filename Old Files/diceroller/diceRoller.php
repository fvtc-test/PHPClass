<?php

$d1=mt_rand(1,6);
$d2=mt_rand(1,6);
$d3=mt_rand(1,6);
$d4=mt_rand(1,6);
$d5=mt_rand(1,6);

$playerScore = $d1+$d2;
$computerScore = $d3+$d4+$d5;


// if total is lower than computer
if ($playerScore < $computerScore) {
    $Result = "COMPUTER WINS!";
}
// if total is higher than computer
elseif ($playerScore > $computerScore) {
    $Result = "YOU WIN!";
// if total is the same as computer
} else {
    $Result = "IT'S A DRAW!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dice Roller</title>
    <link rel="stylesheet" type="text/css" href="../css/mystyles.css"/>

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
        <section class="main-content center" role="main">
            <h2 class="title">Win at Dice!</h2>
            <h3>Your Score: <span><?=$playerScore?></span></h3>
            <div><img src="dice_<?=$d1?>.png">&nbsp;&nbsp;<img src="dice_<?=$d2?>.png"></div>

            <h3>Computer Score: <span><?=$computerScore?></span></h3>
            <div><img src="dice_<?=$d3?>.png">&nbsp;&nbsp;<img src="dice_<?=$d4?>.png">&nbsp;&nbsp;<img src="dice_<?=$d5?>.png"></div>

            <h2><?=$Result?></h2>
            </section>


        <aside class="main-sidebar" role="complementary">
            Sidebar
        </aside>
    </div>

    <footer>
        <?php include '../inc/footer.php' ?>
    </footer>


</body>

</html>