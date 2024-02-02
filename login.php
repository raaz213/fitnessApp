<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
      background-image: url('https://media.istockphoto.com/id/1309526309/photo/asian-woman-taking-a-break-in-the-training-gym.jpg?s=612x612&w=0&k=20&c=2rR2hv9uU0rby06H5pyYzNJK0XuGCCeAKgLfIBgDOBQ=');
      background-size: cover;
      background-position: center;
      font-family: Arial, sans-serif;
    }
        form {
            border: 1px solid black;
            width: 40%;
            margin: 50px auto;
            border-radius: 5px;
            text-align: center;
            padding: 15px;
            background-color: rgba(255, 255, 255, 0.8);
        }
        
        input {
            border-radius: 5px;
            width: 60%;
            padding: 10px;
        }
        
        input[type="submit"] {
            background-color: skyblue;
        }
    </style>
</head>
<body>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Username: <input type="text" name="username" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
    
    <?php
    
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = ""; 
    $dbname = "fitapp"; 
    
    $conn = new mysqli($servername, $username, $password, $dbname) or die();
    if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM data WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: home.php");
    }else{
        echo "<center><h3>Invalid username or password</h3></center>";
    }
}
    ?>
    </body>
    </html>
    
