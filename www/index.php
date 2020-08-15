<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <title>Task list</title>

    </head>
    <body>
    <h1>Task List</h1>
    <div id="output"></div>
    <form>
        New Task: <input type="text" name="task" id="task" /><br><br>
        <input id="new-task-btn" type="submit" />
    </form>

<script>

    $(document).ready(function(){
        readRecords();
        $(document).on('click', '#new-task-btn', function(){
        const task = $('#task').val();
        $.ajax({
        url: 'insert.php',
        type: 'POST',
        data: {
            'task': task,

        },
        success: function(response){
            readRecords();
            $("#task").val("");
    }
        });
    });
        // $.ajax({
        //     url: 'insert.php',
        //     type: 'POST',
        //     success: function(response){
                
        //         // data = $.parseJSON(response)
        //         // console.log(data)
        //         // if(data.status=='success')
        //         // {
        //         //     $('#output').html(data.html);
        //         // }
        //         $('#output').html(response);
        //     }
        // }); //document.ready
        function addTask() {
 
            const task = $("#task").val();
            $.post("insert.php", {
                task: task,
            }, function (data, status) {
                readRecords();
                $("#task").val("");

            });
        }   
    

        function readRecords() {
            $.get("fetch.php", {}, function (data, status) {
                $('#output').html(data);
            });
        }

    

   
     
    
   
});

  </script>
  </body>
</html>

<!-- 
while ($row = $query->fetch_assoc()){
  echo $row["task_name"] . " -- ";
  echo "<a href='delete.php?id={$row['task_id']}'>delete</a>" . " -- ";
  echo "<a href='edit.php?id={$row['task_id']}'>edit</a>";
  echo "<br>"; 
} -->

