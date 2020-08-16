
<?php

$link = mysqli_connect("mysql", "root", "tiger", "task list");

$query = mysqli_query($link,"select * from tasks");

if(mysqli_num_rows($query) > 0)
  {
    $number = 1;
    $data .= '<table>';
    while($row = mysqli_fetch_assoc($query))
    {
      $data .= '<tr>
      <td>'.$number.'</td>
      <td>'.$row['task_name'].'</td>
      
      <td>
        <button class=edit-btn data-id='.$row['task_id'].'>Edit</button>
      </td>
      <td>
        <button class=delete-btn data-id='.$row['task_id'].'>Delete</button>
      </td>
  
      </tr>';
      
      $number++;
    }
  }
  else
  {
    $data .= '<tr><td colspan="6">Records not found!</td></tr>';
  }

  $data .= '</table>';
  $data .= '<br>';


echo $data;

?>






