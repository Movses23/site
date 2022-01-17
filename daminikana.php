<?php
$title="Доминикана"; // название формы
require __DIR__ . '/header.php'; // подключаем шапку проекта
require "db.php"; // подключаем файл для соединения с БД

// Создаем переменную для сбора данных от пользователя по методу POST
$data = $_POST;
$id = $_SESSION['logged_user']->id;
$id_turs = '4';
// Пользователь нажимает на кнопку "Пополнить" и код начинает выполняться
if(isset($data['do_bay'])) {
	$errors = array();
    $users = R::load('users', $id);
	$nowbalance = $users->balance;
	$balance = R::load('ready_turs', $id_turs);
	$priceturs = $balance->price;
	
	//Проверка баланса
if($nowbalance < $priceturs){
	echo '<div class="success">Вы успешно купили тур '.$title.'</div><hr class="success_border">';
	echo '<form action="daminikana.php"><button>Назад</button></p>';
	return;
}
	//Разница между стоимостью тура и балансом
    $raschet = $nowbalance - $priceturs;
	//Запись в БД
    $user = R::load('users', $id);
    $user->balance = $raschet;
	$user->turs = $title;
	$user->city = 'Санто-Доминго';
	$user->hotel = 'Обычного класса';
	$user->ex = 'Нет';
	$user->day = '7';
	R::store($user);
	echo '<div style="color: green; ">Вы успешно купили тур '.$title.'</div><hr>';
	echo '<form action="lk.php"><button>Вернуться в ЛК</button></p>';
	return;
}
?>








<link rel="stylesheet" href="style.css">
<section class="sav"></section>
<div class="container">
    <div class="row">
        <div class="col">

            <h1 class="heading">Доминикана</h1>
            <img class="pic" src="dominikana.jpg">
            <p class="paragraph">
                Доминиканская Республика сегодня по праву считается лучшей страной Карибского бассейна – не только по количеству достопримечательностей и архитектурных памятников, но и по уровню обслуживания туристов. Занимающая восточную часть острова Гаити и ряд прибрежных островов, Доминикана со своими пляжами в стиле «баунти» является одним из крупнейших мировых туристических центров. Это излюбленное место для обеспеченных любителей экзотики с акцентом на беззаботный отдых в окружении фантастически красивой природы.


                <br><span class="price">Цена: 58100</span>
            </p>

        </div>
    </div>
</div>

<!-- Если авторизован выведет приветствие -->


<form action="daminikana.php" method="post">
    <button class="button6" name="do_bay" type="submit" onclick="return confirm('Вы уверены?');">Купить</button>
</form>





<!-- Пользователь может нажать выйти для выхода из системы -->

<a class="link" href="lk.php">Личный кабинет пользователя</a>



<?php require __DIR__ . '/footer.php'; ?>
<!-- Подключаем подвал проекта -->
