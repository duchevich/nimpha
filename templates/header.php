<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
	<title>HEXADRON Интернет-магазин</title>
</head>
<body>
    <header>
        <h1>Интернет-магазин</h1>
    </header>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#" class="navbar-brand">
                    <img src="img/logo.png" alt="logo">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Главная</a></li>
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Каталог <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="?catalog=1">Телевизоры</a></li>
                            <li><a href="?catalog=2">Ноутбуки</a></li>
                            <li><a href="?catalog=3">Смартфоны</a></li>
                            <li><a href="?catalog=4">Планшеты</a></li>
                            <li><a href="?catalog=5">Аксессуары</a></li>
                        </ul>

                    </li>
                    <li><a href="">Полезная информация</a></li>
                    <li><a href="">Контакты</a></li>
                </ul>
            </div>
        </div>
    </nav>