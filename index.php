<?php 
    require_once('includes/functions.php');
    require_once('includes/sql.php');
    require_once('includes/variables.php');
    

    // переменные страницы
    $nav_main = 'class=active';
    $page = 'index';
    require_once('includes/queries.php');
    require_once('templates/header.php');
    require_once('templates/nav.php');
 ?>


    <main>
        <div class="container">
            <h2><?= $cont[0]?></h2>
          
        </div>
<?php 
    require_once('templates/footer.php');
 ?>

