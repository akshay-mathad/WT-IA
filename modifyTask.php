<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "task_manager";
    
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="modifyTask.php" method="post">
        <label>Task Title:</label><br>
        <input type="text" name="taskTitle"><br>
        <label>New Task Description:</label><br>
        <textarea name="newTaskDescription"></textarea><br>
        <label>New Date of Completion:</label><br>
        <input type="date" name="newDateOfCompletion"><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $taskTitle = $_POST['taskTitle'];
        $newTaskDescription = $_POST['newTaskDescription'];
        $newDateOfCompletion = $_POST['newDateOfCompletion'];
        session_start();
        $userId = $_SESSION['uid'];
        if (!empty($newTaskDescription) && !empty($newDateOfCompletion)) {
            $sql = "UPDATE task SET Description = '$newTaskDescription', DOC = '$newDateOfCompletion' WHERE U_id = '$userId' AND TaskTitle = '$taskTitle'";
    
            if ($conn->query($sql) === TRUE) {
                header("Location: page1.php");
                exit;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "New Task Description and New Date of Completion cannot be empty";
        }
    }
?>