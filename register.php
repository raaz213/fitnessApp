<?php
 $servername = "localhost";
 $username = "root";
 $password = ""; 
 $dbname = "fitapp"; 
 
 $conn = new mysqli($servername, $username, $password, $dbname) or die();

if($_SERVER["REQUEST_METHOD"] == "POST"){

$username = $_POST['username'];
$password = $_POST['password'];
$age = $_POST['age'];
$weight = $_POST['weight'];
$height = $_POST['height'];

$sql = "INSERT INTO data(username, password, age, weight, height) VALUES('$username', '$password','$age','$weight','$height')";
if (mysqli_query($conn, $sql)) {
    echo "Data registered successfully";
    header("Location:login.php");
} else {
    echo "Error:" . $sql . "<br>" . $conn->error;
}
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
      background-image: url('https://media.istockphoto.com/id/519621034/photo/life-can-be-tough-but-so-can-you.jpg?s=612x612&w=0&k=20&c=rvDGM8rp0QUF9z2qMwGLJpbpBHBSfEr-Woza3TEqsiA=');
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
        
        button[type="submit"] {
            background-color: skyblue;
            padding: 10px;
            width: 25%;
        }
        h4{
            background-color: greenyellow;
            padding: 10px;
        }
    </style>
</head>

<body>
<form method="POST" action = "<?php echo $_SERVER['PHP_SELF'];?>">
        <div class="container">
            <h1>Register</h1>
            <h4>Please fill in this form to create an account.</h4>
            <hr>
            <label for="name"><b>Username: </b></label>
            <input type="email" placeholder="Enter Username" name="username" required> <br> <br>

            <label for="psw"><b>Password: </b></label>
            <input type="password" placeholder="Enter Password" name="password" required> <br><br>

            <label for="age"><b>Age: </b></label>
            <input type="number" placeholder="Enter your age" name="age" required> <br> <br>

            <label for="weight"><b>Weight: </b></label>
            <input type="number" placeholder="Enter your weight" name="weight" required> <br><br>

            <label for="height"><b>Height: </b></label>
            <input type="number" placeholder="Enter your height in cm" name="height" required> <br><br>

            <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
            <button type="submit" class="registerbtn">Register</button>
        </div>

        <div class="login">
            <p>Already have an account? <a href="login.php">Log in</a>.</p>
        </div>
    </form>
</body>

</html>