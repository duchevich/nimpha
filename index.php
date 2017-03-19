    <?php require_once('templates/header.php'); ?>
    <main>
        <div class="container">
            <?php
                require_once('sql.php');
                require_once('functions.php');
                
                $obj = new Item();

                if($_GET['catalog']){
                    if($_GET['catalog'] == 1){
                        $data = $pdo->prepare("SELECT name, link, cost FROM catalog WHERE id_category = 1 LIMIT 10");
                        $data->execute();
                        foreach($data as $dt){
                            $obj->name = $dt['name'];
                            $obj->link = $dt['link'];
                            $obj->price = $dt['cost'];
                            $obj->item_html();
                        }
                    }
                    if($_GET['catalog'] == 2){
                        $data = $pdo->prepare("SELECT name, link, cost FROM catalog WHERE id_category = 2 LIMIT 10");
                        $data->execute();
                        foreach($data as $dt){
                            $obj->name = $dt['name'];
                            $obj->link = $dt['link'];
                            $obj->price = $dt['cost'];
                            $obj->item_html();
                        }
                    }
                    if($_GET['catalog'] == 3){
                        $data = $pdo->prepare("SELECT name, link, cost FROM catalog WHERE id_category = 3 LIMIT 10");
                        $data->execute();
                        foreach($data as $dt){
                            $obj->name = $dt['name'];
                            $obj->link = $dt['link'];
                            $obj->price = $dt['cost'];
                            $obj->item_html();
                        }
                    }
                    if($_GET['catalog'] == 4){
                        $data = $pdo->prepare("SELECT name, link, cost FROM catalog WHERE id_category = 4 LIMIT 10");
                        $data->execute();
                        foreach($data as $dt){
                            $obj->name = $dt['name'];
                            $obj->link = $dt['link'];
                            $obj->price = $dt['cost'];
                            $obj->item_html();
                        }
                    }
                    if($_GET['catalog'] == 5){
                        $data = $pdo->prepare("SELECT name, link, cost FROM catalog WHERE id_category = 5 LIMIT 10");
                        $data->execute();
                        foreach($data as $dt){
                            $obj->name = $dt['name'];
                            $obj->link = $dt['link'];
                            $obj->price = $dt['cost'];
                            $obj->item_html();
                        }
                    }
                }
            ?> 
        </div>
    </main>
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script srrc="js/js.js"></script>
</body>
</html>
