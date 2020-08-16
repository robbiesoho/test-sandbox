<!DOCTYPE html>
<html>
    <head>
    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <title>Task list</title>
    </head>
    <body>
    <h1>Task List</h1>
    <div id="output"></div>
    <form>
        New Task: <input type="text" name="task" id="task" /><br><br>
        <input id="new-task-btn" type="submit" />
    </form>

     <!--Update Modal-->
     <div class="modal" id="update">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="text-dark">Update Task</h4>
          </div>
          <div class="modal-body">
          <p id="up-message" class="text-dark"></p>
            <form>
              <input type="text" class="form-control my-2" id="Up_task_name">
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btn_update">Update Now</button>
            <button type="button" data-dismiss="modal" id="btn_close">Close</button>
          </div>
        </div>
      </div>
    </div>

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

        
        $(document).on('click','.delete-btn',function(){
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

        // Edit task 
        $(document).on('click','.edit-btn',function(){
            const edit_id = $(this).attr('data-id');
            $.ajax({
                url: 'get_task.php',
                method: 'POST',
                data:{id : edit_id},
                dataType: "json",
                success: function(data){                  
                    $('#update').modal('show');
                    $(document).on('click','#btn_update',function(){
                        const UpdateID = data[0];
                        const UpdateTask =  $('#Up_task_name').val();
                        if(UpdateTask ==""){
                            $('#up-message').html('please fill in the blank');
                            $('#update').modal('show');
                        } else {
                            $.ajax({
                                url: 'update.php',
                                method: 'POST',
                                data:{ud_id:UpdateID,ud_task:UpdateTask},
                                success: function(data){
                                    $('#up-message').html(data);
                                    readRecords();
                                    $('#update').modal('hide');
                                }
                            })
                        }
                    })
                }
            })
        })
        
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
