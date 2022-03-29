<!-- 
    124088
    November 4, 2021
    Color generator using PHP

    Include vs require:
    The include statement will only print a warning if the file is not found, but the require statement will terminate the script
    if the file is not found.
    When the file is necessary for the application to run, you should use require. If it can run without the file, you should use include.
 -->
<!DOCTYPE html>
<html>
    <head>
        <link href="style.css" rel="stylesheet" type="text/css">
        <!-- Using internal style because external was not working -->
        <style>
            <?php
                // using work around because external style is not working
                include "style.css";
            ?>
        </style>
    </head>

    <body>
        <?php
            include 'header.php';
            
        ?>

        <h1>Learn about Colors in Computers: click on the links above</h1>
        <h3>Please choose 3 different numbers between 0 and 255 for each of the following</h3>

        <form action="sampler.php" method="post">
            <div id="fields">
                <label>Red:</label><br>
                
                <label>Green:</label><br>
                
                <label>Blue:</label><br>
                
                <label>Please write your content here:</label>
            </div>

            <div id="enter">
                <input class="enter" name="red" type="number" min="0" max="255" required><br>
                <input class="enter" name="green" type="number" min="0" max="255" required><br>
                <input class="enter" name="blue" type="number" min="0" max="255" required><br>
                <textarea name="message" required></textarea>
            </div><br><br>
            <input type="submit" value="Generate message">
        </form>

        <?php
            include 'footer.php';
        ?>
    </body>
</html>