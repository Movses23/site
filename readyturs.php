<?php
$title="Готовые туры"; // название формы
require __DIR__ . '/header.php'; // подключаем шапку проекта
require "db.php"; // подключаем файл для соединения с БД

?>
<link rel="stylesheet" href="style.css">
<section class="sav">
    <div class="container">
        <div class="row">
            <div class="col">


                <h1 class="heading">Горящие туры из Москвы 2021 — 2022</h1>




                <?php if(isset($_SESSION['logged_user'])) : ?>

                <!-- Пользователь может нажать выйти для выхода из системы -->

                <a class="link2" href="lk.php">Личный кабинет пользователя</a><br>
                <div class="container-small">
                    <div class="row1">
                        <div class="column1">

                            <a class="link3" href="egypt.php"><img class="photo" src="Egypt.jpg">Египет:
                                <p class="paragraph_indent">Для многих российских туристов путешествие в Египет когда-то было первой зарубежной поездкой.
                                    <br><span class="price">Цена: 33000</span>
                                </p>
                            </a>
                            <a class="link3" href="turcia.php"> <img class="photo" src="Turkey.jpg">Турция:
                                <p class="paragraph_indent">Турция уже более 20 лет является эталоном пляжного отдыха за рубежом для россиян. Когда-то большинство российских туристов начинали свой опыт путешествий именно в Турции.
                                    <br><span class="price">Цена: 42800</span>
                                </p>
                            </a>
                            <a class="link3" href="daminikana.php"> <img class="photo" src="dominikana.jpg">Доминикана:
                                <p class="paragraph_indent">Доминиканская Республика сегодня по праву считается лучшей страной Карибского бассейна – не только по количеству достопримечательностей и архитектурных памятников, но и по уровню обслуживания туристов..
                                    <br><span class="price">Цена: 58100</span>
                                </p>
                            </a>
                            <a class="link3" href="tiland.php"> <img class="photo" src="Tailand.jpeg">Тайланд:
                                <p class="paragraph_indent">Страна тысячи улыбок» и самое популярное направление Юго-Восточной Азии, где можно найти, пожалуй, все варианты отдыха. Хотите классический отпуск на современном курорте? Пожалуйста. Мечтаете о бурной ночной жизни и экстремальных приключениях? Легко.
                                    <br><span class="price">Цена: 49000</span>
                                </p>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php else : ?>

<!-- Если пользователь не авторизован выведет ссылки на авторизацию и регистрацию -->
<a class="link" href="login.php">Авторизоваться</a><br>
<a class="link" href="signup.php">Регистрация</a>
<?php endif; ?>

<?php require __DIR__ . '/footer.php'; ?>
<!-- Подключаем подвал проекта -->
