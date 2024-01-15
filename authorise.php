<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Авторизация</title>
</head>
<body>
<div class="login-container">
    <form class="login-form">
        <h2>Авторизация</h2>
        <div class="form-group">
            <label class="login-text" for="login">Логин</label><input type="text" class="form-control" id="login" placeholder="Login">
        </div>
        <div class="form-group">
            <label class="login-text" for="password">Пароль</label><input type="password" class="form-control" id="password" placeholder="Password">
        </div>
        <div class="checkbox">
            <label class="login-text" >
                <input type="checkbox"> Чужой компьютер
            </label>
        </div>
        <button type="submit" class="btn login-btn">Войти</button>

            <a class="login-btn-small login-text" href="">Зарегистрироваться</a>
            <a class="login-btn-small login-text" href="">Восстановить пароль</a>
    </form>
</div>
</body>
</html>
