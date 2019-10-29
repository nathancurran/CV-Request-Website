<?php
require_once "db.php";
    //below code checks whether the form is submitted
    //using the POST method or not 

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $errPass = $erremail_address = $errfirst_name = $errlast_name = $erruser_comment = $errcv_type = $errbusiness_name = "";
        $Pass = $email_address = $first_name = $last_name = $user_comment = $cv_type = $business_name = "";
        
        $first_name      = mysqli_real_escape_string($db_connection, $_POST["first_name"]);
        $last_name       = mysqli_real_escape_string($db_connection, $_POST["last_name"]);
        $business_name   = mysqli_real_escape_string($db_connection, $_POST["business_name"]);
        $email_address   = mysqli_real_escape_string($db_connection, $_POST["email_address"]);
        $cv_type         = mysqli_real_escape_string($db_connection, $_POST["cv_type"]);
        $user_comment    = mysqli_real_escape_string($db_connection, $_POST["user_comment"]);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <title>PHP and MySQLi Thank you message.</title>
    <!--Determines the default stylesheet for computer and phone screen-->
    <link rel="stylesheet" type="text/css" href="css/process_CV_request.css" media="screen,projector" />
</head>
<body>
    <header>
        <h1>Thank you for your request!</h1>
    </header>
    <div id="feedback">
        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $qry = "insert into cv_requests(first_name, last_name, business_name, email_address, cv_type, user_comment)
                    values('$first_name', '$last_name', '$business_name', '$email_address', '$cv_type', '$user_comment');";
            $res = $db_connection->query($qry);
            if ($res)
            {
                echo "<p>Thank you for requesting to see my CV.</p>";
                echo "<p>Your Company name: <strong>".$business_name."</strong></p>";
                echo "<p>Your comment: ".$user_comment."</p>";
                echo "<p><a href='files/";
                if ($cv_type === 'Short')
                    echo "Short_CV";
                else
                    echo "Long_CV";
                echo".pdf' target='_blank'>View my ".$cv_type." CV</a></p>";
                exit();
            }
            else
            {
                 echo "<p>ERROR.</p>";
            }
        }
    $db_connection->close();
    ?>
    </div>
</body>
</html>