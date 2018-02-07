<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cahy Squires - PHP Class</title>
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
            <h2 class="title">Loops</h2>
            <div class="content" style="text-align:center;">
                <p>
                    <?php
                        $number = 100;

                        $result = "<h1>";
                        $result .= $number;
                        $result .= "</h1>";
                        echo $result;

                        echo "<h1>" . $number . "</h1>";

                        $number1 = 150;
                        $number2 = 50; // "55" - show that it still does the math with a string because it is a loosely typed language.
                                        //Won't give compilation errors, don't have to declare data types
                        $number = $number1 + $number2;


                        echo $number;
                        echo "<br>";
                        echo '$number'; //use single quote to print out the $number string

                    // We have DO loops, WHILE Loops, & IF statements, let's create a loop

                    // The WHILE loop executes a block of code as long as the specified condition is true.

                    $i = 1; // i variable equal to 1 & i want it to loop 7 times so i'm going to use the while loop
                    while ($i < 7){
                        //  echo "<h1>Hello World!</h1>";
                        echo "<h$i>Hello World!</h$i>"; // be sure to use double quotes
                       // $i = $i +1; //that's one way of doing it
                       // $i += 1; // another way is to use concantenation
                        $i++; //use the shorthand ++ will automatically add one to it
                    }

                    $i = 6; // i variable equal to 1 & i want it to loop 7 times so i'm going to use the while loop
                    while ($i > 0){
                        //  echo "<h1>Hello World!</h1>";
                        echo "<h$i>Hello World!</h$i>"; // be sure to use double quotes
                        // $i = $i +1; //that's one way of doing it
                        // $i += 1; // another way is to use concantenation
                        $i--; //use the shorthand ++ will automatically add one to it
                    }

                    //

                    //The do...while loop will always execute the block of code once, it will then check the condition,
                    // and repeat the loop while the specified condition is true.

                    /*  do {
                         code to be executed;
                        } while (condition is true);*/

                 $i=6;
                    do{
                        echo "<h$i>Hello World!</h$i>";
                        $i--;
                    } while( $i > 0 );

                    //FOR LOOP - probably best for this example
                        // PHP for loops execute a block of code a specified number of times.
                        /*for (init counter; test counter; increment counter) {
                          code to be executed;
                          } */

                        //assignment; evaluation; incrementation;
                        for($i=1; $i < 7; $i++) {
                            echo "<h$i>Hello World!</h$i>";
                        }

                        //STRINGS
                    $full_name = "Doug Smith"; //$Full_Name, $fullName -- don't start with $_ - brings up server variables.
                    // it is case sensitive, can later become a number, or a float - confusing can run in to a lot of bugs.
                    //$full_name = 123; number
                    //$full_name = 12.3; put in a decimal, becomes a float;
                    //$full_name = true; becomes a boolean;
                    //string is just a character array

                    // D o u g   S m i t h   underneath the hood, every character is an array with a specific index that has a number
                   //  0 1 2 3 4 5 6 7 8 9

                    $position = strpos($full_name, " ");
                    echo $position;
                     //main thing i'm trying to show is the language has some build in functions that we can use

                    echo  "<br><br><hr><br><br>";

                    echo $full_name;
                    echo "<br>";

                    $full_name = strtoupper($full_name);
                    echo $full_name;
                    $full_name = mb_strtolower($full_name);
                    echo "<br>";
                    echo $full_name;
                    echo  "<br><br><hr><br><br>";

                    $nameParts = explode(' ',$full_name);
                    echo $nameParts[0];
                    echo "<br>";
                    echo $nameParts[1];

                    //This just gave you the idea of how PHP loops work, how it's structured within HTML etc.
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