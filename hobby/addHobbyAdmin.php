<?php include '../view/header.php';

?>
<hr>
<div>
    <div>
        <h1>Add a new hobby!</h1>
    </div>
    <div>
        <form action="index.php" method="post">
            <input type="hidden" name="action" value="addHobbyEntryAdmin">
            <div>
                <label for="HobbyType">Hobby Type</label>
                <input type="input" name="hobbyType">
            </div>
            <br>
            <div>
                <label for="HobbyName">Hobby Name:</label>
                <input type="input" name="hobbyName">
            </div>
            <br>
            <input type="submit" value="Save">
        </form>
    </div>
</div>
<br>
<hr>
<div>
    <a href="../view/admin_index.php">Return back</a>
</div>
<?php include '../view/footerLogin.php'; ?>
