<?php 
    require_once('includes/functions.php');
    require_once('includes/sql.php');
    require_once('includes/variables.php');

    // переменные страницы
    $nav_catalog = 'active';
    $page = 'catalog';
    $obj = new Item();
    
    require_once('includes/queries.php');
    require_once('templates/header.php');
    require_once('templates/nav.php');
 ?>


    <main>
        <div class="container">
            <h2><?= $cont[0]?></h2>
            <?php
                if(isset($_GET['catalog'])){
                    if($_GET['catalog'] > 0 && $_GET['catalog'] <6){

                        $id_category = $_GET['catalog'];

                        $data = $pdo->prepare("SELECT name_category FROM category WHERE id_category = :id_category");
                        $data->bindParam(':id_category', $id_category);
                        $data->execute();
                        $cat_name = $data->fetch(PDO::FETCH_LAZY);
                        echo "<h3>{$cat_name['name_category']}</h3>";



                        $data = $pdo->prepare("SELECT name, link, cost FROM catalog WHERE id_category LIKE :id_category ORDER BY cost ASC LIMIT 10");
                        $data->execute(array(':id_category' => $_GET['catalog'] . '%'));
                        foreach($data as $dt){
                            $obj->name = $dt['name'];
                            $obj->link = $dt['link'];
                            $obj->price = $dt['cost'];
                            $obj->item_html();
                        }
                   
                    }
                    else{
                        echo '<h1>Error 404</h1>';
                        echo '<h1>Страница не найдена</h1>';
                        echo '<a href="index.php">Вернуться на главную</a>';
                    }
                }
            ?> 
        </div>
<?php 
    require_once('templates/footer.php');
 ?>

