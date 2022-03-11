<?php
    session_start();
    $username = "";
    $email = "";
    $errors = array();
    //connect to database
    $db = mysqli_connect('localhost', 'root', '', 'registration');

    //if the register button is clicked
    if (isset($_POST['register'])) {
    	$username = ($_POST['username']);
    	$email = ($_POST['email']);
    	$password_1 = ($_POST['password_1']);
    	$password_2 = ($_POST['password_2']);

    	if (empty($username)) {
    		array_push($errors, "Username is required"); 
    	}

    	if (empty($email)) {
    		array_push($errors, "Email is required");
    	}

    	if (empty($password_1)) {
    		array_push($errors, "Password is required");
    	}

    	if ($password_1 != $password_2) {
    		array_push($errors,"The two Passwords do not match");
    	}
        
        if (count($errors) == 0){
        	$Password = md5($password_1); //encrypt the password before storing into the database for security
        	$sql = "INSERT INTO users (username, email, password)VALUES ('$username', '$email', '$Password')";
        	mysqli_query($db, $sql);
        	$_SESSION['username'] = $username;
        	$_SESSION['success'] = "You are successfully Registered, log in to vote";
        	header('location: index.php');

        }

    }

    //log user in from login page
    if(isset($_POST['login'])){
    	$username = ($_POST['username']);
    	$password = ($_POST['password']);

    	//ensuring form fields are filled properly
    	if (empty($username)){
    		array_push($errors, "username is required!");
    	}
    	if (empty($password)) {
    		array_push($errors, "password is required!");
    	}

    	if (count($errors) == 0 ) {
    		$password = md5($password);
    		$query = "SELECT * FROM users WHERE username= '$username' AND password= '$password'";
    		$result = mysqli_query($db, $query);
    		if (mysqli_num_rows($result) == 1) {
    			$_SESSION['username'] = $username;
    			$_SESSION['success'] = "You are now successfully logged in!";
    			header ('location: index.php');

    		}else{
    			array_push($errors, "Wrong username/password combination!!");
    		}
    	}
           
    }
    






    //logout
    if (isset($_GET['logout'])){
    	session_destroy();
    	unset($_SESSION['username']);
    	header('location: login.php');
    }
 

?>