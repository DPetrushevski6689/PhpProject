<?php include '../view/header.php'; ?>
<hr>
<div>
    <div>
        <h3>Add a comment for post: <?php echo $post['Title'] ?></h3>
    </div>
    
    <div>
        <form action="index.php" method="post">
        <input type="hidden" name="action" value="addCommentEntry">
        <input type="hidden" name="postId" value="<?php echo $post['Id'] ?>">
        
            <label>Comment:</label>
            <div>
                <textarea name="commentDesc" cols="90" rows="10" maxlength="1000"></textarea>
            </div>
            <br>
            <div>
                <label>Link</label>
                <input type="input" name="commentLink">
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