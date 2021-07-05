<?php 
    function check_user_exists($email){
        global $db;
        $query = "SELECT * FROM users
                    WHERE users.Email = '$email'";
        $user = $db->query($query);
        $user = $user->fetch();
        if($user != null){
            $error = "User with that email already exists! Please enter a different email.";
            include('../errors/error.php');
            exit();
        }
    }

    function register_user($firstName, $lastName,  $gender, $email, $password){
        global $db;
        $query = "INSERT INTO users
        (FirstName, LastName, Email, Password,  Gender)
     VALUES
        ('$firstName', '$lastName', '$email', '$password',  '$gender')";
        $db->exec($query);
    }

    function login_user($email,$password){
        global $db;
        $query = "SELECT * FROM users
                WHERE users.Email = '$email' AND users.Password = '$password'";
        $user = $db->query($query);
        $user = $user->fetch();
        if($user == null){
            $error = "Invalid email or password! Please try again";
            include('../errors/error.php');
            exit();
        }
        
        //Set a cookie for the user on login
        $cookieName = 'userEmail';
        $cookieValue = $user['Email'];
        $cookieExpire = strtotime('+1 year');
        $cookiePath = '/';
        setcookie($cookieName, $cookieValue, $cookieExpire, $cookiePath ); 

        setcookie('userFirstName', $user['FirstName'], $cookieExpire, $cookiePath);
        setcookie('isAdmin', $user['isAdmin'], $cookieExpire, $cookiePath);

        //Set a session for the user on login
        session_start();
        $_SESSION['email'] = $user['Email'];
        $_SESSION['firstName'] = $user['FirstName'];
        $_SESSION['lastName'] = $user['LastName'];

        $isAdmin = $user['isAdmin'];

        if($isAdmin == 0){
            //user
            include('../view/user_index.php');
            exit();
        }else{
            //admin
            include('../view/admin_index.php');
            exit();
        }
    }

    function logout_user($email){
        $cookieName = 'userEmail';
        $cookieValue = $email;
        $cookieExpire = strtotime('-1 year');
        $cookiePath = '/';
        setcookie($cookieName, $cookieValue, $cookieExpire, $cookiePath ); 

        global $db;
        $query = "SELECT * FROM users
                WHERE users.Email = '$email'";
        $user = $db->query($query);
        $user = $user->fetch();
        setcookie('userFirstName',$user['FirstName'] ,$cookieExpire, $cookiePath);
        setcookie('isAdmin', $user['isAdmin'], $cookieExpire, $cookiePath);

        session_start();
        if(isset($_SESSION['email'])){
            session_destroy();
            echo"<script>location.href='../index.php'</script>";
        }
    }
?>