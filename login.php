<?php

    # 2ª correção: fazer o tratamento do recebimento dos dados
    ## 1ª forma simples usando o addslashes.
    $email = addslashes($_POST['email_form']); // '\ or 1=1 -- '\
    $senha = addslashes($_POST['senha_form']);

    ## 2ª forma simples usando o filter_input.
    // https://www.php.net/manual/pt_BR/function.filter-input.php
    // https://www.php.net/manual/en/filter.filters.sanitize.php
    #$email = filter_input(INPUT_POST, 'email_form', FILTER_SANITIZE_EMAIL);
    #$senha = filter_input(INPUT_POST, 'senha_form', FILTER_SANITIZE_STRING);

    $link = mysqli_connect("localhost","root","","db_test", 3306);
    mysqli_set_charset($link, "utf8");

    #$sql = "select * from tb_usuarios where email = '" . $email . "' and senha = md5('" . $senha . "')";
    $sql = "select * from tb_usuarios where email = '{$email}' and senha = md5('{$senha}')";
  
    $verifica = mysqli_query($link, $sql) or die("erro ao selecionar");
    
    if (mysqli_num_rows($verifica) <= 0){
        echo "<script language='javascript' type='text/javascript'>
                alert('Login e/ou senha incorretos');
                window.location.href='index.html';
              </script>";
        die();
      }else{
        $_SESSION["login"] = $email;
        $_SESSION["tp_user"] = mysqli_fetch_assoc($verifica)['tipo_user'];
        header("Location:acesso.php");
        die();
      }