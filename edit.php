    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To do list app</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

    <!-- EDIT MODAL -->
    <div class="modal edit-modal">
        <div class="modal-content">
            <span class="close-modal">&times;</span>
            <h4>Edit an existing task ...</h4>
            <br>
            <form method="POST" action="">
                <label for="">Description: 
                    <input type="text" name="description">
                </label>
                <br>
                <label for="">Due date:
                    <input type="date" name="due_date">
                </label>
                <br>
                <button type="submit" class="btn-confirm edit-button">Confirm(E)</button>
            </form>
        </div>
    </div>
    <!-- END OF EDIT MODAL -->
