<?php 
	// извлекаем структуру сайта с учетом языка
	$language = $_SESSION['language'];
	$query = $pdo->prepare("SELECT * FROM my_site_structure WHERE language = :language AND site = 'nimpha'");
	$query->bindParam(':language', $language);
    $query->execute();
    $site = $query->fetchAll();
    $s = [];
    foreach ($site as $value) {
        $s[$value['variable']] = $value['text'];
    }
    
    // извлекаем контент страницы сайта с учетом языка
    $query_content = $pdo->prepare("SELECT text FROM my_pages_content WHERE language = :language AND page = :page");
	$query_content->bindParam(':language', $language);
	$query_content->bindParam(':page', $page);
    $query_content->execute();
    $content = $query_content->fetchAll();
    $cont = [];
    foreach ($content as $value) {
        $cont[] = $value['text'];
    }
 ?>