<!DOCTYPE html>
<html lang="en">

<body>

  <?php

    $link = mysqli_connect("mysql", "root", "tiger", "task list");

    $name = $_POST["task"];

    if($link === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $name = $_POST["task"];

    $sql = "INSERT INTO tasks (task_name) VALUES ('$name')";
    if(mysqli_query($link, $sql)){
        echo "Task added!";
    } else{
        echo "ERROR: Could not add task $sql. " . mysqli_error($link);
    }

    mysqli_close($link);


  ?>


</body>
</html>