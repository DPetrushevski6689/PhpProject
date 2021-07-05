<?php include 'view/header.php';

?>

<div>
    <div>
        <h1>Welcome to our page!</h1>
    </div>
    <br>
    <hr>
    <div>
        <h3>Login</h3>
        <form action="register_user/register.php" method="post">
            <input type="hidden" name="action" value="login_user">
            <label for="email">Email:</label>
            <input type="email" name="email">
            <label for="password">Password:</label>
            <input type="password" name="password">
            <input type="submit" value="Login">
        </form>
    </div>
    <br>
    <hr>
    <div>
        <p>Dont have an account? <a href="register_user">Register here</a></p>
    </div>  
</div>
<?php include 'view/footer.php'; ?>
