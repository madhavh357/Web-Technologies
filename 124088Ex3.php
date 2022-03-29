<!-- 
    124088
    October 25, 2021
    Arrays in PHP
 -->
<!DOCTYPE html>
<html>
    <head>
        <style>
            body {
                text-align: center;
                background-color: rgb(132, 165, 255);
            }

            span {
                font-weight: bold;
            }
            h4 {
                margin-bottom: 0;
            }

            ul, ol {
                list-style-position: inside;
            }
            table {
                margin: auto;
                width: 1000px;
                border: 2px black solid;
                padding: 10px;
            }
            tr {
                height: 30px;
            }
            #blue {
                background-color: darkblue;
                color: white;
            }
            #green {
                background-color: rgb(108, 252, 144);
            }
            #purple {
                background-color: darkorchid;
            }
            #teal {
                background-color: rgb(49, 145, 145);
            }
            #tan {
                background-color: tan;
            }
        </style>

        <title>PHP Arrays</title>

    </head>

    <body>

        <h1>My Array Exercises</h1>
        <?php
            echo "------------------------------------------------------------------------------------------------ Ex 1 ------------------------------------------------------------------------------------------------";
            echo "<h3>How's the weather?</h3>";
            $weather = array("snow", "wind", "sunshine", "clouds", "rain", "hail", "sleet");
            echo "We've seen all kinds of weather this month. At the beginning of the month, we had <span>$weather[0]</span> and 
            <span>$weather[1]</span>. Then came <span>$weather[2]</span> with a few <span>$weather[3]</span> and some <span>$weather[4]</span>. At least we didn't get any <span>$weather[5]</span> or 
            <span>$weather[6]</span>.";

            echo "<br><br>------------------------------------------------------------------------------------------------ Ex 2 ------------------------------------------------------------------------------------------------<br>";
            echo "<h3>Large Cities</h3>";
            
            $cities = array("Tokyo", "Mexico City", "New York City", "Mumbai", "Seoul", "Shanghai", "Lagos", "Buenos Aires", "Cairo", "London");
            echo "<h4>Using print_r() function</h4>";
            print_r($cities);

            echo "<h4>Using var_dump()</h4>";
            var_dump($cities);

            echo "<h4>Using foreach loop</h4>";
            foreach($cities as $value)
            {
                if ($value == $cities[count($cities)-1])
                    echo $value;
                else echo "$value, ";
            }

            sort($cities);
            echo "<h4>Sorting then printing to unordered list using foreach loop</h4>";
            echo "<ul>";
            foreach($cities as $value)
            {
                echo "<li>$value</li>";
            }
            echo "</ul>";

            echo "<h4>Adding elements, sorting then printing to ordered list using foreach loop</h4>";
            array_push($cities, "Los Angeles", "Calcutta", "Osaka", "Beijing");
            sort($cities);

            echo "<ol>";
            foreach($cities as $value)
            {
                echo "<li>$value</li>";
            }
            echo "</ol>";

            echo "<br><br>------------------------------------------------------------------------------------------------ Ex 3 ------------------------------------------------------------------------------------------------<br>";
            $min = $cities[0];
            $max = "";

            foreach($cities as $value)
            {
                if(strlen($value)>strlen($max))
                {
                    $max = $value;
                }
                if(strlen($value)<strlen($min))
                {
                    $min = $value;
                }
            }

            echo "<h2>Longest and shortest length in Array</h2>";
            echo "The longest length is: " . strlen($max) . " for the city <span>$max</span> in the array.<br>";
            echo "The shortest length is: " . strlen($min) . " for the city <span>$min</span> in the array.<br>";

            $colors = array("blue", "green", "purple", "teal", "tan");
            echo "<br><br>------------------------------------------------------------------------------------------------ Ex 4 ------------------------------------------------------------------------------------------------<br>";
            echo "<h2>Color table</h2>";
            echo "<table>";
            foreach($colors as $color)
            {
                echo "<tr id=$color><td>$color</td></tr>";
            }
            echo "</table>";
            
            echo "<br><br>------------------------------------------------------------------------------------------------ Ex 5 ------------------------------------------------------------------------------------------------<br>";
            echo "<h2>Manipulating an Array using the methods</h2>";
            echo "<h3>High temperatures for Spring Month</h3>";
            $temps = array_map(function(){
                return rand(40, 90);
            }, array_fill(0, 50, 0));
            $sum = array_sum($temps);
            $length = count($temps);
            $avg = round($sum/$length);
            echo "The average temperature is $avg °F<br>";

            $temps = array_unique($temps);
            sort($temps);
            $sum = array_sum($temps);
            $length = count($temps);
            $avg = round($sum/$length);
            echo "<br>The average temperature after removing duplicates is $avg °F<br>";
            // print_r(array_slice($temps, -5));
            echo "<br>The 5 warmest high temperatures are " . array_slice($temps, -5)[count(array_slice($temps, -5))-1] . "°F";
            for($i=count(array_slice($temps, -5))-2; $i>=0; $i--)
            {
                echo ", " . array_slice($temps, -5)[$i] . "°F";
            }
            echo "<br><br>The 5 coolest high temperatures are " . $temps[0] . "°F";
            for($i=1; $i<5; $i++)
            {
                echo ", " . $temps[$i] . "°F";
            }
        ?>

    </body>
</html>