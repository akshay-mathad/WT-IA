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
    <form action="deleteTask.php" method="post">
        <label>Task Title:</label><br>
        <input type="text" name="taskTitle"><br>
        <input type="submit" value="Delete">
    </form>
</body>
</html>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $taskTitle = $_POST['taskTitle'];
        session_start();
        $userId = $_SESSION['uid'];
        $sql = "DELETE FROM task WHERE U_id = '$userId' AND TaskTitle = '$taskTitle'";
    
        if ($conn->query($sql) === TRUE) {
            header("Location: page1.php");
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>