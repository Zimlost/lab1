    <?php
    session_start();
    require_once 'connect.php';

    $login = isset($_POST["login"]) ?  trim($_POST["login"]) : '';
    $password = md5($_POST["password"]);
    if(isset($_POST['submit']))
    {

        $stmt = $connect->prepare( "SELECT * FROM users WHERE login=:login AND password=:password" );
        $stmt->bindParam('login', $_POST['login'], PDO:: PARAM_STR);
        $stmt->bindParam('password', $password, PDO:: PARAM_STR);
        $stmt->execute();

        $users = $stmt->fetchAll();
        

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


