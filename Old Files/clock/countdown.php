<?php
/*
 * This is countdown timer
 * Burning Man8-25-2020
 */

$secPerMin = 60;
$secPerHour = 60 * $secPerMin;
$secPerDay = 24 * $secPerHour;
$secPerYear = 365 * $secPerDay;
// current time
$now = time();

// burning man time
$burningMan = mktime(12, 0, 0, 8, 25, 2020);

// Number of seconds between today & burning man time
$seconds = $burningMan - $now;

$Years = floor($seconds / $secPerYear);
$seconds = $seconds - ($Years * $secPerYear);

$Days = floor($seconds / $secPerDay);
$seconds = $seconds - ($Days * $secPerDay);

$Hours = floor($seconds / $secPerHour);
$seconds = $seconds - ($Hours * $secPerHour);

$Minutes = floor($seconds / $secPerMin);
$seconds = $seconds - ($Minutes * $secPerMin);
/*
 * This is countdown timer
 * End of Fall Semester 2017
 */

// FVTC semester time
$fallSem = mktime(12, 0, 0, 12, 20, 2017);

// Number of seconds between today & FVTC fall semester end
$seconds2 = $fallSem - $now;

$Days2 = floor($seconds2 / $secPerDay);
$seconds2 = $seconds2 - ($Days2 * $secPerDay);

$Hours2 = floor($seconds2 / $secPerHour);
$seconds2 = $seconds2 - ($Hours2 * $secPerHour);

$Minutes2 = floor($seconds2 / $secPerMin);
$seconds2 = $seconds2 - ($Minutes2 * $secPerMin);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Countdown</title>
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
            <h2 class="title">Welcome to Burning Man Countdown!</h2>
            <div>
                <p><b>Years:</b><?= $Years ?>&nbsp;&nbsp;<b>Days:</b><?= $Days ?>
                    &nbsp;&nbsp;<b>Hours:</b><?= $Hours ?>&nbsp;&nbsp;<b>Minutes:</b><?= $Minutes ?>
                    &nbsp;&nbsp;<b>Seconds:</b><?= $seconds ?></p>
                <hr>
                <!--Assignmment - Number of days to end of semester -->
                <h2 class="title">FVTC Fall Semester Countdown</h2>
                <p><b>Days:</b><?= $Days2 ?>&nbsp;&nbsp;<b>Hours:</b><?= $Hours2 ?>
                    &nbsp;&nbsp;<b>Minutes:</b><?= $Minutes2 ?>&nbsp;&nbsp;<b>Seconds:</b><?= $seconds2 ?></p>
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