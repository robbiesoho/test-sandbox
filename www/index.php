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

        function addTask() {
            const task = $("#task").val();
            $.post("insert.php", {
                task: task,
            }, function (data, status) {
                readRecords();
                $("#task").val("");

            });
        }   

        $(document).on('click','#delete-btn',function(){
            const del_id = $(this).attr('data-id'); 
            $.ajax({
                url: 'delete.php',
                method: 'POST',
                data:{id:del_id},
                success: function(data)
                {
                    readRecords();
                }
            })
        })
        
        function readRecords() {
            $.get("fetch.php", {}, function (data, status) {
                $('#output').html(data);
            });
        }
    });

  </script>
  </body>
</html>
