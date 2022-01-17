<?php
$title="Конструктор"; // название формы
require __DIR__ . '/../header.php'; // подключаем шапку проекта
require "../db.php"; // подключаем файл для соединения с БД

?>

<div class="container mt-4">
<div class="row">
<div class="col">

<center>
<h1>Конструктор</h1>
</center>

</div>
</div>
</div>


<?php if(isset($_SESSION['logged_user'])) : ?>

<!-- Пользователь может нажать выйти для выхода из системы -->
<center> 
<a href="egypt1.php" img = "">Египет</br>
<a href="turcia1.php" img = "">Турция</br>
<a href="daminikana1.php" img = "">Доминикана</br>
<a href="tiland1.php" img = "">Тайланд</br> </p>
<a href="../lk.php">Личный кабинет пользователя</a> 
</center>
<?php else : ?>

<!-- Если пользователь не авторизован выведет ссылки на авторизацию и регистрацию -->
<a href="../login.php">Авторизоваться</a><br>
<a href="../signup.php">Регистрация</a>
<?php endif; ?>

<?php require __DIR__ . '/../footer.php'; ?> <!-- Подключаем подвал проекта -->



