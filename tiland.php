<?php
$title="Тайланд"; // название формы
require __DIR__ . '/header.php'; // подключаем шапку проекта
require "db.php"; // подключаем файл для соединения с БД

// Создаем переменную для сбора данных от пользователя по методу POST
$data = $_POST;
$id = $_SESSION['logged_user']->id;
$id_turs = '3';
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
	echo '<form action="tiland.php"><button>Назад</button></p>';
	return;
}
	//Разница между стоимостью тура и балансом
    $raschet = $nowbalance - $priceturs;
	//Запись в БД
    $user = R::load('users', $id);
    $user->balance = $raschet;
	$user->turs = $title;
	$user->city = 'Бангкок';
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

            <h1 class="heading">Тайланд</h1>
            <img class="pic" src="Tailand.jpeg">
            <p class="paragraph">
                Страна тысячи улыбок» и самое популярное направление Юго-Восточной Азии, где можно найти, пожалуй, все варианты отдыха. Хотите классический отпуск на современном курорте? Пожалуйста. Мечтаете о бурной ночной жизни и экстремальных приключениях? Легко. Грезите уединенными пляжами вдали от цивилизации? В Таиланде их хватит на всех. Главное, правильно подобрать курорт, доверившись профессионалам. Отсутствие визовых формальностей существенно упрощает выбор тура. Отельная база Таиланда на редкость разнообразна — от роскошных комплексов до эко-бунгало, поэтому отпускной бюджет может варьироваться. Но, в любом случае, основная часть отдыха будет проходить за пределами отеля — экскурсионные возможности и обилие интересных заведений удивляют даже бывалых путешественников. Отдельного внимания заслуживают свадебные церемонии, проводимые в Таиланде. Церемонию можно провести как в европейском стиле, так и с соблюдением буддийских традиций. Так или иначе, на память молодой семье останутся невероятно красивые фотографии.

                <br><span class="price">Цена: 49000</span>
            </p>

        </div>
    </div>
</div>
<!-- Если авторизован выведет приветствие -->


<form action="tiland.php" method="post">
    <button class="button6" name="do_bay" type="submit" onclick="return confirm('Вы уверены?');">Купить</button>
</form>





<!-- Пользователь может нажать выйти для выхода из системы -->

<a class="link" href="lk.php">Личный кабинет пользователя</a>



<?php require __DIR__ . '/footer.php'; ?>
<!-- Подключаем подвал проекта -->
