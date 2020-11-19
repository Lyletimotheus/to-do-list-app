<?php
require ('config/config.php');
require ('config/database.php');

if(isset($_POST['submit'])){
// Validate and sanitize the data here
$filtered_id = filter_var($_POST['update_id'], FILTER_SANITIZE_STRING);
$filtered_description = filter_var($_POST['description'],FILTER_SANITIZE_STRING);
$filtered_due_date = filter_var($_POST['due_date'],FILTER_SANITIZE_STRING) ;
// Get the data
$update_id = mysqli_real_escape_string($conn, $filtered_id);
$description = mysqli_real_escape_string($conn,$filtered_description);
$duedate = mysqli_real_escape_string($conn,$filtered_due_date);

$query = "UPDATE tasks SET
        task_description = '$description',
        due_date = '$duedate'
        WHERE id = '$update_id'
";

if(mysqli_query($conn, $query)){
    header('Location:'.ROOT_URL.'index.php');
}else{
    echo "Error: ".mysqli_error($conn);
}
}
$id = mysqli_real_escape_string($conn,$_GET['id']);
$query = 'SELECT * FROM tasks WHERE id='.$id;
$result = mysqli_query($conn, $query);
$task = mysqli_fetch_assoc($result);
mysqli_free_result($result);
mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To do list app</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="css/style.css">
    
    <style>
        .modal {
            display: block;
        }
    </style>    
</head>
<body>

    <!-- EDIT MODAL -->
    <div class="modal edit-modal">
        <div class="modal-content">
            <a href="<?php echo ROOT_URL?>"><span class="close-modal">&times;</span></a>
            <h4>Edit an existing task ...</h4>
            <br>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
                <label for="">Description: 
                    <input type="text" name="description" value="<?php echo $task['task_description']?>">
                </label>
                <br>
                <label for="">Due date:
                    <input type="date" name="due_date" value="<?php echo $task['due_date']?>">
                </label>
                <br>
                <input type="hidden" name="update_id" value="<?php echo $task['id']?>">
                <button type="submit" class="btn-confirm edit-button" name="submit">Update</button>
            </form>
        </div>
    </div>
    <!-- END OF EDIT MODAL -->
    