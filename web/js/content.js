/**
 * Created by veber on 5/6/17.
 */

function displayContent() {
}




$(document).ready(function () {




    var uncompleteTasksCount = 0;
    
    loadAllTasks();
    
    
})


function loadAllTasks() {
    $get("/task", function (data){
        completeCaategory = false;
        tasks = jQuery.parseJSON(data);

        uncompleteTasksCount = tasks.filter(function (item) {
            return item.isComplete == false;
        }).length;

        $("#uncompleteTasksCount").text(uncompleteTasksCount);

        tasks.forEach(function (item) {
            taskCount = item.taskId;
            preppendTask(item.task, item.isComplete, taskCount);
        });
    });
};