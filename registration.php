<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require 'connectrecipe.php';
    session_start();
    $errors = array();
    // When form submitted, insert values into the database.
    if(isset($_REQUEST['username'])) {
        //escapes special characters in a string
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($conn, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($conn, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        $confirmPassword = stripslashes($_REQUEST['confirmPassword']);
        $confirmPassword = mysqli_real_escape_string($conn, $confirmPassword);
        /*$address   = stripslashes($_REQUEST['address']);
        $address    = mysqli_real_escape_string($conn, $address);
        $city    = stripslashes($_REQUEST['city']);
        $city    = mysqli_real_escape_string($conn, $city);
        $state    = stripslashes($_REQUEST['state']);
        $state    = mysqli_real_escape_string($conn, $state);
        $country    = stripslashes($_REQUEST['country']);
        $country   = mysqli_real_escape_string($conn, $country);
        $cellphone  = stripslashes($_REQUEST['cellphone']);
        $cellphone   = mysqli_real_escape_string($conn, $cellphone);*/
        
    
        //form validation
        if(empty($username)) {
            array_push($errors, "Username is required");
        }
        if(empty($email)) {
            array_push($errors, "Email is required");
        }
        if(empty($password)) {
            array_push($errors, "Password is required");
        }
        if($password != $confirmPassword){
            array_push($errors, "Passwords do not match");
        }
        /*if(empty($address)) {
            array_push($errors, "Address is required");
        }
        if(empty($city)) {
            array_push($errors, "City is required");
        }
        if(empty($state)) {
            array_push($errors, "State is required");
        }
        if(empty($country)) {
            array_push($errors, "Country is required");
        }*/

        //make sure that the email and username are not already there.
        $user_check_query = "SELECT * FROM users WHERE username= '$username' or email='$email' LIMIT 1";
        $result = mysqli_query($conn, $user_check_query);
        $user = mysqli_fetch_assoc($result);
        if($user){
            if($user['username'] === $username){
                array_push($errors, "Username already exists");
            }
            if($user['email'] === $email){
                array_push($errors, "Email already exists");
            }
        }
        mysqli_free_result($result);
        //Only insert if there are no errors
        if(count($errors)== 0){
           //after error checks  we will now insert
           $query    = "INSERT INTO users (username, password, email) VALUES ('$username', '" . md5($password) . "', '$email')";
           $result   = mysqli_query($conn, $query);
           if ($result) {
              echo "<div class='form'>
                    <h3>You are registered successfully.</h3><br/>
                    <p class='link'>Click here to <a href='login.php'>Login</a></p>
                    </div>";
              echo "<div class='form'>
                    
                    <h3 class='link'>Click here to <a href='registration.php'>Register another user</a></h3>
                    </div>";
              echo "<div>
                    <h3 class='link'>Click here to <a href='main.php'>access our main page</a></h3>
                    
              </div>";
           } 
           else{
                    echo "<div class='form'>
                    <h3>Something went wrong with the connection.</h3><br/>
                    <p class='link'>Click here to <a href='registration.php'>register</a> again.</p>
                    </div>";
            }
        }
        else{           
            echo "<div class='form'>
                  <h3>You have errors:<br>
                            *required fields are missing<br>
                            *passwords do not match<br>
                            *username/email already exists.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>try</a> again.</p>
                  </div>";
            }
        }
    else {
?>
    <form action="registration.php" method="post">

        <p><h1>Registration</h1> 

        <p><label for="username">Username : </label>
            <input type="text" name="username" required></p>
        
        <p><label for="email">Email : </label>
            <input type="email" name="email" required></p>
        
        <p><label for="password">Password : </label>
            <input type="password" name="password"required></p>
        
        <p><label for="confirmPassword">Confirm Password : </label>
            <input type="password" name="confirmPassword"required></p>
        
        
        <p><button type="submit" name="registration"> Submit </button></p>
        <p>Already a user? <a href="login.php"><b>Login</b></a></p>
    </form>
<?php
    }
?>
</body>
</html>