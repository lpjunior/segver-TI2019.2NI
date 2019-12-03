<?php

    if($_COOKIE["tp_user"] == "admin") {
        header("Location:admin.php");
        die();
    }

    header("Location:home.php");
    die();