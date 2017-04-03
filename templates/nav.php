<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                <h1><?= $s['h1']?></h1>
            </div>
            <div class="col-md-3">
            <div class="btn-group" role="group" aria-label="...">
                <a href="signin.php" class="btn btn-default<?= $nav_signin ?>"><?= $s['signin']?></a>
                <a href="signup.php" class="btn btn-default<?= $nav_signup ?>"><?= $s['signup']?></a>
            </div>
            </div>
            
            
        </div>
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
                    <li <?= $nav_main ?>><a href="index.php"><?= $s['nav1']?></a></li>
                    <li class="dropdown <?= $nav_catalog ?>">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $s['nav2']?> <span class="caret"></span></a>
                        <?php 
                            echo '<ul class="dropdown-menu">';
                            $nav = $pdo->prepare("SELECT name_category, id_category FROM category WHERE parent_id = 0");
                            $nav->execute();
                            foreach($nav as $li){
                                echo "<li><a href=\"catalog.php?catalog={$li['id_category']}\">{$li['name_category']}</a></li>";
                            }
                            echo '</ul>';
                         ?>
                    </li>
                    <li <?= $nav_info ?>><a href="info.php"><?= $s['nav3']?></a></li>
                    <li <?= $nav_contacts ?>><a href="contacts.php"><?= $s['nav4']?></a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="?language=ru">RU</a></li>
                    <li><a href="?language=ua">UA</a></li>
                    <li><a href="?language=en">EN</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main>