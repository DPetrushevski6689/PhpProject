<?php include '../view/header.php'; ?>
<hr>
<div>
    <div>
        <h3>Add a post for hobby: <?php echo $hobby['Name'] ?></h3>
    </div>
    
    <div>
        <form action="index.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="addPostEntry">
        <input type="hidden" name="hobbyId" value="<?php echo $hobby['Id'] ?>">
            <div>
                <label>Post Title:</label>
                <input type="input" name="postTitle">
            </div>
            <br>
            <label>Description:</label>
            <div>
                <textarea name="postDesc" cols="120" rows="10" maxlength="1000"></textarea>
            </div>
            <br>
            <div>
                <label>Link:</label>
                <input type="input" name="postLink">
            </div>
            <br>
            <div>
                <label>Image:</label>
                <input type="file" name="postImage">
            </div>
            <br>
            <input type="submit" value="Add">
        </form>
    </div>
</div>
    <br>
    <hr>
<?php 
$isAdmin = filter_input(INPUT_COOKIE,'isAdmin',FILTER_VALIDATE_INT);
if($isAdmin == 0) : ?>        
    <div>
        <a href="../view/user_index.php">Return Home</a>
    </div>
<?php else : ?>
    <div>
        <a href="../view/admin_index.php">Return Home</a>
    </div>
<?php endif; ?>
<?php include '../view/footerLogin.php'; ?>