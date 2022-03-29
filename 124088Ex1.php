<!-- 
    124088
    October 19, 2021
    PHP Ex 1
 -->
<!DOCTYPE html>
<html>
    <head>
        <style>
            body {background-color: rosybrown; text-align: center; color: white}
        </style>
    </head>

    <body>
        <h1>PHP: Hypertext Preprocessor</h1>
        <h2>Introduction to PHP</h2>
        <?php
            echo "-------EX 1-------<br>";
            $name = "Mario";
            
            echo 'I am '. $name. '<br>';
            echo "I am $name <br>";
            echo nl2br("\n-------End of EX 1-------<br>");

            echo "<br>-------EX 2-------<br>";
            if ($name == "Mario")
            {
                print "I am $name<br>";
            }
            echo "<br>-------EX 3-------<br>";
            $name = "awaken";
            if ($name != "Mario")
            {
                
                print "No, no, no. That is not my name!<br>";
            }
            echo "<br>-------EX 4-------<br>";
            $value = 8;
            echo "Value is now $value.<br>";
            $value +=2;
            echo "Add 2. Value is now $value.<br>";
            $value -= 4;
            echo "Subtract 4.Value is now $value.<br>";
            $value *=5;
            echo "Multiply by 5. Value is now $value.<br>";
            $value /= 3;
            echo "Divide by 3. Value is now $value.<br>";
            $value++;
            echo "Increment value by 1. Value is now $value.<br>";
            $value--;
            echo "Decrement value by 1. Value is now $value.<br>";

            echo "<br>-------EX 5-------<br>";
            $whatsit = gettype("");
            echo "Value is $whatsit.<br>";
            $whatsit = gettype(3.2);
            echo "Value is $whatsit.<br>";
            $whatsit = gettype(true);
            echo "Value is $whatsit.<br>";
            $whatsit = gettype(5);
            echo "Value is $whatsit.<br>";
            $whatsit = gettype(null);
            echo "Value is $whatsit.<br>";

            echo "<br>-------EX 6-------<br>";
            echo "Variables must start with a dollar sign $ and begin with a letter or underscore. It cannot contain special symbols.<br>";
            echo "Echo has no return value, while print has a return value of 1. Echo can also take multiple parameters.<br>";
            echo "PHP is loosely typed because you do not need to define variable types.<br>";
            echo("Echo statements can use parentheses.<br>");
            echo "PHP is a server side language, while JavaScript is a client side language. It is also more secure than JavaScript, as it is not visible in the browser.";
        ?>
    </body>
</html>