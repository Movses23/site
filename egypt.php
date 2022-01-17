<?php
$title="Египет"; // название формы
require __DIR__ . '/header.php'; // подключаем шапку проекта
require "db.php"; // подключаем файл для соединения с БД

// Создаем переменную для сбора данных от пользователя по методу POST
$data = $_POST;
$id = $_SESSION['logged_user']->id;
$id_turs = '1';
// Пользователь нажимает на кнопку "Пополнить" и код начинает выполняться
if(isset($data['do_bay'])) {
	$errors = array();
    $users = R::load('users', $id);
	$nowbalance = $users->balance;
	
	$balance = R::load('ready_turs', $id_turs);
	$priceturs = $balance->price;
	
	//Проверка баланса
if($nowbalance < $priceturs){
	echo '<div style="color: red; ">Недостаточно средств</div><hr>';
	echo '<form action="egypt.php"><button>Назад</button></p>';
	return;
}
	//Разница между стоимостью тура и балансом
    $raschet = $nowbalance - $priceturs;
	//Запись в БД
    $user = R::load('users', $id);
    $user->balance = $raschet;
	$user->turs = $title;
	$user->city = 'Каир';
	$user->hotel = 'Обычного класса';
	$user->ex = 'Нет';
	$user->day = '7';
	R::store($user);
	echo '<div class="success">Вы успешно купили тур '.$title.'</div><hr class="success_border">';
	echo '<form action="lk.php"><button>Вернуться в ЛК</button></p>';
	return;
}
?>






<link rel="stylesheet" href="style.css">
<section class="sav"></section>
<div class="container">
    <div class="row">
        <div class="col">

            <h1 class="heading">Египет</h1>
            <img class="pic" src="Egypt.jpg">
            <p class="paragraph">
                Для многих российских туристов путешествие в Египет когда-то было первой зарубежной поездкой. В этой стране можно круглый год загорать и плавать в чистейшей воде Красного моря, любуясь на коралловые рифы и маленьких пестрых рыбок. Туры в Египет – это безошибочный вариант отпуска на любой вкус и бюджет. Солнце, море, увлекательные экскурсии и веселые дискотеки делают отдых в Египте ярким и насыщенным
                <br><span class="price">Цена: 33000</span>
            </p>

        </div>
    </div>
</div>

<!-- Если авторизован выведет приветствие -->


<form action="egypt.php" method="post">
    <button class="button6" name="do_bay" type="submit" onclick="return confirm('Вы уверены?');">Купить</button>
</form>





<!-- Пользователь может нажать выйти для выхода из системы -->

<a class="link" href="lk.php">Личный кабинет пользователя</a>



<?php require __DIR__ . '/footer.php'; ?>
<!-- Подключаем подвал проекта -->
