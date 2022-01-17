<?php
$title="Личный кабинет"; // название формы
require __DIR__ . '/header.php'; // подключаем шапку проекта
require "db.php"; // подключаем файл для соединения с БД

$id = $_SESSION['logged_user']->id;
$books = R::load('users', $id); 
$nowbalance = $books->balance;
$turs = $books->turs;
$city = $books->city;
$hotel = $books->hotel;
$ex = $books->ex;
$day = $books->day;

?>



<!-- Если авторизован выведет приветствие -->
<?php if(isset($_SESSION['logged_user'])) : ?>
<link rel="stylesheet" href="style.css">
<section class="sav">
    <div class="container">
        <div class="row">
            <div class="col">

                <h1 class="heading">Покупка туров, у нас самые низкие цены!</h1>
                <h2 class="heading">Личный кабинет пользователя:</h2>
                <span class="text"> Привет, </span><?php echo $_SESSION['logged_user']->fio; ?><br>
                <form class="lk1" action="balance.php" method="post">
                    <span class="text">Баланс:</span> <?php echo $nowbalance; ?> Руб. <br><button class="button5" name="Balance" type="submit">Пополнить</button>
                </form>

                <span class="text1">Мои туры:</span> <?php echo $turs; ?>
                <span class="text1">Город:</span> <?php echo $city; ?>
                <span class="text1">Отель:</span> <?php echo $hotel; ?>
                <span class="text1">Кол-во экскурсий:</span> <?php echo $ex; ?>
                <span class="text1">Кол-во дней:</span> <?php echo $day; ?>

                <form class="lk2" action="readyturs.php" method="post">
                    <button class="button5" name="GotoviTyr" type="submit">Готовые туры</button>
                </form>

                <form class="lk3" action="constructor\constructor.php" method="post">
                    <button class="button5" name="SozdatiTyr" type="submit">Создать свой тур</button>
                </form>


                <!-- Пользователь может нажать выйти для выхода из системы -->
                <a class="link" href="logout.php">Сменить пользователя</a>

                <a class="link1" href="logout.php">Выход</a> <!-- файл logout.php создадим ниже -->

                <?php else : ?>

                <!-- Если пользователь не авторизован выведет ссылки на авторизацию и регистрацию -->
                <a class="link" href="login.php">Авторизоваться</a><br>
                <a class="link" href="signup.php">Регистрация</a>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php require __DIR__ . '/footer.php'; ?>
<!-- Подключаем подвал проекта -->
