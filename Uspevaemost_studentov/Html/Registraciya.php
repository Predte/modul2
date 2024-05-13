<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link  rel="stylesheet" href="\Uspevaemost_studentov\Css\Uspevaemost_studentov.css">
    <link  rel="stylesheet" href="\Uspevaemost_studentov\Css\reg.css">
    <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" integrity="undefined" crossorigin="anonymous">
  
    <title>Регистрация</title>
</head>
<body>
<header class="header bg" >
  <div class="container" >
    <a href="Uspevaemost_studentov.html" class="logo"><img height="60px" width="60px" src="\Uspevaemost_studentov\img\logo.png" alt=""></a>
    <nav>
      <ul>
          <li><a style="color: black" class="underline-one" href="Uspevaemost_studentov.php">Главная </a></li>
          <li><a style="color: black" class="underline-one" href="avtorizaciya.php">Авторизация</a></li>
          <li><a style="color: black" class="underline-one" href="Registraciya.php">Регистрация</a></li>
      </ul>
    </nav>
  </div>
</header>
<main>  
      <div class="main" >
      <div class="midle">
<?php
$host = 'localhost';
$database = 'uspevaemost';
$userdb = 'root';
$password = '';

$link = mysqli_connect($host, $userdb, $password, $database);

if (!$link) {
    die('Ошибка подключения: ' . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Password1 = $_POST['Password1'];
 
    if (!empty($Name) && !empty($Email) && !empty($Password1)) {

        $sql = "INSERT INTO user (Name, Email, Password1, Role) VALUES ('$Name', '$Email', '$Password1', '2')";
       
        if (mysqli_query($link, $sql)) {
            echo "Пользователь $Name зарегистрирован!";
        } else {
            echo "Ошибка при регистрации: " . mysqli_error($link);
        }
    } else {
        echo "Все поля должны быть заполнены.";
    }
}
mysqli_close($link);
?>
</div>
<div class="midle">
<form action="Registraciya.php" method="POST">
            <label class="text">Имя</label></br>
            <input name="Name"></br>
            <label class="text">E-mail</label></br>
            <input name="Email"></br>
            <label class="text">Пароль</label></br>
            <input name="Password1"></br>
        <div class="btn-hover">
          <button  type="submit"  class="btn-hover color">Регистрация</button>
        </div> 
      </form>
</div>
</div>
      </div> 
    </div>
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