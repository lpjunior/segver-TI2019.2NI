<?php
if (isset($_COOKIE['login'])) {
    unset($_COOKIE['login']); 
}

header("Location:index.html");
die();