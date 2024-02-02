<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "fitapp"; 

$conn = new mysqli($servername, $username, $password, $dbname) or die();

$username = $_SESSION['username'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle other form data
    $age = $_POST['age'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $password = $_POST["password"];

    // Handle file upload for profile photo
    if ($_FILES['profile_photo']['error'] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["profile_photo"]["name"]);
        move_uploaded_file($_FILES["profile_photo"]["tmp_name"], $target_file);

        // Update the database with the new file path
        $sql = "UPDATE data SET profile_photo = '$target_file', age = '$age', weight = '$weight', height = '$height', password = '$password' WHERE username = '$username'";
    } else {
        // Update the database without changing the profile photo
        $sql = "UPDATE data SET age = '$age', weight = '$weight', height = '$height', password = '$password' WHERE username = '$username'";
    }

    if (mysqli_query($conn, $sql)) {
        header("Location: index2.php"); // Redirect back to the dashboard
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$sql = "SELECT * FROM data WHERE username = '$username'";
$result = $conn->query($sql);
$userData = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
</head>
<body>
    <header>
        <h1>Edit Your Profile</h1>
    </header>
    <div class="edit-container">
        <form method="POST" enctype="multipart/form-data">
            <!-- Add the following input for profile photo -->
            <label for="profile_photo">Profile Photo:</label>
            <input type="file" name="profile_photo"><br><br>

            <label for="age">Age:</label>
            <input type="number" name="age" value="<?php echo $userData['age']; ?>" required><br><br>
        
            <label for="weight">Weight:</label>
            <input type="number" name="weight" value="<?php echo $userData['weight']; ?>" required><br><br>

            <label for="height">Height:</label>
            <input type="number" name="height" value="<?php echo $userData['height']; ?>" required><br><br>
            
            Password:<input type="password" name="password" value="<?php echo $userData["password"]; ?>" required><br><br>
            <button type="submit">Save Changes</button>
        </form>
    </div>
</body>
</html>
