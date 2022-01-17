<?php 
$title="Форма авторизации"; // название формы
require __DIR__ . '/header.php'; // подключаем шапку проекта
require "db.php"; // подключаем файл для соединения с БД
// Создаем переменную для сбора данных от пользователя по методу POST
$data = $_POST;

// Пользователь нажимает на кнопку "Авторизоваться" и код начинает выполняться
if(isset($data['do_login'])) { 

 // Создаем массив для сбора ошибок
 $errors = array();

 // Проводим поиск пользователей в таблице users
 $user = R::findOne('users', 'login = ?', array($data['login']));

 if($user) {

 	// Если логин существует, тогда проверяем пароль
 	if (PASSWORD_DEFAULT) {

 		// Все верно, пускаем пользователя
 		$_SESSION['logged_user'] = $user;
 		
 		// Редирект на главную страницу (личный кабинет)
                header('Location: index.php');

 	} else {
    
    $errors[] = 'Пароль неверно введен!';

 	}

 } else {
 	$errors[] = 'Пользователь с таким логином не найден!';
 }

if(!empty($errors)) {

		echo '<div class="success">' . array_shift($errors). '</div><hr class="success_border>';

	}

}
?>
<link rel="stylesheet" href="style.css">
<section class="sav">
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <!-- Форма авторизации -->
                <h2 class="heading">Форма авторизации</h2>
                <form action="login.php" method="post">
                    <input type="text" class="form-control" name="login" id="login" placeholder="Введите логин" required><br>
                    <input type="password" class="form-control" name="pass" id="pass" placeholder="Введите пароль" required><br>
                    <button class="button3" name="do_login" type="submit">Авторизоваться</button>
                </form>
                <br>
                <p class="paragraph">Если вы еще не зарегистрированы, тогда нажмите <a class="link" href="signup.php">здесь</a>.</p>
                <p class="paragraph">Вернуться на <a class="link" href="lk.php">главную</a>.</p>
            </div>
        </div>
    </div>
</section>
<?php require __DIR__ . '/footer.php'; ?>
<!-- Подключаем подвал проекта -->
