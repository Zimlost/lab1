    <?php
    session_start();
    require_once 'connect.php';





    $login = isset($_POST["login"]) ?  trim($_POST["login"]) : '';
    $password = md5($_POST["password"]);

    if(isset($_POST['submit']))
    {

        $stmt = $connect->query( "SELECT * FROM users WHERE login='$login' AND password='$password'" );
        $users = $stmt->fetchAll();
        var_dump($users);

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


