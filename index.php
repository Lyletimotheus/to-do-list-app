<?php 
require ('config/config.php');
require ('config/database.php');
include ('includes/header.php');

//Check for Submit
if(isset($_POST['submit'])){
    // Validate and sanitize the data here
    $filtered_description = filter_var($_POST['description'],FILTER_SANITIZE_STRING);
    $filtered_due_date = filter_var($_POST['due_date'],FILTER_SANITIZE_STRING) ;
    // Get the data
    $description = mysqli_real_escape_string($conn,$filtered_description);
    $duedate = mysqli_real_escape_string($conn,$filtered_due_date);
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


// Delete/ Remove Modal Section

if(isset($_POST['delete'])){
    $filtered_delete_id = filter_var($_POST['delete_id'], FILTER_SANITIZE_STRING);
    $delete_id = mysqli_real_escape_string($conn, $filtered_delete_id);

    $query = "DELETE FROM tasks
                WHERE id='$delete_id'
    ";

    if(mysqli_query($conn,$query)){
        header('Location:'.ROOT_URL.'');
    }else{
        echo "Error:".mysqli_error($conn);
    }
    $id = mysqli_real_escape_string($conn,$_GET['id']);
$query = 'SELECT * FROM tasks WHERE id='.$id;


mysqli_free_result($result);
}

$result = mysqli_query($conn, $query);
// $task = mysqli_fetch_array($result,MYSQLI_ASSOC);
$task = mysqli_fetch_assoc($result);

//Close the connection
mysqli_close($conn);


?>
    <!-- END OF HEADER -->

    <br>
    <br>

    <!-- ADD MODEL-->
    <div class="modal insert-modal">
        <div class="modal-content">
            <span class="close-modal">&times;</span>
            <h4>Add a new task ...</h4>
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
                <button type="submit" class="btn-confirm insert-button" name="submit">Confirm</button>
            </form>
        </div>
    </div>
    <!-- END OF ADD MODEL-->

    <!-- REMOVE MODEL -->
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <div class="modal remove-modal" style="text-align: center;">
        <div class="modal-content">
            <h4>Delete Task</h4>
            <br>
            <p>Are you sure you want to delete this task?</p>
            <br>
            <button class="btn-primary cancel-remove" style="background-color:grey">Cancel</button>
            <input type="hidden" name="delete_id" value="<?php echo $task['id'];?>">
            <button class="btn-danger confirm-remove" name="delete">Delete</button>
        </div>
    </div>    
    </form>
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
            <hr />
            <div class="task">
                <p>1</p>
                <p>'.$task['task_description'].'</p>
                <p>'.$task['due_date'].'</p>
                <div>
               
                    <button class="btn-warning edit-task"><a href="'.ROOT_URL.'edit.php?id='.$task['id'].'">Edit</a></button>
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
