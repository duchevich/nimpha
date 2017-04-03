<?php 
    require_once('includes/functions.php');
    require_once('includes/sql.php');
    require_once('includes/variables.php');
    
    // переменные страницы
    $nav_contacts = 'class=active';
    $page = 'contacts';
    require_once('includes/queries.php');

    
   
    // подключаемые файлы
    require_once('templates/header.php');
    require_once('templates/nav.php');
 ?>


    <main>
        <div class="container">
            <h2><?= $cont[0]?></h2>
            <h4><?= $cont[1]?></h4>
            
        </div>
<?php 
    require_once('templates/footer.php');
 ?>

