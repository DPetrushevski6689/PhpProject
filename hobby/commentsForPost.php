<?php include '../view/header.php'; 
    require('../model/comments_db.php');
?>
<hr>
<style>
    table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

    td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    }

    tr:nth-child(even) {
    background-color: #dddddd;
    }

    #navigation{
        position: absolute; /*or fixed*/
        right: 500px;
        top: 100px;
    }
</style>

<div >
    <div>
        <h1>Comments for post: <?php echo $post['Title'] ?></h1>
    </div>
    <div>
        <h3>Description: <?php echo $post['Description'] ?></h3>
        <h3>Link: <a href="<?php echo $post['Link'] ?>"><?php echo $post['Link'] ?></a></h3>
    </div>
    <div id="navigation">
        <img src="../image/<?php echo $post['Image'] ?>" alt="" width="400" height="160">
    </div>
    <div>
        <form action="index.php" method="post">
            <input type="hidden" name="postId" value="<?php echo $post['Id'] ?>">
            <input type="hidden" name="action" value="addComment">
            <input type="submit" value="Add New Comment">
        </form>
    </div>
    <br>
<table>
    <tr>
        <th>Created By</th>
        <th>Comment</th>
        <th>Link</th>
        <th>Date</th>
    </tr>
    <?php foreach ($commentsForPost as $comment) : ?>
    <tr>
        <td><?php echo getUserForComment($comment['Id'])['FirstName'];?> <?php echo getUserForComment($comment['Id'])['LastName'];?></td>
        <td><?php echo $comment['Description'];?></td>
        <td><a href="<?php echo $comment['Link'];?>"><?php echo $comment['Link'];?></a></td>
        <td><?php echo $comment['Date']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>  

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