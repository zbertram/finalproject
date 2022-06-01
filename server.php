<?php
include 'connectrecipe.php';
include 'register.php';

    //starts the tracking period which is called a session
    session_start();
    $errors = array();
    //register users
    $userName = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirm']);
   //form validation
   if(empty($userName)){
       array_push($errors, 'username is required');
   }
   if(empty($email)){
        array_push($errors, 'email is required');
    }
    if(empty($password)){
        array_push($errors, 'password is required');
    }
    if($password !==$confirmPassword){
        array_push($errors, 'passwords do not match');
    }
    $checkUserQuery= "SELECT * FROM users WHERE username = '$userName' OR email='$email' LIMIT 1";
    $results=mysqli_query($conn, $checkUserQuery);
    $user=mysqli_fetch_assoc($results);
    if($user){
        if($user['username']==$username){
            array_push($errors, "username already exists");
        }
        if($email['email']==$email){
            array_push($errors, "That email already exists");
        }
    }
    //register user if there is no error
    if(count($errors)==0){
        $password=md5($password);//this will encrypt the password
        $query="INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        mysqli_query($conn, $query);
        $_SESSION['username']=$userName;
        $_SESSION['success']="You are now logged in";
        
    }
?>