 <?php 
 	require_once('includes/functions.php');
    require_once('includes/sql.php');
    require_once('includes/variables.php');
    

	// переменные страницы
    $nav_info = 'class=active';
    $page = 'info';
    
    // подключаемые файлы
    require_once('includes/queries.php');
    require_once('templates/header.php');
    require_once('templates/nav.php');
  ?>

 <div class="container">
 	<h2><?= $cont[0]?></h2>
<?php 

	// *************** Вариант 3 *****************************
	echo '<h3>Вариант 3</h3>';
	$list = $pdo->prepare("SELECT * FROM groups");
	$list->execute();
	$groups = $list->fetchAll();
	$parent = 0;
	groupList($groups, $parent);

	function groupList($groups, $parent)
	{
		foreach ($groups as $group) {
			if ($group['parent_id'] == $parent) {
				echo $group['name'] . '<br>';
				$par = $group['id'];
				groupList($groups, $par);
			}
		}
	}

	// *************** Вариант 2 *****************************
	echo '<h3>Вариант 2</h3>';
	$list = $pdo->prepare("SELECT * FROM groups");
	$list->execute();
	$gr = $list->fetchAll();
	$parent = 0;

	foreach ($gr as $value) {
		$cats[$value['parent_id']][$value['id']] = $value;
	}

	category($cats, $parent);

	function category($cats, $parent)
	{
		if(isset ($cats[$parent])){
			foreach ($cats[$parent] as $cat) {
				echo $cat['name'] . '<br>';
				$parent = $cat['id'];
				category($cats, $parent);
			}
		}
	}




	// *************** Вариант 1 *****************************
	echo '<h3>Вариант 1</h3>';
	$parent_id = '0';
	printList($parent_id, $pdo);
	
	function printList($parent, $pdo){
		$list = $pdo->prepare("SELECT id, name FROM groups WHERE parent_id = :parent_id");
		$list->bindParam(':parent_id', $parent);
		$list -> execute();
		foreach ($list as $row) {
			echo "$row[name]<br>";
			$parent = $row['id'];
			printList($parent, $pdo);
		}
	}
 ?>
</div>
<?php 
	include('templates/footer.php');
 ?>