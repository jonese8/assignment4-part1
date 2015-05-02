<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset = "UTF-8" />
        <title>multtable.php - CS290, Emmalee Jones, Assignment 4.1 </title>
    </head>
    <body>
        #Load data input form
        <form action = "multtable.php" method = "get" >
            <h3>Create Multiplication Table</h3>
            <br/>
            Enter Minimum Multiplicand:<br>
            <input type="text" name = "min-multiplicand" ><br>
            <br/>
            Enter Maximum Multiplicand:<br>
            <input type="text" name = "max-multiplicand" ><br>
            <br/>
            Enter Minimum Multiplier:<br>
            <input type="text" name = "min-multiplier" ><br>
            <br/>
            Enter Maximum Multiplier:<br >
            <input type="text" name = "max-multiplier" ><br>
            <br/>
            <input type="submit" value="Calculate" /> 
            <br/>
            <br/>
        </form>
        <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 'OFF');
        $input = "valid";
        #Get input from form
        $min_multiplicand = \htmlspecialchars($_GET["min-multiplicand"]);
        $max_multiplicand = \htmlspecialchars($_GET["max-multiplicand"]);
        $min_multiplier = \htmlspecialchars($_GET["min-multiplier"]);
        $max_multiplier = \htmlspecialchars($_GET["max-multiplier"]);
        #Test for invalid data
        if (empty($min_multiplicand)) {
            echo "<h3>Missing parameter min_multiplicand!</h3>";
            $input = "invalid";
        } else if (!ctype_digit($min_multiplicand)) {
            echo "<h3>min_multiplicand must be an integer!</h3>";
            $input = "invalid";
        }
        if (empty($max_multiplicand)) {
            echo "<h3>Missing parameter max_multiplicand!</h3>";
            $input = "invalid";
        } else if (!ctype_digit($max_multiplicand)) {
            echo "<h3>max_multiplicand must be an integer!</h3>";
            $input = "invalid";
        }
        if (empty($min_multiplier)) {
            echo "<h3>Missing parameter min-multiplier!</h3>";
            $input = "invalid";
        } else if (!ctype_digit($min_multiplier)) {
            echo "<h3>min_multiplier must be an integer!</h3>";
            $input = "invalid";
        }
        if (empty($max_multiplier)) {
            echo "<h3>Missing parameter max-multiplier!</h3>";
            $input = "invalid";
        } else if (!ctype_digit($max_multiplier)) {
            echo "<h3>max_multiplier must be an integer!</h3>";
            $input = "invalid";
        }
        if (ctype_digit($min_multiplicand) && ctype_digit($max_multiplicand)) {
            if ($min_multiplicand > $max_multiplicand) {
                echo "<h3>min_multiplicand is greater than the maximum!</h3>";
                $input = "invalid";
            }
        }
        if (ctype_digit($min_multiplier) && ctype_digit($max_multiplier)) {
            if ($min_multiplier > $max_multiplier) {
                echo "<h3>min_multiplier is greater than the maximum!</h3>";
                $input = "invalid";
            }
        }
        ?>
        <table border="1">   
        <?php
        #Create dynamic multiplication table
        if ($input == "valid") {
            echo "<caption>Multiplication Table";
            $rowMax = $max_multiplicand - $min_multiplicand + 2;
            $colMax = $max_multiplier - $min_multiplier + 2;
            $cell;
            for ($i = 1; $i <= $rowMax; $i++) {
                echo "<tr>";
                for ($j = 1; $j <= $colMax; $j++) {
                    if (($i == 1) && ($j == 1)) {
                        #Blank Cell at 1,1
                        echo "<td></td>";
                    }
                    if (($j == 1) && ($i > 1)) {
                        #Fill Rest of Column 1 Cells
                        echo "<td>" . ($min_multiplicand + ($i - 2)) . "</td>";
                    }
                    if (($i == 1) && ($j > 1)) {
                        #Fill Rest of Row 1 Cells
                        echo "<td>" . ($min_multiplier + ($j - 2)) . "</td>";
                    } else if (($j > 1) && ($i > 1)) {
                        #Calculate remainder of cells
                        $cell = ($min_multiplier + ($j - 2)) * ($min_multiplicand + ($i - 2));
                        echo "<td>" . ($cell) . "</td>";
                    }
                }
                echo "</tr>";
            }
        }
        ?>
        </table>
    </body>
</html>
