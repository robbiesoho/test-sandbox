<!DOCTYPE html>
<html lang="en">
<body>

  <?php

    $link = mysqli_connect("mysql", "root", "tiger", "task list");

    $id = $_GET["id"];

    if($link === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $query = mysqli_query($link, "SELECT * FROM tasks WHERE task_id = ('$id')") or die(mysql_error());

    if(mysqli_num_rows($query)>=1){
    while($row = mysqli_fetch_array($query)) {
        $task_id = $row['task_id'];
        $task_name = $row['task_name'];
     
    }


  ?>

  <form action="update.php" method="post">
    <input type="hidden" name="id" value="<?=$id?>">
    Edit Task: <input type="text" name="ud_task" value="<?=$task_name?>" /><br><br>
    <input type="submit" />
  </form>

<?php

  }else{
      echo 'No entry found. <a href="javascript:history.back()">Go back</a>';
  }

?>

</body>
</html>