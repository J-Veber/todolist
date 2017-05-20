$(document).ready(function () {

    var uncompleteTasksCount = 0;
    var completeCategory;
    var tasks;
    var taskCount;

    loadAllTasks();

    var editingTaskId = "";
    var taskObject = "";
    var editingTask;
    var editing = false;

    $(".footer").on('click', '.completed', function(){
        toggleCategory(true);
        toggleSelect(this);
    });

    $(".footer").on('click', '.uncompleted', function(){
        toggleCategory(false);
        toggleSelect(this);
    });

    $(".footer").on('click', '.all', function(){
        $(".todo-list").empty();
        loadAllTasks();
        toggleSelect(this);
    });

    $(".footer").on('click', '.clear-completed', function () {
        $(".todo-list").empty();
        $.get(
            'api/todos/removeAllCompletedTask',
            function (data) {
            }
        );
        loadAllTasks();
    });

    $('#closeSession').on('click', function () {
        //console.log('closing session');
       $.post(
           'api/todos/closeSession',
           {
               close: 'true'
           }
       );
    });

    //edit tasks TODO:: correct some mistakes
    $('.todo-list').on('dblclick', '.edit_task', function () {
        editingTaskId = event.target.id;
        taskObject = $('#task_' + editingTaskId);
        editing = true;
        taskObject.toggleClass("editing");
        editingTask="";
    });

    $(document).mouseup(function (event) {
        editingTask = $("#editing_task_" + editingTaskId);
        if (!editingTask.is(event.target) && editing)
        {
            taskObject.removeClass("editing");
            editing = false;
        }
    });

    $('document').keypress(function (event) {
        if (event.which === 13)
        {
            var newTask = $("#newTask").val();
            console.log(newTask);
            if (newTask !== "")
            {
                $.post(
                    "api/todos/addTask",
                    {
                        task_text: newTask
                    },
                    function (data) {
                        console.log(data.toString());
                    }
                );
                uncompleteTasksCount++;

                $("#uncompleteTasksCount").text(uncompleteTasksCount);

            } else
            {
                if (editingTask) {
                    editingTask.text(editingTask.val());
                    $("#" + editingTaskId).text(editingTask.val());

                    $.post(
                        "api/todos/editTask",
                        {
                            task_text: editingTask.val(),
                            task_id: editingTaskId
                        },
                        function(data){
                            console.log(data.toString());
                        });
                }
                taskObject.removeClass("editing");
            }
        }
    });

    //delete task
    $('.todo-list').on('click', '.destroy', function () {
        $('#task_' + event.target.id).remove();
        uncompleteTasksCount--;

        $("#uncompleteTasksCount").text(uncompleteTasksCount);

        $.post(
            "api/todos/removeTask",
            {
                task_id: event.target.id
            },
            function (data) {
                console.log(data.toString());
            }
        );
    });

    // change task status
    $('.todo-list').on('click', '.toggle', function () {
        var taskId = event.target.id;
        var task = $('#task_' + taskId);
        task.toggleClass("completed");
        if (task.attr('class') == 'completed')
        {
            toggleComplete(1, taskId);
        } else
        {
            toggleComplete(0, taskId);
        }
    });

    function toggleComplete(task_done, task_id) {
        if (task_done == 0)
        {
            uncompleteTasksCount++;
        } else
        {
            uncompleteTasksCount--;
        }

        $("#uncompleteTasksCount").text(uncompleteTasksCount);

        $.post(
            "api/todos/toggleComplete",
            {
                task_done: task_done,
                task_id: task_id
            },
            function (data) {
                console.log(data.toString());
            }
        );
    }

    function loadAllTasks() {
        $.get(
            "api/todos/returnAllTasks",
            function (data) {
                if (data == "")
                {
                    $('.footer').empty();
                } else
                {
                    completeCategory = false;
                    //alert(data);
                    tasks = jQuery.parseJSON(data.toString());

                    uncompleteTasksCount = tasks.filter(function(task){
                        return task.task_done == false;
                    }).length;

                    $("#uncompleteTasksCount").text(uncompleteTasksCount);

                    tasks.forEach(function (task) {
                        //console.log(task);
                        taskCount = task.task_id;
                        prependLoadTask(task.task_text, task.task_done, taskCount)
                    });
                }

            }
        );
    }

    function prependLoadTask(task_text, done, task_count) {
        switch (true)
        {
            case (done == true):
                $('.todo-list').prepend(
                    '<li class="completed" id="task_'+task_count+'"> <div class="view"> ' +
                    '<input class="toggle" type="checkbox" checked id='+task_count+'> ' +
                    '<label class="edit_task" id='+task_count+'>'+ task_text +'</label> ' +
                    '<button id='+task_count+' class="destroy"></button> </div> ' +
                    '<input id="editing_task_'+task_count+'" class="edit" value="'+task_text+'"> </li>'
                );
                break;
            case (done == false):
                $('.todo-list').prepend(
                    '<li class="" id="task_'+task_count+'"> <div class="view"> ' +
                    '<input class="toggle" type="checkbox" id='+task_count+'> ' +
                    '<label class="edit_task" id='+task_count+'>'+ task_text +'</label> ' +
                    '<button id='+task_count+' class="destroy"></button> </div> ' +
                    '<input id="editing_task_'+task_count+'" class="edit" value="'+task_text+'"> </li>'
                );
                break;
        }
    }

    function toggleCategory(isComplete)
    {
        $(".todo-list").empty();
        completeCategory = isComplete;
        $.get(
            "api/todos/returnAllTasks",
            function(data)
            {
                var tasks = jQuery.parseJSON(data);

                tasks.forEach(function (task) {
                    taskCount = task.task_id;
                    if (task.task_done == isComplete)
                        prependLoadTask(task.task_text, isComplete, taskCount);
                });
            });
    }

    function toggleSelect(currentState) {
        $(".state").removeClass('selected');
        $(currentState).addClass('selected');
    }
});