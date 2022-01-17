<?php 
$title="Форма регистрации"; // название формы
require __DIR__ . '/header.php'; // подключаем шапку проекта
require "db.php"; // подключаем файл для соединения с БД

// Создаем переменную для сбора данных от пользователя по методу POST
$data = $_POST;

// Пользователь нажимает на кнопку "Зарегистрировать" и код начинает выполняться
if(isset($data['do_signup'])) {

        // Регистрируем
        // Создаем массив для сбора ошибок
	$errors = array();

	// Проводим проверки
        // trim — удаляет пробелы (или другие символы) из начала и конца строки
	if(trim($data['login']) == '') {

		$errors[] = "Введите логин!";
	}



	if(trim($data['fio']) == '') {

		$errors[] = "Введите Имя";
	}



	if($data['pass'] == '') {

		$errors[] = "Введите пароль";
	}

	if($data['pass_2'] != $data['pass']) {

		$errors[] = "Повторный пароль введен не верно!";
	}
         // функция mb_strlen - получает длину строки
        // Если логин будет меньше 5 символов и больше 90, то выйдет ошибка
	if(mb_strlen($data['login']) < 5 || mb_strlen($data['login']) > 90) {

	    $errors[] = "Недопустимая длина логина";

    }

    if (mb_strlen($data['fio']) < 3 || mb_strlen($data['fio']) > 50){
	    
	    $errors[] = "Недопустимая длина имени";

    }


    if (mb_strlen($data['pass']) < 2 || mb_strlen($data['pass']) > 8){
	
	    $errors[] = "Недопустимая длина пароля (от 2 до 8 символов)";

    }



	// Проверка на уникальность логина
	if(R::count('users', "login = ?", array($data['login'])) > 0) {

		$errors[] = "success">"Пользователь с таким логином существует!";
	}




	if(empty($errors)) {

		// Все проверено, регистрируем 
		// Создаем таблицу users
		$user = R::dispense('users');

                // добавляем в таблицу записи
		$user->login = $data['login'];
		
		$user->fio = $data['fio'];

		$user->pass = $data['pass'];


		// Сохраняем таблицу
		R::store($user);
        echo '<div class="success">Вы успешно зарегистрированы! Можно <a class="link" href="login.php">авторизоваться</a>.</div><hr class="success_border">';

	} else {
                // array_shift() извлекает первое значение массива array и возвращает его, сокращая размер array на один элемент. 
		echo '<div class="success">' . array_shift($errors). '</div><hr class="success_border">';
	}
}
?>
<link rel="stylesheet" href="style.css">
<section class="sav">
    <div class="container">
        <div class="row">
            <div class="col">
                <!-- Форма регистрации -->
                <h2 class="heading">Форма регистрации</h2>
                <form action="signup.php" method="post">
                    <input type="text" class="form-control" name="fio" id="fio" placeholder="Введите ФИО" required><br>
                    <input type="text" class="form-control" name="login" id="login" placeholder="Введите логин"><br>
                    <input type="password" class="form-control" name="pass" id="pass" placeholder="Введите пароль"><br>
                    <input type="password" class="form-control" name="pass_2" id="pass_2" placeholder="Повторите пароль"><br>
                    <button class="button3" name="do_signup" type="submit">Зарегистрироваться</button>
                </form>
                <br>
                <p class="paragraph">Если вы зарегистрированы, тогда нажмите <a class="link" href="login.php">здесь</a>.</p>
                <p class="paragraph">Вернуться на <a class="link" href="index.php">главную</a>.</p>
            </div>
        </div>
    </div>
</section>
<?php require __DIR__ . '/footer.php'; ?>
<!-- Подключаем подвал проекта -->
