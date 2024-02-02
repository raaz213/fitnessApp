<!DOCTYPE html>
<html>
<head>
  <title>Fitness CalBurn</title>
  <style>
    body {
      background-image: url('https://media.istockphoto.com/id/612262390/photo/body-building-workout.jpg?s=612x612&w=0&k=20&c=zsRgRf3tuStA7dN5bdFS_x1ud-XdU-dJC7B6iuq_AZk=');
      background-size: cover;
      background-position: center;
      font-family: Arial, sans-serif;
    }
    .container {
      max-width: 600px;
      margin: auto;
      padding: 40px;
    }
    .form {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      /* margin-top: 40px; */
    }
    .login {
      flex-basis: calc(50% - 20px);
      background-color: rgba(255, 255, 255, 0.8);
      border-radius: 25px;
      padding: 20px;
      /* box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1); */
      margin-bottom: 20px;
    }
    .login h3 {
      margin-top: 0;
      font-size: 20px;
      color: #333;
    }
    .login p {
      margin-bottom: 0;
      color: #666;
    }
    .login .icon {
      font-size: 50px;
      text-align: center;
      margin-bottom: 10px;
    }
    .login .btn {
      display: inline-block;
      background-color: #4CAF50;
      color: #fff;
      padding: 8px 16px;
      text-decoration: none;
      border-radius: 4px;
      transition: background-color 0.3s ease;
    }
    .login .btn:hover {
      background-color: red;
    }
   h1{
	color:greenyellow;
	font-size: 45px;
	text-transform: uppercase;
	font-family: 'Quicksand', sans-serif;
	letter-spacing: 2px;
}
.text-primary{
	color: burlywood;
  border-bottom: 2px solid #ec4141;	
}
h2{
      color: yellow;
    }
  </style>
</head>
<body>
<h1><span class="border-bottom">Welcome to</span><span class="text-primary"> Cal Burn!</span></h1>
 <h2> Track your progress,set goals and achieve your fitness dreams.</h2>
  <div class="container">
    <div class="form">
      <div class="login">
        <div class="icon">&#128100;</div>
        <h3>Register</h3>
        <p>New user? Register an account.</p>
        <a href="register.php" class="btn">Register</a>
      </div>
      <div class="login">
        <div class="icon">&#128273;</div>
        <h3>Login</h3>
        <p>Already have an account? Login here.</p>
        <a href="login.php" class="btn">Login</a>
      </div>
    </div>
  </div>
</body>
</html>
