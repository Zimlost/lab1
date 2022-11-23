<?php
    session_start();
    require_once 'connect.php';

    $login = isset($_POST["email1"]) ?  trim($_POST["email1"]) : '';
    $password = isset($_POST["password1"]) ?  trim($_POST["password1"]) : '';
    $full_name = isset($_POST["full_name"]) ?  trim($_POST["full_name"]) : '';
    $birthday = isset($_POST["birthday"]) ?  trim($_POST["birthday"]) : '';
    $address = isset($_POST["address"]) ?  trim($_POST["address"]) : '';
    $genger = isset($_POST["genger"]) ?  trim($_POST["genger"]) : '';
    $hobbies = isset($_POST["hobbies"]) ?  trim($_POST["hobbies"]) : '';
    $vkLink = isset($_POST["vklink"]) ?  trim($_POST["vklink"]) : '';
    $bloodtype = isset($_POST["bloodtype"]) ?  trim($_POST["bloodtype"]) : '';
    $fh_factor = isset($_POST["fh_factor"]) ?  trim($_POST["fh_factor"]) : '';



    if(isset($_POST['submit']))
    {
        $err = array();

    if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $login))
    {
        array_push($err, "Email не может быть такого формата ");
        $_SESSION['message'] = implode('', $err);
        header("Location: registration.php");
    }
    elseif   (preg_match("/(?=.[а-яё])(?=.[А-ЯЁ])/", $password) || !preg_match("/(?=^.{10,}$)(?=.*[_])(?=.*[A-Z0-9-]).*$/", $password))
    {
            array_push( $err,"Пароль введен некорректно");
            $_SESSION['message'] = implode('', $err);
            header("Location: registration.php");

    }
        
    else {
            $password_conf = $_POST["password_conf"];


    if($password===$password_conf)  {
        $password = md5($password);
    }
            else {

                array_push($err, "Пароли не совпадают");
                $_SESSION['message'] = implode('', $err);
                header("Location: registration.php");
            }
            $stmt = $connect->query( "SELECT * FROM users WHERE login='$login'" );
            $check_user = $stmt -> fetchAll();
            if(!empty($check_user))
            {
                array_push($err, "Пользователь с таким логином уже существует");
                $_SESSION['message'] = implode('', $err);
                header("Location: registration.php");

            }


            if(empty($err))
            {

                $stmt = $connect->prepare("INSERT INTO users(login, password, full_name, birthday, address, genger, hobbies, vkLink, bloodtype, fh_factor) VALUES(:login, :password, :full_name, :birthday, :address, :genger, :hobbies, :vkLink, :bloodtype, :fh_factor)");
                $stmt->bindValue('login', $login, PDO::PARAM_STR);
                $stmt->bindValue('password', $password, PDO::PARAM_STR);
                $stmt->bindValue('full_name', $full_name, PDO::PARAM_STR);
                $stmt->bindValue('birthday', $birthday, PDO::PARAM_STR);
                $stmt->bindValue('address', $address, PDO::PARAM_STR);
                $stmt->bindValue('genger', $genger, PDO::PARAM_STR);
                $stmt->bindValue('hobbies', $hobbies, PDO::PARAM_STR);
                $stmt->bindValue('vkLink', $vkLink, PDO::PARAM_STR);
                $stmt->bindValue('bloodtype', $bloodtype, PDO::PARAM_STR);
                $stmt->bindValue('fh_factor', $fh_factor, PDO::PARAM_STR);
                $stmt->execute();
                $_SESSION['message'] = "Вы успешно зарегистрировались";
                header("Location: authorization.php");
            }





    }

}

if (isset($_SESSION['message'])) print_r($_SESSION['message']);
