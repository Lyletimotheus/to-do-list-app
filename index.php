<?php 
require ('config/config.php');
require ('config/database.php');
include ('includes/header.php');

//Create query
$query = "SELECT * FROM tasks
            ORDER BY due_date ASC";

//Get the result
$result = mysqli_query($conn, $query);

//Fetch the data
$tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);
// var_dump($tasks);

//Free the Result
mysqli_free_result($result);


//Check for Submit
if(isset($_POST['submit'])){
// Validate and sanitize the data here

// Get the data
$description = mysqli_real_escape_string($conn,$_POST['description']);
$duedate = mysqli_real_escape_string($conn,$_POST['due_date']);
//Add the query
$query = "INSERT INTO tasks(task_description, due_date)
            VALUES('$description','$duedate')";

if(mysqli_query($conn,$query)){
    header ('Location:'.ROOT_URL.'');
}else{
    echo "An error has occured. Your task was not added.<br />
            Error: ".mysqli_error($conn);
}
}

//Close the connection
mysqli_close($conn);


?>
    <!-- END OF HEADER -->

    <br>
    <br>

    <!-- ADD AND EDIT MODEL-->
    <div class="modal update-modal">
        <div class="modal-content">
            <span class="close-modal">&times;</span>
            <h4 class="task-heading"></h4>
            <br>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
                <label for="">Description: 
                    <input type="text" name="description">
                </label>
                <br>
                <label for="">Due date:
                    <input type="date" name="due_date">
                </label>
                <br>
                <button type="submit" class="btn-confirm insert-button" name="submit">Confirm(I)</button>
                <button type="submit" class="btn-confirm edit-button">Confirm(E)</button>
            </form>
        </div>
    </div>
    <!-- END OF ADD AND EDIT MODEL-->


    <!-- REMOVE MODEL -->
    <div class="modal remove-modal" style="text-align: center;">
        <div class="modal-content">
            <h4>Delete Task</h4>
            <br>
            <p>Are you sure you want to delete this task?</p>
            <br>
            <button class="btn-primary cancel-remove" style="background-color:grey">Cancel</button>
            <button class="btn-danger confirm-remove">Delete</button>
        </div>
    </div>    
    <!-- END OF REMOVE MODEL -->



    <div class="table-container">
        
        <div class="table-header">
            <h2>No.</h2>
            <h2>Description</h2>
            <h2>Due Date</h2>
            <h2>Edit/Remove</h2>
        </div>

<?php
foreach($tasks as $task){
    echo   '<div class="table-body">
            
            <div class="task">
                <p>1</p>
                <p>'.$task['task_description'].'</p>
                <p>'.$task['due_date'].'</p>
                <div>
                    <button class="btn-warning edit-task">Edit</button>
                    <button class="btn-danger remove-task">Remove</button>
                </div>
            </div>

            <div class="task">
                <p>2</p>
                <p>Task 2</p>
                <p>2020/01/02</p>
                <div>
                    <button class="btn-warning edit-task">Edit</button>
                    <button class="btn-danger remove-task">Remove</button>
                </div>
            </div>
           
        </div>';
}
// end of class="table-body"
?>
    </div> <!--end of class="table-container"-->
    
    <script src="js/script.js"></script>
<?php include('includes/footer.php');?>