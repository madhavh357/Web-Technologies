<!DOCTYPE html>
<html>
    <head>
        <title>PHP Exercise 2</title>
        <style>
            body {
                text-align: center;
            }

            ol {
                list-style-position: inside;
                display: inline-block;
                text-align: left;
            }
        </style>
    </head>
    <body>
        <?php
            function reverse1($text)
            {
                echo "<strong>Using strrev function</strong><br><br>";
                echo "Here is the original string: $text<br>";
                echo "Here is the reversed string: " . strrev($text) . "<br>";
            }

            function reverse2($text)
            {
                echo "<br><strong>Using a function I wrote</strong><br><br>";
                $newtext = "";
                for ($i=strlen($text)-1; $i>=0; $i--)
                {
                    $newtext = $newtext . $text[$i];
                }
                echo "Here is the original string: $text<br>";
                echo "Here is the reversed string: $newtext<br>";
            }

            function randPass()
            {
                $lower = "zxcvbnmasdfghjklqwertyuiop";
                $upper = "QWERTYUIOPASDFGHJKLZXCVBNM";
                $numbers = "1234567890";
                $symbols = "!@#$%^&*()?}>{`~";
                $output = "<div><ol>";
                echo "<br><strong>Top 10 passwords generated without the rand function</strong>";
                for($i=0; $i<10; $i++)
                {
                    $password = substr(str_shuffle($lower), -3) . substr(str_shuffle($upper), -3) . substr(str_shuffle($numbers), -3) . substr(str_shuffle($symbols), -3);
                    $output = $output . "<li>The random password is: " . str_shuffle($password) . "</li><br>";
                }
                $output = $output . "</ol></div>";
                echo $output;
            }
            reverse1("Hello");
            reverse2("Web tech");
            randPass();
        ?>
    </body>
</html>