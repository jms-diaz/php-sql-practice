<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap CSS File-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
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
            include('nav.php'); 
            ?>
        </ul>
        </nav>
    
        <!-- Center Content Section -->
        <div class="col-sm-8">
        <?php 
        $showCurrentPage = showCurrentPage($currentPage);
        function showCurrentPage($currentPage) {
            return '<h2 class="text-center">This is ' . $currentPage  . '</h2>';
        }
        echo $showCurrentPage;
        ?>
        <!-- <h2 class="text-center">This is Home Page</h2> -->
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi ut fugiat quos eos repellendus itaque eum nam dolore facilis cum recusandae consectetur excepturi molestias quaerat sunt at illo, tenetur est.
        Amet ab commodi officia delectus aut voluptas, possimus odio rerum reiciendis quos accusantium neque harum odit id fugiat animi maiores explicabo, numquam excepturi eius cum! Tempora quibusdam sapiente molestiae ut.
        Quas enim non atque ipsum repellat aliquam, explicabo, aliquid quo illo iure repellendus tenetur, aperiam quam temporibus? Provident, ipsum explicabo, qui temporibus repellat ab repudiandae, sit voluptatibus exercitationem harum eos.
        </p>
        </div>

        <!-- Right-side Content Section -->
        <aside class="col-sm-2">
            <?php include('info-col.php'); ?>
        </aside>
    </div>

    <!-- Footer Section -->
    <footer class="jumbotron text-center row" style="padding-bottom:1px; padding-top:8px;">
        <?php include('footer.php'); ?>
    </footer>
</body>
</html>