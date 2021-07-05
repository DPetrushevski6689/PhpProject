<?php include '../view/header.php'; ?>
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
</style>

<div >
    <div>
        <h1>Posts for hobby: <?php echo $hobby['Name'] ?></h1>
    </div>
    <div>
        <form action="index.php" method="post">
            <input type="hidden" name="hobbyId" value="<?php echo $hobby['Id'] ?>">
            <input type="hidden" name="action" value="addPost">
            <input type="submit" value="Add New Post">
        </form>
    </div>
    <br>
<table>
    <tr>
        <th>Post Title</th>
        <th>Post Description</th>
    </tr>
    <?php foreach ($postsForHobby as $post) : ?>
    <tr>
        <td><?php echo $post['Title'];?></td>
        <td><?php echo $post['Description'];?></td>
        <td>
                <form action="index.php" method="post">
                    <input type="hidden" name="action"
                           value="openPost" />
                    <input type="hidden" name="postId"
                           value="<?php echo $post['Id']; ?>" />
                    <input type="submit" value="View Post" />
                </form>
        </td>
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