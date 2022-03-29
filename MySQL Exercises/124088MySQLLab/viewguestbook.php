<!DOCTYPE html>
<html>
    <head>
        <style>
            body {
                background-color: rosybrown;
                text-align: center;
            }

            table {
                border: 3px white solid;
                border-radius: 10px;
                margin-bottom: 20px;;
                margin: auto;
            }
        </style>
    </head>

    <body>
        <p>View Guestbook | <a href="guestbook.php">Sign Guestbook</a></p>
        <h3>Query 1: All the guests who have signed in so far</h3>
        <?php
            require "config.php";
            mysqli_select_db($conn, "guestDB");
            $sql = "SELECT * FROM guestbook";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0)
            {
                foreach ($result as $row)
                {
                    echo "
                    <table>
                        <tr>
                            <td>Name:</td>
                            <td>$row[thename]</td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td>$row[theemail]</td>
                        </tr>
                        <tr>
                            <td>Message:</td>
                            <td>$row[thedate]</td>
                        </tr>
                        <tr>
                            <td>Date:</td>
                            <td>$row[thedate]</td>
                        </tr>
                    </table>
                    ";
                }
            }
            else
            {
                echo "<p>There are no guests who signed</p>";
            }

            echo "<h3>Query 2: Guests who signed in before today</h3>";
            $sql = "SELECT * FROM guestbook WHERE thedate< CURDATE()";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result)>0)
            {
                foreach ($result as $row)
                {
                    echo "
                    <table>
                        <tr>
                            <td>Name:</td>
                            <td>$row[thename]</td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td>$row[theemail]</td>
                        </tr>
                        <tr>
                            <td>Message:</td>
                            <td>$row[themessage]</td>
                        </tr>
                        <tr>
                            <td>Date:</td>
                            <td>$row[thedate]</td>
                        </tr>
                    </table>
                    ";
                }
            }
            else
            {
                echo "<p>There are no guests who signed in before today</p>";
            }

            echo "<h3>Query 2: Guests with long messages</h3>";
            $sql = "SELECT * FROM guestbook WHERE LENGTH(themessage) > 40";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result)>0)
            {
                foreach ($result as $row)
                {
                    echo "
                    <table>
                        <tr>
                            <td>Name:</td>
                            <td>$row[thename]</td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td>$row[theemail]</td>
                        </tr>
                        <tr>
                            <td>Message:</td>
                            <td>$row[themessage]</td>
                        </tr>
                        <tr>
                            <td>Date:</td>
                            <td>$row[thedate]</td>
                        </tr>
                    </table>
                    ";
                }
            }
            else
            {
                echo "<p>There are no guests with long messages</p>";
            }
        ?>
    </body>
</html>