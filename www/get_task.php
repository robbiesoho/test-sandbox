

  <?php

    $link = mysqli_connect("mysql", "root", "tiger", "task list");

    $id = $_POST["id"];

    if($link === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $query = mysqli_query($link, "SELECT * FROM tasks WHERE task_id = ('$id')") or die(mysql_error());

    if(mysqli_num_rows($query)>=1){
    while($row = mysqli_fetch_assoc($query)) {
        $Task_data = [];
        $Task_data[0] = $row['task_id'];
        $Task_data[1] = $row['task_name'];
     
    }
    echo json_encode($Task_data);

  ?>

  
<?php

  }else{
      echo 'No entry found. <a href="javascript:history.back()">Go back</a>';
  }

?>
