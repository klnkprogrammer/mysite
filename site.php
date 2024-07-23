<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Покупка AirPods</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="shapkaTop">
        <div class="otziv" onclick="window.location.href='otziv.html'">Отзывы</div>
        <div class="support" onclick="window.location.href='main.html'">Связаться с нами</div>
        <div class="main" onclick="window.location.href='site.php'">Главная</div>
    </div>

    <div class="tovar">
        <div class="airpodstext">Беспроводные наушники AirPods Pro</div>
        <div class="btbackground">
            <div class="characterstext">Характеристики</div>
            <div class="charactersmain">ОСНОВНЫЕ</div>
            <div class="characters">
                <div class="text1">Беспроводные интерфейсы............................................................................ Bluetooth; GPS; AirPods Pro; блютуз; iOS</div>
                <div class="text2">Время зарядки..................................................... 1 часов</div>
                <div class="text3">Время работы от аккумулятора............................................................ 5 часов</div>
                <div class="text4">Емкость аккумулятора..................................................................................... 350mah</div>
            </div>
            <div class="buttonbuy" id="open_pop_up">
                <div class="buttontext">Купить</div>
            </div>
            <div class="costtext">Цена:</div>
            <div class="cost">3999₽</div>
            <div class="costnotreal">6000₽</div>
            <div class="airpods-image">
                <img src="airpods.png" alt="AirPods" class="airpods">
            </div>
        </div>
    </div>

    <div class="pop_up" id="pop_up">
        <div class="pop_up_container">
            <div class="pop_up_body" id="pop_up_body">
                <p>Оставить заказ</p>
                <form id="orderForm" method="post">
                    <input type="text" name="name" placeholder="Имя" required>
                    <input type="text" name="phone" placeholder="Номер телефона" required>
                    <input type="email" name="email" placeholder="Почта" required>
                    <button type="submit" class="buttonbuy2">
                        <div class="buttonbuy2text">Заказать</div>
                    </button>
                </form>
                <div class="pop_up_close" id="pop_up_close">&#10006;</div>
            </div>
        </div>
    </div>

    <?php
// Параметры подключения к базе данных
$servername = "sql7.freemysqlhosting.net";
$username = "sql7721064"; // ваш пользователь MySQL
$password = "H1I5mdqyAI"; // ваш пароль MySQL
$dbname = "sql7721064"; // ваша база данных MySQL

// Подключение к базе данных с помощью PDO
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
    // устанавливаем режим ошибок PDO на исключения
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Установка кодировки соединения
    $conn->exec("SET NAMES 'utf8mb4'");
    $conn->exec("SET CHARACTER SET utf8mb4");
    $conn->exec("SET COLLATION_CONNECTION = 'utf8mb4_unicode_ci'");

    // Обработка данных из формы
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $date = date("Y-m-d H:i:s"); // текущая дата и время

        // Подготовленный запрос для вставки данных
        $stmt = $conn->prepare("INSERT INTO users (name, email, number, date) VALUES (:name, :email, :phone, :date)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':date', $date);

        if ($stmt->execute()) {
            header("Location: success.html");
            exit();
        } else {
            echo "Ошибка: " . $stmt->errorInfo()[2];
        }

        $stmt->closeCursor();
    }
} catch(PDOException $e) {
    echo "Ошибка подключения: " . $e->getMessage();
}

// Закрытие соединения с базой данных
$conn = null;
?>
    

    <div class="otzivtext"></div>

    <script src="main.js"></script>
</body>
</html>