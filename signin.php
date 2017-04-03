<?php 
    require_once('includes/functions.php');
    require_once('includes/sql.php');
    require_once('includes/variables.php');

     // переменные страницы
    $nav_signin = ' active';
    $page = 'signin';

    // подключаемые файлы
    require_once('includes/queries.php');
    require_once('templates/header.php');
    require_once('templates/nav.php');
 ?>


    <main>
        <div class="container">
            <h2><?= $cont[0]?></h2>
            <form action="action.php" method="POST">
                <?= $cont[1]?>:<br>
                <input type="text" name="name" placeholder="login"><br><br>
                <?= $cont[2]?>:<br>
                <input type="password" name="password" placeholder="password"><br><br>
                <input type="submit" value="<?= $cont[3]?>">
            </form>
            
        </div>
<?php 
    require_once('templates/footer.php');
 ?>

