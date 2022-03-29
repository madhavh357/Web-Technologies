<!-- 
    124088
    PHP Lab
    November 12, 2021
 -->
<!DOCTYPE html>
<html>
    <head>
        <style>
            body {
                text-align: center;
                background-color: tan;
            }

            table {
                margin: auto;
            }

            th {
                padding: 10px;
                background-color: gray;
            }

            td {
                padding: 20px;
            }

            input[type="text"], input[type="number"] {
                width: 50px;
            }

            input[type="submit"]
            {
                background-color: purple;
                height: 50px;
                color: white;
            }
        </style>

    </head>

    <body>
        <?php
            include "header.php";
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
            <table>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>

                <tr>
                    <td>Tires</td>
                    <td><input type="number" min="0" max="4" name="tires"></td>
                    <td>$75.56</td>
                </tr>

                <tr>
                    <td>Oil</td>
                    <td><input type="text" name="oil"></td>
                    <td>$25.89</td>
                </tr>

                <tr>
                    <td>Spark Plugs</td>
                    <td><input type="text" name="spark"></td>
                    <td>$49.99</td>
                </tr>
            </table>

            <input name="submit" type="submit" value="Submit Order"><br><br>
        </form>

        <?php
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            

            if (isset($_POST["submit"]))
            {
                if (empty(test_input($_POST["tires"])) && empty(test_input($_POST["oil"])) && empty(test_input($_POST["spark"])))
                {
                    echo "You didn't buy anything from Bob's auto parts!";
                }
                else
                {
                    $tires = test_input($_POST["tires"]);
                    $oil = intval(test_input($_POST["oil"]));
                    $spark = intval(test_input($_POST["spark"]));

                    $items = array("tires"=>$tires, "oil"=>$oil, "spark plugs"=>$spark);

                    echo "Items ordered: " . $tires+$oil+$spark . "<br>";

                    foreach($items as $item => $amount)
                    {
                        if(!empty($amount))
                        {
                            echo "#number of $item: $amount<br>";
                        }
                    }
                    $total = $tires*75.56 + $oil*25.89 + $spark*49.99;
                    echo "<br>Subtotal: $" . round($total, 2);
                    echo "<br>Total including tax: $" . round($total*1.1, 2);

                    echo "<br><br>**********Thank you for your order**********";
                }
            }
        ?>
    </body>
</html>