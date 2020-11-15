<?php
//Create a connection
$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

//Check the connection
if(mysqli_connect_errno()){
    echo "Failed to connect to the database.<br />
    MYSQL:".mysqli_connect_errno();
}
?>