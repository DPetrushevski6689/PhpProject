<?php 


    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require '../vendor/autoload.php';

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

    function addPostForHobby($hobbyId,$title,$desc,$link,$fileName){

        global $db;
        $query = "INSERT INTO posts
        (Title, Description, Image, Link, hobbieId)
     VALUES
        ('$title', '$desc', '$fileName','$link', '$hobbyId')";
        $db->exec($query);
        $hobby = getHobbyById($hobbyId);
        $userId = $hobby['userId'];
        $userQuery = "SELECT * FROM users
        WHERE users.Id = '$userId'";
        $user = $db->query($userQuery);
        $user = $user->fetch();

        //send mail to user
        

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'webappfeit@gmail.com';                     //SMTP username
            $mail->Password   = 'webAppTest44$';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('webappfeit@gmail.com');
            $mail->addAddress($user['Email']);               //Name is optional
            

            

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Hobby Space Post';
            $mail->Body    = '<b>A post has been added for your hobby</b>';
            $mail->AltBody = 'A post has been added for your hobby';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

       
    }
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
        $date = date("Y/m/d");
        $query = "INSERT INTO comments
        (Description, Link, Date, userId, postId)
        VALUES
        ('$commentDesc', '$commentLink', '$date' ,'$userId', '$postId')";
        $db->exec($query);

    }
    
?>