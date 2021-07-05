<?php include '../view/header.php'; ?>
<hr>
<div>
    <h3>Register an account</h3>
    <div>
        <form action="register.php" method="post">
        <input type="hidden" name="action" value="register_user">
            <div>
                <label for="FirstName">First Name</label>
                <input type="input" name="firstName">
            </div>
            <br>
            <div>
                <label for="LastName">Last Name:</label>
                <input type="input" name="lastName">
            </div>
            <br>
            <div>
                <label for="Email">Email:</label>
                <input type="input" name="email">
            </div>
            <br>
            <div>
                <label for="Gender">Gender:</label>
                Male <input type="radio" name="gender" value="Male">
                Female <input type="radio" name="gender" value="Female">
            </div>
            <br>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password">
            </div>
            <br>
            <div>
                <label for="confirmPassword">Confirm Password:</label>
                <input type="password" name="confirmPassword">
            </div>
            <br>
            <input type="submit" value="Register">
        </form>
    </div>
</div>
    <br>
    <hr> 
<?php include '../view/footer.php'; ?>