<?php
$title="Турция"; // название формы
require __DIR__ . '/header.php'; // подключаем шапку проекта
require "db.php"; // подключаем файл для соединения с БД

// Создаем переменную для сбора данных от пользователя по методу POST
$data = $_POST;
$id = $_SESSION['logged_user']->id;
$id_turs = '2';
// Пользователь нажимает на кнопку "Пополнить" и код начинает выполняться
if(isset($data['do_bay'])) {
	$errors = array();
    $users = R::load('users', $id);
	$nowbalance = $users->balance;
	$balance = R::load('ready_turs', $id_turs);
	$priceturs = $balance->price;
	
	//Проверка баланса
if($nowbalance < $priceturs){
	echo '<div class="success; ">Недостаточно средств</div><hr>';
	echo '<form action="turcia.php"><button>Назад</button></p>';
	return;
}
	//Разница между стоимостью тура и балансом
    $raschet = $nowbalance - $priceturs;
	//Запись в БД
    $user = R::load('users', $id);
    $user->balance = $raschet;
	$user->turs = $title;
	$user->city = 'Стамбул';
	$user->hotel = 'Обычного класса';
	$user->ex = 'Нет';
	$user->day = '7';
	R::store($user);
	echo '<div class="success; ">Вы успешно купили тур '.$title.'</div><hr class="success_border">';
	echo '<form action="lk.php"><button>Вернуться в ЛК</button></p>';
	return;
}
?>








<link rel="stylesheet" href="style.css">
<section class="sav"></section>
<div class="container">
    <div class="row">
        <div class="col">

            <h1 class="heading">Турция</h1>
            <img class="pic" src="Turkey.jpg">
            <p class="paragraph">
                Турция уже более 20 лет является эталоном пляжного отдыха за рубежом для россиян. Когда-то большинство российских туристов начинали свой опыт путешествий именно в Турции, и до сих пор у многих осталась привычка сравнивать условия и сервис других направлений именно с этой гостеприимной страной. В Турции есть отели на любой вкус, в большинстве работает русскоговорящий персонал. Кроме того, не стоит забывать об увлекательных экскурсиях, которые познакомят с богатой историей и уникальным историческим наследием страны.
                <br><span class="price">Цена: 42800</span>
            </p>

        </div>
    </div>
</div>

<!-- Если авторизован выведет приветствие -->


<form action="turcia.php" method="post">
    <button class="button6" name="do_bay" type="submit" onclick="return confirm('Вы уверены?');">Купить</button>
</form>





<!-- Пользователь может нажать выйти для выхода из системы -->

<a class="link" href="lk.php">Личный кабинет пользователя</a>



<?php require __DIR__ . '/footer.php'; ?>
<!-- Подключаем подвал проекта -->
