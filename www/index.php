<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>task list</title>
    </head>
    <body>
    <h1>task list</h1>
        
    <?php

        $link = mysqli_connect("mysql", "root", "tiger", "task list");
        $result = mysqli_query($link,"select * from task");
        while ($row = $result->fetch_assoc()){
                echo $row["task"] . "<br>" ; 
        }


    ?>

    </body>
</html>
