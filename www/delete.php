
<body>

  <?php

    $link = mysqli_connect("mysql", "root", "tiger", "task list");

    $id = $_POST['id'];

    if($link === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $query = "DELETE FROM tasks WHERE task_id = ('$id')";

    if(mysqli_query($link, $query)){
        echo "Task deleted!";
    } else{
        echo "ERROR: Could not delete task $query. " . mysqli_error($link);
    }

    mysqli_close($link);


  ?>

