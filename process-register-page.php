<?php

$errors = array();

$first_name = trim($_POST['first_name']);
if (empty($first_name)) {
    $errors[] = 'Your forgot to enter your first name.';
}

$last_name = trim($_POST['last_name']);
if (empty($last_name)) {
    $errors[] = 'Your forgot to enter your last name.';
}

$email = trim($_POST['email']);
if (empty($email)) {
    $errors[] = 'Your forgot to enter your email.';
}

$password1 = trim($_POST['password1']);
$password2 = trim($_POST['password2']);

if (!empty($password1)) {
    if ($password1 !== $password1) {
        $errors[] = 'Your two passwords did not match!';
    }
    else {
        $errors[] = 'You forgot to enter your password.';
    }
}

if (empty($errors)) {
    try {
        $hashed_passcode = password_hash($password1, PASSWORD_DEFAULT); //hash the password
        require('mysqli_connect.php'); //connect to db

        #MAKE THE QUERY
        $query = "INSERT INTO users (userid, first_name, last_name, email, password, registration_date) ";
            $query .="VALUES (' ', ?, ?, ?, ?, NOW() )";
        
        #USE PREPARED STATEMENT TO ENSURE ONLY TEXT IS INSERTED
        $q = mysqli_stmt_init($dbcon);
        mysqli_stmt_prepare($q, $query);

        #BIND FIELDS TO SQL STATEMENT
        mysqli_stmt_bind_param($q, 'ssss', $first_name, $last_name, $email, $hashed_passcode);

        #EXECUTE QUERY
        mysqli_stmt_execute($q);

        if (mysqli_stmt_affected_rows($q) == 1) {
            header ("location: register-thanks.php");
            exit();
        } else {

            //public message:
                $errorstring = "<p class = 'text-center col-sm-8'
                style= 'color: red'>";
            $errorstring .= "System Error <br /> You could not be registered due ";
            $errorstring .= "to a system error. We apologize for any
            incovenience.</p>";

            echo "<p class = 'text-center col-sm-2'
            style = 'color:red'>$errorstring</p>";

            //debugging message:
            echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $query . '</p>';
                        mysqli_close($dbcon); //close database connection
            
            //include footer then close program to stop execution
                echo '<footer class = "jumbotron text-center col-sm-12"
                style = "padding-bottom: 1px; padding-top:8px;">
                    include("section/footer.php");
                    </footer>';
                exit();
        }

        

    } 
    
    
    catch (Exception $e) {
       //print "An Exception Occured. Message: " . $e->getMessage();
       print "The system is busy. Please try again later.";
    }

    catch (Error $e) {
        print "The system is busy. Please try again later.";
    }
}

else {
    $errorstring = "Error! The following error(s) occured:<br>";
    foreach ($errors as $msg) {
        $errorstring .= "- $msg<br>\n";
    }
    $errorstring .= "Please try again.<br>";
    echo "<p class = 'text-center col-sm-2 style = 'color:red'>$errorstring</p>";
} //end of if(empty($errors)) IF 
?>