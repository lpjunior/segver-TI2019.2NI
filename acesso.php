<?php

    if($_SESSION["tp_user"] == "admin") {
        header("Location:admin.php");
        die();
    }

    header("Location:home.php");
    die();