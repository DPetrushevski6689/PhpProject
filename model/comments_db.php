<?php 
    function getUserForComment($commentId){
        global $db;
        $query = "SELECT * FROM comments
        WHERE comments.Id = '$commentId'";
        $comment = $db->query($query);
        $comment = $comment->fetch();

        $userId = $comment['userId'];
        $userQuery = "SELECT * FROM users
        WHERE users.Id = '$userId'";
        $user = $db->query($userQuery);
        $user = $user->fetch();
        return $user;
    }
?>