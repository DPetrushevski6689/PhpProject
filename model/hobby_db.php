<?php 
    function getAllHobbies(){
        global $db;
        $hobbyQuery = "SELECT * FROM hobbies
                WHERE hobbies.Approved = '1'";
        return $db->query($hobbyQuery);
    }

    function getAllUnapprovedHobbies(){
        global $db;
        $hobbyQuery = "SELECT * FROM hobbies
                WHERE hobbies.Approved = '0'";
        return $db->query($hobbyQuery);
    }

    function approveHobby($hobbyId){
        global $db;
        $query = "UPDATE hobbies
                SET hobbies.Approved = '1'
                WHERE hobbies.Id = '$hobbyId'";
        $db->query($query);

        $hobbyQuery = "SELECT * FROM hobbies
                WHERE hobbies.Approved = '0'";
        $unapprovedHobbies = $db->query($hobbyQuery);
        include('../hobby/approveHobbiesAdmin.php');
        exit();
    }

    function addHobbyUser($type,$name){
        global $db;
        $userId = filter_input(INPUT_COOKIE,'userId',FILTER_VALIDATE_INT);
        $query = "INSERT INTO hobbies
        (Type, Name, Approved, userId)
     VALUES
        ('$type', '$name', '0', '$userId')";
        $db->exec($query);
        include('../hobby/hobbyAddSuccessUser.php');
        exit();
    }

    function addHobbyAdmin($type,$name){
        global $db;
        $query = "INSERT INTO hobbies
        (Type, Name, Approved)
     VALUES
        ('$type', '$name', '1')";
        $db->exec($query);
        include('../hobby/hobbyAddSuccessAdmin.php');
        exit();
    }
?>