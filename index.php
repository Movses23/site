<?php
$title="Главная страница"; // название формы
require __DIR__ . '/header.php'; // подключаем шапку проекта
require "db.php"; // подключаем файл для соединения с БД
?>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style.css">
<section class="sav">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="header">
                    <h1 class="heading">Добро пожаловать на наш сайт!</h1>





                    <!-- Если авторизован выведет приветствие -->
                    <?php if(isset($_SESSION['logged_user'])) : ?>
                    Привет, <?php echo $_SESSION['logged_user']->fio; ?><br>
                    <div class="button_cont">
                        <a class="button3" href="lk.php">Личный кабинет</a>

                        <!-- Пользователь может нажать выйти для выхода из системы -->
                        <a class="button4" href="logout.php">Выйти</a>
                    </div> <!-- файл logout.php создадим ниже -->
                    <?php else : ?>

                    <!-- Если пользователь не авторизован выведет ссылки на авторизацию и регистрацию -->

                    <div class="button">
                        <a class="button1" href="login.php">Авторизоваться</a>
                        <a class="button2" href="signup.php">Регистрация</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</section>


<?php endif; ?>

<?php require __DIR__ . '/footer.php'; ?>
<!-- Подключаем подвал проекта -->
