<?php include 'header.php'; ?>
<hr>
<div id="main">
    <h1>Welcome <?php echo filter_input(INPUT_COOKIE,'userFirstName') ?></h1>
    <div>
    <div>
    <form action="../hobby/index.php" method="post">
            <input type="hidden" name="action" value="allHobbiesUser">
            <input type="submit" value="All Hobbies">
        </form>
    </div>
    <br>
    <div>
    <form action="../hobby/index.php" method="post">
            <input type="hidden" name="action" value="addHobbyUser">
            <input type="submit" value="Add a Hobby">
        </form>
    </div>
    <br>
</div>
<hr>
<?php include 'footerLogin.php'; ?>


