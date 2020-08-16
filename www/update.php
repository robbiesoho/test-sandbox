
  <?php

    $link = mysqli_connect("mysql", "root", "tiger", "task list");

    if($link === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    
    $ud_id = $_POST["ud_id"];
    $ud_task = $_POST["ud_task"];

    $query = "UPDATE tasks
              SET task_name = '$ud_task' 
              WHERE task_id ='$ud_id'";

    mysqli_query($link, $query) or die(mysql_error());
   

    mysqli_close($link);

  ?>

 

