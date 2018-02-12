<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Loops & Strings</title>
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
            <h2 class="title">Welcome to Loops!</h2>
            <div>
            <?php
            $number = 100;

           // echo ($number);
            echo "<h1>".($number)."</h1>";

           /* echo "<h1>";
            echo ($number);
            echo "</h1>";

            $number = 101;
            $result = "<h1>";
            $result .= "$number";
            $result .= "</h1>";

            echo "$result" */

           $number1 = 100;
           $number2 = 50;
           $number = $number1 + $number2;
            echo "<h1>".($number)."</h1>";

            $i = 1;
                while($i < 7){
                //echo "<h1>Hello World!</h1>";
                echo "<h$i>Hello World!</h$i>";
                $i++;
                }
            $i = 6;
            while($i > 0){
                //echo "<h1>Hello World!</h1>";
                echo "<h$i>Hello World!</h$i>";
                $i--;
            }

            //took last section of code make a do loop
            $i = 6;
            do{
                //echo "<h1>Hello World!</h1>";
                echo "<h$i>Hello World!</h$i>";
                $i--;
            } while( $i > 0);

            for ($i=1;$i<7;$i++){
                echo "<h$i>Hello World!</h$i>";
            }
            echo "<hr>";

            $Full_Name = "Doug Smith";
            $Position = strpos($Full_Name,' ');
            echo $Position;
            echo "<hr>";
            echo $Full_Name;
            echo "<br>";
            $Full_Name = strtoupper($Full_Name);
            echo $Full_Name;
            echo "<br>";
            $Full_Name = strtolower($Full_Name);
            echo $Full_Name;
            echo "<br>";
            $name_parts = explode(' ',$Full_Name);
            echo $name_parts[0];
            echo "<br>";
            echo $name_parts[1];
            echo "<hr>";
            ?>
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