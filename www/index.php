<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Task list</title>
    </head>
    <body>
    <h1>Task List</h1>
    
    <?php

        $link = mysqli_connect("mysql", "root", "tiger", "task list");
        $query = mysqli_query($link,"select * from tasks");
        while ($row = $query->fetch_assoc()){
                echo $row["task_name"] . " -- ";
                echo "<a href='delete.php?id={$row['task_id']}'>delete</a>" . " -- ";
                echo "<a href='edit.php?id={$row['task_id']}'>edit</a>";
                echo "<br>"; 
        }

    ?>
    <br>
    <form action="insert.php" method="post">
        New Task: <input type="text" name="task" /><br><br>
        <input type="submit" />
    </form>


    </body>
</html>
