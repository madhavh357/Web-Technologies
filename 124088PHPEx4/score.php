<!DOCTYPE html>
<html>
    <head>
        <style>
            body {
                text-align: center;
                background-color: rgb(248, 248, 248);
            }

            label.q {
                font-weight: bold;
            }

            #retake {
                display: inline-block;
                margin-top: 20px;
                margin-bottom: 50px;
            }

            #fifty {
                margin-top: 20px;
                width: 500px;
            }
        </style>
        <title>Results</title>
    </head>

    <!-- 
        If the form was on the client side, the form processing would be in JavaScript.
        I would access the information by using document.getElementById() and store it using sessionStorage.
     -->
    <body>
        <?php
            $points = 0;
            $correct = array("dollar", "print", "false", "array", "1x");
            $name = $_POST["name"];

            foreach($_POST as $answer)
            {
                if (in_array($answer, $correct))
                {
                    $points++;
                }
            }
            $score = $points/5*100;
            if ($score<70)
            {
                echo "<h1><img src='rosette-1.png'>Sorry $name, you failed the test with a score of $score%!<img src='rosette-1.png'></h1>";
                echo "<p>You needed an 80% or higher to pass!</p>";
                echo "<img id='fifty' src='fifty.png'><br>";
                echo "<a id='retake' href='index.html'>Retake the test</a><br>";
                echo "<a target='_blank' href='https://www.khanacademy.org/math/cc-1st-grade-math'>Review Material</a>";
            }
            else
            {
                echo "<h1><img src='rosette-1.png'>Congratulations $name, you passed the test with a score of $score%!<img src='rosette-1.png'></h1>";
                echo "<img id='fifty' src='http://assets.stickpng.com/images/58e8fe8deb97430e819064c7.png'><br>";
                echo "<p>Click the following link to view your certificate from this prestigious institution!</p>";
                echo "<a href='cert-1 (1).pdf' target='_blank'>Download certificate</a>";
            }
        ?>
    </body>
</html>
