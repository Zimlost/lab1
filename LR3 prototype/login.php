    <?php
    session_start();
    require_once 'connect.php';





    $login = isset($_POST["login"]) ?  trim($_POST["login"]) : '';
    $password = md5($_POST["password"]);

    if(isset($_POST['submit']))
    {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE password = :password AND login = :login");
        $stmt->bindValue('login', $_POST['login'], PDO::PARAM_STR);
        $stmt->bindValue('password', $_POST['lpassword'], PDO::PARAM_STR);
        $stmt->execute();
       

        if (!empty($users))
        {
            $check_user = $users[0];
            $_SESSION['login'] = $check_user['login'];
            header("Location: W_shop.php");

        }
        else { $_SESSION['message'] = "Неверный логин или пароль";
            header("Location: authorization.php");


        }
    }
?>


