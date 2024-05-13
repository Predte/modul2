<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link  rel="stylesheet" href="\Uspevaemost_studentov\Css\Uspevaemost_studentov.css">
    <link  rel="stylesheet" href="\Uspevaemost_studentov\Css\reg.css">
    <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" integrity="undefined" crossorigin="anonymous">
    <title>Авторизация</title>
</head>
<body>
<header class="header bg" >
  <div class="container" >
  
    <nav>
      <ul>
          <li><a style="color: black" class="underline-one" href="Uspevaemost_studentov.php">Главная </a></li>
          <li><a style="color: black" class="underline-one" href="avtorizaciya.php">Авторизация</a></li>
          <li><a style="color: black" class="underline-one" href="Registraciya.php">Регистрация</a></li>
      </ul>
    </nav>
  </div>
</header>
<main class="midle">
    <div class="main">
        <div class="middle">
            <form action="avtorizaciya.php" method="POST">
                <label class="text">E-mail</label></br>
                <input name="Email"></br>
                <label class="text">Пароль</label></br>
                <input name="Password1"></br>
                <div class="btn-hover">
                    <button type="submit" class="btn-hover color">Вход</button>
                </div>
            </form>
        </div>
    </div>

<?php
session_start();

$host = 'localhost';
$database = 'uspevaemost';
$userdb = 'root';
$password = '';

$link = mysqli_connect($host, $userdb, $password, $database) or die("Ошибка подключения к базе данных: " . mysqli_error($link));

if (isset($_POST['Email']) && isset($_POST['Password1'])) {
    $Email = mysqli_real_escape_string($link, $_POST['Email']);
    $Password1 = mysqli_real_escape_string($link, $_POST['Password1']);

    // Проверка логина и пароля
    $query = mysqli_query($link, "SELECT * FROM user WHERE Email = '" . $Email . "' AND Password1 = '" . $Password1 . "'");
    if (mysqli_num_rows($query) > 0) {
        $user = mysqli_fetch_assoc($query);

        $_SESSION['user'] = $user;

        if ($user['Role'] == 1) {
            header("Location: admin.php"); 
            exit();
        } else {
            echo "Привет, " . $_SESSION['user']['Name'] . "!";
        }
    } else {
        echo "Неверный логин или пароль!";
    }
}
?>
</main>
    <footer class="footer">
      <nav>
      <ul2 >
          
      <li ><a style="color: black" class="a1" href="https://web.telegram.org/k/">Telegram</a>    <a href="https://web.telegram.org/k/"><img class="imgs2" src="\Uspevaemost_studentov\img\Social\telegram.png"></a> </li>
      <li ><a style="color: black" class="a1" href="https://vk.com/feed">Вконтакте</a>           <a href="https://vk.com/feed"><img class="imgs2" src="\Uspevaemost_studentov\img\Social\vk.png"></a> </li>
      <li ><a style="color: black" class="a1" href="https://www.youtube.com/">YouTube </a>       <a href="https://www.youtube.com/"><img class="imgs2" src="\Uspevaemost_studentov\img\Social\youtube.png"></a> </li>
      <li ><a style="color: black" class="a1" href="https://web.whatsapp.com/">WhatsApp</a>      <a href="https://web.whatsapp.com/"><img class="imgs2" src="\Uspevaemost_studentov\img\Social\whatsapp.png"></a> </li>
      <li ><a style="color: black" class="a1" href="https://e.mail.ru/inbox">Почта</a>           <a href="https://e.mail.ru/inbox"><img class="imgs2" src="\Uspevaemost_studentov\img\Social\pochta.png"></a> </li>
      <li ><img class="imgs2" src="\Uspevaemost_studentov\img\Social\tel.png"></li>
      <li ><p style="color: black">55-55-55</p></li>       
      <li ><p style="color: black">44-44-44</p></li>
      </ul2>
      </nav> 
  </footer> 
</body>
</html>