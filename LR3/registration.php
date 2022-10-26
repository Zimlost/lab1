<?php session_start() ?>

<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="style1.css">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>


<body>
    <?php require_once 'header.php' ?>
<div class="d-flex align-items-center container justify-content-center auth">
    <h1> Регистрация </h1>
</div>
<form action="signup.php" id="form" method="POST">
    <div class="container d-flex align-items-center justify-content-center labels">
        <div class="mb-3 w-50">
            <label for="" class="form-label">Email</label>
            <input type="text" name="email1" class="form-control"  aria-describedby="emailHelp">
            <label for="" class="form-label">Пароль</label>
            <input type="text" name="password1" class="form-control" >
            <label for="" class="form-label">Подтверждение пароля</label>
            <input type="text" name="password_conf" class="form-control" >
            <label for="" class="form-label">ФИО</label>
            <input type="text" name="full_name" class="form-control" aria-describedby="emailHelp">
            <label for="" class="form-label">Дата рождения</label>
            <input type="text" name="address" class="form-control" aria-describedby="emailHelp">
            <label for="" class="form-label">Адрес</label>
            <input type="text" name="birthday_date" class="form-control" aria-describedby="emailHelp">
            <label for="" class="form-label">Пол</label>
            <input type="text" name="sex" class="form-control">
            <label for="" class="form-label">Интересы</label>
            <input type="text" name="interests" class="form-control">
            <label for="" class="form-label">Интересы</label>
            <input type="text" name="vklink" class="form-control">
            <label for="" class="form-label">Группа крови</label>
            <input type="text" name="blood_type" class="form-control">
            <label for="" class="form-label">Резус-фактор</label>
            <input type="text" name="rh_factor" class="form-control">

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <?php  if(isset($_SESSION['message'])) echo $_SESSION['message']; ?>
            <br>
            <button  type="submit" name="submit" class="btn btn-primary">Зарегистрироваться</button>
            <p>
                У вас уже есть аккаунт? - <a href="/LR3/authorization.php" class="text-success fw-bold text-decoration-none">Авторизуйтесь</a>
            </p>
        </div>
    </div>
</form>
</body>
</html>>
