<?php
$title="Египет"; // название формы
require __DIR__ . '/../header.php'; // подключаем шапку проекта
require "../db.php"; // подключаем файл для соединения с БД
$data = $_POST;
$id = $_SESSION['logged_user']->id;


//Берем данные из бд для страны

$countryname = R::load('country', '1');
$country = $countryname->name;

//Берем данные из бд для городов

$cityname1 = R::load('city', '1');
$city1 = $cityname1->name;

$cityname2 = R::load('city', '2');
$city2 = $cityname2->name;

$cityname3 = R::load('city', '3');
$city3 = $cityname3->name;

//Берем данные из бд для отеля

$hotelname1 = R::load('hotel', '1');
$hotel1 = $hotelname1->name;

$hotelname2 = R::load('hotel', '2');
$hotel2 = $hotelname2->name;

$hotelname3 = R::load('hotel', '3');
$hotel3 = $hotelname3->name;

//Берем данные из бд для экскурсий

$exname1 = R::load('ex', '4');
$ex1 = $exname1->name;

$exname2 = R::load('ex', '2');
$ex2 = $exname2->name;

$exname3 = R::load('ex', '3');
$ex3 = $exname3->name;

$exname4 = R::load('ex', '1');
$ex4 = $exname4->name;

//$sort = '';
//$command = '';
//$command2 = '';
//$command3 = '';
//if(isset($_POST['sort'])) {
//    $sort = $_POST['sort'];
//    setcookie("sort", $sort);
//}
//if(isset($_COOKIE['sort'])){
//    $sort = $_COOKIE['sort'];
//};
//if($sort == 'Каир'){
//	$command = 'selected';
//}
//if($sort == 'Александрия'){
//	$command2 = 'selected';
//}
//if($sort == 'Гиза'){
//	$command3 = 'selected';
//}



?>

<div class="container mt-4">
<div class="row">
<div class="col">

<h1>Египет</h1>

</div>

</div>
</div>

<!-- ВЫБОРКА -->
<?php


echo "<FORM action='egypt1.php' method='post' >";
echo "<h3> Выберите город: </h3>";
echo "<SELECT name='ListBox' id='ListBox' >";


echo "<OPTION selected>$city1</OPTION>";
echo "<OPTION>$city2</OPTION>";
echo "<OPTION>$city3</OPTION>";

echo "</SELECT><br><br>";


echo "<h3> Выберите отель: </h3>";
echo "<SELECT name='ListBox1' id='ListBox1'>";
echo "<OPTION selected>$hotel1</OPTION>";
echo "<OPTION >$hotel2</OPTION>";
echo "<OPTION >$hotel3</OPTION>";
echo "</SELECT><br><br>";


echo "<h3> Выберите кол-во экскурсий: </h3>";
echo "<SELECT name='ListBox2' id='ListBox2'>";
echo "<OPTION selected>$ex1</OPTION>";
echo "<OPTION>$ex2</OPTION>";
echo "<OPTION>$ex3</OPTION>";
echo "<OPTION>$ex4</OPTION>";
echo "</SELECT><br><br>";

$Day5egypt="5";
$Day7egypt="7";
$Day14egypt="14";
$Day21egypt="21";
$Day30egypt="30";
echo "<h3> Выберите кол-во дней: </h3>";
echo "<SELECT name='ListBox3' id='ListBo3'>";
echo "<OPTION selected>$Day5egypt</OPTION>";
echo "<OPTION>$Day7egypt</OPTION>";
echo "<OPTION>$Day14egypt</OPTION>";
echo "<OPTION>$Day21egypt</OPTION>";
echo "<OPTION>$Day30egypt</OPTION>";
echo "</SELECT><br><br>";

$a = $countryname->price;
$b = 0;
$c = 0;
$d = 0;
$i = 0;
$a1 = 'Нет';
$b1 = 'Нет';
$c1 = 'Нет';
$d1 = 'Нет';
$i1 = 'Нет';

    if(($_POST['ListBox']) == "Каир")
    {
        $b = $cityname1->price;
		$b1 = 'Каир';
		
    }
    if(($_POST['ListBox']) == "Александрия")
    {
        $b = $cityname2->price;
		$b1 = 'Александрия';		
    }
    if(($_POST['ListBox']) == "Гиза")
    {
        $b = $cityname3->price;
		$b1 = 'Гиза';		
    }
    if(($_POST['ListBox1']) == "Обычного класса")
    {
        $c = $hotelname1->price; 
		$c1 = 'Обычного класса';
    }
    if(($_POST['ListBox1']) == "Среднего класса")
    {
        $c = $hotelname2->price; 
		$c1 = 'Среднего класса';
    }
    if(($_POST['ListBox1']) == "Высокого класса")
    {
        $c = $hotelname3->price; 
		$c1 = 'Высокого класса';
    }
    if(($_POST['ListBox2']) == "Нет")
    {
        $d = $exname1->price;
		$d1 = 'Нет';		
    }
    if(($_POST['ListBox2']) == "Личный гид на один день")
    {
        $d = $exname2->price;
		$d1 = 'Личный гид на один день';
    }
    if(($_POST['ListBox2']) == "Оазис Бахария из Каира")
    {
        $d = $exname3->price;
		$d1 = 'Оазис Бахария из Каира';		
    }
    if(($_POST['ListBox2']) == "В Луксор на самолёте")
    {
        $d = $exname4->price;
		$d1 = 'В Луксор на самолёте';
    }
    if(($_POST['ListBox3']) == "5")
    {
        $i = 5;
		$i1 = '5';		
    }
    if(($_POST['ListBox3']) == "7")
    {
        $i = 7; 
		$i1 = '7';	
    }
    if(($_POST['ListBox3']) == "14")
    {
        $i = 14;
		$i1 = '14';			
    }
    if(($_POST['ListBox3']) == "21")
    {
        $i = 21;
		$i1 = '21';			
    }
    if(($_POST['ListBox3']) == "30")
    {
        $i = 30;
		$i1 = '30';			
    }
$rezylt = (int)$a + (int)$b + (int)$d + (int)$c * (int)$i;

?>
<script>

function confirmSpelll() {
    if (confirm("Купить на сумму <?php echo $rezylt ?> ?")) {
        return true;
    } else {
        return false;
    }
}
</script>
<button type="submit" name="do_bay" id="do_bay" onclick="return confirmSpelll();">Купить</button></p>
</FORM>
<?php


if(isset($data['do_bay']))
{
		$books = R::load('users', $id);
        (int)$nowbalance = $books->balance;
		$rezylt = (int)$a + (int)$b + (int)$d + (int)$c * (int)$i;
	    if($nowbalance < $rezylt){
        echo '<div style="color: red; ">Недостаточно средств</div><hr>';
        echo '<form action="..\lk.php"><button>Назад</button></p>';
        return;
    }


    
        $raschet = $nowbalance - $rezylt;
		$user = R::load('users', $id);
        $user->balance = $raschet;
		$user->turs = $b1;
		$user->city = $c1;
		$user->hotel = $d1;
		$user->ex = $i1;
		$user->country = $title;
        R::store($user);

}
?>




<!-- Пользователь может нажать выйти для выхода из системы -->

<a href="../lk.php">Личный кабинет пользователя</a> 



<?php require __DIR__ . '/../footer.php'; ?> <!-- Подключаем подвал проекта -->