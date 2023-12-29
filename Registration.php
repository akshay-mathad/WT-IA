<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "task_manager";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    else {
       

    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Registration.css" rel="stylesheet">

    <title>Document</title>
</head>
<body>
    <center>
        <form action="Registration.php" method="post">
            <!-- <label>User ID:</label>
            <input type="text" name="userid"><br><br> -->
            
            <label>User Role:</label>
            <input type="menu" name="role"><br><br>

            <label>Username:</label>
            <input type="text" name="username"><br><br>

            <label>Password:</label>
            <input type="password" name="password"><br><br>

            <input type="submit" value="Register">
        </form>
    </center>
</body>
</html>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $userid = $_POST['userid'];
    
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
        // Upload data to database
        $sql = "INSERT INTO users ( U_name, Password) VALUES ('$username', '$hashedPassword')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            header("Location: Login.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>