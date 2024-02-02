<?php
$servername = "localhost"; 
$username = "root";
$password = "";
$dbname = "fitapp";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $age = $_POST["age"];
    $weight = $_POST["weight"];
    $Id = $_POST["id"];

   
    $sql = "UPDATE data SET username = '$username', password = '$password', age = '$age', weight = '$weight' WHERE id = '$Id'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    // Redirect to index.php
    header("Location: index.php");
    exit();
}

// Retrieve user data for editing
if (isset($_GET["id"])) {
    $Id = $_GET["id"];

    // Retrieve user data
    $sql = "SELECT * FROM data WHERE id = '$Id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
    } else {
        echo "No user found";
        exit();
    }
} else {
    echo "No user ID specified";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <style>
    h2{
            background-color:blueviolet;
            padding: 20px;
            text-align: center;
        }
        table {
            width: 80%;
            border-collapse: collapse;
        }
        table th, table td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        table th{
            background-color: greenyellow;
        }
        form{
            border: 1px solid black;
            width: 40%;
            margin:50px auto;
            border-radius: 5px;
            text-align: center;
            padding: 15px;
        }
        input{
            border-radius: 5px;
            width: 60%;
            padding: 10px;
        }
        input[type="submit"]{
            background-color: skyblue;
        }
</style>
</head>
<body>
<h2>Edit User</h2>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="hidden" name="id" value="<?php echo $data["id"]; ?>">
       Userame:<input type="email" name="username" value="<?php echo $data["username"]; ?>" required><br><br>
       Password:<input type="password" name="password" value="<?php echo $data["password"]; ?>" required><br><br>
       Age:<input type="number" name="age" value="<?php echo $data["age"]; ?>" required><br><br>
       Weight:<input type="number" name="weight" value="<?php echo $data["weight"]; ?>" required><br><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>

