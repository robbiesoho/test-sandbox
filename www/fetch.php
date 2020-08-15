
<?php

$link = mysqli_connect("mysql", "root", "tiger", "task list");

$query = mysqli_query($link,"select task_name from tasks");

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
        <button>Edit</button>
      </td>
      <td>
        <button>Delete</button>
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






