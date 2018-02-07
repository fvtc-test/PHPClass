<!-- 1. any PHP outside of the HTML tags will get processed before any of the HTML gets rendered -->
<?php
/* This is a countdown timer
 * Burning Man 8-25-2020
 */
//Variables
$secPerMinutes = 60;
$secPerHour = 60 * $secPerMinutes;
$secPerDay = 24 * $secPerHour;
$secPerYear = 365 * $secPerDay; //not taking into account leap year

// Date object is going to be current date - this is Unix time since Jan 1, 1970 to now is the number showing.

//Current Time
$now = time();

//3.Burning Man Time - start with 12 (noon) -- Show them the difference in seconds from the 2 variables
$burningManTime = mktime(12,0,0,8,25,2020);

//number of seconds between now & then
$seconds = $burningManTime - $now;
$Years = floor($seconds/$secPerYear); //Floor rounds down

//Subtract 3 years of seconds out of the current seconds to make it go down to get days

$seconds = $seconds - ($Years * $secPerYear);
$Days =  floor($seconds / $secPerDay);

$seconds = $seconds - ($Days * $secPerDay);
$Hours = floor($seconds / $secPerHour);

$seconds = $seconds - ($Hours * $secPerHour);
$Minutes = floor($seconds / $secPerMinutes);
$seconds2 = $seconds - ($Minutes * $secPerMinutes);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Countdown</title>
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

            <h2 class="title">Countdown to Burning Man</h2>
            <div class="content">
                <p>
                    <!-- 2. Run the time with an inline php tag -->
                    <!-- 4. Add burning man time - larger number of seconds because it's in the future -->
               1970 to Now: <?=$now?> secs <br> 1970 to Burning Time: <?=$burningManTime?> secs
                    <br> Now to burning man: <?=$seconds?> secs<br> Years till burning man: <?=$Years?>
                    <br> Days til Burning Man: <?=$Days?> <br> Hours til Burning Man: <?=$Hours?>
                    <br> Minutes til Burning Man: <?=$Minutes?> <br> Seconds to Burning Man: <?=$seconds2?>

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