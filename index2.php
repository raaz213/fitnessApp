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

$sql = "SELECT * FROM data WHERE username = '$username'";
$result = $conn->query($sql);
$userData = $result->fetch_assoc();

function calculateBMI($weight, $height) {
    $heightMeters = $height / 100; // Convert height to meters
    $bmi = $weight / ($heightMeters * $heightMeters);
    return $bmi;
}

$height = $userData['height'];
$weight = $userData['weight'];

$bmi = calculateBMI($weight, $height);

// Function to determine BMI category
function getBMICategory($bmi) {
    if ($bmi < 18.5) {
        return "Underweight";
    } elseif ($bmi >= 18.5 && $bmi < 24.9) {
        return "Healthy Weight";
    } elseif ($bmi >= 25 && $bmi < 29.9) {
        return "Overweight";
    } else {
        return "Obese";
    }
}
$bmiCategory = getBMICategory($bmi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}
header {
    background-color: #3498db;
    color: white;
    padding: 10px;
    text-align: center;
}
.dashboard-container {
    width: 60%;
    margin: 20px auto;
    padding: 20px;
    background-color: #f5f5f5;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
h2 {
    color: #333;
    margin-bottom: 10px;
}
p {
    font-size: 16px;
    margin: 5px 0;
}
button {
    padding: 8px 12px;
    background-color: #3498db;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
button:hover {
    background-color: #2980b9;
}
.profile-photo {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 10px;
}
</style>
</head>
<body>
    <header>
        <!-- <h1>Welcome, <?php echo $userData['username']; ?>!</h1> -->
        <h1>Welcome to CalBurn!</h1>
    </header>
    <div class="dashboard-container">
        <h2>Your Profile</h2>
        <img class="profile-photo" src="https://w0.peakpx.com/wallpaper/766/843/HD-wallpaper-cool-anime-boy-mirror-selfie-animation.jpg">
        <p><strong>Username:</strong> <?php echo $userData['username']; ?></p>
        <p><strong>Password:</strong> <?php echo $userData['password']; ?></p>
        <p><strong>Age:</strong> <?php echo $userData['age']; ?> Years</p>
        <p><strong>Weight:</strong> <?php echo $userData['weight']; ?> kg</p>
        <p><strong>Height:</strong> <?php echo $userData['height']; ?> cm</p>
        <p><strong>BMI:</strong> <?php echo number_format($bmi, 2); ?></p>
        <p><strong>BMI Category:</strong> <?php echo $bmiCategory; ?></p>
        
        <button onclick="window.location.href='edit-profile.php'">Edit</button>
    </div>
</body>
</html>