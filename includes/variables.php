<?php 
	session_start();
	// смена языка сайта и язык по умолчанию
	if (!isset($_SESSION['language'])) {
		$_SESSION['language'] = 'ru';
	}

	if (isset($_GET['language'])) {
		$lang_get = strtolower(strip_tags(trim($_GET['language'])));
		$query = $pdo->prepare("SELECT * FROM languages WHERE id_language = :id_language");
		$query->bindParam(':id_language', $lang_get);
		$query->execute();
		$q = $query->fetchAll();
		if(!$q){
			$_SESSION['language'] = 'ru';
		}
		else{
			$_SESSION['language'] = $lang_get;
		}
		
	}
	//  подсветка меню навигации по сайту
	$nav_main = '';
	$nav_catalog = '';
	$nav_info = '';
	$nav_contacts = '';
	$nav_signin = '';
	$nav_signup = '';
	$page = '';
    
  

 ?>