<?php 
    require_once('includes/functions.php');
    require_once('includes/sql.php');
    require_once('includes/variables.php');
    
   // переменные страницы
    $nav_signup = ' active';
    $page = 'signup';

    // подключаемые файлы
    require_once('includes/queries.php');
    require_once('templates/header.php');
    require_once('templates/nav.php');
 ?>
        <main>
            <div class="container">
                <?php if($_SERVER['REQUEST_METHOD'] == 'GET'){ ?>
                    <h2><?= $cont[0]?></h2>
                    <form action="signup.php" method="POST">
                        <?= $cont[1]?>:<br>
                        <input type="text" name="name" placeholder="login" value=""><br><br>
                        <?= $cont[2]?>:<br>
                        <input type="text" name="email" placeholder="example@mail.com" value=""><br><br>
                         <?= $cont[3]?>:<br>
                        <input type="password" name="password" placeholder="password"><br><br>
                        <?= $cont[4]?>:<br>
                        <input type="password" name="password1" placeholder="password"><br><br>
                        <input type="submit" value="<?= $cont[5]?>">
                    </form>
                </div>
                <?php }
                    else{ 
                        $user = new User();

                        $user->login = trim(strip_tags($_POST['name']));
                        $user->email = trim(strip_tags($_POST['email']));
                        $user->password = trim(strip_tags($_POST['password']));
                        $user->password1 = trim(strip_tags($_POST['password1']));

                        // проверка логина
                        if (!($user->login)) {
                            $user->err_name = ' <span class="text-danger">Поле не заполнено</span>';
                        }
                        if (mb_strlen($user->login) > 20) {
                            $user->err_name = ' <span class="text-danger">Слишком длинный логин</span>';
                        }
                        if (mb_strlen($user->login) < 3) {
                            $user->err_name = ' <span class="text-danger">Слишком короткий логин</span>';
                        }
                        $test = $pdo->prepare("SELECT * FROM users WHERE login = :login");
                        $test->bindParam(':login', $user->login);
                        $test->execute();
                        $t = $test->fetchAll();
                        if ($t) {
                            $user->err_name = ' <span class="text-danger">Пользователь с таким логином уже зарегистрирован</span>';
                        }
                        

                        // проверка почты
                        if (!($user->email)) {
                            $user->err_email = ' <span class="text-danger">Поле не заполнено</span>';
                        }

                        // проверка почты на запрещенные символы
                        $needle = ' ';
                        $needle1 = ';';
                        $needle2 = ',';
                        $needle3 = '@';
                        if (stristr($user->email, $needle) || stristr($user->email, $needle1) || stristr($user->email, $needle2) || !stristr($user->email, $needle3)) {
                            $user->err_email = ' <span class="text-danger">Некорректное значение e-mail</span>';
                        }

                        // проверка почты на кириллицу
                        $lat_t = preg_match('/[а-яё]/iu', $user->email);
                        if ($lat_t) {
                            $user->err_email = ' <span class="text-danger">Адрес почты содержит кириллицу</span>';
                        }
                        $test = $pdo->prepare("SELECT * FROM users WHERE email = :email");
                        $test->bindParam(':email', $user->email);
                        $test->execute();
                        $t = $test->fetchAll();
                        if ($t) {
                            $user->err_email = ' <span class="text-danger">Пользователь с таким логином уже зарегистрирован</span>';
                        }

                        // проверка пароля
                        if (!($user->password)) {
                            $user->err_pass = ' <span class="text-danger">Поле не заполнено</span>';
                        }
                        if (!($user->password1)) {
                            $user->err_pass1 = ' <span class="text-danger">Поле не заполнено</span>';
                        }
                        if (mb_strlen($user->password) < 5) {
                            $user->err_pass = ' <span class="text-danger">Слишком короткий пароль</span>';
                        }
                        if (mb_strlen($user->password1) < 5) {
                            $user->err_pass1 = ' <span class="text-danger">Слишком короткий пароль</span>';
                        }
                        if (!($user->password === $user->password1)) {
                            $user->err_pass = ' <span class="text-danger">Пароли не совпадают</span>';
                        }
                        // запись в бд
                        if(!strlen($user->err_name) && !strlen($user->err_email) && !strlen($user->err_pass) && !strlen($user->err_pass1)){
                            $access = 1;
                            $write = $pdo->prepare("INSERT INTO users (login, email, password, access) VALUES (:login, :email, :password, :access)");
                            $write->bindParam(':login', $user->login);
                            $write->bindParam(':email', $user->email);
                            $write->bindParam(':password', $user->password);
                            $write->bindParam(':access', $access);
                            $write->execute();
                            echo '<h3>Вы зарегистрировались</h3>';
                            $_SESSION['user'] = $user->login;
                            
                        }
                        // при введении некорректных данных
                        else{?>
                            <form action="signup.php" method="POST">
                            <?= $cont[1]?>:<?= $user->err_name ?><br>
                            <input type="text" name="name" placeholder="login" value="<?= $_POST['name'] ?>"><br><br>
                            <?= $cont[2]?>:<?= $user->err_email ?><br>
                            <input type="text" name="email" placeholder="example@mail.com" value="<?= $_POST['email'] ?>"><br><br>
                             <?= $cont[3]?>:<?= $user->err_pass ?><br>
                            <input type="password" name="password" placeholder="password"><br><br>
                            <?= $cont[4]?>:<?= $user->err_pass1 ?><br>
                            <input type="password" name="password1" placeholder="password"><br><br>
                            <input type="submit" value="<?= $cont[5]?>">
                        </form>
                        <?php }                     
                 } ?>
            </div>
                    
<?php require_once('templates/footer.php'); ?>

