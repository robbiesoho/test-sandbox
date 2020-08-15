<!DOCTYPE html>
<html lang="en">
<body>

  <?php

    $link = mysqli_connect("mysql", "root", "tiger", "task list");

    $ud_id = (int)$_POST["id"];

    if($link === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $ud_task = $_POST["ud_task"];

    $query = "UPDATE tasks
              SET task_name = '$ud_task' 
              WHERE task_id ='$ud_id'";

    mysqli_query($link, $query) or die(mysql_error());

    if(mysqli_affected_rows($link)>=1){
        echo "<p>Task Updated<p>";
    }else{
        echo "<p>($ud_id)Task Not Updated<p>";
    }

    mysqli_close($link);

  ?>

 

</body>
</html>