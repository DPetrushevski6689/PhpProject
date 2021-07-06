<?php
require('../model/database.php');
require('../model/hobby_db.php');
require('../model/posts_db.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

/*******/

if ($action == 'allHobbiesUser') {
    //get all hobbies with the option for subscribing
    $allHobbies = getAllHobbies();
    include('allHobbiesForUser.php');
} 
else if ($action == 'addHobbyUser') {
   include('addHobbyUser.php');
} 
else if($action == "addHobbyEntryUser"){
    //add a hobby -> not approved
    $type = $_POST['hobbyType'];
    $name = $_POST['hobbyName'];
    addHobbyUser($type,$name);
}
else if($action == 'addHobbyAdmin'){
    include('addHobbyAdmin.php');
}
else if($action == 'addHobbyEntryAdmin'){
    //add a hobby -> approved
    $type = $_POST['hobbyType'];
    $name = $_POST['hobbyName'];
    addHobbyAdmin($type,$name);
}
else if($action == 'approveHobbyAdmin'){
    $unapprovedHobbies = getAllUnapprovedHobbies();
    include('approveHobbiesAdmin.php');
}
else if($action == 'approveHobby'){
    $hobbyId = $_POST['hobbyId'];
    approveHobby($hobbyId);
}
else if($action == 'openHobbyPage'){
    //open hobby page with posts and comments
    $hobbyId = $_POST['hobbyId'];
    $hobby = getHobbyById($hobbyId);
    $postsForHobby = getAllPostsForHobby($hobbyId);
    include('posts.php');
}
else if($action == "addPost"){
    $hobbyId = $_POST['hobbyId'];
    $hobby = getHobbyById($hobbyId);
    include('addPost.php');
}
else if($action == "addPostEntry"){
    $hobbyId = $_POST['hobbyId'];
    $title = $_POST['postTitle'];
    $description = $_POST['postDesc'];
    $link = $_POST['postLink'];


    //$postImage = $_POST['postImage'];
    
    $filename = $_FILES['postImage']['name'];
    $tempname = $_FILES['postImage']['tmp_name'];
    $folder = "../image/".$filename;

    move_uploaded_file($tempname,$folder);

    addPostForHobby($hobbyId,$title,$description,$link,$filename);

    $hobby = getHobbyById($hobbyId);
    $postsForHobby = getAllPostsForHobby($hobbyId);
    include('posts.php');
}
else if($action == "openPost"){
    $postId = $_POST['postId'];
    $post = getPostById($postId);
    $commentsForPost = getCommentsForPost($postId);
    include('commentsForPost.php');
}
else if($action == "addComment"){
    $postId = $_POST['postId'];
    $post = getPostById($postId);
    include('addComment.php');
}else if($action == "addCommentEntry"){
    $postId = $_POST['postId'];
    $commentDesc = $_POST['commentDesc'];
    $commentLink = $_POST['commentLink'];
    $userEmail = filter_input(INPUT_COOKIE,'userEmail',FILTER_VALIDATE_EMAIL);
    addCommentForPost($userEmail,$postId,$commentDesc,$commentLink);
    $post = getPostById($postId);
    $commentsForPost = getCommentsForPost($postId); 
    include('commentsForPost.php');
}
?>