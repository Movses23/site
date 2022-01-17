<?php
$title="Турция1"; // название формы
require __DIR__ . '/../header.php'; // подключаем шапку проекта
require "../db.php"; // подключаем файл для соединения с БД


?>

<div class="container mt-4">
<div class="row">
<div class="col">

<h1>Турция</h1>

</div>
</div>
</div>

<!-- ВЫБОРКА ГОРОДА -->
<?php
$Stambul1="Стамбул";
$Ankara2="Анкара";
$Izmir3="Измир";
echo "<FORM method='post' action=''>";// action='сюда надо вставить пусть к файлу, хуй знает нахуя'
echo "<h3> Выберите город: </h3>";
echo "<SELECT name='ListBox'>";
echo "<OPTION>$Stambul1</OPTION>";
echo "<OPTION>$Ankara2</OPTION>";
echo "<OPTION>$Izmir3</OPTION>";
echo "</SELECT><br><br>";
echo "<input type='hidden' name='Stambul1' value='$Stambul1'>";
echo "<input type='hidden' name='Ankara2' value='$Ankara2'>";
echo "<input type='hidden' name='Izmir3' value='$Izmir3'>";
echo "</FORM>";
?>

<!-- ВЫБОРКА ОТЕЛЯ -->
<?php
$Ob1="Обычного класса";
$Sr2="Среднего класса";
$Vis3="Высокого класса";
echo "<FORM method='post' action=''>";// action='сюда надо вставить пусть к файлу, хуй знает нахуя'
echo "<h3> Выберите отель: </h3>";
echo "<SELECT name='ListBox'>";
echo "<OPTION>$Ob1</OPTION>";
echo "<OPTION>$Sr2</OPTION>";
echo "<OPTION>$Vis3</OPTION>";
echo "</SELECT><br><br>";
echo "<input type='hidden' name='Ob1' value='$Ob1'>";
echo "<input type='hidden' name='Sr2' value='$Sr2'>";
echo "<input type='hidden' name='Vis3' value='$Vis3'>";
echo "</FORM>";
?>

<!-- ВЫБОРКА КОЛ-ВО ЭКСКУРСИЙ -->
<?php
$NO1="Нет";
$Romantic2="Романтика на Босфоре: прогулка на яхте класса люкс";
$VelicolepniVek3="«Великолепный век». Любовь Роксоланы";
$FotoProgylka4="Фотопрогулка «Стамбул — город контрастов»";
echo "<FORM method='post' action=''>";// action='сюда надо вставить пусть к файлу, хуй знает нахуя'
echo "<h3> Выберите кол-во экскурсий: </h3>";
echo "<SELECT name='ListBox'>";
echo "<OPTION>$NO1</OPTION>";
echo "<OPTION>$Romantic2</OPTION>";
echo "<OPTION>$VelicolepniVek3</OPTION>";
echo "<OPTION>$FotoProgylka4</OPTION>";
echo "</SELECT><br><br>";
echo "<input type='hidden' name='NO1' value='$NO1'>";
echo "<input type='hidden' name='Romantic2' value='$Romantic2'>";
echo "<input type='hidden' name='VelicolepniVek3' value='$VelicolepniVek3'>";
echo "<input type='hidden' name='FotoProgylka4' value='$FotoProgylka4'>";
echo "</FORM>";
?>

<!-- ВЫБОРКА КОЛ-ВО ДНЕЙ -->
<?php
$Day5egypt="5";
$Day7egypt="7";
$Day14egypt="14";
$Day21egypt="21";
$Day30egypt="30";
echo "<FORM method='post' action=''>";// action='сюда надо вставить пусть к файлу, хуй знает нахуя'
echo "<h3> Выберите кол-во дней: </h3>";
echo "<SELECT name='ListBox'>";
echo "<OPTION>$Day5egypt</OPTION>";
echo "<OPTION>$Day7egypt</OPTION>";
echo "<OPTION>$Day14egypt</OPTION>";
echo "<OPTION>$Day21egypt</OPTION>";
echo "<OPTION>$Day30egypt</OPTION>";
echo "</SELECT><br><br>";
echo "<input type='hidden' name='Day5egypt' value='$Day5egypt'>";
echo "<input type='hidden' name='Day7egypt' value='$Day7egypt'>";
echo "<input type='hidden' name='Day14egypt' value='$Day14egypt'>";
echo "<input type='hidden' name='Day21egypt' value='$Day21egypt'>";
echo "<input type='hidden' name='Day30egypt' value='$Day30egypt'>";
echo "</FORM>";
?>


<!-- Если авторизован выведет приветствие -->

  
	<form action="turcia1.php" method="post">
<button class="btn btn-success" name="do_bay" type="submit"  onclick="return confirm('Вы уверены?');">Рассчитать</button></p>
</form>





<!-- Пользователь может нажать выйти для выхода из системы -->

<a href="../lk.php">Личный кабинет пользователя</a> 



<?php require __DIR__ . '/../footer.php'; ?> <!-- Подключаем подвал проекта -->