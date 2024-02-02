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
   
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $age = $_POST["age"];
    $weight = $_POST["weight"];
    
    $sql = "INSERT INTO data (username, password, age , weight) VALUES ('$username', '$password', '$age','$weight')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


if (isset($_GET["delete"])) {
    $Id = $_GET["delete"]; 

    $sql = "DELETE FROM data WHERE id = '$Id'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}


$sql = "SELECT * FROM data";
$result = $conn->query($sql);
$data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        h2{
            background-color:blueviolet;
            padding: 20px;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th, table td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
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
        h1{
            background-color: greenyellow;
            padding: 20px;
            text-align: center;
        }
        table th {
            background-color: yellow;
        }
        a{
            padding: 5px;
            background-color: greenyellow;
            border: 1px solid black;
            /* text-decoration: none; */
            color: black;
            /* font-weight: bold; */
        }
    </style>
</head>
<body>
    <h1>Admin Dashboard</h1>
<!-- <h2>Add User</h2>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
       Username:<input type="email" name="username" required><br><br>
       Password:<input type="password"  name="password" required><br><br>
       Age: <input type="number"  name="age" required><br><br>
       Weight: <input type="number"  name="weight" required><br><br>

        <input type="submit" value="Submit">
    </form> -->
    <h2><center> Users Records</center></h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Password</th>
                <th>Age</th>
                <th>Weight</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $datas): ?>
                <tr>
                    <td><?php echo $datas["username"]; ?></td>
                    <td><?php echo $datas["password"]; ?></td>
                    <td><?php echo $datas["age"]; ?></td>
                    <td><?php echo $datas["weight"]; ?></td>
                    <td>
                    <a href="edit.php?id=<?php echo $datas["id"]; ?>">Edit</a>
                        <a href="?delete=<?php echo $datas["id"]; ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>