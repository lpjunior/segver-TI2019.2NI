<?php

    $nome = $_POST['nome_form'];
    $email = $_POST['email_form'];
    $senha = $_POST['senha_form'];

    $link = mysqli_connect("localhost","root","","db_test", 3306);
    mysqli_set_charset($link, "utf8");

    $sql = "insert into tb_usuarios (nome, email, senha) values ('" . $nome . "', '" . $email ."', '" . $senha. "')";
  
    $verifica = mysqli_query($link, $sql) or die("erro ao inserir");

    if ($verifica){
        echo "<script language='javascript' type='text/javascript'>
                alert('Falha ao cadastrar');
                window.location.href='index.html';
              </script>";
        die();
    }else{
        echo "<script language='javascript' type='text/javascript'>
            alert('');
            window.location.href='index.html';
            </script>";
        die();
    }