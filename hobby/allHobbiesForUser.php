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
        <h1>All Hobbies</h1>
    </div>

<table>
    <tr>
        <th>Hobby</th>
        <th>Type</th>
    </tr>
    <?php foreach ($allHobbies as $hobby) : ?>
    <tr>
        <td><?php echo $hobby['Name'];?></td>
        <td><?php echo $hobby['Type'];?></td>
        <td>
                <form action="index.php" method="post">
                    <input type="hidden" name="action"
                           value="openHobbyPage" />
                    <input type="hidden" name="hobbyId"
                           value="<?php echo $hobby['Id']; ?>" />
                    <input type="submit" value="Open Page" />
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
        <a href="../view/user_index.php">Return back</a>
    </div>
<?php else : ?>
    <div>
        <a href="../view/admin_index.php">Return back</a>
    </div>
<?php endif; ?>
<?php include '../view/footerLogin.php'; ?>