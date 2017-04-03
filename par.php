<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
    //ini_set('max_execution_time', 900);

    include_once('libs/qurl.php');
    require_once('sql.php');
	require_once('libs/phpQuery.php');
	
   
    $html = curl_get('http://nimpha.ua');
    $dom = phpQuery::newDocument($html);
    $items = $dom-> find('.catalog-menu-lvl0-item');
    
    
    $count = 1;
    foreach($items as $item){    
        
    	$a = pq($item)->find('a');
    	echo $a->attr('href') . '<br>';
        $url = 'http://nimpha.ua' . $a->attr('href');
        parse($url, $pdo, $count);
        $count++;
    	echo $count;
    }



    function parse( $url, $pdo, $count){
        $one =  file_get_contents($url);
        $one_dom = phpQuery::newDocument($one);
        
        if(!empty($one_dom)){
            $cons = $one_dom->find('.catalog-item-wrap');

            foreach($cons as $con){
                $tov = pq($con)->find('.name');
                $name = $tov->text();
                //echo $tov->text() . '<br>';

                $price = pq($con)->find('.value');
                //echo $price->text() . '<br>';
                
                $alt = pq($con)->find('img');
                //echo $alt->attr('src') . '<br>';

                $item = $pdo->prepare("SELECT * FROM catalog WHERE name = :name");
                $item->bindParam(':name', $name);
                $item->execute();

                //var_dump($item);

                
                    $it = $item->fetch();
                    //echo $it['name'] . '<>';
                

              //  var_dump($it);

                if (!$it){
                    $query = $pdo->prepare("INSERT INTO catalog (name, link, cost, id_category) VALUES(:name, :link, :cost, :id_category)");
                    $values = ['name' => $tov->text(), 'link' => $alt->attr('src'), 'cost' => str_replace(' ', '', $price->text()), 'id_category' => $count];
                    $query->execute($values);
                }
               
            }
            $a_page = $one_dom->find('.more-catalog');
            $link = $a_page->attr('href');
            var_dump($link);
            $url = 'http://nimpha.ua' . $link;
             
            if(strlen($link) > 10){
                parse($url, $pdo, $count);
            }
        }
    }
?>

</body>
</html>
