<?php 
    function getAllPostsForHobby($hobbyId){
        global $db;
        $hobbyQuery = "SELECT * FROM posts
                WHERE posts.hobbieId = '$hobbyId'";
        return $db->query($hobbyQuery);
    }

    function getHobbyById($hobbyId){
        global $db;
        $query = "SELECT * FROM hobbies
        WHERE hobbies.Id = '$hobbyId'";
        $hobby = $db->query($query);
        $hobby = $hobby->fetch();
        return $hobby;
    }

    function addPostForHobby($hobbyId,$title,$desc,$link){
        global $db;
        $query = "INSERT INTO posts
        (Title, Description, Link, hobbieId)
     VALUES
        ('$title', '$desc', '$link', '$hobbyId')";
        $db->exec($query);
    }

    function getPostById($postId){
        global $db;
        $query = "SELECT * FROM posts
        WHERE posts.Id = '$postId'";
        $post = $db->query($query);
        $post = $post->fetch();
        return $post;
    }

    function getCommentsForPost($postId){
        global $db;
        $commentQuery = "SELECT * FROM comments
                WHERE comments.postId = '$postId'";
        return $db->query($commentQuery);
    }

    function addCommentForPost($userEmail,$postId,$commentDesc,$commentLink){
        global $db;
        $userQuery = "SELECT * FROM users
        WHERE users.Email = '$userEmail'";
        $user = $db->query($userQuery);
        $user = $user->fetch();
        $userId = $user['Id'];
        $query = "INSERT INTO comments
        (Description, Link, userId, postId)
        VALUES
        ('$commentDesc', '$commentLink', '$userId', '$postId')";
        $db->exec($query);

    }
    
?>