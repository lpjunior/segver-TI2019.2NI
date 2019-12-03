<?php
    $email = $_POST['email_form'];
    $senha = $_POST['senha_form'];

    $link = mysqli_connect("localhost","root","","db_test", 3306);
    mysqli_set_charset($link, "utf8");

    $sql = "select * from tb_usuarios where email = '" . $email . "' and senha = '" . $senha . "'";

    $verifica = mysqli_query($link, $sql) or die("erro ao selecionar");
    
    if (mysqli_num_rows($verifica) <= 0){
        echo "<script language='javascript' type='text/javascript'>
                alert('Login e/ou senha incorretos');
                window.location.href='index.html';
              </script>";
        die();
      }else{
        setcookie("login", $email);
        setcookie("tp_user", mysqli_fetch_assoc($verifica)['tipo_user']);
        header("Location:acesso.php");
        die();
      }