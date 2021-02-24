<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap CSS File-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="verify.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container" style ="margin-top:30px">
        <header class="jumbotron text-center row" style="margin-bottom:2px; background: #c5e9ff; padding:20px;">
            <?php include('header-for-template.php'); ?>
        </header>
    
    <div class="row" style= "padding-left: 0px">
        <!-- Left-side Navigation Section -->
        <nav class="col-sm-2">
        <ul class="nav nav-pills flex-column">
            <?php 
            include('sections/nav.php'); 
            ?>
        </ul>
        </nav>

        <!-- Validate Input -->
        <?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            require ('process-register-page.php');
        }
        ?>
    
        <!-- Register Section -->
        <div class="col-sm-8">
        <h2 class="text-center">Register</h2>
        <form action="register-page.php" method="post" onsubmit = "return checked()";>
            
            <div class="form-group row" style="padding-block: 10px;">
                <label for="first_name" class = "col-sm-4 col-form-label">First Name: </label>
                    <div class="col-sm-8 mb-0">
                        <input type="text" name="first_name" placeholder = "First Name" maxlength ="30" id="first_name" class= "form-control" required value = "<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>" >
                    </div>
            </div>

            <div class="form-group row" style="padding-block: 10px;">
                <label for="last_name" class = "col-sm-4 col-form-label">Last Name: </label>
                    <div class="col-sm-8">
                        <input type="text" name="last_name" placeholder = "Last Name" maxlength ="40" id="last_name" class= "form-control" required value = "<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>">
                    </div>
            </div>
            
            <div class="form-group row" style="padding-block: 10px;">
                <label for="email" class = "col-sm-4 col-form-label">Email: </label>
                    <div class="col-sm-8">
                        <input type="text" name="email" placeholder = "Email" maxlength ="60" id="email" class= "form-control" required value = "<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
                    </div>
            </div>

            <div class="form-group row" style="padding-block: 10px;">
                <label for="password1" class = "col-sm-4 col-form-label">Password: </label>
                    <div class="col-sm-8">
                        <input type="password" name="password1" placeholder = "Password" minlength = "8" maxlength ="12" id="password1" class= "form-control" required value = "<?php if (isset($_POST['password1'])) echo $_POST['password1']; ?>">
                    <span id="message">Between 8 and 12 characters</span>
                    </div>
            </div>

            <div class="form-group row" style="padding-block: 10px;">
                <label for="password2" class = "col-sm-4 col-form-label">Confirm password: </label>
                    <div class="col-sm-8">
                        <input type="password" name="password2" placeholder = "Password" minlength = "8" maxlength ="12" id="password2" class= "form-control" required value = "<?php if (isset($_POST['password2'])) echo $_POST['password2']; ?>">
                    </div>
            </div>

            <div class="form-group-row justify-content-center" style="padding-block: 10px;">
            <div class="col-sm-12"></div>
                <input class = "btn btn-primary" type="submit" id="submit" name="submit" value="Register">
            </div>
        </form>
        </div>

        <!-- Right-side Content Section -->
        <?php 
        if(isset($errorstring)) {
            echo '<aside class= "col-sm-2">';
            include('sections/info-col.php');
            echo '</div>';
            echo '<footer class = "jumbotron text-center row col-sm-14"
                    style = "padding-bottom: 1px; padding-top:8px;>';
        }
        else {
            echo '<footer class = "jumbotron text-center col-sm-12"
            style = "padding-bottom: 1px; padding-top:8px";>';
        }
        include ('sections/footer.php');
        
        ?>
    </div>
</body>
</html>